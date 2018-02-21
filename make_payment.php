<?php
include "db/config.php";
$recptmemono=$_POST["recptmemono"];
$recptamt=$_POST["recptamt"];
$sql="INSERT INTO `recipt` (`recptmemono`, `recptamt`, `recptstatus`) VALUES ('$recptmemono', '$recptamt', '1')";
if(mysql_query($sql))
{
	echo "Payment Done <meta http-equiv=refresh content=1>";
}
else
{
	echo "Payment Not Done";
}
?>