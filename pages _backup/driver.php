<?php 
//--------------------------------------------------------------------------------------------------
// All variables Declaration
//-------------------------------------------------------------------------------------------------- 
	$driv_name=isset($_POST["driv_name"]) ? addslashes($_POST["driv_name"]):""; 
	$driv_vehicelno=isset($_POST["driv_vehicelno"]) ? addslashes($_POST["driv_vehicelno"]):""; 
	$driv_mobno=isset($_POST["driv_mobno"]) ? addslashes($_POST["driv_mobno"]):""; 
	$driv_address=isset($_POST["driv_address"]) ? addslashes($_POST["driv_address"]):""; 
	$action=isset($_REQUEST["action"]) ? $_REQUEST["action"]:"list_driver";
	$msg=isset($_GET["msg"]) ? $_GET["msg"]:"";
	$id=isset($_GET["id"]) ? $_GET["id"]:""; 
	/*-------------------------------------------------------------------------------------------
		function to check duplicate value dcities
	---------------------------------------------------------------------------------------------*/
	function duplicate_count($driv_name,$driv_mobno)
	{
		$sql="select COUNT(*) as count from drivers where driv_name='$driv_name' && driv_mobno='$driv_mobno' ";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$count=$row["count"];
		if($count > 0)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	if(isset($_POST["do_add_driver"]) && $_POST["do_add_driver"]=="true")
	{ 
			$check_count=duplicate_count($driv_name,$driv_mobno); 
			if($check_count==1)
			{ 
				$sql="insert into drivers(driv_name,driv_vehicelno,driv_mobno,driv_address) values ('$driv_name','$driv_vehicelno','$driv_mobno','$driv_address')";	
				if(mysql_query($sql))
				{
					$msg="<span style='color:green'>Driver Added Successfully....</span><meta http-equiv=refresh content='1'>";
				}
				else
				{
					$msg="<span style='color:red'>Driver Not Added</span>";
				}
			}//end of check duplication
			else
			{
				$msg="<span style='color:red'>Driver Already Exists. Enter New City</span>";
			} 
	}
?>
<script>
//------------------------------------------------------------------------------------------------------
// Script for conformation of Function call To delete Individual driver 
//------------------------------------------------------------------------------------------------------
function confirm_delete(id)
{
	if(confirm("Are you sure you want to delete "+id))
	{
		location.replace('index.php?do=driver&action=delete_driver&del_id='+id);
	}
}
</script>
<?php
//------------------------------------------------------------------------------------------------------
// View All Driving vehicles
//------------------------------------------------------------------------------------------------------
if($action=="list_driver")
{
?>	
	<div class="">
		<div class="clearfix"></div>
        <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><i class="fa fa-home"></i> <a href="index.php?do=home">Home</a> / Driver</h2>&nbsp;&nbsp;&nbsp; 
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
									<form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="" novalidate>
									<input type="hidden" name="do_add_driver" value="true">
										<?php if(isset($msg)) echo $msg;?>
                                        <span class="section">Enter Destination City Details</span>
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Driver Name<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="driv_name" value="<?php echo $driv_name; ?>" required="required" type="text">
                                            </div>
                                        </div>  
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Driver Vehicle No<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="driv_vehicelno" value="<?php echo $driv_vehicelno; ?>" required="required" type="text">
                                            </div>
                                        </div>
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Driver Address<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="driv_address" value="<?php echo $driv_address; ?>" required="required" type="text">
                                            </div>
                                        </div> 
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Driver Mobile No<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="driv_mobno" value="<?php echo $driv_mobno; ?>" required="required" type="text">
                                            </div>
                                        </div> 
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <button id="send" type="submit" class="btn btn-success">Add</button>
                                                <button type="reset" class="btn btn-primary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                            <thead>
                                <tr class="headings">
                                    <th>SrNo</th>
                                    <th>Driver Name</th>  
                                    <th>vehicle No</th>  
                                    <th>Driver Mobile No</th>
                                    <th>Driver Address</th>  
                                    <th class=" no-link last"><span class="nobr">Action</span></th>
                                </tr>
                            </thead>
							<tbody>
							<?php
								$SrNo=1;
								$sql="select * from drivers LIMIT 0,100 ";
								$result=mysql_query($sql);
								while($row=mysql_fetch_array($result))
								{ 
							?>
                                <form method="post" action="">
								<tr class="even pointer">
                                    <td class="a-center "> <?php echo $SrNo; $SrNo++; ?></td> 
                                    <td class=" "><?php echo $row["driv_name"]; ?></td> 
                                    <td class=" "><?php echo $row["driv_vehicelno"]; ?></td> 
                                    <td class=" "><?php echo $row["driv_mobno"]; ?></td> 
                                    <td class=" "><?php echo $row["driv_address"]; ?></td> 
                                    <td class=" last">  
										<a href="#" onClick="confirm_delete(<?php echo $row['driv_id']; ?>);" title="delete"><i class="fa fa-trash"></i></a>
									</td>
                                </tr>
								</form>
							<?php 
							}	
							?>
                            </tbody>
						</table>
                    </div>
                </div>
            </div> <br /> <br /> <br />
		</div>
    </div>
<?php
} 
elseif($action=="delete_driver")
{ 
	$sql="delete from drivers where driv_id=".$_REQUEST["del_id"];
	if(mysql_query($sql))
	{  
		echo "Driver Deleted Successfully..";
		echo '<meta http-equiv="refresh" content="0;url=index.php?do=driver">';
	}
	else
	{
		echo "Driver Can't Deleted..";
	}
} 
?>				