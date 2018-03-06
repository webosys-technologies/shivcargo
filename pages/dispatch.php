<style>
    .button-getReport {
   
    border: none;
    padding: 6px 9px;
    border-radius: 7px;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
   
    -webkit-transition-duration: 0.4s;
     transition-duration: 0.4s; 
     cursor: pointer; 
    background-color: white;
    color: black;
    border: 1px solid #008CBA;
}
.button-getReport:hover {
    background-color: #008CBA;
    color: white;
}
.section-div {
    display: block;
    width: 100%;
    padding: 0;
    margin-bottom: 20px;
    /*font-size: 21px;*/
    line-height: inherit;
    color: #333;
    border: 0;
    border: 1px solid #e5e5e5;
}
.section_div2
{
    border-left: 2px solid gray;
}
.no-border
{
    border:none !important;
}
.left-border
{
    border-left: 1px solid #dddddd !important;
}
</style>
<?php
        $bok_descityid=isset($_GET["bok_descityid"]) ? addslashes($_GET["bok_descityid"]):""; 
        $bok_loaddate=isset($_GET["bok_loaddate"]) ? addslashes($_GET["bok_loaddate"]):""; 
        
	$bok_memo=isset($_GET["bok_memo"]) ? addslashes($_GET["bok_memo"]):"";
//	$driv_id=isset($_GET["driv_id"]) ? addslashes($_GET["driv_id"]):"";
	$tab=isset($_REQUEST["tab"]) ? $_REQUEST["tab"]:"tab_content1";  
	$id=isset($_GET["id"]) ? $_GET["id"]:""; 
         $start_load_date=isset($_GET["start_load_date"]) ? addslashes($_GET["start_load_date"]):"";;
        $end_load_date=isset($_GET["end_load_date"]) ? addslashes($_GET["end_load_date"]):"";;
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
                                            <li role="presentation" class="<?php if($tab=="tab_content1"){ echo 'active'; }?>"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Search Memo</a>
                                            </li>
                                            <li role="presentation" class="<?php if($tab=="tab_content2"){ echo 'active'; }?>"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">Dispatch Report</a>
                                            </li> 
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade <?php if($tab=="tab_content1"){ echo 'active in'; }?>" id="tab_content1" aria-labelledby="home-tab">  
						<form class="form-horizontal form-label-left" enctype="multipart/form-data" method="get" action="index.php" novalidate>
													<input type="hidden" name="do" value="dispatch"> 
													<input type="hidden" name="tab" value="tab_content1"> 
													<center> <span class="section"><b>SEARCH UNLOADED PARCEL</b></span></center>
													<div class="item form-group">  
<!--														<div class="col-md-3 col-sm-3 col-xs-12">
															<label>Memo Number *</label> 
															<input id="name" class="form-control col-md-7 col-xs-12"  name="bok_memo" value="<?php echo $bok_memo; ?>" required="required" type="text">
														</div>  -->
