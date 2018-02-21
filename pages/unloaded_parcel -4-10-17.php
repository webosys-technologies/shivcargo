<?php 
	$bok_descityid=isset($_GET["bok_descityid"]) ? addslashes($_GET["bok_descityid"]):"";
        $lr=isset($_GET["lr"]) ? addslashes($_GET["lr"]):"";
        $date=isset($_GET["date"]) ? addslashes($_GET["date"]):"";
        $s_gst_no=isset($_GET["s_gst_no"]) ? addslashes($_GET["s_gst_no"]):"";
        $r_gst_no=isset($_GET["r_gst_no"]) ? addslashes($_GET["r_gst_no"]):"";
?> 
				<div class="">
				<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
                                <div class="x_title">
                                    <h2><i class="fa fa-home"></i> <a href="index.php?do=home">Home</a> / Search Uoloaded Parcel </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
									<form class="form-horizontal form-label-left" enctype="multipart/form-data" method="get" action="index.php" novalidate>
									<input type="hidden" name="do" value="unloaded_parcel">
										<?php if(isset($msg)) echo $msg;?>
                                       <center> <span class="section"><b>SEARCH UNLOADED PARCEL</b></span></center>
										<div class="item form-group">  
                                          <div class="row">
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                                                <label>LR Number</label> 
                                                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="lr" value="<?php echo $lr; ?>"  type="text">
                                                    </div>
                                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                                                <label>Date</label> 
                                                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="date" value="<?php echo $date; ?>"  type="date">
                                                                        </div>    
                                                                                </div>  
                                                                                    <div class="row">&nbsp</div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-3 col-sm-3 col-xs-12">
											<label>Destination City *</label> 
												 <select name="bok_descityid" style="width:250px;height:35px;" id="name" onChange="getPackage(this.value)">
                                                                                                     <option value="no" selected="selected">Select Destination City</option>
                                                                                                 
												 <!--<option value="0" <?php if($bok_descityid==0) echo "selected";?>>All City</option>-->
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
                                                                                    <div class="row">&nbsp</div>
                                                                                    <div class="row">
                                                                                          <div class="col-md-3 col-sm-3 col-xs-12">
                                                                                <label>Sender GST Number</label> 
                                                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="s_gst_no" value="<?php echo $s_gst_no; ?>"  type="text">
                                                    </div>
                                                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                                                <label>Receiver GST Number</label> 
                                                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="r_gst_no" value="<?php echo $r_gst_no; ?>"  type="text">
                                                    </div>
                                                                                   
                                            
                                          
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
if(isset($_GET["bok_descityid"]) || isset($_GET["lr"]) || isset($_GET["date"])|| isset($_GET["s_gst_no"]) || isset($_GET["r_gst_no"]))
{ 
	$bok_descityid=$_GET["bok_descityid"];
        $lr=isset($_GET["lr"]) ? addslashes($_GET["lr"]):"";
        $date=isset($_GET["date"]) ? addslashes($_GET["date"]):"";
        $s_gst_no=isset($_GET["s_gst_no"]) ? addslashes($_GET["s_gst_no"]):"";
        $r_gst_no=isset($_GET["r_gst_no"]) ? addslashes($_GET["r_gst_no"]):"";
?>
<script> 
function printDiv(divName) { 
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>  				
				<div class="">
		<div class="clearfix"></div>
        <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel"> 
					<div class="x_title"> 
						<button class="btn btn-danger"  onclick="printDiv('printableArea')">
							<i class="fa fa-print"></i> Print
						</button>
						<a class="btn btn-success"  href="<?php echo $sitename;?>index.php?do=make_loaded&bok_descityid=<?php echo $bok_descityid;?>">
							<i class="fa fa-check"></i> Update To Loaded
						</a>
						<a class="btn btn-success"  href="<?php echo $sitename;?>export_unloaded_report.php?bok_descityid=<?php echo $bok_descityid;?>">
							<i class="fa fa-download"></i> Export In Excel
						</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="printableArea">
						 <span class="section"> 
												<b>SHIV CARGO AGENCY</b><br/>
												A-64 , RAM LAXMAN SANKUL , NEW COTTON MARKET ROAD<br/>
												AMRAVATI PH : 0721-2590820<br/>
												BRANCH : BUSYLAND COMPLEX NANDGAON PETH PH : 0721-	2381577<br/>
												BRANCH : CITYLAND COMPLEX , BORGAON DHARMALE 
										</span>
						<?php if($bok_descityid!=0) { $row_ctyname=mysql_fetch_array(mysql_query("select dcty_name from des_cities where dcty_id='$bok_descityid'"));?> 					
						<span class="section"><b>City Name</b> :  <?php echo ucwords($row_ctyname["dcty_name"]); }?></span>				
                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                            <thead>
                                <tr class="headings"> 
                                    <th>Date</th>
                                    <th>Lr no </th>
                                    <th>No of parcel </th>
                                    <th>Freight</th>
                                    <th>Sender</th>
                                    <th>Sender GST No</th>
                                    <th>Reciver</th>
                                    <th>Reciver GST No</th>
                                    <th>City</th>  
                                </tr>
                            </thead>
							<tbody>
							<?php 
							if($bok_descityid==0)
							{
								
                                                                $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_status='0'";	
							}
							else
                                                        {
                                                                $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' OR boklrno='$lr' OR bokdate='$date' OR s.sendgstno='$s_gst_no' OR r.recvgstno='$r_gst_no' AND bok_status='0'";	
                                                        }	
							$result=mysql_query($sql) or die(mysql_error());
							while($row=mysql_fetch_array($result))
							{
							?>
                                <form method="post" action="">
								<tr class="even pointer">  
                                    <td class="a-center "> <?php echo $row["bokdate"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["boklrno"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["bok_item"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["bok_freight"]; ?></td> 
                                    <!--<input id="name" class="form-control col-md-7 col-xs-12" placeholder="Enter Ammount" name="bok_amt<?php echo $SrNo; ?>" value="<?php echo $row["bok_freight"]; ?>" required="required" type="text">--> 
                                    <td class="a-center "> <?php echo $row["sendname"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["sendgstno"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["recvname"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["recvgstno"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["dcty_name"]; ?></td>  
                                </tr>
								</form> 
							<?php } ?>		
                            </tbody>
						</table>
                    </div>
                </div>
            </div> <br /> <br /> <br />
		</div>
    </div>
<?php
}
?>	