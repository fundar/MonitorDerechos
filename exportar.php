<?php
$date     = date_create();
$filename = 'dump-' . date_timestamp_get($date) . '.sql';

//datos base de datos
$mysqlDatabaseName ='ddhhdb';
$mysqlUserName     ='root';
$mysqlPassword     ='root';
$mysqlHostName     ='localhost';
$mysqlExportPath   ='database/exports/' . $filename;

//comando exportar
$command ='mysqldump --opt -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' > ' .$mysqlExportPath;
exec($command, $output=array(), $worked);

switch($worked) {
	case 0:
		echo 'Database <b>' .$mysqlDatabaseName .'</b> successfully exported to <b>~/' .$mysqlExportPath .'</b>';
		header('Location: ' . $mysqlExportPath);
	break;
	
	case 1:
		echo 'There was a warning during the export';
	break;
	
	case 2:
		echo 'There was an error during export';
	break;
}
