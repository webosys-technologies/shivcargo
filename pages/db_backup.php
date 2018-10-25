<?php
$tables = array();
       $sql = "SHOW TABLES";
       $result = mysql_query($sql);

       while ($row = mysql_fetch_row($result)) {
           $tables[] = $row[0];
       }
     $sqlScript = "";
foreach ($tables as $table) {
    
    // Prepare SQLscript for creating table structure
    $query = "SHOW CREATE TABLE $table";
    $result = mysql_query($query);
    $row = mysql_fetch_row($result);
    
    $sqlScript .= "\n\n" . $row[1] . ";\n\n";
    
    
    $query = "SELECT * FROM $table";
    $result = mysql_query($query);
    
    $columnCount = mysql_num_fields($result);
    
    // Prepare SQLscript for dumping data for each table
    for ($i = 0; $i < $columnCount; $i ++) {
        while ($row = mysql_fetch_row($result)) {
            $sqlScript .= "INSERT INTO $table VALUES(";
            for ($j = 0; $j < $columnCount; $j ++) {
                $row[$j] = $row[$j];
                
                if (isset($row[$j])) {
                    $sqlScript .= '"' . $row[$j] . '"';
                } else {
                    $sqlScript .= '""';
                }
                if ($j < ($columnCount - 1)) {
                    $sqlScript .= ',';
                }
            }
            $sqlScript .= ");\n";
        }
    }
    
    $sqlScript .= "\n"; 
}
if(!empty($sqlScript))
{
    $database_name='shivcargo_newdata';
    
    
    $dir="backup_file_name";
    
    
    
    // Save the SQL script to a backup file
    $backup_file_name = $database_name . '_backup_' . time() . '.sql';
    
   // $dir="C:\Users\VICKS\Desktop\database/";
    
//    $dir="F:\xampp\htdocs\shivcargo\backupdata/";
    $dir="./backupdata/";
    $file=$dir.$backup_file_name;
    $fileHandler = fopen($file, 'w+');
    $number_of_lines = fwrite($fileHandler, $sqlScript);
    fclose($fileHandler); 

    // Download the SQL backup file to the browser
//    header('Content-Description: File Transfer');
//    header('Content-Type: application/octet-stream');
//    header('Content-Disposition: attachment; filename=' . basename($file));
//    header('Content-Transfer-Encoding: binary');
//    header('Expires: 0');
//    header('Cache-Control: must-revalidate');
//    header('Pragma: public');
//    header('Content-Length: ' . filesize($file));
//    ob_clean();
//    flush();
//    readfile($file);
//    exec('rm ' . $file);  
//   
$date=date('Y-m-d h:i:s');
                            
                                
$query = "insert into backup (name,date) values('$backup_file_name','$date')";
mysql_query($query);
return $query;

header('location:/shivcago/backupdata');

   
}
?>