<!--                                                                                                            <div class="col-md-3 col-sm-3 col-xs-12">
															<label>Loaded Date *</label> 
															<input id="name" class="form-control col-md-7 col-xs-12"  name="bok_loaddate" value="<?php echo $bok_loaddate; ?>"  type="date">
														</div>-->
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
                                                                                                        <div class="item form-group"> 
                                     
											 
                                                                                       <div class="col-md-3 col-sm-3 col-xs-12">
															<label>Start Load Date</label> 
															<input id="name" class="form-control col-md-7 col-xs-12"  name="start_load_date" value="<?php echo $start_load_date; ?>"  type="date">
														
                                                                                       </div>
                                                                                        <div class="col-md-3 col-sm-3 col-xs-12">
															<label>End Load Date</label> 
															<input id="name" class="form-control col-md-7 col-xs-12"  name="end_load_date" value="<?php echo $end_load_date; ?>" type="date">
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
                                                			
                                            			<?php	
								if(isset($_GET["tab"]) && isset($_GET["bok_descityid"]) && isset($_GET["bok_loaddate"]) || isset($_GET["start_load_date"]) && isset($_GET["end_load_date"]))
								{
                                                                    
                                                                    $bok_descityid=$_GET["bok_descityid"]; 
                                                                  //  $bok_loaddate=$_GET["bok_loaddate"]; 
                                                                     $start_load_date=$_GET["start_load_date"];
                                                                    $end_load_date=$_GET["end_load_date"];
//									$sql_memo="select * from booking where bok_memo=".$_GET["bok_memo"];
//									$res_memo=mysql_query($sql_memo);
//									$count_memo=mysql_num_rows($res_memo);
//									if($count_memo>0)
//									{
//										$f_memo=mysql_fetch_array($res_memo);
										?>
									<button class="btn btn-danger"  onclick="printDiv('printableArea')"><i class="fa fa-print"></i> Print</button>
									<div id="printableArea">	
									<span class="section"> 
												<b>SHIV CARGO AGENCY</b><br/>
												A-64 , RAM LAXMAN SANKUL , NEW COTTON MARKET ROAD<br/>
												AMRAVATI PH : 0721-2590820<br/>
												BRANCH : BUSYLAND COMPLEX NANDGAON PETH PH : 0721-2381577<br/>
												BRANCH : CITYLAND COMPLEX , BORGAON DHARMALE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									</span> 	
						                  <div class="row">
                                      <div class="item form-group"> 
                                      <div class="col-md-4 col-sm-4 col-xs-12">
                                                <label>Search</label> 
                                                <input id="search1" placeholder="Search..." size=""  class="form-control col-md-7 col-xs-12"  name="search" value=""  type="text">
                                                </div>
                                          </div>
                                          </div><br>				
									<table id="example" class="table table-striped responsive-utilities jambo_table">
										<thead>
											<tr class="headings"> 
												<th>Loaded Date</th>
                                                                                                <th>Memo No.</th>
												<th>TO CITY</th>
												<th>Vehicle No</th>
												<th>Records</th>
                                                                                                <th>Report</th>
												
											</tr>
										</thead>
										<tbody id="search_memo">
										<?php  
									    
                                                                                if($bok_descityid==0)
                                                                                {
//                                                                                        
                                                                                        $sql="select *, COUNT(*) as count from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_status='1' GROUP BY bok_memo";	 
                                                                                        
                                                                                } 
                                                                                else
                                                                                {
//                                                                                    $sql="select *, COUNT(*) as count from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' AND bok_loaddate='$bok_loaddate' OR bok_loaddate BETWEEN '$start_load_date' AND '$end_load_date' AND bok_status='1' GROUP BY bok_memo";	 
                                                                                        $sql="select *, COUNT(*) as count from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' OR bok_loaddate BETWEEN '$start_load_date' AND '$end_load_date' AND bok_status='1' GROUP BY bok_memo";	 
                                                                                        
                                                                                }
										$result=mysql_query($sql) or die(mysql_error());
//										
                                                                                
                                                                             
										while($row=mysql_fetch_array($result))
										{
//                                                                              
                                                                                    $memo=$row["bok_memo"];
										?> 
											<tr class="even pointer">  
												<td class="a-center "> <?php echo $row["bok_loaddate"]; ?></td>  
												<td class="a-center "> <?php echo $row["bok_memo"]; ?></td>   
												<td class="a-center "> <?php echo $row["dcty_name"]; ?></td>   
                                                                                                <td class="a-center "> <?php echo $row["bok_vehicleno"]; ?></td>   
												<td class="a-center "> <?php echo $row["count"]; ?></td>  
                                                                                                <td class="a-center "><a class="button-getReport" href="index.php?do=dispatch&tab=tab_content2&bok_loaddate=<?php echo $row["bok_loaddate"] ?>&bok_memo=<?php echo $row["bok_memo"] ?>">Get Report</a> </td> 
                                                                                                                                
											</tr> 
										<?php } ?>		
										</tbody>
									</table> 
									</div>
                                                                <?php } ?>
                                                
                                           </div>
                                            <div role="tabpanel" class="tab-pane fade <?php if($tab=="tab_content2"){ echo 'active in'; }?>" id="tab_content2" aria-labelledby="profile-tab">  
												
                                            			<?php	
								if(isset($_GET["tab"]) || isset($_GET["bok_loaddate"]) || isset($_GET["bok_memo"]))
								{
                                                                        
                                                                        $bok_memo=$_GET["bok_memo"];
                                                                        //$bok_loaddate=$_GET["bok_loaddate"];
									$sql_memo="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) where bok_memo=".$_GET["bok_memo"];
                                                                        
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
												BRANCH : BUSYLAND COMPLEX NANDGAON PETH PH : 0721-2381577<br/>
												BRANCH : CITYLAND COMPLEX , BORGAON DHARMALE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="text-align:right">MEMO NO. <?php echo $_GET["bok_memo"];?></b>
									</span> 	
									<span class="section">
                                                                            
										<b>Driver Name :</b> <?php echo ucwords($f_memo["bok_drivername"]);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>MEMO NO :</b><?php echo $_GET["bok_memo"];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>MEMO DATE :</b><?php echo ucwords($f_memo["bok_loaddate"]);?><br/>
                                                                                <b>Transport Name :</b><?php echo $f_memo["dcty_transport_name"];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>VECHILE NO :</b><?php echo $f_memo["bok_vehicleno"];?>&nbsp;&nbsp;&nbsp;&nbsp;<b>City :</b><?php echo $f_memo["dcty_name"];?><br/> 
                                                                                <b>DRIVER CONTACT NUMBER:</b><?php echo ucwords($f_memo["bok_drivermobile"]);?>  
                                                                                <b>DRIVER ADDRESS:</b><?php ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        
									</span>	
                                                                                  <div class="row">
                                                                <div class="item form-group"> 
								<div class="col-md-4 col-sm-4 col-xs-12">
								<label>Search</label> 
								<input id="search" placeholder="Search..." size="" class="form-control col-md-7 col-xs-12"  name="search" value=""  type="text">
								</div>  
														 
                                                                           </div> 
                        </div><br>
<!--                                                                            <div class="row" style="font-size: 17px;">
                                                                       
                                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                                            <label for="name"><b>Driver name :</b> </label>
                                                                       <?php echo ucwords($f_memo["bok_drivername"]);?>
                                                                        </div>
                                                                             <div class="col-md-4 col-sm-4 col-xs-12">
                                                                             <label for="name"><b>Memo No.:</b> </label>
                                                                       <?php echo $_GET["bok_memo"];?>
                                                                        </div>
                                                                             <div class="col-md-4 col-sm-4 col-xs-12">
                                                                                 <label for="name"><b>memo Date :</b> </label>
                                                                        <?php echo ucwords($f_memo["bok_loaddate"]);?>
                                                                        </div>
                                                                        </div>
                                                                         <div class="row" style="font-size: 17px;">
                                                                       
                                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                                             <label for="name">Transport Name : </label>
                                                                        <?php echo $f_memo["dcty_transport_name"];?>
                                                                        </div>
                                                                             <div class="col-md-4 col-sm-4 col-xs-12">
                                                                             <label for="name"><b>VECHILE NO:</b> </label>
                                                                        <?php echo $f_memo["bok_vehicleno"];?>
                                                                        </div>
                                                                             <div class="col-md-4 col-sm-4 col-xs-12">
                                                                             <label for="name">City : </label>
                                                                        <?php echo $f_memo["dcty_name"];?>
                                                                        </div>
                                                                        </div>
                                                                            
                                                                            <div class="row" style="font-size: 17px;">
                                                                       
                                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                                            <label for="name"><b>Driver Contact number :</b> </label>
                                                                       <?php echo ucwords($f_memo["bok_drivermobile"]);?>  
                                                                        </div>
                                                                             <div class="col-md-4 col-sm-4 col-xs-12">
                                                                             <label for="name"><b>Driver Address:</b> </label>
                                                                       <?php echo "";?>
                                                                        </div>
                                                                             
                                                                        </div>-->
                                                                            
                                                          
									<table id="example" class="table table-striped responsive-utilities jambo_table">
										<thead>
<!--											<tr class="headings"> 
												<th>Date</th>
												<th>Lr No </th>
												<th>CONSINOR</th> 
												<th>CONSINEE</th> 
												<th>TO CITY</th>
												<th>PARCEL</th>
												<th>TOTAL</th>
												<th>COMMISSION</th>
												<th>CROSS CHARGE</th>  
											</tr>-->
                                                                                    <tr class="headings"> 
												<th>Date</th>
												<th>Lr No </th>
                                                                                                <th>No of PARCEL</th>
												<th>Sender</th> 
												<th>GST No</th> 
                                                                                                <th>Receiver</th>                                                                               </th> 
												<th>GST No.</th> 
                                                                                                <th>CITY</th>
												<th>Amount</th>
                                                                                                <th>GST</th>
												<th>CROSS CHARGE</th>  
											</tr>
										</thead>
										<tbody id="search_body">
										<?php  
									    
//                                                                                $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_loaddate='$bok_loaddate' AND bok_memo='$bok_memo' AND bok_status='1'";	 
                                                                                $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_memo='$bok_memo' AND bok_status='1' ORDER BY boklrno";	 
                                                                              
										$result=mysql_query($sql) or die(mysql_error());
                                                                               
                                                                                $parcel=0;
                                                                                $memo_total=0;
                                                                                $commi=0;
                                                                                $cross=0;
                                                                                $total_gst=0;
                                                                                $city='';
                                                                                $total_parcel=0;
                                                                                $total_lr=0;
										while($row=mysql_fetch_array($result))
										{
//                                                                                    join des_city_place cp on (bok.bok_cityplaceid=cp.dcplace_id)
                                                                                     $gst=$row["bok_total"]*$row["bok_gst"]/100;
										?> 
											<tr class="even pointer">  
												<td class="a-center no-border"> <?php echo $row["bokdate"]; ?></td>  
												<td class="a-center no-border"> <?php echo $row["boklrno"]; ?></td>  
                                                                                                <td class="a-center no-border"> <?php echo $row["bok_item"]; ?></td>    
                                                                                                <td class="a-center no-border"> <?php echo $row["sendname"]; ?></td>
                                                                                                 <td class="a-center no-border"> <?php echo $row["sendgstno"]; ?></td>
												<td class="a-center no-border"> <?php echo $row["recvname"]; ?></td>   
												 <td class="a-center no-border"> <?php echo $row["recvgstno"]; ?></td> 
                                                                                                 <td class="a-center no-border"> <?php echo $row["dcplace_name"]; ?></td> <?php //$row["dcty_name"].'-'. ?>
												 <td class="a-center no-border"> <?php echo $row["bok_total"]; ?></td>    
												<td class="a-center no-border"> <?php echo $gst; ?></td>  
												<td class="a-center no-border"> <?php echo $row["dcplace_crossing"]; ?></td>  
											</tr> 
                                                                                        
										<?php 
                                                                                        $parcel=$parcel+$row["bok_item"];
                                                                                        $total_parcel=$total_parcel+$row["bok_item"];
                                                                                        $total_lr=$total_lr+1;
                                                                                        $memo_total=$memo_total+$row["bok_total"];
                                                                                        $calcu_commi=$row["bok_total"]*$row["dcty_cutrate"]/100;
                                                                                        $commi=$commi+$calcu_commi;
                                                                                        $cross=$cross+$row["dcplace_crossing"];
                                                                                        $city=$row["dcty_name"];
                                                                                        $total_gst=$total_gst+$gst;
                                                                                } ?>
                                                                                       <tr> 
                                                                                            <td class="a-center 1no-border"> Total</td>
                                                                                                <td class="a-center 1no-border"><?php echo $total_lr; ?></td>
                                                                                                <td class="a-center 1no-border"><?php echo $total_parcel; ?></td>
                                                                                                <td class="a-center 1no-border"> &nbsp;</td>
                                                                                                <td class="a-center 1no-border"> &nbsp;</td>
                                                                                                <td class="a-center 1no-border"> &nbsp;</td>
                                                                                                <td class="a-center 1no-border left-border"> MEMO TOTAL</td>
                                                                                                <td class="a-center 1no-border"><?php //echo $parcel; ?></td>
												<td class="a-center 1no-border"><?php echo $memo_total; ?></td>
                                                                                                <td class="a-center 1no-border"><?php echo $total_gst; ?></td>
                                                                                                <td class="a-center 1no-border"><?php echo $cross; ?></td>
                                                                                                
                                                                                        </tr> 
                                                                                        <tr>
                                                                                             <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border left-border"> LESS DELIVERY</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
												<td class="a-center no-border"><?php echo $commi; ?></td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                             <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border left-border"> LESS CROSSING</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
												<td class="a-center no-border"><?php echo $cross; ?></td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                        </tr>
                                                                                        <?php $net_total=$memo_total-$commi-$cross;
                                                                                                //$net_total=$net_total+$total_gst;
                                                                                        ?>
                                                                                        <tr>
                                                                                             <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center left-border"> NET AMOUNT</td>
                                                                                                <td class="a-center "> &nbsp;</td>
                                                                                                <td class="a-center "><?php echo $net_total; ?></td>
                                                                                                <td class="a-center "> </td>
                                                                                                <td class="a-center "> </td>
                                                                                        </tr>
										</tbody>
									</table> 
                                                                            <div class="item form-group section-div">
                                                                                <div class="col-md-3 col-sm-3 col-xs-12 section_div1">
                                                                                    <table class="table table-striped responsive-utilities jambo_table">
                                                                                        <tr>
                                                                                            <th>City</th>
                                                                                            <th>No. of parcel</th>
                                                                                            <th>Total</th>
                                                                                        </tr>
                                                                                        <?php 
//                                                                                        $bok_memo=$_GET["bok_memo"];
//                                                                        $place_id=$row["bok_cityplaceid"];
//                                                                        
//                                                                        $sql2="select COUNT(*) as count from booking where bok_memo='$bok_memo' && bok_cityplaceid='$place_id' GROUP BY dcplace_name";
//                                                                        $result1=mysql_query($sql2);
//                                                                        $row1=mysql_fetch_array($result1);
//                                                                        $count=$row1["count"];
                                                                                        
                                                                                $sql="select *, SUM(bok_item) as parcel_count from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_memo='$bok_memo' AND bok_status='1' GROUP BY dcplace_name";	 
                                                                              
										$result=mysql_query($sql) or die(mysql_error());
                                                                                while($row=mysql_fetch_array($result))
										{
                                                                                   
//                                                                                    join des_city_place cp on (bok.bok_cityplaceid=cp.dcplace_id)
                                                                                     $gst=$row["bok_freight"]*$row["bok_gst"]/100;
										
                                                                                        ?>
                                                                                        <tr>
                                                                                             <td class="a-center 1no-border"> <?php echo $row["dcplace_name"]; ?></td>
                                                                                             <td class="a-center 1no-border"><?php echo $row["parcel_count"]; ?></td>
                                                                                              <td class="a-center 1no-border"><?php echo $row["parcel_count"];; ?></td>
                                                                                             
                                                                                        </tr>    
                                                                                            
                                                                                            <?php
                                                                                }
                                                                                        ?>
                                                                                        
                                                                                        
                                                                                            
                                                                                    </table>
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-3 col-xs-12 section_div2">
                                                                                   
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            
									</div>
                                                                <?php }} ?>	
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>

<script>


   $("#search1").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#search_memo tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  
     $("#search2").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#search_report tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
</script>

<script>
function delte_booking(bokid) 
{ 

    var url=document.URL;
    
}

   $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#search_body tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
</script>

<script>
function delte_booking(bokid) 
{ 

    var url=document.URL;
    
}

   $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#search_body tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
</script>