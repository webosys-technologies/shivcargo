<?php
	$bok_memo=isset($_GET["bok_memo"]) ? addslashes($_GET["bok_memo"]):"";
//	$driv_id=isset($_GET["driv_id"]) ? addslashes($_GET["driv_id"]):"";
	$tab=isset($_REQUEST["tab"]) ? $_REQUEST["tab"]:"tab_content2";  
	$id=isset($_GET["id"]) ? $_GET["id"]:""; 
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
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    Dispatch Report</h2> 
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">  
                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                            <li role="presentation" class="<?php if($tab=="tab_content1"){ echo 'active'; }?>"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Dispatch Report</a>
                                            </li>
                                            <li role="presentation" class="<?php if($tab=="tab_content2"){ echo 'active'; }?>"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">Serach Memo</a>
                                            </li> 
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade <?php if($tab=="tab_content1"){ echo 'active in'; }?>" id="tab_content1" aria-labelledby="home-tab">  
						
                                                
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade <?php if($tab=="tab_content2"){ echo 'active in'; }?>" id="tab_content2" aria-labelledby="profile-tab">  
												<form class="form-horizontal form-label-left" enctype="multipart/form-data" method="get" action="index.php" novalidate>
													<input type="hidden" name="do" value="dispatch"> 
													<input type="hidden" name="tab" value="tab_content2"> 
													<center> <span class="section"><b>SEARCH UNLOADED PARCEL</b></span></center>
													<div class="item form-group">  
														<div class="col-md-3 col-sm-3 col-xs-12">
															<label>Memo Number *</label> 
															<input id="name" class="form-control col-md-7 col-xs-12"  name="bok_memo" value="<?php echo $bok_memo; ?>" required="required" type="text">
														</div>  
<!--														<div class="col-md-3 col-sm-3 col-xs-12">
															<label>Driver *</label> 
															<select name="driv_id" style="width:250px;height:35px;" id="name"  required="required" >
																<option value="">Select Driver</option> 
																<?php
//																$res_driver=mysql_query("select * from drivers");
//																while($f_driver=mysql_fetch_array($res_driver))
//																{
																?>
																	<option value="<?php // echo $f_driver["driv_id"]?>" <?php if($driv_id==$f_driver["driv_id"]) echo "selected";?>><?php echo $f_driver["driv_name"]?></option>
																<?php // } ?>		
															</select>
														</div>-->
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
								<?php	
								if(isset($_GET["tab"]) && isset($_GET["bok_memo"]))
								{
									$sql_memo="select * from booking where bok_memo=".$_GET["bok_memo"];
									$res_memo=mysql_query($sql_memo);
									$count_memo=mysql_num_rows($res_memo);
									if($count_memo>0)
									{
										$f_memo=mysql_fetch_array($res_memo);
										?>
									<button class="btn btn-danger"  onclick="printDiv('printableArea')"><i class="fa fa-print"></i> Print</button>
									<div id="printableArea">	
									<span class="section"> 
												<b>SHIV CARGO AGENCY</b><br/>
												A-64 , RAM LAXMAN SANKUL , NEW COTTON MARKET ROAD<br/>
												AMRAVATI PH : 0721-2590820<br/>
												BRANCH : BUSYLAND COMPLEX NANDGAON PETH PH : 0721-	2381577<br/>
												BRANCH : CITYLAND COMPLEX , BORGAON DHARMALE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="text-align:right">MEMO NO. <?php echo $_GET["bok_memo"];?></b>
									</span> 	
									<span class="section">
										<b>Driver Name :</b> <?php echo ucwords($f_memo["bok_drivername"]);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>MEMO NO :</b><?php echo $_GET["bok_memo"];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>MEMO DATE :</b><?php echo ucwords($f_memo["bok_dispatchdate"]);?><br/><b>Transport Name :</b> 
										<?php //echo ucwords($f_memo["bok_drivername"]);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>VECHILE NO :</b><?php echo $f_memo["bok_vehicleno"];?><br/> <b>DRIVER ADDRESS:</b><?php ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<b>DRIVER CONTACT NUMBER:</b><?php echo ucwords($f_memo["bok_drivermobile"]);?>  
									</span>	
									<table id="example" class="table table-striped responsive-utilities jambo_table">
										<thead>
											<tr class="headings"> 
												<th>Date</th>
												<th>Lr no </th>
												<th>CONSINOR</th> 
												<th>CONSINEE</th> 
												<th>TO CITY</th>
												<th>PARCEL</th>
												<th>TOTAL</th>
												<th>COMMISSION</th>
												<th>CROSS CHARGE</th>  
											</tr>
										</thead>
										<tbody>
										<?php  
										$sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_memo='$bok_memo' AND bok_status='1'";	 
										$result=mysql_query($sql) or die(mysql_error());
										while($row=mysql_fetch_array($result))
										{
										?> 
											<tr class="even pointer">  
												<td class="a-center "> <?php echo $row["bokdate"]; ?></td>  
												<td class="a-center "> <?php echo $row["boklrno"]; ?></td>  
												<td class="a-center "> <?php echo $row["recvname"]; ?></td>   
												<td class="a-center "> <?php echo $row["sendname"]; ?></td> 
												<td class="a-center "> <?php echo $row["dcty_name"]; ?></td>   
												<td class="a-center "> <?php echo $row["bok_item"]; ?></td>  
												<td class="a-center "> <?php echo $row["bok_total"]; ?></td>  
												<td class="a-center "> <?php echo $row["bok_total"]*$row["dcty_cutrate"]/100; ?></td>  
												<td class="a-center "> <?php echo $row["dcty_cutrate"]; ?></td>  
											</tr> 
										<?php } ?>		
										</tbody>
									</table> 
									</div>
									<?php } else { echo "<h1 style='color:red'>No Record Found</h1>";} } ?>	
                                </div>
                            </div>
                        </div>  
                    </div>