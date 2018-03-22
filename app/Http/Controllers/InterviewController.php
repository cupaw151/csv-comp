<?php

namespace App\Http\Controllers;

use Aws\S3\S3Client;;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Filesystem\Filesystem;
use Exception;
use Config;
use DB;
use Input;
use Storage;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Json
     */
    public function index(Request $request)
    {
        return view('form');
    }

    public function submit(Request $request)
    {
        $input = $request->input();
        
        // $s3Data = $this->getS3Data(
        //     $input['s3-bucket'],
        //     $input['s3-region'],
        //     $input['s3-key'],
        //     $input['s3-secret'],
        //     $input['s3-filename'],
        //     $input['s3-column']
        // );

        // $sqlData = $this->getDatabaseData(
        //     $input['mysql-host'], 
        //     $input['mysql-port'], 
        //     $input['mysql-username'], 
        //     $input['mysql-password'],
        //     $input['mysql-db'],
        //     $input['mysql-table'],
        //     $input['mysql-columnname']
        // ));
        
        //$scpData = $this->getScpData();
        
        //$csvData = $this->getCsvData($request->file('csv-file'), $input['csv-column']);
    }

    private function getS3Data(
        $bucket, 
        $region,
        $key,
        $secret,
        $filename,
        $column
    ) {
        $s3 = new S3Client([
            'version'     => 'latest',
            'region'      => 'ap-southeast-1',
            'ResponseContentType' => 'text/plain',
            'credentials' => [
                'key' => $key,
                'secret' => $secret
            ]
        ]);
        $s3->registerStreamWrapper();
        $url = "s3://$bucket/$filename";

        $file = fopen($url, 'r');

        return $this->parseCsv($file, $column);        

    }

    private function getDatabaseData(
        $host,
        $port,
        $username,
        $password,
        $db,
        $table,
        $column
    ) {
        $connKey = 'CustomConnection';

        Config::set('database.connections.'.$connKey, [
            'driver'    => 'mysql',
            'host'      => $host.':'.$port,
            'database'  => $db,
            'username'  => $username,
            'password'  => $password,
            'charset'   => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix'    => '',
        ]);

        $data = DB::connection($connKey)
            ->table($table)
            ->selectRaw($column)
            ->get()
            ->pluck($column)
            ->toArray();

        return $data;
    }

    private function getSCPData() {
        SSH::into('staging')->get($remotePath, $localPath);

        return $this->parseCsv();      
    }

    private function getCsvData($file, $column) {
        $imageName = $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
        $file->move(base_path() . '/public/', $imageName);

        $url = base_path(). '/public/' . $imageName;

        $file = fopen($url, 'r');

        return $this->parseCsv($file, $column);      
    }

    private function parseCsv($file, $column) 
    {
        $keys = fgetcsv($file);

        $temp = [];
        while (!feof($file)) {
            $row = array_combine($keys, fgetcsv($file));
            $temp[] = $row;
        }
        
        return(array_column($temp, $column));
    }
}
