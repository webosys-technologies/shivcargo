<?php 
        $start_date=isset($_GET["start_date"]) ? addslashes($_GET["start_date"]):"";
	$end_date=isset($_GET["end_date"]) ? addslashes($_GET["end_date"]):"";
        
        $start_date=date_format(date_create($start_date),"Y-m-d");
        $end_date=date_format(date_create($end_date),"Y-m-d");
        
	$bok_descityid=isset($_GET["bok_descityid"]) ? addslashes($_GET["bok_descityid"]):"no"; 
        
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
                                    <h2><i class="fa fa-home"></i> <a href="index.php?do=home">Home</a> / Make Loaded Parcel </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
									<form class="form-horizontal form-label-left" enctype="multipart/form-data" method="get" action="index.php" novalidate>
									<input type="hidden" name="do" value="loaded_parcel">
										<?php if(isset($msg)) echo $msg;?>
                                       <center> <span class="section"><b>SEARCH LOADED PARCEL</b></span></center>
                                       <span class="section"><b>* Indicate Required Fields</b></span>
                                       <div class="item form-group">  
<!--                                          <div class="row">
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                                                <label>LR Number</label> 
                                                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="lr" value="<?php echo $lr; ?>"  type="text">
                                                    </div>
                                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                                                <label>Date</label> 
                                                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="date" value="<?php echo $date; ?>"  type="date">
                                                                        </div>    
                                                                                </div>  -->
<div class="row">
    
    <div class="item form-group"> 
														<div class="col-md-3 col-sm-3 col-xs-12">
															<label>Start Date</label> 
															<input id="start_date" class="form-control col-md-7 col-xs-12"  name="start_date" value="<?php echo $start_date; ?>"  type="text">
														</div>  
														<div class="col-md-3 col-sm-3 col-xs-12">
															<label>End Date</label> 
															<input id="end_date" class="form-control col-md-7 col-xs-12"  name="end_date" value="<?php echo $end_date; ?>"  type="text">
														</div>  
                                        </div> 
</div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-3 col-sm-3 col-xs-12">
											<label>Destination City *</label> 
												 <select name="bok_descityid" style="width:250px;height:35px;" id="name" onChange="getPackage(this.value)" >
												
												<option  <?php if($bok_descityid==0) echo "selected"; ?> value="0">All City</option>
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
                                                                                        
                                                                                    </div>
                                                                                    <div class="row">&nbsp</div>
<!--                                                                                    <div class="row">
                                                                                          <div class="col-md-3 col-sm-3 col-xs-12">
                                                                                <label>Sender GST Number</label> 
                                                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="s_gst_no" value="<?php echo $s_gst_no; ?>"  type="text">
                                                    </div>
                                                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                                                <label>Receiver GST Number</label> 
                                                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="r_gst_no" value="<?php echo $r_gst_no; ?>"  type="text">
                                                    </div>
                                                                                   
                                            
                                          
                                                                                    </div>-->
                                        </div> 
										
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <button id="send" type="submit" class="btn btn-success">Search</button>
                                                <a href="index.php?do=loaded_parcel" class="btn btn-primary">Reset</a>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php
