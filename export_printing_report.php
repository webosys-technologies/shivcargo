<?php
include "db/config.php";
if(isset($_GET["sql"]))
{
	$sql=$_GET["sql"];
	// output headers so that the file is downloaded rather than displayed
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=Printing_report.csv'); 
	// create a file pointer connected to the output stream
	$output = fopen('php://output', 'w'); 
	// output the column headings
	fputcsv($output, array('Date', 'Lr no','Sender','Reciver','City','Status','Loaded Amount','Big parcel','Small Parcel'));  

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