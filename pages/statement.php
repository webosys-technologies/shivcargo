<!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
  <script type="text/javascript"src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
   <link href="css/datepicker.css" rel="stylesheet" />-->
<style>
    .table-striped{ 
        overflow-x:scroll !important; 
/*    overflow: auto !important;*/
    white-space: nowrap;
    }
th, td { min-width: 50px; 
 border: none;
    text-align: left;
   }
    
</style>

<?php 
       $start_date=isset($_GET["start_date"]) ? addslashes($_GET["start_date"]):"";
	$end_date=isset($_GET["end_date"]) ? addslashes($_GET["end_date"]):"";
        
        $start_date=date_format(date_create($start_date),"Y-m-d");
        $end_date=date_format(date_create($end_date),"Y-m-d");
 
//	$lr=isset($_GET["lr"]) ? addslashes($_GET["lr"]):"-";
//	$date=isset($_GET["date"]) ? addslashes($_GET["date"]):"";
//	$gst=isset($_GET["gst"]) ? addslashes($_GET["gst"]):"-";
	$bok_descityid=isset($_GET["bok_descityid"]) ? addslashes($_GET["bok_descityid"]):"no";
//        $s_name=isset($_GET["s_name"]) ? addslashes($_GET["s_name"]):"-";
//        $r_name=isset($_GET["r_name"]) ? addslashes($_GET["r_name"]):"-";
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
									<input type="hidden" name="do" value="statement">
										<?php if(isset($msg)) echo $msg;?>
                                       <center> <span class="section"><b>STATEMENT REPORT</b></span></center>
<!--										<div class="item form-group">  
                                                                                    <div class="row">
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
<!--                                                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                                                <label>GST</label> 
                                                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="gst" value="<?php echo $gst; ?>"  type="text">
                                                    </div>-->
                                                                                   
                                            <div class="col-md-3 col-sm-3 col-xs-12">
											<label>Destination City</label> 
												 <select name="bok_descityid" style="width:250px;height:35px;" id="name" >
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
                                          
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        &nbsp;
                                                                                    </div>
