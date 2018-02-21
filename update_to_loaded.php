<?php
include "db/config.php";
if(isset($_POST["bokid"]))
{ 
	$bokid=$_POST["bokid"];
	$bok_amt=$_POST["bok_amt"];
	$bok_privatemark=$_POST["bok_privatemark"];
	$bok_loaddate=date("Y-m-d");
	$sql="update booking set bok_amt='$bok_amt',bok_loaddate='$bok_loaddate',bok_status='1',bok_privatemark='$bok_privatemark' where bokid='$bokid'";
	if(mysql_query($sql))
	{
		echo '<b style="color:green"><i class="fa fa-check"></i> Parcel Loaded</b>'; 
	}
	else
	{
		echo '<b style="color:red"><i class="fa fa-warning"></i> Parcel Not Loaded <a style="color:black" href="">Click Here </a> To Reload page</b>';
	}
}
?>