if(isset($_GET["start_date"]) || isset($_GET["end_date"]) || isset($_GET["bok_descityid"]) || isset($_GET["lr"]) || isset($_GET["date"]) || isset($_GET["s_gst_no"]) || isset($_GET["r_gst_no"]))
{ 
      
	$bok_descityid=$_GET["bok_descityid"]; 
        
//        $lr=$_GET["lr"];
//        $date=$_GET["date"];
//        $s_gst_no=$_GET["s_gst_no"];
//        $r_gst_no=$_GET["r_gst_no"];
	
                                                        if($bok_descityid=="no")
                                                        {
                                                            
							   
                                                           $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where  bokdate BETWEEN  '$start_date' AND '$end_date' AND bok_status='1'";	
                                                           $export_sql="select DATE_FORMAT(bokdate, '%d-%m-%Y') bokdate,boklrno,bok_item,bok_total,sendname,sendgstno,recvname,recvgstno,dcplace_name from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where  bokdate BETWEEN  '$start_date' AND '$end_date' AND bok_status='1'";	
                                                        }
                                                        elseif($bok_descityid==0)
                                                        {

                                                            $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_status='1'";	
                                                            $export_sql="select DATE_FORMAT(bokdate, '%d-%m-%Y') bokdate,boklrno,bok_item,bok_total,sendname,sendgstno,recvname,recvgstno,dcplace_name from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_status='1'";	
                                                        }
                                                        
                                                        elseif($start_date=="" AND $end_date=="")
                                                        {
                                                          
							   
                                                            $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' AND bok_status='1'";	
                                                            $export_sql="select DATE_FORMAT(bokdate, '%d-%m-%Y') bokdate,boklrno,bok_item,bok_total,sendname,sendgstno,recvname,recvgstno,dcplace_name from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' AND bok_status='1'";	
                                                        }
                                                        else
                                                        {
                                                            
							 
                                                            $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' AND bokdate BETWEEN  '$start_date' AND '$end_date' AND bok_status='1'";	
                                                            $export_sql="select DATE_FORMAT(bokdate, '%d-%m-%Y') bokdate,boklrno,bok_item,bok_total,sendname,sendgstno,recvname,recvgstno,dcplace_name from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' AND bokdate BETWEEN  '$start_date' AND '$end_date' AND bok_status='1'";	
                                                        }
        
?>				
<div class="">
		<div class="clearfix"></div>
        <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel"> 
                                <div class="x_title">
                                    <h2><i class="fa fa-home"></i> <a href="index.php?do=home">Home</a> / loaded Parcel </h2>
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
<!--                                            <a class="btn btn-success"  href="<?php echo $sitename;?>index.php?do=make_dispatch&bok_descityid=<?php echo $bok_descityid;?>">
							<i class="fa fa-check"></i> Move To dispatch
						</a>-->
						<a class="btn btn-success"  href="<?php echo $sitename;?>export_loaded_report.php?sql=<?php echo $export_sql;?>">
							<i class="fa fa-download"></i> Export In Excel
						</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="printableArea">
						 <span class="section"> 
												<b>SHIV CARGO AGENCY</b><br/>
												A-26 , RAM LAXMAN SANKUL , NEW COTTON MARKET ROAD<br/>
												AMRAVATI PH : 0721-2590820<br/>
												BRANCH : BUSYLAND COMPLEX NANDGAON PETH PH : 0721-	2381577<br/>
												BRANCH : CITYLAND COMPLEX , BORGAON DHARMALE 
										</span>
                        
                                      <div class="row">
                                      <div class="item form-group"> 
                                      <div class="col-md-4 col-sm-4 col-xs-12">
                                                <label>Search</label> 
                                                <input id="search" placeholder="Search..." size=""  class="form-control col-md-7 col-xs-12"  name="search" value=""  type="text">
                                                </div>
                                          </div>
                                          </div><br>
						<?php if($bok_descityid!=0) { $row_ctyname=mysql_fetch_array(mysql_query("select dcty_name from des_cities where dcty_id='$bok_descityid'"));?> 
						<span class="section"><b>City Name</b> :  <?php echo ucwords($row_ctyname["dcty_name"]); }?></span>	
                        
                                                <table id="example" class="table table-striped responsive-utilities jambo_table">
                            <thead>
                                <tr class="headings"> 
                                    <th>Date</th>
                                    <th>Lr no </th>
                                    <th>No of parcel </th>
                                    <th>Load Amount</th>
                                    <th>Sender</th>
                                    <th>Sender GST No</th>
                                    <th>Private Mark</th>
                                    <th>Reciver</th>
                                    <th>Reciver GST No</th>
                                    <th>City</th>  
                                </tr>
                            </thead>
							<tbody id="search_parcel">
							<?php 
                                                        
							$result=mysql_query($sql) or die(mysql_error());
                                                        $total_parcel=0;
                                                        $total_lr=0;
                                                        $total=0;
							while($row=mysql_fetch_array($result))
							{
							?>
                                <form method="post" action="">
								<tr class="even pointer">  
                                    <td class="a-center "><?php echo date_format(date_create($row["bokdate"]),"d-m-Y"); ?></td>  
                                    <td class="a-center "> <?php echo $row["boklrno"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["bok_item"]; ?></td>  
                                    <td class="a-center "><?php echo $row["bok_total"]; ?></td> 
                                    <td class="a-center "> <?php echo $row["sendname"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["sendgstno"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["bok_pivatemark"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["recvname"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["recvgstno"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["dcplace_name"]; ?></td>  
                                    <td class="a-center " style="display:none; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> <?php 
                                                                 
                                                                 $branch_id=$row["bok_srccitybranchid"];
                                                                 $res_srccitybnch=mysql_query("select * from src_cities_branch where scbrnch_id='$branch_id'");
                                                                 $branch=mysql_fetch_array($res_srccitybnch);
                                                                 echo $branch["scbrnch_name"]; ?></td> 
                                </tr>
								</form> 
							<?php 
                                                        $total_parcel=$total_parcel+$row["bok_item"];
                                                        $total_lr=$total_lr+1;
                                                        $total=$total+$row["bok_total"];
                                                        
                                                                } ?>	
                                                        <tr class="even pointer" >  
                                    <td class="a-center "style="font-weight: bold;"> Total </td>  
                                    <td class="a-center " style="font-weight: bold;"> <?php echo $total_lr; ?> </td> 
                                    <td class="a-center " ><?php echo $total_parcel ?></td>  
                                    <td class="a-center " ><?php echo $total; ?> </td> 
                                    <td class="a-center "></td>  
                                    <td class="a-center "></td>
                                     <td class="a-center "></td>
                                     <td class="a-center "></td>
                                     <td class="a-center "> </td>  
                                    <td class="a-center " ></td>
                                     
      
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

<script>


   $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#search_parcel tr").filter(function() {
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