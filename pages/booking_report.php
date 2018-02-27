
<style>
    .table-striped{ 
        overflow-x:scroll !important; 
/*    overflow: auto !important;*/
    white-space: nowrap;
    }
th, td { min-width: 50px; 
 
    text-align: left;
   }
    
</style>

<style>
    
    td,th{ border: 1px solid #c1c1c1; }
    
    </style>
<?php 
	$start_date=isset($_GET["start_date"]) ? addslashes($_GET["start_date"]):"";
	$end_date=isset($_GET["end_date"]) ? addslashes($_GET["end_date"]):"";
         $bok_descityid=isset($_GET["bok_descityid"]) ? addslashes($_GET["bok_descityid"]):"0";
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
                                                            <span id="show_SuccessMsg"></span>
                                <div class="x_title">
                                    <h2><i class="fa fa-home"></i> <a href="index.php?do=home">Home</a> / Search Unloaded Parcel </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
									<form class="form-horizontal form-label-left" enctype="multipart/form-data" method="get" action="index.php" novalidate>
									<input type="hidden" name="do" value="booking_report">
										
                                       <center> <span class="section"><b>SEARCH BOOKING REPORT</b></span></center>
										<div class="item form-group"> 
														<div class="col-md-3 col-sm-3 col-xs-12">
															<label>Start Date</label> 
															<input id="name" class="form-control col-md-7 col-xs-12"  name="start_date" value="<?php echo $start_date; ?>"  type="date">
														</div>  
														<div class="col-md-3 col-sm-3 col-xs-12">
															<label>End Date</label> 
															<input id="name" class="form-control col-md-7 col-xs-12"  name="end_date" value="<?php echo $end_date; ?>"  type="date">
														</div>  
                                        </div> 
<!--                                       <div class="row">
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                                                <label>LR Number</label> 
                                                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="lr" value="<?php echo $lr; ?>"  type="text">
                                                    </div>
                                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                                                <label>Date</label> 
                                                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="date" value="<?php echo $date; ?>"  type="date">
                                                                        </div>    
                                                                                </div>  -->
                                                                                    <div class="row">&nbsp</div>
                                                                                    <div class="row">
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
if(isset($_GET["start_date"]) || isset($_GET["end_date"]) || isset($_GET["bok_descityid"]) || isset($_GET["lr"]) || isset($_GET["date"]) || isset($_GET["s_gst_no"]) || isset($_GET["r_gst_no"]))
{  
    
	$start_date=isset($_GET["start_date"]) ? addslashes($_GET["start_date"]):"";
	$end_date=isset($_GET["end_date"]) ? addslashes($_GET["end_date"]):"";
        $bok_descityid=isset($_GET["bok_descityid"]) ? addslashes($_GET["bok_descityid"]):"0"; 
        $lr=isset($_GET["lr"]) ? addslashes($_GET["lr"]):""; 
        $date=isset($_GET["date"]) ? addslashes($_GET["date"]):""; 
        $s_gst_no=isset($_GET["s_gst_no"]) ? addslashes($_GET["s_gst_no"]):""; 
        $r_gst_no=isset($_GET["r_gst_no"]) ? addslashes($_GET["r_gst_no"]):""; 
        
        if(isset($_GET["bokid"]) && $_GET["bokid"]!="")
        {
            $bokid=$_GET["bokid"];
            $sql = "DELETE FROM booking WHERE bokid='$bokid'";
            mysql_query($sql);
            
            if (mysql_query($sql)=== TRUE) {
                $msg="<span id='success' style='color:green'>Booking Record deleted successfully....</span>";
                } else {
                    $msg="<span id='error' style='color:red'>Error Booking deleting record: </span>";
                }
        }
?>
<?php if(isset($msg)) echo $msg;?>
<script>
 <?php if($msg){ ?>
setTimeout(function() {
    $('#success').fadeOut('fast');
}, 1000);
<?php } ?>
</script>
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
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="printableArea" style="overflow-x:auto;">
						 <span class="section"> 
												<b>SHIV CARGO AGENCY</b><br/>
												A-64 , RAM LAXMAN SANKUL , NEW COTTON MARKET ROAD<br/>
												AMRAVATI PH : 0721-2590820<br/>
												BRANCH : BUSYLAND COMPLEX NANDGAON PETH PH : 0721-	2381577<br/>
												BRANCH : CITYLAND COMPLEX , BORGAON DHARMALE 
									</span> 
                                                           <div class="row">
                                                                <div class="item form-group"> 
								<div class="col-md-3 col-sm-3 col-xs-12">
								<label>Search</label> 
								<input id="search" placeholder="Search..." size="" class="form-control col-md-7 col-xs-12"  name="search" value=""  type="text">
								</div>  
														 
                                        </div> 
                        </div><br>
                        <table id="example" class="table table-striped responsive-utilities jambo_table" style="overflow-x:auto;">
                            <thead>
                                <tr class="headings"> 
                                    <th>Date</th>
                                    <th>Lr no </th>
                                    <th>Sender</th>
                                     <th>Sender GST</th>
                                    <th>Reciver</th>
                                     <th>Reciver GST</th>
                                    <th>City</th>
                                    <th>No of parcel</th>
                                    <th>Loaded Ammount</th>
                                    <th>GST</th>
                                    <th>Private Mark</th>
                                    <th>Status</th>
                                    <th>Edit Booking</th>
                                     <th>Delete Booking</th>
                                </tr>
                            </thead>
							<tbody id="search_body">
							<?php  
                                                         if($bok_descityid==0)
                                                        {

                                                            $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) ORDER BY boklrno";	 
                                                        }
                                                        else
                                                        {
                                                            
							   // $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' OR boklrno='$lr' OR bokdate='$date' OR s.sendgstno='$s_gst_no' OR r.recvgstno='$r_gst_no' OR bokdate BETWEEN  '$start_date' AND '$end_date' ORDER BY boklrno";	 
                                                            $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' OR bokdate BETWEEN  '$start_date' AND '$end_date' ORDER BY boklrno";	 
                                                        }
							$result=mysql_query($sql) or die(mysql_error());
                                                        $total_of_bok_total=0;
                                                        $total_gst=0;
                                                        $total_parcel=0;
                                                        $total_lr=0;
							while($row=mysql_fetch_array($result))
							{
								if($row["bok_status"]==0){$status="Unloaded";} else {$status="Loaded";}
                                                               $gst_cal=$row["bok_total"]* $row["bok_gst"]/100;
							?>
                                                            <form method="post" action="">
                                                             <tr class="even pointer">  
                                                                 <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> <?php echo $row["bokdate"]; ?></td>  
                                                                <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> <?php echo $row["boklrno"]; ?></td>  
                                                                <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> <?php echo $row["sendname"]; ?></td>  
                                                                <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> <?php echo $row["sendgstno"]; ?></td>  
                                                                <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> <?php echo $row["recvname"]; ?></td>  
                                                                <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> <?php echo $row["recvgstno"]; ?></td>  
                                                                <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> <?php echo $row["dcplace_name"]; ?></td>
                                                                 <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> <?php echo $row["bok_item"]; ?></td>
                                                                 <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> <?php echo $row["bok_total"]; ?></td>  
                                                                <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> <?php echo $gst_cal; ?></td>
                                                                <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> <?php echo $row["bok_pivatemark"]; ?></td>
                                                                <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> <?php echo $status; ?></td>  
                                                                <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"><a class="button-getReport" href="index.php?do=booking&bokid=<?php echo $row["bokid"] ?>">Edit</a> </td> 
                                                                <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"><a class="button-getReport" onclick="" href="index.php?do=booking_report&start_date=<?php echo $_GET["start_date"] ?>&end_date=<?php echo $_GET["end_date"] ?>&bokid=<?php echo $row["bokid"] ?>">Delete</a> </td> 
                                                            </tr>
								</form> 
							<?php 
                                                        $total_parcel=$total_parcel+$row["bok_item"];
                                                        $total_lr=$total_lr+1;
                                                        $total_of_bok_total=$total_of_bok_total+$row["bok_total"];
                                                        $total_gst=$total_gst+$gst_cal;
                                                                } ?>	
                                                        <tr class="even pointer" >  
                                    <td class="a-center "style="font-weight: bold;" style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> Total </td>  
                                    <td class="a-center " style="font-weight: bold;" style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> <?php echo $total_lr; ?> </td> 
                                    <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> </td>  
                                    <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> </td> 
                                    <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> </td>  
                                    <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> </td>  
                                    <td class="a-center " style="font-weight: bold;" style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> Total</td>
                                     <td class="a-center " style="font-weight: bold;" style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> <?php echo $total_parcel ?></td>
                                     <td class="a-center " style="font-weight: bold;" style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> <?php echo $total_of_bok_total ?></td>  
                                    <td class="a-center " style="font-weight: bold;" style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> <?php echo $total_gst; ?></td>
                                     <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> </td>
                                    <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> </td>  
                                    <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"></td> 
                                    <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"></td> 
                                </tr>
                            </tbody>
						</table>

                    </div>
                                    <div class="x_content" id="invoice" style="display:none;">
                                        
                                        <?php 
                                        $bokid=32;
                                         $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bokid='$bokid'";	
                                        $result=mysql_query($sql) or die(mysql_error());
                                        
                                      $row=mysql_fetch_array($result);
                                        
                                        ?>
 <table style="height: 336px; width: 100%; border: 1px solid #c1c1c1;" id="example" class="table">
                                         <!--<table id="example" class="table table-striped responsive-utilities jambo_table">-->
<tbody>
<tr style="height: 23px;">
<td style="width: 354px; height: 25px;" colspan="4" rowspan="2">SHIV CARGO AGENCY <br /> A-64 , RAM LAXMAN SANKUL , NEW COTTON MARKET ROAD&lt<br /> AMRAVATI PH : 0721-2590820&lt<br /> BRANCH : BUSYLAND COMPLEX NANDGAON PETH PH : 0721- 2381577</td>
<td style="width: 179px; height: 23px;     background-color: #e6e4e4; color: black; font-weight: bold;">&nbsp;AT OWNER&rsquo;S RISK</td>
<td style="width: 222px; height: 23px;">&nbsp;</td>
</tr>
<tr style="height: 2px;">
<td style="width: 179px; height: 2px;">To:&nbsp; <?php echo $row["dcplace_name"]; ?></td>
<td style="width: 222px; height: 2px;">LR No.: <?php echo $row["bokdate"]; ?></td>
</tr>
<tr style="height: 26px;">
<td style="width: 354px; height: 26px;" colspan="4">BRANCH : CITYLAND COMPLEX , BORGAON DHARMALE</td>
<td style="width: 179px; height: 52px;" rowspan="2">&nbsp;FRIGHT UPTO:</td>
<td style="width: 222px; height: 26px;">
<p>&nbsp;DATE : <?php echo $row["bokdate"]; ?></p>
</td>
</tr>
<tr style="height: 26px;">
<td style="width: 20px; height: 26px;" colspan="2"><strong>TRUCK NO. : &nbsp;  <?php echo $row["bok_vehicleno"]; ?></strong></td>
<td style="width: 334px; height: 26px;" colspan="2"><strong>FROM : <?php echo $row["bokdate"]; ?></strong></td>
<td style="width: 222px; height: 26px;">
<p>&nbsp;TIME: <?php echo $row["boktime"]; ?></p>
</td>
</tr>
<tr style="height: 55px;">
<td style="width: 354px; height: 55px;" colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;CONSIGNOR&rsquo;S NAME &amp; ADDRESS &amp; GST :</td>
<td style="width: 401px; height: 55px;" colspan="2">&nbsp;&nbsp;CONSIGNOR&rsquo;S NAME &amp; ADDRESS &amp; GST :</td>
</tr>
<tr style="height: 29px;">
<td style="width: 530px; height: 29px;" colspan="3">&nbsp; &nbsp; &nbsp;Ph. No.&nbsp;  <?php echo $row["bok_vehicleno"]; ?></td>
<td style="width: 503px; height: 29px;" colspan="2">&nbsp;PVT. MKS.&nbsp;  <?php echo $row["bok_pivatemark"]; ?></td>
<td style="width: 222px; height: 29px;">&nbsp;Ph. No.</td>
</tr>
<tr style="height: 29px;">
<td style="width: 530px; height: 29px;" colspan="3">&nbsp;</td>
<td style="width: 503px; height: 29px;" colspan="3">
<table style="height: 209px; width: 496px;" id="example" class="table">
<tbody>
<tr style="height: 23px;">
<td style="width: 46px; height: 23px;">ARTICLE</td>
<td style="width: 157px; height: 23px;">DESCRIPTION / SAID TO CONTAIN</td>
<td style="width: 66px; height: 23px;">WEIGHT Kg.</td>
<td style="width: 75px; height: 23px;">RATE / KG.</td>
<td style="width: 151px; height: 23px;">FRIEGHT</td>
</tr>
<tr style="height: 23px;">
<td style="width: 46px; height: 139px;" rowspan="7">&nbsp;</td>
<td style="width: 157px; height: 139px;" rowspan="7">&nbsp  <?php echo $row["amountdeclare_desc"]; ?></td>
<td style="width: 66px; height: 46px;" colspan="2" rowspan="2">&nbsp; <?php echo $row["bok_weight"]; ?></td>
<td style="width: 151px; height: 23px;">Frieght &nbsp;  <?php echo $row["bok_freight"]; ?></td>
</tr>
<tr style="height: 23px;">
    <td style="width: 151px; height: 23px;">Hamali &nbsp;  <?php echo $row["bok_hamali"]; ?></td>
</tr>
<tr style="height: 28px;">
<td style="width: 66px; height: 24px;" rowspan="2">&nbsp;</td>
<td style="width: 75px; height: 24px;" rowspan="2">&nbsp;</td>
<td style="width: 151px; height: 28px;">BC</td>
</tr>
<tr style="height: 0px;">

</tr>
<tr style="height: 23px;">
<td style="width: 66px; height: 69px;" colspan="2" rowspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="width: 151px; height: 23px;">Other &nbsp;  <?php echo $row["bok_freight"]; ?></td>
</tr>
<tr style="height: 23px;">
<td style="width: 151px; height: 23px;">&nbsp;</td>
</tr>
<tr style="height: 23px;">
<td style="width: 151px; height: 23px;">Total &nbsp;  <?php echo $row["bok_total"]; ?></td>
</tr>
<tr style="height: 23px;">
<td style="width: 46px; height: 23px;">&nbsp;Remark</td>
<td style="width: 157px; height: 23px;" colspan="2">&nbsp;&nbsp;</td>
<td style="width: 75px; height: 23px;" colspan="2"><strong>Total Freight Rs.</strong>&nbsp;&nbsp;</td>
</tr>
<tr style="height: 24px;">
<td style="width: 46px; height: 24px;" colspan="2">&nbsp;&nbsp;Delivery At</td>
<td style="width: 66px; height: 24px;" colspan="3">
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
<!-- DivTable.com -->
                    </div>
                </div>
            </div> <br /> <br /> <br />
		</div>
    </div>
<?php
}
?>	

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