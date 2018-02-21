<?php 
//--------------------------------------------------------------------------------------------------
// All variables Declaration
//--------------------------------------------------------------------------------------------------
	$dcplace_ctyid=isset($_POST["dcplace_ctyid"]) ? addslashes($_POST["dcplace_ctyid"]):""; 
	$dcplace_name=isset($_POST["dcplace_name"]) ? addslashes($_POST["dcplace_name"]):""; 
	$dcplace_crossing=isset($_POST["dcplace_crossing"]) ? addslashes($_POST["dcplace_crossing"]):"";  
	$action=isset($_REQUEST["action"]) ? $_REQUEST["action"]:"list_dcity_places";
	$msg=isset($_GET["msg"]) ? $_GET["msg"]:"";
	$id=isset($_GET["id"]) ? $_GET["id"]:""; 
	/*-------------------------------------------------------------------------------------------
		function to check duplicate value dcities places
	---------------------------------------------------------------------------------------------*/
	function duplicate_count($dcplace_ctyid,$dcplace_name)
	{
		$sql="select COUNT(*) as count from des_city_place where dcplace_ctyid='$dcplace_ctyid' && dcplace_name='$dcplace_name' ";
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
?>
<script>
//------------------------------------------------------------------------------------------------------
// Script for conformation of Function call To delete Individual cities 
//------------------------------------------------------------------------------------------------------
function confirm_delete(id)
{
	if(confirm("Are you sure you want to delete "+id))
	{
		location.replace('index.php?do=dcity_places&action=delete_city_place&del_id='+id);
	}
}
</script>
<?php
//------------------------------------------------------------------------------------------------------
// View All Driving vehicles
//------------------------------------------------------------------------------------------------------
if($action=="list_dcity_places")
{
?>	
	<div class="">
		<div class="clearfix"></div>
        <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><i class="fa fa-home"></i> <a href="index.php?do=home">Home</a> / City Places</h2>&nbsp;&nbsp;&nbsp;
						<a class="btn btn-danger" href="index.php?do=dcity_places&amp;action=add_new">
							<i class="fa fa-bank"></i> Add City Place
						</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                            <thead>
                                <tr class="headings">
                                    <th>SrNo</th>
                                    <th>Place</th> 
                                    <th>City Name</th> 
                                    <th>Crossing</th>   
                                    <th class=" no-link last"><span class="nobr">Action</span></th>
                                </tr>
                            </thead>
							<tbody>
							<?php
								$SrNo=1;
								$sql="select * from des_city_place dcp join des_cities dc on(dcp.dcplace_ctyid=dc.dcty_id) LIMIT 0,1000 ";
								$result=mysql_query($sql);
								while($row=mysql_fetch_array($result))
								{ 
							?>
                                <form method="post" action="">
								<tr class="even pointer">
                                    <td class="a-center "> <?php echo $SrNo; $SrNo++; ?></td>
                                    <td class=" "><?php echo $row["dcplace_name"]; ?></td> 
                                    <td class=" "><?php echo $row["dcty_name"]; ?></td> 
                                    <td class=" "><?php echo $row["dcplace_crossing"]; ?></td>  
                                    <td class=" last">  
										<a href="#" onClick="confirm_delete(<?php echo $row['dcplace_id']; ?>);" title="delete"><i class="fa fa-trash"></i></a>
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
//------------------------------------------------------------------------------------------------------
//Add New Vehicle
//------------------------------------------------------------------------------------------------------
elseif($action=="add_new")
{
	if(isset($_POST["do_add_dcity_place"]) && $_POST["do_add_dcity_place"]=="true")
	{ 
			$check_count=duplicate_count($dcplace_ctyid,$dcplace_name); 
			if($check_count==1)
			{ 
				$sql="insert into des_city_place(dcplace_ctyid,dcplace_name,dcplace_crossing) values ('$dcplace_ctyid','$dcplace_name','$dcplace_crossing')";	
				if(mysql_query($sql))
				{
					$msg="<span style='color:green'>Place Added Successfully....</span><meta http-equiv=refresh content='1'>";
				}
				else
				{
					$msg="<span style='color:red'>Place Not Added</span>";
				}
			}//end of check duplication
			else
			{
				$msg="<span style='color:red'>Pkace Already Exists. Enter New Place</span>";
			} 
	}
?>
				<div class="">
				<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
                                <div class="x_title">
                                    <h2><i class="fa fa-home"></i> <a href="index.php?do=home">Home</a> / <a href="index.php?do=dcity_places"> City Places</a> / Add New</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
									<form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="" novalidate>
									<input type="hidden" name="do_add_dcity_place" value="true">
										<?php if(isset($msg)) echo $msg;?>
                                        <span class="section">Enter City Place Details</span>
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Destination City <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="dcplace_ctyid" style="width:497px;height:35px;" id="name" onChange="getPackage(this.value)" required="required" >
												<?php
												$res_descity=mysql_query("select * from des_cities");
												while($f_descity=mysql_fetch_array($res_descity))
												{
												?>
                                                    <option value="<?php echo $f_descity["dcty_id"]?>"><?php echo $f_descity["dcty_name"]?></option>
												<?php } ?>		
												</select>
                                            </div>
                                        </div> 
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Place Name<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="dcplace_name" value="<?php echo $dcplace_name; ?>" required="required" type="text">
                                            </div>
                                        </div> 
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Crossing<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="dcplace_crossing" value="<?php echo $dcplace_crossing; ?>" required="required" type="text">
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

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php
} 
elseif($action=="delete_city_place")
{ 
	$sql="delete from des_city_place where dcplace_id=".$_REQUEST["del_id"];
	if(mysql_query($sql))
	{  
		echo "Place Deleted Successfully..";
		echo '<meta http-equiv="refresh" content="0;url=index.php?do=dcity_places">';
	}
	else
	{
		echo "Place Can't Deleted..";
	}
} 
?>				