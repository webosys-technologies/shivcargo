<?php 
	$bok_descityid=isset($_GET["bok_descityid"]) ? addslashes($_GET["bok_descityid"]):""; 
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
                                    <h2><i class="fa fa-home"></i> <a href="index.php?do=home">Home</a> / Dispatch </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
									<form class="form-horizontal form-label-left" enctype="multipart/form-data" method="get" action="index.php" novalidate>
									<input type="hidden" name="do" value="gowden_report">
										<?php if(isset($msg)) echo $msg;?>
                                       <center> <span class="section"><b>SEARCH GOWDEN REPORT</b></span></center>
										<div class="item form-group">  
                                            <div class="col-md-3 col-sm-3 col-xs-12">
											<label>Destination City *</label> 
												
                                                                                        <select name="bok_descityid" style="width:250px;height:35px;" id="name" onChange="getPackage(this.value)" required="required" >
												 <option value="">Select Destination City</option>
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
if($_GET["do"]=="gowden_report" && isset($_GET["bok_descityid"]))
{ 
	$bok_descityid=$_GET["bok_descityid"]; 
?>				
<div class="">
		<div class="clearfix"></div>
        <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel"> 
                                <div class="x_title">
									<h2><i class="fa fa-home"></i> <a href="index.php?do=home">Home</a> / Gowden Report </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
					<div class="x_title"> 
						<button class="btn btn-danger"  onclick="printDiv('printableArea')">
							<i class="fa fa-print"></i> Print
						</button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="printableArea">
                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                            <thead>
                                <tr class="headings">
                                    <th>City</th>
                                    <th>Small Parcel</th>
                                    <th>Big Parcel</th>
                                    <th>Total </th>   
                                </tr>
                            </thead>
							<tbody>
							<?php 
							$smltotal=0;
							$bigtotal=0;
							$total=0;
//				                       
                                                        if($bok_descityid==0)
							{
								$sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_status='0'";
                                                                
							}
							else
							{
								$sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_status='0' && bok_descityid='$bok_descityid'";
							}
							$result=mysql_query($sql) or die(mysql_error());
							while($row=mysql_fetch_array($result))
							{ 
								if($row["bok_parcel"]=="Small") { $smltotal=$smltotal+$row["bok_total"]; }
								if($row["bok_parcel"]=="Big") { $bigtotal=$bigtotal+$row["bok_total"]; } 
								$total=$total+$row["bok_total"];
							?>
                                <form method="post" action="">
								<tr class="even pointer">
                                                                        <td class="a-center "> <?php echo $row["dcty_name"]; ?></td>
									 <td class="a-center "> <?php if($row["bok_parcel"]=="Big") { echo $row["bok_total"]; } else { echo "0";}?></td>
									 <td class="a-center "> <?php if($row["bok_parcel"]=="Small") { echo $row["bok_total"]; } else { echo "0";}?></td>
                                                                        <td class="a-center "> <?php echo $row["bok_total"]; ?></td>     
                                                                 </tr>
								</form> 
							<?php } ?>
								<tr> 
                                                                    <td class="a-center "></td>
									 <td class="a-center "> Total = <?php echo $smltotal; ?> </td>
									 <td class="a-center "> Total = <?php echo $bigtotal; ?></td>
									 <td class="a-center "> Total = <?php echo $total; ?></td>
								</tr>	 
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