<!--                                                                                    <div class="row">
                                                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                                                <label>Sender Name</label> 
                                                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="s_name" value="<?php echo $s_name; ?>"  type="text">
                                                    </div>
                                                                                   
                                            <div class="col-md-3 col-sm-3 col-xs-12">
											<label>Receiver Name</label> 
												  <input id="name" class="form-control col-md-7 col-xs-12"  name="r_name" value="<?php echo $r_name; ?>"  type="text">
                                            </div> 
                                          
                                                                                    </div>-->
                                         
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
if(isset($_GET["start_date"]) || isset($_GET["end_date"]) || isset($_GET["bok_descityid"]) || isset($_GET["gst"]) || isset($_GET["date"]) || isset($_GET["lr"]) || isset($_GET["s_name"]) || isset($_GET["r_name"]))
{ 
	
        $start_date=isset($_GET["start_date"]) ? addslashes($_GET["start_date"]):"";
	$end_date=isset($_GET["end_date"]) ? addslashes($_GET["end_date"]):"";
//        $lr=isset($_GET["lr"]) ? addslashes($_GET["lr"]):"-";
//	$date=isset($_GET["date"]) ? addslashes($_GET["date"]):"";
//	$gst=isset($_GET["gst"]) ? addslashes($_GET["gst"]):"-";
	$bok_descityid=isset($_GET["bok_descityid"]) ? addslashes($_GET["bok_descityid"]):"0";
//        $s_name=isset($_GET["s_name"]) ? addslashes($_GET["s_name"]):"-";
//        $r_name=isset($_GET["r_name"]) ? addslashes($_GET["r_name"]):"-";
        if($bok_descityid=="no")
        {
              $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bokdate BETWEEN  '$start_date' AND '$end_date' ORDER BY boklrno AND bok_status='1'";	
              $export_sql="select DATE_FORMAT(bokdate, '%d-%m-%Y') bokdate,boktime,boklrno,sendname,sendgstno,recvname,recvgstno,dcplace_name,bok_item,bok_paymode,bok_total,bok_gst,bok_memo,bok_loaddate,bok_loadtime,bok_vehicleno from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bokdate BETWEEN  '$start_date' AND '$end_date' ORDER BY boklrno AND bok_status='1'";	
              
        }
        elseif($bok_descityid==0)
        {

                $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_status='1'";	
                $export_sql="select DATE_FORMAT(bokdate, '%d-%m-%Y') bokdate,boktime,boklrno,sendname,sendgstno,recvname,recvgstno,dcplace_name,bok_item,bok_paymode,bok_total,bok_gst,bok_memo,bok_loaddate,bok_loadtime,bok_vehicleno from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_status='1'";	
        }
        elseif($start_date=="" AND $end_date=="")
        {
                $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok.bok_descityid='$bok_descityid' AND bok_status='1'";	
                $export_sql="select DATE_FORMAT(bokdate, '%d-%m-%Y') bokdate,boktime,boklrno,sendname,sendgstno,recvname,recvgstno,dcplace_name,bok_item,bok_paymode,bok_total,bok_gst,bok_memo,bok_loaddate,bok_loadtime,bok_vehicleno from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok.bok_descityid='$bok_descityid' AND bok_status='1'";	
        }
        else
        {
                $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok.bok_descityid='$bok_descityid' AND bokdate BETWEEN  '$start_date' AND '$end_date' AND bok_status='1'";	
                $export_sql="select DATE_FORMAT(bokdate, '%d-%m-%Y') bokdate,boktime,boklrno,sendname,sendgstno,recvname,recvgstno,dcplace_name,bok_item,bok_paymode,bok_total,bok_gst,bok_memo,bok_loaddate,bok_loadtime,bok_vehicleno from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok.bok_descityid='$bok_descityid' AND bokdate BETWEEN  '$start_date' AND '$end_date' AND bok_status='1'";	
        }
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
						<a class="btn btn-success"  href="<?php echo $sitename;?>export_statement_report.php?sql=<?php echo $export_sql;?>">
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
                        <div style="overflow-x:auto;">
                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                            <thead>
                                <tr class="headings"> 
                                    <th>LR Date</th>
                                    <th>LR Time</th>
                                    <th>Lr no </th>
                                    <th>Sender</th>
                                    <th>Sender GST</th>
                                    <th>Private Mark</th>
                                    <th>Reciver</th>
                                    <th>Receiver GST</th>
                                    <th>City</th>
                                    <th>No of Parcel</th>
                                    <th>Pay Mode</th>
                                    <th>Amount</th>
                                    <th>GST</th> 
                                    <th>Memo No.</th>
                                    <th>Loaded date</th>
                                    <th>Loaded Time</th>
                                    <th>Vehicle No.</th>  
                                </tr>
                            </thead>
							<tbody id="search_statement">
							<?php  
                                                        
							$result=mysql_query($sql) or die(mysql_error());
							while($row=mysql_fetch_array($result))
							{
								if($row["bok_status"]==0){$status="Unloaded";} else {$status="Loaded";}
							?>
                                <form method="post" action="">
								<tr class="even pointer">  
                                     <td class="a-center "> <?php echo date_format(date_create($row["bokdate"]),"d-m-Y"); ?></td>  
                                     <td class="a-center "> <?php echo $row["boktime"]; ?></td>
                                     <td class="a-center "> <?php echo $row["boklrno"]; ?></td>  
                                     <td class="a-center "> <?php echo $row["sendname"]; ?></td>  
                                     <td class="a-center "> <?php echo $row["sendgstno"]; ?></td>  
                                     <td class="a-center "> <?php echo $row["bok_pivatemark"]; ?></td>  
                                     <td class="a-center "> <?php echo $row["recvname"]; ?></td>  
                                     <td class="a-center "> <?php echo $row["recvgstno"]; ?></td>  
                                      <td class="a-center "> <?php echo $row["dcplace_name"]; ?></td>   
                                     <td class="a-center "> <?php echo $row["bok_item"]; ?></td> 
                                     <td class="a-center "> <?php echo $row["bok_paymode"]; ?></td>  
                                     <td class="a-center "> <?php echo $row["bok_total"]; ?></td>  
                                     <td class="a-center "> <?php echo $row["bok_gst"]; ?></td>
                                     <td class="a-center "> <?php echo $row["bok_memo"]; ?></td> 
                                     <td class="a-center "> <?php echo $row["bok_loaddate"]; ?></td> 
                                     <td class="a-center "> <?php echo $row["bok_loadtime"]; ?></td>  
                                     <td class="a-center "> <?php echo $row["bok_vehicleno"]; ?></td> 
                                     <td class="a-center " style="display:none; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> <?php 
                                                                 
                                                                 $branch_id=$row["bok_srccitybranchid"];
                                                                 $res_srccitybnch=mysql_query("select * from src_cities_branch where scbrnch_id='$branch_id'");
                                                                 $branch=mysql_fetch_array($res_srccitybnch);
                                                                 echo $branch["scbrnch_name"]; ?></td> 
                                 
                                </tr>
								</form> 
							<?php } ?>		
                            </tbody>
						</table>
                            </div>
                        
                    </div>
                </div>
            </div> <br /> <br /> <br />
		</div>
    </div>
<?php
}
?>	

<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true
    } );
} );
</script>

<script>


   $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#search_statement tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  
   
</script>
<script type="text/javascript">
      $(function () {
          $("#start_date").datepicker({dateFormat: 'dd-mm-yy',changeMonth: true,changeYear: true,showAnim: 'slide'});
          $("#start_date").datepicker('setDate', 'today');
      });
  </script>

 <script type="text/javascript">
      $(function () {
          $("#end_date").datepicker({dateFormat: 'dd-mm-yy',changeMonth: true,changeYear: true,showAnim: 'slide'});
          $('#end_date').datepicker('setDate', 'today');
      });
  </script>