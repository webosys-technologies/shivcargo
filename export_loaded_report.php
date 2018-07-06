<?php
include "db/config.php";
if(isset($_GET["sql"]))
{
	$sql=$_GET["sql"];
	// output headers so that the file is downloaded rather than displayed
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=loaded_report.csv'); 
	// create a file pointer connected to the output stream
	$output = fopen('php://output', 'w'); 
	// output the column headings
	fputcsv($output, array('Date', 'Lr no', 'No of parcel','Load Amount','Sender','Sender GST','Reciver','Reciver GST','City'));  
//	if($sql==0)
//	{
//		$rows = mysql_query($sql); 
//	}
//	else
//	{
//		
//	}	
	$rows = mysql_query($sql); 
	// loop over the rows, outputting them
	while ($row = mysql_fetch_assoc($rows)) fputcsv($output, ($row));
}
?>