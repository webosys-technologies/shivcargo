<?php
include "db/config.php";
if(isset($_GET["bok_descityid"]))
{
	$bok_descityid=$_GET["bok_descityid"];
	// output headers so that the file is downloaded rather than displayed
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=unloaded_report.csv'); 
	// create a file pointer connected to the output stream
	$output = fopen('php://output', 'w'); 
	// output the column headings
	fputcsv($output, array('Date', 'Lr no', 'No of parcel','Freight','Sender','Sender GST','Private Mark','Reciver','Reciver GST','City')); 
	// fetch the data 
	if($bok_descityid==0)
	{
		$rows = mysql_query("select DATE_FORMAT(bokdate, '%d-%m-%Y') bokdate,boklrno,bok_item,bok_freight,sendname,sendgstno,bok_pivatemark,recvname,recvgstno,dcplace_name from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where  bok_status='0'"); 
	}
	else
	{
		$rows = mysql_query("select DATE_FORMAT(bokdate, '%d-%m-%Y') bokdate,boklrno,bok_item,bok_freight,sendname,sendgstno,bok_pivatemark,recvname,recvgstno,dcplace_name from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok.bok_descityid='$bok_descityid' && bok_status='0'"); 
	}	
	// loop over the rows, outputting them
	while ($row = mysql_fetch_assoc($rows)) fputcsv($output, ($row));
}
?>