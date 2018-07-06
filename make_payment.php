<?php
include "db/config.php";
$recptmemono=$_POST["recptmemono"];
$recptamt=$_POST["recptamt"];
$recptamt=$_POST["recptamt"];
$receipt_remark=$_POST["receipt_remark"];
$sql="INSERT INTO `recipt` (`recptmemono`, `recptamt`,`receipt_remark`,`recptstatus`) VALUES ('$recptmemono', '$recptamt','$receipt_remark','1')";
if(mysql_query($sql))
{
	echo "Payment Done <meta http-equiv=refresh content=1>";
}
else
{
	echo "Payment Not Done";
}
?>