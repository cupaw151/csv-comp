<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
			{{ Form::open(array('route' => 'interview.submit', 'files' => true)) }}
				<div class="form-group">
					S3
					<input name="s3-bucket" class="form-control"></input>
					<input name="s3-region" class="form-control"></input>
					<input name="s3-key" class="form-control"></input>
					<input name="s3-secret" class="form-control"></input>
					<input name="s3-filename" class="form-control"></input>
					<input name="s3-column" class="form-control"></input>
				</div>
				<div class="form-group">
					MySQL
					<input name="mysql-host" class="form-control"></input>
					<input name="mysql-port" class="form-control"></input>
					<input name="mysql-username" class="form-control"></input>
					<input name="mysql-password" class="form-control"></input>
					<input name="mysql-dbname" class="form-control"></input>
					<input name="mysql-table" class="form-control"></input>
					<input name="mysql-column" class="form-control"></input>
				</div>
				<div class="form-group">
					CSV
					<input type="file" name="csv-file" style="margin-bottom:5px;"></input>
					<input name="csv-column" class="form-control"></input>
				</div>
				<button type="submit" class="form-control"> Submit </button>
			{{ Form::close() }}
		</div>
	</body>
</html>