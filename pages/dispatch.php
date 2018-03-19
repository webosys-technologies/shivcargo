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
        $bok_descityid=isset($_GET["bok_descityid"]) ? addslashes($_GET["bok_descityid"]):"no"; 
        $bok_loaddate=isset($_GET["bok_loaddate"]) ? addslashes($_GET["bok_loaddate"]):""; 
        
	$bok_memo=isset($_GET["bok_memo"]) ? addslashes($_GET["bok_memo"]):"";
//	$driv_id=isset($_GET["driv_id"]) ? addslashes($_GET["driv_id"]):"";
	$tab=isset($_REQUEST["tab"]) ? $_REQUEST["tab"]:"tab_content1";  
	$id=isset($_GET["id"]) ? $_GET["id"]:""; 
         $start_load_date=isset($_GET["start_load_date"]) ? addslashes($_GET["start_load_date"]):"";
        $end_load_date=isset($_GET["end_load_date"]) ? addslashes($_GET["end_load_date"]):"";
?>	
<script> 
function printDiv(divName) { 
    $("#selectall").hide();
    $(".chkbox").hide();
    $("#search_div").hide();
    
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
      $("#selectall").show();
    $(".chkbox").show();
    $("#search_div").show();
    
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
															<label>Start Load Date1</label> 
															<input id="start_date" class="form-control col-md-7 col-xs-12"  name="start_load_date" value="<?php echo $start_load_date; ?>"  type="text">
														
                                                                                       </div>
                                                                                        <div class="col-md-3 col-sm-3 col-xs-12">
															<label>End Load Date</label> 
															<input id="end_date" class="form-control col-md-7 col-xs-12"  name="end_load_date" value="<?php echo $end_load_date; ?>" type="text">
                                                                                        </div>
                                                                                   
                                       </div>
                                                                                                        <div class="col-md-3 col-sm-3 col-xs-12">
											<label>Destination City *</label> 
												 <select name="bok_descityid" style="width:250px;height:35px;" id="name" onChange="getPackage(this.value)" required="required" >
												 
												 <option value="0" <?php if($bok_descityid==0) echo "selected";?>>All City</option>
                                                                                                 <option <?php if($bok_descityid=='no') echo "selected"; ?> value="no">Select Destination City</option>
												<?php
												$res_descity=mysql_query("select * from des_cities");
												while($f_descity=mysql_fetch_array($res_descity))
												{
												?>
                                                    <option value="<?php echo $f_descity["dcty_id"]?>" <?php if($bok_descityid==$f_descity["dcty_id"]) echo "selected";?>><?php echo $f_descity["dcty_name"]?></option>
												<?php } ?>		
												</select>
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
									<a class="btn btn-success"  href="<?php echo $sitename;?>export_unloaded_report.php?bok_descityid=<?php echo $bok_descityid;?>">
                                                                        <i class="fa fa-download"></i> Export In Excel
                                                                        </a>
                                                                        <div id="printableArea">	
									<span class="section"> 
												<b>SHIV CARGO AGENCY</b><br/>
												A-26 , RAM LAXMAN SANKUL , NEW COTTON MARKET ROAD<br/>
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
												<th>Loaded Time</th>
                                                                                                <th>Memo No.</th>
												<th>TO CITY</th>
												<th>Vehicle No</th>
												<th>Records</th>
                                                                                                <th>Report</th>
												
											</tr>
										</thead>
										<tbody id="search_memo">
										<?php  
									        
                                                                                
                                                        if($bok_descityid=="no")
                                                        {
                                                            
							   // $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' OR boklrno='$lr' OR bokdate='$date' OR s.sendgstno='$s_gst_no' OR r.recvgstno='$r_gst_no' OR bokdate BETWEEN  '$start_date' AND '$end_date' ORDER BY boklrno";	 
                                                           $sql="select *, COUNT(*) as count from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_loaddate BETWEEN '$start_load_date' AND '$end_load_date' AND bok_status='1' GROUP BY bok_memo ORDER BY bok_loaddate DESC";
                                                        }
                                                        elseif($bok_descityid==0)
                                                        {

                                                            $sql="select *, COUNT(*) as count from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_status='1' GROUP BY bok_memo ORDER BY bok_loaddate DESC";	 
                                                        }
                                                        
                                                        elseif($start_load_date=="" AND $end_load_date=="")
                                                        {
                                                            
							   // $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' OR boklrno='$lr' OR bokdate='$date' OR s.sendgstno='$s_gst_no' OR r.recvgstno='$r_gst_no' OR bokdate BETWEEN  '$start_date' AND '$end_date' ORDER BY boklrno";	 
                                                            $sql="select *, COUNT(*) as count from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' AND bok_status='1' GROUP BY bok_memo ORDER BY bok_loaddate DESC";
                                                        }
                                                        else
                                                        {
                                                            
							 
                                                            $sql="select *, COUNT(*) as count from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' AND bok_loaddate BETWEEN '$start_load_date' AND '$end_load_date' AND bok_status='1' GROUP BY bok_memo ORDER BY bok_loaddate DESC";
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
												<td class="a-center "> <?php echo $row["bok_loadtime"]; ?></td>  
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
                                            <script>
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
                                            <div role="tabpanel" class="tab-pane fade <?php if($tab=="tab_content2"){ echo 'active in'; }?>" id="tab_content2" aria-labelledby="profile-tab">  
												
                                            			<?php	
                            if(isset($_GET["tab"]) || isset($_GET["bok_loaddate"]) || isset($_GET["bok_memo"]))
                            {

                                        if(isset($_POST["do_unload_memo"]) && $_POST["do_unload_memo"]=="true")
                                        {
                                            foreach($_POST["bokid"] as $newbokid)
                                            { 
                                                
                                                $sql="update booking set bok_loaddate='',bok_drivername='',bok_drivermobile='',bok_vehicleno='',bok_memo_total='',bok_memo='',bok_status='0' where bokid='$newbokid'";

                                               if(mysql_query($sql))
                                               {
                                                       $msg="<span style='color:green'>Parcel Unloded Successfully....</span><meta http-equiv=refresh content='1'>";
                                               }
                                               else
                                               {
                                                       $msg="<span style='color:red'>Not uloaded</span>";
                                               }
                                            }   
                                       }

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
                                                                        <a class="btn btn-success"  href="<?php echo $sitename;?>export_dispatch_report.php?bok_memo=<?php echo $_GET["bok_memo"];?>">
                                                                        <i class="fa fa-download"></i> Export In Excel
                                                                        </a>
                                                                        <button class="btn btn-danger"  onclick="printDiv('receipt_area')"><i class="fa fa-print"></i> Print Receipt</button>
                                                                        <p><b style="color:brown">Note: Please Check Load Data Which You Want To Unload And Click on unload Button. </b></p>
										<h2><b style="color:red"><span id="bokid"></span></b></h2> 
						
                                                    <form class="" enctype="multipart/form-data" method="POST" action="">
							<input type="hidden" name="do_unload_memo" value="true">
                                                        
							<input type="submit" name="do_unload" value="Unload" class="btn btn-info" onclick="return validate_Unload();">
							<input type="reset"  value="Reset" class="btn btn-white"><hr/> 
									<div id="printableArea">	
									<span class="section"> 
												<b>SHIV CARGO AGENCY</b><br/>
												A-26 , RAM LAXMAN SANKUL , NEW COTTON MARKET ROAD<br/>
												AMRAVATI PH : 0721-2590820<br/>
												BRANCH : BUSYLAND COMPLEX NANDGAON PETH PH : 0721-2381577<br/>
												BRANCH : CITYLAND COMPLEX , BORGAON DHARMALE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="text-align:right">MEMO NO. <?php echo $_GET["bok_memo"];?></b>
									</span> 	
<!--									<span class="section">
                                                                            
										<b>City : </b><?php echo $f_memo["dcty_name"];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>MEMO NO :</b><?php echo $_GET["bok_memo"];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>MEMO DATE :</b><?php echo ucwords($f_memo["bok_loaddate"]);?><br/>
                                                                                <b>Transport Name :</b><?php echo $f_memo["dcty_transport_name"];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>VECHILE NO :</b><?php echo $f_memo["bok_vehicleno"];?>&nbsp;&nbsp;&nbsp;&nbsp;<b>Driver Name :</b> <?php echo ucwords($f_memo["bok_drivername"]);?><br/> 
                                                                                <b>DRIVER CONTACT NUMBER:</b><?php echo ucwords($f_memo["bok_drivermobile"]);?>  
                                                                                <b>DRIVER ADDRESS:</b><?php ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        
									</span>	-->
                                                                                  <div class="row">
                                                               
                        </div><br>
                                                                            <div class="row" style="font-size: 17px;">
                                                                       
                                                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                                                             <label for="name">City : </label>
                                                                        <?php echo $f_memo["dcty_name"];?>
                                                                        </div>
                                                                             <div class="col-md-4 col-sm-4 col-xs-4">
                                                                             <label for="name"><b>Memo No.:</b> </label>
                                                                       <?php echo $_GET["bok_memo"];?>
                                                                        </div>
                                                                             <div class="col-md-4 col-sm-4 col-xs-4">
                                                                                 <label for="name"><b>memo Date :</b> </label>
                                                                        <?php echo ucwords($f_memo["bok_loaddate"]);?>
                                                                        </div>
                                                                        </div>
                                                                         <div class="row" style="font-size: 17px;">
                                                                       
                                                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                                                             <label for="name">Transport Name : </label>
                                                                        <?php echo $f_memo["dcty_transport_name"];?>
                                                                        </div>
                                                                             <div class="col-md-4 col-sm-4 col-xs-4">
                                                                             <label for="name"><b>VECHILE NO:</b> </label>
                                                                        <?php echo $f_memo["bok_vehicleno"];?>
                                                                        </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-4">
                                                                            <label for="name"><b>Driver name :</b> </label>
                                                                       <?php echo ucwords($f_memo["bok_drivername"]);?>
                                                                        </div>
                                                                        </div>
                                                                            
                                                                            <div class="row" style="font-size: 17px; border-bottom: 1px solid #dfdfdf;">
                                                                       
                                                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                                                            <label for="name"><b>Driver Contact number :</b> </label>
                                                                       <?php echo ucwords($f_memo["bok_drivermobile"]);?>  
                                                                        </div>
                                                                             <div class="col-md-4 col-sm-4 col-xs-4">
                                                                             <label for="name"><b>Driver Address:</b> </label>
                                                                       <?php echo "";?>
                                                                        </div>
                                                                             
                                                                        </div>
                         <div class="item form-group" id="search_div"> 
								<div class="col-md-4 col-sm-4 col-xs-4">
								<label>Search</label> 
								<input id="search" placeholder="Search..." size="" class="form-control col-md-7 col-xs-12"  name="search" value=""  type="text">
								</div>  
														 
                                                                           </div> 
                                                                            
                                                          
									<table id="example" class="table table-striped responsive-utilities jambo_table">
										<thead>
                                                                                    <tr class="headings"> 
                                                                                        <th><input type="checkbox" id="selectall" onclick="return selectAll(this);"></th>
                                                                                        <th style="border-left: 1px solid #dddddd !important">Date</th>
                                                                                        <th style="border-left: 1px solid #dddddd !important">Lr No </th>
                                                                                        <th style="border-left: 1px solid #dddddd !important">No of PARCEL</th>
                                                                                        <th style="border-left: 1px solid #dddddd !important">Sender</th> 
                                                                                        <th style="border-left: 1px solid #dddddd !important">GST No</th> 
                                                                                        <th style="border-left: 1px solid #dddddd !important">Receiver</th>                                                                               </th> 
                                                                                        <th style="border-left: 1px solid #dddddd !important">GST No.</th> 
                                                                                        <th style="border-left: 1px solid #dddddd !important">CITY</th>
                                                                                        <th style="border-left: 1px solid #dddddd !important">Amount</th>
                                                                                        <th style="border-left: 1px solid #dddddd !important">GST</th>
                                                                                        <th style="border-left: 1px solid #dddddd !important">CROSS CHARGE</th>  
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
                                                                                     $bok_paymode=$row["bok_paymode"];
                                                                                    $crossing=$row["dcplace_crossing"]*$row["bok_item"];
                                                                                     
										?> 
											<tr class="even pointer">  
                                                                                             <td class="a-center "><input class="chkbox" type="checkbox" name="bokid[]" value="<?php echo $row["bokid"]; ?>"> </td>  
												<td class="a-center" style="border-left: 1px solid #dddddd !important"> <?php echo $row["bokdate"]; ?></td>  
												<td class="a-center" style="border-left: 1px solid #dddddd !important"> <?php echo $row["boklrno"]; ?></td>  
                                                                                                <td class="a-center" style="border-left: 1px solid #dddddd !important"> <?php echo $row["bok_item"]; ?></td>    
                                                                                                <td class="a-center" style="border-left: 1px solid #dddddd !important"> <?php echo $row["sendname"]; ?></td>
                                                                                                 <td class="a-center" style="border-left: 1px solid #dddddd !important"> <?php echo $row["sendgstno"]; ?></td>
												<td class="a-center" style="border-left: 1px solid #dddddd !important"> <?php echo $row["recvname"]; ?></td>   
												 <td class="a-center" style="border-left: 1px solid #dddddd !important"> <?php echo $row["recvgstno"]; ?></td> 
                                                                                                 <td class="a-center" style="border-left: 1px solid #dddddd !important"> <?php echo $row["dcplace_name"]; ?></td> <?php //$row["dcty_name"].'-'. ?>
												 <td class="a-center" style="border-left: 1px solid #dddddd !important"> <?php 
                                                                                                 if($bok_paymode=="Paid")
                                                                                                 {
                                                                                                     echo "Paid";
                                                                                                 }
                                                                                                 else
                                                                                                 {
                                                                                                 echo $row["bok_total"]; 
                                                                                                 $memo_total=$memo_total+$row["bok_total"];
                                                                                                 
                                                                                                 }?></td>    
												<td class="a-center" style="border-left: 1px solid #dddddd !important"> <?php echo $gst; ?></td>  
												<td class="a-center" style="border-left: 1px solid #dddddd !important"> <?php echo $crossing; ?></td>  
											</tr> 
                                                                                        
										<?php 
                                                                                        $parcel=$parcel+$row["bok_item"];
                                                                                        $total_parcel=$total_parcel+$row["bok_item"];
                                                                                        $total_lr=$total_lr+1;
                                                                                        
                                                                                        $calcu_commi=$row["bok_total"]*$row["dcty_cutrate"]/100;
                                                                                        $commi=$commi+$calcu_commi;
                                                                                        $cross=$cross+$crossing;
                                                                                        $city=$row["dcty_name"];
                                                                                        $total_gst=$total_gst+$gst;
                                                                                } ?>
                                                                                       <tr> 
                                                                                            <td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"></td>
                                                                                            <td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"> Total</td>
                                                                                                <td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"><?php echo $total_lr; ?></td>
                                                                                                <td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"><?php echo $total_parcel; ?></td>
                                                                                                <td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"> &nbsp;</td>
                                                                                                <td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"> &nbsp;</td>
                                                                                                <td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"> &nbsp;</td>
                                                                                                <td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"> MEMO TOTAL</td>
                                                                                                <td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"><?php //echo $parcel; ?></td>
												<td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"><?php echo $memo_total; ?></td>
                                                                                                <td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"><?php echo $total_gst; ?></td>
                                                                                                <td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"><?php echo $cross; ?></td>
                                                                                                
                                                                                        </tr> 
                                                                                        <tr>
                                                                                            <td class="a-center 1no-border"></td>
                                                                                             <td class="a-center 1no-border"> &nbsp;</td>
                                                                                                <td class="a-center 1no-border"> &nbsp;</td>
                                                                                                <td class="a-center 1no-border"> &nbsp;</td>
                                                                                                <td class="a-center 1no-border"> &nbsp;</td>
                                                                                                <td class="a-center 1no-border"> &nbsp;</td>
                                                                                                <td class="a-center 1no-border"> &nbsp;</td>
                                                                                                <td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"> LESS DELIVERY</td>
                                                                                                <td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"> &nbsp;</td>
												<td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"><?php echo $commi; ?></td>
                                                                                                <td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"> &nbsp;</td>
                                                                                                <td class="a-center 1no-border"> &nbsp;</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="a-center no-border"></td>
                                                                                             <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"> LESS CROSSING</td>
                                                                                                <td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"> &nbsp;</td>
												<td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"><?php echo $cross; ?></td>
                                                                                                <td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"> &nbsp;</td>
                                                                                                <td class="a-center 1no-border" > &nbsp;</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="a-center no-border"></td>
                                                                                             <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"> Add GST</td>
                                                                                                <td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"> &nbsp;</td>
												<td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"><?php echo $total_gst; ?></td>
                                                                                                <td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"> &nbsp;</td>
                                                                                                <td class="a-center 1no-border"> &nbsp;</td>
                                                                                        </tr>
                                                                                        <?php 
                                                                                        $net_total=$memo_total-$commi-$cross;
                                                                                        $net_total=$net_total+$total_gst;
                                                                                        
                                                                                                //$net_total=$net_total+$total_gst;
                                                                                        ?>
                                                                                        <tr>
                                                                                            <td class="a-center no-border"></td>
                                                                                             <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center no-border"> &nbsp;</td>
                                                                                                <td class="a-center" style="border-left: 1px solid #dddddd !important"> NET AMOUNT</td>
                                                                                                <td class="a-center " style="border-left: 1px solid #dddddd !important"> &nbsp;</td>
                                                                                                <td class="a-center " style="border-left: 1px solid #dddddd !important"><?php echo $net_total; ?></td>
                                                                                                <td class="a-center " style="border-left: 1px solid #dddddd !important"> </td>
                                                                                                <td class="a-center "> </td>
                                                                                        </tr>
										</tbody>
									</table> 
                                                                        </form>
                                                                            <div class="item form-group section-div">
                                                                                <div class="col-md-3 col-sm-3 col-xs-12 section_div1">
                                                                                    <table class="table table-striped responsive-utilities jambo_table" style="width: 50% !important;">
                                                                                        <tr>
                                                                                            <th>City</th>
                                                                                            <th style="border-left: 1px solid #dddddd !important">No. of parcel</th>
                                                                                            <th style="border-left: 1px solid #dddddd !important">Total</th>
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
                                                                                     $gst=$row["bok_total"]*$row["bok_gst"]/100;
										
                                                                                        ?>
                                                                                        <tr>
                                                                                             <td class="a-center 1no-border"> <?php echo $row["dcplace_name"]; ?></td>
                                                                                             <td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"><?php echo $row["parcel_count"]; ?></td>
                                                                                              <td class="a-center 1no-border" style="border-left: 1px solid #dddddd !important"><?php echo $row["parcel_count"];; ?></td>
                                                                                             
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
                                                        <div class="x_content" id="receipt_area" style="display:none;">
                                        
                                        <?php 
                                        if(isset($_GET["bok_memo"]))
                                        {
                                        $bok_memo=$_GET["bok_memo"];
                                         $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_memo='$bok_memo'";	
                                         
                                        $result=mysql_query($sql) or die(mysql_error());
                                        }
                                        
                                    
                                      $sql="select *,COUNT(*) as count from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_memo='$bok_memo'";	
                                      $res=mysql_query($sql) or die(mysql_error());
                                      $row=mysql_fetch_array($res);
                                      $count=$row["count"];
                                      $c=1;
                                      while($row=mysql_fetch_array($result))
                                      {
                                        
                                        ?>
                        <table style="margin-bottom: 0px; font-size: 11px; padding: 2px; height: 336px; width: 100%; border-left: 1px solid #c1c1c1;border-right: 1px solid #c1c1c1;border-bottom: 1px solid #c1c1c1;" id="example" class="table">
                                                                <!--<table id="example" class="table table-striped responsive-utilities jambo_table">-->
                       <tbody>
                       <tr style="padding: 2px; height: 23px;">
                           <td style="padding: 2px; width: 354px; height: 25px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="4" rowspan="3"><img src="images/logo.png" style="padding: 4px; width:575px;"></td>
                       <td style="width: 179px; height: 23px; background-color: #e6e4e4; color: black; font-weight: bold; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">&nbsp;<b>AT OWNER&rsquo;S RISK</b></td>
                       <td style="width: 222px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">Pay Mode: <?php echo $row["bok_paymode"]; ?></td>
                       </tr>
                       <tr style="padding: 2px; height: 2px;">
                       <td style="width: 179px; height: 30px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" >&nbsp;FRIGHT UPTO:</td>
                       <td style="width: 222px; height: 30px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"><b>&nbsp;LR No.: <?php echo $row["boklrno"]; ?></b></td>
                       </tr>
                       <tr style="padding: 2px; height: 2px;">

                       <td style="padding: 2px; width: 179px; height: 2px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"></td>
                       <td style="padding: 2px; width: 222px; height: 6px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">
                       <p>&nbsp;DATE : <?php echo $row["bokdate"]; ?></p>
                       </td>
                       </tr>
                       <tr style="padding: 2px; height: 26px;">
                       <td style="padding: 2px; width: 334px; height: 26px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="2"><strong>TRUCK NO. : &nbsp;  <?php echo $row["bok_vehicleno"]; ?></strong></td>
                       <td style="padding: 2px; width: 334px; height: 26px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="2"><strong>FROM : <?php echo "Amravati"; ?></strong></td>
                       <td style="padding: 2px; width: 222px; height: 26px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">
                           <strong>To:&nbsp; <?php echo $row["dcplace_name"]; ?></strong>
                       </td>
                       <td style="padding: 2px; width: 222px; height: 26px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">
                       <p>&nbsp;TIME: <?php echo $row["boktime"]; ?></p>
                       </td>
                       </tr>
                       <tr style="padding: 2px; height: 55px;">
                           <td style="padding: 2px;  height: 55px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="4"><strong>&nbsp;&nbsp;&nbsp;&nbsp;CONSIGNOR&rsquo;S NAME &amp; ADDRESS &amp; GST : &nbsp;  <?php echo $row["sendname"]; echo ","; ?> &nbsp; <?php echo $row["sendaddress"]; echo ","; ?> &nbsp; <?php echo $row["sendgstno"]; ?></strong></td>
                           <td style="padding: 2px;  height: 55px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="3"><strong>&nbsp;&nbsp;CONSIGNEE&rsquo;S NAME &amp; ADDRESS &amp; GST : &nbsp;  <?php echo $row["recvname"]; echo ","; ?> &nbsp; <?php echo $row["recvaddress"]; echo ","; ?> &nbsp; <?php echo $row["recvgstno"]; ?></strong></td>


                       </tr>
                       <tr style="padding: 2px; height: 29px;">
                       <td style="padding: 2px; width: 530px; height: 29px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="3">&nbsp; &nbsp; &nbsp;Ph. No.&nbsp;  <?php echo $row["sendmobile"]; ?></td>
                       <td style="padding: 2px; width: 503px; height: 29px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="2">&nbsp;PVT. MKS.&nbsp;  <?php echo $row["bok_pivatemark"]; ?></td>
                       <td style="padding: 2px; width: 222px; height: 29px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">&nbsp;Ph. No.&nbsp;  <?php echo $row["recvmobile"]; ?></td>
                       </tr>
                       <tr style="padding: 2px; height: 29px;">
                       <td style="padding: 2px; width: 530px; height: 29px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/term.png" style="width: 185px;"></td>
                       <td style="padding: 2px; width: 503px; height: 29px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="3">
                       <table style="margin-bottom: 0px; font-size: 11px; height: 209px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" id="example" class="table">
                       <tbody>
                       <tr style="padding: 2px; height: 23px;">
                       <td style="padding: 2px; width: 46px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">ARTICLE</td>
                       <td style="padding: 2px; width: 342px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">DESCRIPTION / SAID TO CONTAIN</td>
                       <td style="padding: 2px; width: 66px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">WEIGHT Kg.</td>
                       <td style="padding: 2px; width: 75px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">RATE / KG.</td>
                       <td style="padding: 2px; width: 151px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">FRIEGHT</td>
                       </tr>
                       <tr style="padding: 2px; height: 23px;">
                       <td style="padding: 2px; width: 46px; height: 139px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" rowspan="7">&nbsp;&nbsp;&nbsp;<?php echo $row["bok_item"]; ?></td>
                       <td style="padding: 2px; width: 157px; height: 139px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" rowspan="7">&nbsp  <?php echo $row["description"]; ?></td>
                       <td style="padding: 2px; width: 66px; height: 46px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="" rowspan="2">&nbsp; <?php echo $row["bok_weight"]; ?></td>
                       <td style="padding: 2px; width: 66px; height: 46px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="" rowspan="2">&nbsp; <?php //echo $row["bok_weight"]; ?></td>
                       <td style="padding: 2px; width: 151px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">Frieght &nbsp;  <?php echo $row["bok_freight"]; ?></td>
                       </tr>
                       <tr style="padding: 2px; height: 23px;">
                           <td style="padding: 2px; width: 151px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">GST &nbsp;  <?php $gst=$row["bok_total"]*$row["bok_gst"]/100; echo $gst ; ?></td>
                       </tr>
                       <tr style="padding: 2px; height: 20px;">
                       <td style="padding: 2px; width: 66px; height: 24px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important; font-size: 6px; font-weight:bold;" rowspan="2">WEIGHT CHARGED Kg</td>
                       <td style="padding: 2px; width: 75px; height: 24px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important; font-size: 6px; font-weight:bold;" rowspan="2">VALUE DECLARED Rs</td>
                       <td style="padding: 2px; width: 151px; height: 20px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">Hamali &nbsp;  <?php echo $row["bok_hamali"]; ?></td>
                       </tr>
                       <tr style="padding: 2px; height: 0px;">

                       </tr>
                       <tr style="padding: 2px; height: 23px;">
                       <td style="padding: 2px; width: 66px; height: 69px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="" rowspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                       <td style="padding: 2px; width: 66px; height: 69px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="" rowspan="3">&nbsp;<?php echo $row["amountdeclare_desc"]; ?> </td>
                       <td style="padding: 2px; width: 151px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">BC</td>
                       </tr>
                       <tr style="padding: 2px; height: 23px;">
                       <td style="padding: 2px; width: 151px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">Other &nbsp;  <?php echo $row["bok_others"]; ?></td>
                       </tr>
                       <tr style="padding: 2px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">
                       <td style="padding: 2px; width: 151px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">Total &nbsp;  <?php echo $row["bok_total"]; ?></td>
                       </tr>
                       <tr style="padding: 2px; height: 23px;">
                       <td style="padding: 2px; width: 46px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">&nbsp;Remark</td>
                       <td style="padding: 2px; width: 157px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="2"><?php echo $row["bok_remark"]; ?></td>
                       <td style="padding: 2px; width: 75px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="2"><strong>Total Freight Rs.</strong>&nbsp; <?php echo $row["bok_total"]+$gst=$row["bok_freight"]*$row["bok_gst"]/100; ?> </td>
                       </tr>
                       <tr style="padding: 2px; height: 24px;">
                       <td style="padding: 2px; width: 46px; height: 24px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="2">&nbsp;&nbsp;Delivery At : <?php echo $row["dcty_transport_mobno"]; ?></td>
                       <td style="padding: 2px; width: 66px; height: 24px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="3">
                       <p>&nbsp;&nbsp;&nbsp;For - SHIV CARGO AGENCY</p>
                       <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Signature&nbsp;</p>
                       </td>
                       </tr>
                       </tbody>
                       </table>
                       </td>
                       </tr>
                       </tbody>
                       </table>
                 <?php
                        if($c==2)
                        {
                            $c=1;
                        }
                        else
                        { ?>
                    <span>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span>                                          
                  <?php
                            $c++;
                        }
                         
                        } ?>
   
               <!-- DivTable.com -->
                    </div>
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
<script type="text/javascript">
      $(function () {
          $("#start_date").datepicker({ dateFormat: 'dd-mm-yy',changeMonth: true,changeYear: true,showAnim: 'slide'});
          $('#start_date').datepicker('setDate', 'today');
      });
  </script>
 <script type="text/javascript">
      $(function () {
          $("#end_date").datepicker({ dateFormat: 'dd-mm-yy',changeMonth: true,changeYear: true,showAnim: 'slide'});
          $('#end_date').datepicker('setDate', 'today');
      });
  </script>