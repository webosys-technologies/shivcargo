<?php 
	if(isset($_GET["do"]))
	{
		$action=$_GET["do"];
               include("./pages/".$action.".php");
	}
	else
        if(isset($_GET["download"]))
        {   
           include("./pages/db_backup.php");
            header("Location:index.php?do=backup");
        }else
            
	{
		include("./pages/booking.php");
	}
?>