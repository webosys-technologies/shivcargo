<?php
include "db/config.php";
if(isset($_GET["sql"]))
{
	$sql=$_GET["sql"];
	// output headers so that the file is downloaded rather than displayed
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=Statement_report.csv'); 
	// create a file pointer connected to the output stream
	$output = fopen('php://output', 'w'); 
	// output the column headings
	fputcsv($output, array('LR Date','LR Time', 'LR No.','Sender','Sender GST','Receiver','Receiver GST','city','No. of parcel','Pay Mode','Amount','GST','Memo No.','Loaded date','Loaded Time','Vehicle No'));  
      
                                  
                                     
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