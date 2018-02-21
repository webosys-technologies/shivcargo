<?php 
	$bok_descityid=isset($_GET["bok_descityid"]) ? addslashes($_GET["bok_descityid"]):"";
?> 
				<div class="">
				<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
                                <div class="x_title">
                                    <h2><i class="fa fa-home"></i> <a href="index.php?do=home">Home</a> / Make Loaded Parcel </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
									<form class="form-horizontal form-label-left" enctype="multipart/form-data" method="get" action="index.php" novalidate>
									<input type="hidden" name="do" value="make_loaded">
										<?php if(isset($msg)) echo $msg;?>
                                       <center> <span class="section"><b>SEARCH UNLOADED PARCEL</b></span></center>
										<div class="item form-group">  
                                            <div class="col-md-3 col-sm-3 col-xs-12">
											<label>Destination City *</label> 
												 <select name="bok_descityid" style="width:250px;height:35px;" id="name" onChange="getPackage(this.value)" required="required" >
												 <option value="0" <?php if($bok_descityid==0) echo "selected";?>>All City</option>
												<?php
												$res_descity=mysql_query("select * from des_cities");
												while($f_descity=mysql_fetch_array($res_descity))
												{
												?>
                                                    <option value="<?php echo $f_descity["dcty_id"]?>" <?php if($bok_descityid==$f_descity["dcty_id"]) echo "selected";?>><?php echo $f_descity["dcty_name"]?></option>
												<?php } ?>		
												</select>
                                            </div> 
                                        </div> 
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <button id="send" type="submit" class="btn btn-success">Search</button>
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
if(isset($_GET["bok_descityid"]))
{ 
	$bok_descityid=$_GET["bok_descityid"];
?>
<script> 
function printDiv(divName) { 
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
function selectAll(source)
{
	checkboxes = document.getElementsByName('bokid[]');
	for(var i in checkboxes)
	checkboxes[i].checked = source.checked;
}
function validate_Unload()
{
	var chks = document.getElementsByName('bokid[]');
	var hasChecked = false;
	for (var i = 0; i < chks.length; i++)
	{
		if (chks[i].checked)
		{
			hasChecked = true;
			break;
		}
	}
	if (hasChecked == false)
	{
		document.getElementById("bokid").innerHTML="<i class='fa fa-warning'></i> Please Check Atleast One Data";
		return false;
	}
	return true;
}
</script>  				
				<div class="">
		<div class="clearfix"></div>
        <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel"> 
					<div class="x_title">  
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="printableArea">
						 <span class="section"> 
												<b>SHIV CARGO AGENCY</b><br/>
												A-64 , RAM LAXMAN SANKUL , NEW COTTON MARKET ROAD<br/>
												AMRAVATI PH : 0721-2590820<br/>
												BRANCH : BUSYLAND COMPLEX NANDGAON PETH PH : 0721-2381577<br/>
												BRANCH : CITYLAND COMPLEX , BORGAON DHARMALE 
										</span>
										<p><b style="color:brown">Note: Please Check Unload Data Which You Want To Load And Click on Load Button. </b></p>
										<h2><b style="color:red"><span id="bokid"></span></b></h2> 
						<form name="Load" method="get" action="index.php"> 
							<input type="hidden" name="do" value="load_now">
							<input type="submit" name="do_load" value="Load" class="btn btn-info" onclick="return validate_Unload();">
							<input type="reset"  value="Reset" class="btn btn-white"><hr/> 						
                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                            <thead>
                                <tr class="headings">
                                    <th><input type="checkbox" id="selectall" onclick="return selectAll(this);"></th>
                                    <th>Date</th>
                                    <th>Lr no </th>
                                    <th>No of parcel </th>
                                    <th>Freight</th>
                                    <th>Sender</th>
                                    <th>Sender GST</th>
                                    <th>Reciver</th>
                                    <th>Reciver GST</th>
                                    <th>City</th> 
                                </tr>
                            </thead>
							<tbody> 
							<?php 
							$SrNo=1;
							if($bok_descityid==0)
							{
								$sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_status='0'";	
							}
							else
							{
								$sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok.bok_descityid='$bok_descityid' && bok_status='0'";	
							}	
							$result=mysql_query($sql);
							while($row=mysql_fetch_array($result))
							{
							?> 
								<tr class="even pointer">
                                    <td class="a-center "><input type="checkbox" name="bokid[]" value="<?php echo $row["bokid"]; ?>"> </td>  
                                    <td class="a-center "> <?php echo $row["bokdate"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["boklrno"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["bok_total"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["bok_freight"]; ?></td> 
                                    <!--<td class="a-center "> <input id="name" class="form-control col-md-7 col-xs-12" placeholder="Enter Ammount" name="bok_freight" value="<?php echo $row["bok_freight"]; ?>" required="required" type="text"> </td>--> 
                                    <td class="a-center "> <?php echo $row["sendname"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["sendgstno"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["recvname"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["recvgstno"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["dcty_name"]; ?></td>  
                                </tr> 
							<?php $SrNo++; } ?>		
                            </tbody>
						</table>
						</form>	
                    </div>
                </div>
            </div> <br /> <br /> <br />
		</div>
    </div>
<?php
}
?>	