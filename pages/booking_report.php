
   
      
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
        
        $start_date=date_format(date_create($start_date),"Y-m-d");
        $end_date=date_format(date_create($end_date),"Y-m-d");
        
         $bok_descityid=isset($_GET["bok_descityid"]) ? addslashes($_GET["bok_descityid"]):"no";
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
															<input id="start_date" class="form-control col-md-7 col-xs-12"  name="start_date" value="<?php echo $start_date; ?>"  type="text">
														</div>  
														<div class="col-md-3 col-sm-3 col-xs-12">
															<label>End Date</label> 
															<input id="end_date" class="form-control col-md-7 col-xs-12"  name="end_date" value="<?php echo $end_date; ?>"  type="text">
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
    
        $bok_descityid=isset($_GET["bok_descityid"]) ? addslashes($_GET["bok_descityid"]):"0"; 
        //$lr=isset($_GET["lr"]) ? addslashes($_GET["lr"]):""; 
        //$date=isset($_GET["date"]) ? addslashes($_GET["date"]):""; 
        //$s_gst_no=isset($_GET["s_gst_no"]) ? addslashes($_GET["s_gst_no"]):""; 
      //  $r_gst_no=isset($_GET["r_gst_no"]) ? addslashes($_GET["r_gst_no"]):""; 
        
        if(isset($_GET["bokid"]) && $_GET["bokid"]!="" && $_GET["action"]=="del")
        {
            $bokid=$_GET["bokid"];
            $sql = "DELETE FROM booking WHERE bokid='$bokid'";
           // mysql_query($sql);
            
            if (mysql_query($sql)) {
                $msg="<span id='success' style='color:green'>Booking Record deleted successfully....</span>";
                } else {
                    $msg="<span id='error' style='color:red'>Error Booking deleting record: </span>";
                }
        }
        
        if($bok_descityid=="no")
        {

           $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bokdate BETWEEN  '$start_date' AND '$end_date' ORDER BY boklrno";	 
           $export_sql="select DATE_FORMAT(bokdate, '%d-%m-%Y') bokdate,boklrno,sendname,sendgstno,recvname,recvgstno,dcplace_name,bok_item,bok_total,bok_total*bok_gst/100 as gst,bok_pivatemark,CASE WHEN bok_status = '0' THEN 'Unloaded' ELSE 'Loaded' END from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bokdate BETWEEN  '$start_date' AND '$end_date' ORDER BY boklrno";	 
        }
        elseif($bok_descityid==0)
        {

            $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) ORDER BY boklrno";	 
            $export_sql="select DATE_FORMAT(bokdate, '%d-%m-%Y') bokdate,boklrno,sendname,sendgstno,recvname,recvgstno,dcplace_name,bok_item,bok_total,bok_total*bok_gst/100 as gst,bok_pivatemark,CASE WHEN bok_status = 0 THEN 'Unloaded' ELSE 'Loaded' END from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) ORDER BY boklrno";	 
        }

        elseif($start_date=="" AND $end_date=="")
        {

           $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' ORDER BY boklrno";	
           $export_sql="select DATE_FORMAT(bokdate, '%d-%m-%Y') bokdate,boklrno,sendname,sendgstno,recvname,recvgstno,dcplace_name,bok_item,bok_total,bok_total*bok_gst/100 as gst,bok_pivatemark,CASE WHEN bok_status = 0 THEN 'Unloaded' ELSE 'Loaded' END from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' ORDER BY boklrno";	
        }
        else
        {

            $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' AND bokdate BETWEEN  '$start_date' AND '$end_date' ORDER BY boklrno";	 
            $export_sql="select DATE_FORMAT(bokdate, '%d-%m-%Y') bokdate,boklrno,sendname,sendgstno,recvname,recvgstno,dcplace_name,bok_item,bok_total,bok_total*bok_gst/100 as gst,bok_pivatemark,CASE WHEN bok_status = 0 THEN 'Unloaded' ELSE 'Loaded' END from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' AND bokdate BETWEEN  '$start_date' AND '$end_date' ORDER BY boklrno";	 
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
    
    $(".action").hide();
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>  				
<script> 
function exportDiv(divName) { 
     window.open('data:application/vnd.xls,' +  encodeURIComponent($('#'.divName).html()));

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
<!--						<button class="btn btn-danger"  onclick="exportDiv('printableArea')">
							<i class="fa fa-print"></i> Export
						</button> -->
                                            <a class="btn btn-success"  href="<?php echo $sitename;?>export_booking_report.php?sql=<?php echo $export_sql;?>">
							<i class="fa fa-download"></i> Export In Excel
						</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="printableArea" style="overflow-x:auto;">
						 <span class="section"> search
												<b>SHIV CARGO AGENCY</b><br/>
												A-26 , RAM LAXMAN SANKUL , NEW COTTON MARKET ROAD<br/>
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
                                     <th style="display:none;">City Branch</th>
                                     <th colspan="3" style="text-align:center;">Action</th>
                                </tr>
                            </thead>
							<tbody id="">
                                                           
							<?php  
                                                        
                                                        
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
                                                                 <tbody id="search_body">
                                                             <tr class="even pointer">  
                                                                
                                                                <td class="a-center " style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> <?php echo date_format(date_create($row["bokdate"]),"d-m-Y"); ?></td>  
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
                                                                 <td class="a-center " style="display:none; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"> <?php 
                                                                 
                                                                 $branch_id=$row["bok_srccitybranchid"];
                                                                 $res_srccitybnch=mysql_query("select * from src_cities_branch where scbrnch_id='$branch_id'");
                                                                 $branch=mysql_fetch_array($res_srccitybnch);
                                                                 echo $branch["scbrnch_name"]; ?></td> 
                                                                 <td  class="a-center action" style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"><a class="button-getReport" onclick="printDiv('invoice<?php echo $row["bokid"] ?>')" href="index.php?do=booking_report&start_date=<?php echo $_GET["start_date"] ?>&end_date=<?php echo $_GET["end_date"] ?>&action=prnt&bokid=<?php echo $row["bokid"] ?>"><i class="fa fa-print"></i></a> </td> 
                                                                <td class="a-center action" style="border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"><a class="button-getReport" href="index.php?do=booking&bokid=<?php echo $row["bokid"] ?>"><i class="fa fa-edit"></i></a> </td> 
                                                                <td class="a-center action" style="display:none; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;"><a class="button-getReport" onclick="" href="index.php?do=booking_report&start_date=<?php echo $_GET["start_date"] ?>&end_date=<?php echo $_GET["end_date"] ?>&action=del&bokid=<?php echo $row["bokid"] ?>"><i class="fa fa-trash"></i></a> </td> 
                                                            </tr>
                                                                 </tbody>
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
                                        if(isset($_GET["bokid"]) && $_GET["action"]=="prnt")
                                        {
                                        $bokid=$_GET["bokid"];
                                         $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bokid='$bokid'";	
                                        $result=mysql_query($sql) or die(mysql_error());
                                        }
                                        
                                        
                                      $row=mysql_fetch_array($result);
                                        
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
   
               <span>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span>                                          
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
    <td style="padding: 2px; width: 151px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">GST &nbsp;  <?php $gst=$row["bok_freight"]*$row["bok_gst"]/100; echo $gst ; ?></td>
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
               <!-- DivTable.com -->
                    </div>
                </div>
            </div> <br /> <br /> <br />
		</div>
    </div>
<?php
}
?>	
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
