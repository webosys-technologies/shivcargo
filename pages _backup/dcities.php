<?php 
//--------------------------------------------------------------------------------------------------
// All variables Declaration
//--------------------------------------------------------------------------------------------------
	$dcty_name=isset($_POST["dcty_name"]) ? addslashes($_POST["dcty_name"]):""; 
	$dcty_transport_name=isset($_POST["dcty_transport_name"]) ? addslashes($_POST["dcty_transport_name"]):""; 
	$dcty_transport_add=isset($_POST["dcty_transport_add"]) ? addslashes($_POST["dcty_transport_add"]):""; 
	$dcty_transport_mobno=isset($_POST["dcty_transport_mobno"]) ? addslashes($_POST["dcty_transport_mobno"]):""; 
	$dcty_cutrate=isset($_POST["dcty_cutrate"]) ? addslashes($_POST["dcty_cutrate"]):""; 
	$dcplace_ctyid=isset($_POST["dcplace_ctyid"]) ? addslashes($_POST["dcplace_ctyid"]):""; 
	$dcplace_name=isset($_POST["dcplace_name"]) ? addslashes($_POST["dcplace_name"]):""; 
	$dcplace_crossing=isset($_POST["dcplace_crossing"]) ? addslashes($_POST["dcplace_crossing"]):"";
	$tab=isset($_REQUEST["tab"]) ? $_REQUEST["tab"]:"tab_content1"; 
	$action=isset($_REQUEST["action"]) ? $_REQUEST["action"]:"list"; 
	$id=isset($_GET["id"]) ? $_GET["id"]:""; 
	/*-------------------------------------------------------------------------------------------
		function to check duplicate value dcities
	---------------------------------------------------------------------------------------------*/
	function duplicate_count($dcty_name)
	{
		$sql="select COUNT(*) as count from des_cities where dcty_name='$dcty_name' ";
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
	/*-------------------------------------------------------------------------------------------
		function to check duplicate value dcities places
	---------------------------------------------------------------------------------------------*/
	function duplicate_count_cplace($dcplace_ctyid,$dcplace_name)
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
<?php
	if(isset($_POST["do_add_dcity_place"]) && $_POST["do_add_dcity_place"]=="true")
	{ 
			$check_count=duplicate_count_cplace($dcplace_ctyid,$dcplace_name); 
			if($check_count==1)
			{ 
				$sql="insert into des_city_place(dcplace_ctyid,dcplace_name,dcplace_crossing) values ('$dcplace_ctyid','$dcplace_name','$dcplace_crossing')";	
				if(mysql_query($sql))
				{
					$msg="<span style='color:green'>Place Added Successfully....</span><meta http-equiv=refresh content='1;url=index.php?do=dcities&tab=tab_content2'>";
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
<?php 
	if(isset($_POST["do_add_dcity"]) && $_POST["do_add_dcity"]=="true")
	{
		if(empty($dcty_name))
		{
			$msg="<h2 style='color:red'>Please put something on city name...</h2>";
		}
		else
		{
			$check_count=duplicate_count($dcty_name); 
			if($check_count==1)
			{ 
				$sql="insert into des_cities(dcty_name,dcty_transport_name,dcty_transport_add,dcty_transport_mobno,dcty_cutrate) values ('$dcty_name','$dcty_transport_name','$dcty_transport_add','$dcty_transport_mobno','$dcty_cutrate')";	
				if(mysql_query($sql))
				{
					$msg="<span style='color:green'>City Added Successfully....</span><meta http-equiv=refresh content='1;url=index.php?do=dcities'>";
				}
				else
				{
					$msg="<span style='color:red'>City Not Added</span>";
				}
			}//end of check duplication
			else
			{
				$msg="<span style='color:red'>City Already Exists. Enter New City</span>";
			}
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
		location.replace('index.php?do=dcities&action=delete_city&del_id='+id);
	}
}
</script>
<script>
//------------------------------------------------------------------------------------------------------
// Script for conformation of Function call To delete Individual cities 
//------------------------------------------------------------------------------------------------------
function confirm_delete_place(id)
{
	if(confirm("Are you sure you want to delete "+id))
	{
		location.replace('index.php?do=dcities&action=delete_city_place&del_id='+id);
	}
}
</script>
<?php
if($action=="list")
{
?>
					<div class="">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    Destination Cities <small>And City Places</small></h2> 
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">  
                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                            <li role="presentation" class="<?php if($tab=="tab_content1"){ echo 'active'; }?>"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Destination Cities</a>
                                            </li>
                                            <li role="presentation" class="<?php if($tab=="tab_content2"){ echo 'active'; }?>"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">City Places</a>
                                            </li> 
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade <?php if($tab=="tab_content1"){ echo 'active in'; }?>" id="tab_content1" aria-labelledby="home-tab">  
											<span class="section">
												<center> 
													<h2><?php if(isset($msg)) echo $msg;?></h2> 
												</center>
											</span>
												<form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="" novalidate>
													<input type="hidden" name="do_add_dcity" value="true">  
													<span class="section"><center>Enter Destination City Details</center></span>
													<div class="item form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">City Name<span class="required">*</span>  </label>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<input id="name" class="form-control col-md-7 col-xs-12"  name="dcty_name" value="<?php echo $dcty_name; ?>" required="required" type="text">
														</div>
													</div> 
													<div class="item form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">City Transport Name<span class="required">*</span></label>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<input id="name" class="form-control col-md-7 col-xs-12"  name="dcty_transport_name" value="<?php echo $dcty_transport_name; ?>" required="required" type="text">
														</div>
													</div> 
													<div class="item form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">City Transport Address<span class="required">*</span> </label>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<input id="name" class="form-control col-md-7 col-xs-12"  name="dcty_transport_add" value="<?php echo 	$dcty_transport_add; ?>" required="required" type="text">
														</div>
													</div> 
													<div class="item form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">City Transport Mobile No<span class="required">*</span></label>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<input id="name" class="form-control col-md-7 col-xs-12"  name="dcty_transport_mobno" value="<?php echo $dcty_transport_mobno; ?>" required="required" type="text">
														</div>
													</div> 
													<div class="item form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Cut Rate<span class="required">*</span></label>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<input id="name" class="form-control col-md-7 col-xs-12"  name="dcty_cutrate" value="<?php echo $dcty_cutrate; ?>" required="required" type="text">
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
															<th>City Name</th> 
															<th>City Transport Name</th> 
															<th>City Transport Address</th> 
															<th>City Transport Mobile No</th> 
															<th>Cut Rate</th> 
															<th class=" no-link last"><span class="nobr">Action</span></th>
														</tr>
													</thead>
													<tbody>
													<?php
													$SrNo=1;
													$sql="select * from des_cities LIMIT 0,100 ";
													$result=mysql_query($sql);
													while($row=mysql_fetch_array($result))
													{ 
													?>
													<form method="post" action="">
														<tr class="even pointer">
															<td class="a-center "> <?php echo $SrNo; $SrNo++; ?></td>
															<td class=" "><?php echo $row["dcty_name"]; ?></td> 
															<td class=" "><?php echo $row["dcty_transport_name"]; ?></td> 
															<td class=" "><?php echo $row["dcty_transport_add"]; ?></td> 
															<td class=" "><?php echo $row["dcty_transport_mobno"]; ?></td> 
															<td class=" "><?php echo $row["dcty_cutrate"]; ?></td> 
															<td class=" last">  
																<a href="#" onClick="confirm_delete(<?php echo $row['dcty_id']; ?>);" title="delete"><i class="fa fa-trash"></i></a>
															</td>
														</tr>
													</form>
													<?php 
													}	
													?>
													</tbody>
												</table>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade <?php if($tab=="tab_content2"){ echo 'active in'; }?>" id="tab_content2" aria-labelledby="profile-tab">	
											<span class="section">
												<center> 
													<h2><?php if(isset($msg)) echo $msg;?></h2> 
												</center>
											</span>
												<form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="" novalidate>
													<input type="hidden" name="do_add_dcity_place" value="true">
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
														<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Place Name<span class="required">*</span> </label>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<input id="name" class="form-control col-md-7 col-xs-12"  name="dcplace_name" value="<?php echo $dcplace_name; ?>" required="required" type="text">
														</div>
													</div> 
													<div class="item form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Crossing<span class="required">*</span></label>
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
																<a href="#" onClick="confirm_delete_place(<?php echo $row['dcplace_id']; ?>);" title="delete"><i class="fa fa-trash"></i></a>
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
                                    </div> 
                                </div>
                            </div>
                        </div>  
                    </div>
<?php
}					
elseif($action=="delete_city")
{ 
	$sql="delete from des_cities where dcty_id=".$_REQUEST["del_id"];
	if(mysql_query($sql))
	{  
		echo "City Deleted Successfully..";
		echo '<meta http-equiv="refresh" content="0;url=index.php?do=dcities">';
	}
	else
	{
		echo "City Can't Deleted..";
	}
} 
elseif($action=="delete_city_place")
{ 
	$sql="delete from des_city_place where dcplace_id=".$_REQUEST["del_id"];
	if(mysql_query($sql))
	{  
		echo "Place Deleted Successfully..";
		echo '<meta http-equiv="refresh" content="0;url=index.php?do=dcities&tab=tab_content2">';
	}
	else
	{
		echo "Place Can't Deleted..";
	}
} 
?>				