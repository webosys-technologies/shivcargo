 <?php
 
if(isset($_GET['del_name'])){	
    
				$name=$_GET['del_name'];
					$delqur ="delete from backup where name='$name'";
					$del =mysql_query($delqur);
					if($del)
					{
//                                              header("location:index.php?do=backup.php");
						//"Deleted succesfully"; 
                                          ?>
                           <?php
           }
                            
              
                                $file ="./backupdata/".$name;
                        if (file_exists($file))
                          {
//                             echo ("Deleted $file");
                               unlink($file);
                               ?>
<center><lable class="btn btn-danger" class="alert alert-danger">"Deleted succesfully !"</lable></center>
                         <?php
                          }
                          {
//                          echo ("Error deleting $file");
                          }     
    
}
?>

<div id="div1" hidden=""><center> <label class="btn btn-danger">"Deleted succesfully !" </label></center> </div>
<style>
    .control-label
    {
        text-align: left !important;
    }
    select[name="backup_id"]
    {
        width: 234px !important; height: 35px !important;
    }
    </style>
    
<style>
    .table-striped{ 
        overflow-x:scroll !important; 
/*    overflow: auto !important;*/
    white-space: nowrap;
    }
th, td { min-width: 50px; 
 border: none;
    text-align: left;
   
   }
   
</style>

				<div class="">
				<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
                                <div class="x_title">
                                    
                                    <h2><i class="fa fa-home"></i> <a href="index.php?do=home">Home</a> / DataBase BackUp</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div></div></div></div></div>
 <div class="x_content">
     <form method="get" action="">
         <input type='hidden' value='download' name='download'>
         <input type="submit" name="backup" value="DataBase_BackUp" class="btn btn-success">&nbsp; 
     </form>
 </div>                      
     <table id="example" class="table table-striped responsive-utilities jambo_table">
                <thead>
                    
			<tr class="headings">
                            
                        <th> SrNo </th> 
			<th> Name </th>
                        <th> Date </th>												  
                        
                      <th class=" no-link last">  <span class="nobr"> Action </span> </th>
                         </tr>				
                </thead>
                 
                <?php
              
                $sqlsel="select * from backup order by id desc  LIMIT 20 ";
		$result=mysql_query($sqlsel);
               
//		$row=mysql_fetch_assoc($result);
//                print_r($row);
             
                
                  while($row = mysql_fetch_assoc($result)){
           //       echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. " </td><td>" . $row["date"]. "</td></tr>";
      
                      
                      ?>

<tr>
    <td><?php echo $row['id'];?></td>

    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['date'];?></td>
    <td><a title="Download Database" href="./backupdata/<?php echo $row['name'];?>" class="btn btn-xs btn-primary edit-unit" data-tt="tooltip"><span class="fa fa-cloud-download"></span></a>
           
        <a title="Delete" href="index.php?do=backup&del_name=<?php echo $row['name'];?>"   class="btn btn-xs btn-danger edit-unit" data-tt="tooltip"><span class="fa fa-remove"></span>
                          
        </a>
                       
                        </td>
      
</tr>

  <?php
  
                  }
   
         
 
       ?>

     </table>
                                                            
                                               
                                                      
