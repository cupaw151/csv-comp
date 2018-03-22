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
					<input required placeholder="Bucket" name="s3-bucket" class="form-control"></input>
					<input required placeholder="Region" name="s3-region" class="form-control"></input>
					<input required placeholder="Key" name="s3-key" class="form-control"></input>
					<input required placeholder="Secret" name="s3-secret" class="form-control"></input>
					<input required placeholder="Filename" name="s3-filename" class="form-control"></input>
					<input required placeholder="Column name" name="s3-column" class="form-control"></input>
				</div>
				<div class="form-group">
					MySQL
					<input required placeholder="Host" name="mysql-host" class="form-control"></input>
					<input required placeholder="Port" name="mysql-port" class="form-control"></input>
					<input required placeholder="Username" name="mysql-username" class="form-control"></input>
					<input required placeholder="Password" name="mysql-password" class="form-control"></input>
					<input required placeholder="Database name" name="mysql-dbname" class="form-control"></input>
					<input required placeholder="Table name" name="mysql-table" class="form-control"></input>
					<input required placeholder="Column name" name="mysql-column" class="form-control"></input>
				</div>
				<div class="form-group">
					SCP
					<input required placeholder="Host" name="scp-host" class="form-control"></input>
					<input required placeholder="User" name="scp-user" class="form-control"></input>
					<input required placeholder="Password" name="scp-password" class="form-control"></input>
					<input required placeholder="Filename" name="scp-filename" class="form-control"></input>
					<input required placeholder="Column name" name="scp-column" class="form-control"></input>
				</div>
				<div class="form-group">
					CSV
					<input required type="file" name="csv-file" style="margin-bottom:5px;"></input>
					<input required placeholder="Column name" name="csv-column" class="form-control"></input>
				</div>
				<button type="submit" class="form-control"> Submit </button>
			{{ Form::close() }}
		</div>
	</body>
</html>