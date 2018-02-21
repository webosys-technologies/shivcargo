<?php
	if($_SERVER["HTTP_HOST"]=="localhost")
	{
		$host="localhost";
		$user="root";
		$pass="";
		$db="shivcarg_data";
	}
	else
	{
		$host="localhost";
		$user="shivcargo_user";
		$pass="shivcargo@123";
		$db="shivcargo_agency";
	}
		mysql_connect($host,$user,$pass,$db) OR die ("Unable To Connect");
		mysql_select_db($db);
?>