<?php 
	$start_date=isset($_GET["start_date"]) ? addslashes($_GET["start_date"]):"";
	$end_date=isset($_GET["end_date"]) ? addslashes($_GET["end_date"]):"";
?> 
				<div class="">
				<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
                                                            <span id="show_SuccessMsg"></span>
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
									<input type="hidden" name="do" value="booking_report">
										
                                       <center> <span class="section"><b>SEARCH BOOKING REPORT</b></span></center>
										<div class="item form-group"> 
														<div class="col-md-3 col-sm-3 col-xs-12">
															<label>Start Date*</label> 
															<input id="name" class="form-control col-md-7 col-xs-12"  name="start_date" value="<?php echo $start_date; ?>" required="required" type="date">
														</div>  
														<div class="col-md-3 col-sm-3 col-xs-12">
															<label>End Date*</label> 
															<input id="name" class="form-control col-md-7 col-xs-12"  name="end_date" value="<?php echo $end_date; ?>" required="required" type="date">
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
if(isset($_GET["start_date"]) && isset($_GET["end_date"]))
{  
	$start_date=$_GET["start_date"];
	$end_date=$_GET["end_date"];
        
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
                    <div class="x_content" id="printableArea">
						 <span class="section"> 
												<b>SHIV CARGO AGENCY</b><br/>
												A-64 , RAM LAXMAN SANKUL , NEW COTTON MARKET ROAD<br/>
												AMRAVATI PH : 0721-2590820<br/>
												BRANCH : BUSYLAND COMPLEX NANDGAON PETH PH : 0721-	2381577<br/>
												BRANCH : CITYLAND COMPLEX , BORGAON DHARMALE 
										</span> 			
                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                            <thead>
                                <tr class="headings"> 
                                    <th>Date</th>
                                    <th>Lr no </th>
                                    <th>Sender</th>
                                    <th>Reciver</th>
                                    <th>City</th>
                                    <th>Status</th>
                                    <th>Loaded Ammount</th>
                                    <th>Big Parcel</th>
                                    <th>Small Parcel</th>
                                    <th>Edit Booking</th>
                                     <th>Delete Booking</th>
                                </tr>
                            </thead>
							<tbody>
							<?php  
							$sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bokdate BETWEEN  '$start_date' AND '$end_date'";	 
							$result=mysql_query($sql) or die(mysql_error());
							while($row=mysql_fetch_array($result))
							{
								if($row["bok_status"]==0){$status="Unloaded";} else {$status="Loaded";}
							?>
                                <form method="post" action="">
								<tr class="even pointer">  
                                    <td class="a-center "> <?php echo $row["bokdate"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["boklrno"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["sendname"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["recvname"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["dcty_name"].'-'.$row["dcplace_name"]; ?></td>  
                                    <td class="a-center "> <?php echo $status; ?></td>  
                                    <td class="a-center "> <?php echo $row["bok_total"]; ?></td>  
                                    <td class="a-center "> <?php if($row["bok_parcel"]=="Big") { echo $row["bok_item"]; } else { echo "0";}?></td>
                                    <td class="a-center "> <?php if($row["bok_parcel"]=="Small") { echo $row["bok_item"]; } else { echo "0";}?></td>
                                    <td class="a-center "><a class="button-getReport" href="index.php?do=booking&bokid=<?php echo $row["bokid"] ?>">Edit</a> </td> 
                                    <td class="a-center "><a class="button-getReport" onclick="" href="index.php?do=booking_report&start_date=<?php echo $_GET["start_date"] ?>&end_date=<?php echo $_GET["end_date"] ?>&bokid=<?php echo $row["bokid"] ?>">Delete</a> </td> 
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

<script>
function delte_booking(bokid) 
{ 

    var url=document.URL;
    
}
</script>