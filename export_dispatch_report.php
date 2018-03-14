<?php
include "db/config.php";
if(isset($_GET["bok_memo"]))
{
	$bok_memo=$_GET["bok_memo"];
	// output headers so that the file is downloaded rather than displayed
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=Dispatch_report.csv'); 
	// create a file pointer connected to the output stream
	$output = fopen('php://output', 'w'); 
	// output the column headings
	fputcsv($output, array('Date', 'Lr no', 'No of parcel','Sender','Sender GST','Reciver','Reciver GST','City','Amount','GST','creoss Charge')); 
	// fetch the data 
	$rows = mysql_query("select bokdate,boklrno,bok_item,sendname,sendgstno,recvname,recvgstno,dcplace_name,CASE WHEN bok_paymode = 'Paid' THEN bok_paymode ELSE bok_total END,bok_total*bok_gst/100 as gst,dcplace_crossing from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_memo='$bok_memo' AND bok_status='1' ORDER BY boklrno"); 
	
												
												 
	// loop over the rows, outputting them
	while ($row = mysql_fetch_assoc($rows)) fputcsv($output, ($row));
       
        $rows2 = mysql_query("select COUNT(boklrno) as lr_count,SUM(bok_item) as items,SUM(bok_total) as total,SUM(bok_total*bok_gst/100) as gst_total,SUM(dcplace_crossing) as cross_total from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_memo='$bok_memo' AND bok_status='1' ORDER BY boklrno"); 
        while ($row1 = mysql_fetch_assoc($rows2)) 
               $ttl_colum= array('Total', $row1['lr_count'], $row1['items'],'','','','Memo Total','',$row1['total'],$row1['gst_total'],$row1['cross_total']);
        
        fputcsv($output, ($ttl_colum));
//       
        
        
       
}
?>