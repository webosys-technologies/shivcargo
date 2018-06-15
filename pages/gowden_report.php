
<?php 
	$bok_descityid=isset($_GET["bok_descityid"]) ? addslashes($_GET["bok_descityid"]):"0"; 
        $start_date=isset($_GET["start_date"]) ? addslashes($_GET["start_date"]):"";
	$end_date=isset($_GET["end_date"]) ? addslashes($_GET["end_date"]):"";
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
															<label>Start Date</label> 
															<input id="start_date" class="form-control col-md-7 col-xs-12"  name="start_date" value="<?php echo $start_date; ?>"  type="text">
														</div>  
														<div class="col-md-3 col-sm-3 col-xs-12">
															<label>End Date</label> 
															<input id="end_date" class="form-control col-md-7 col-xs-12"  name="end_date" value="<?php echo $end_date; ?>"  type="text">
														</div>  
                                        </div>
										<div class="item form-group">  
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
                                            <div class="row">
                                      <div class="item form-group"> 
                                      <div class="col-md-4 col-sm-4 col-xs-12">
                                                <label>Search</label> 
                                                <input id="search" placeholder="Search..." size=""  class="form-control col-md-7 col-xs-12"  name="search" value=""  type="text">
                                                </div>
                                          </div>
                                          </div><br>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="printableArea">
                        <div class="row">
                            <?php 
                            $root=1;
                            while($root <= 4) {
                            ?>
                            <div class="col-md-3 col-sm-3 col-xs-3" style="padding:0px !important;">
                            <table id="example" class="table table-striped responsive-utilities jambo_table">
                            
                            
                                <thead style="background-color: #218bb6 !important;">
                                <tr class="headings">
                                    <th colspan="2" style='text-align: center;'>ROOT <?php echo $root; ?></th>
                                </tr>
                            </thead>
                            <thead>
                                <tr class="headings">
                                    <th>City</th>
                                    <th>Parcel</th>
                                </tr>
                            </thead>
							<tbody id="search_report">
							<?php 
							$smltotal=0;
							$bigtotal=0; 
							$total=0;
//				                       
                                                        if($bok_descityid=="no")
                                                        {
                                                            $sql="select *, SUM(bok_item) as parcel_count from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bokdate BETWEEN  '$start_date' AND '$end_date' AND bok_status='0' GROUP BY dcty_name";	 
                                                            //$export_sql="select bokdate,boktime,boklrno,sendname,sendgstno,recvname,recvgstno,bok_vehicleno,bok_memo,bok_paymode,dcplace_name,CASE WHEN bok_status = 0 THEN 'Unloaded' ELSE 'Loaded' END,bok_loaddate,bok_total,bok_item from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bokdate BETWEEN  '$start_date' AND '$end_date'";	

                                                        }
                                                        elseif($bok_descityid==0)
                                                        {

                                                            $sql="select *, SUM(bok_item) as parcel_count from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_status='0' GROUP BY dcty_name";	 
                                                           // $export_sql="select bokdate,boktime,boklrno,sendname,sendgstno,recvname,recvgstno,bok_vehicleno,bok_memo,bok_paymode,dcplace_name,CASE WHEN bok_status = 0 THEN 'Unloaded' ELSE 'Loaded' END,bok_loaddate,bok_total,bok_item from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid)";	
                                                        }
                                                        elseif($start_date=="" AND $end_date=="")
                                                        {
                                                            $sql="select *, SUM(bok_item) as parcel_count from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' AND bok_status='0' GROUP BY dcty_name";	 
                                                           // $export_sql="select bokdate,boktime,boklrno,sendname,sendgstno,recvname,recvgstno,bok_vehicleno,bok_memo,bok_paymode,dcplace_name,CASE WHEN bok_status = 0 THEN 'Unloaded' ELSE 'Loaded' END,bok_loaddate,bok_total,bok_item from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid'";	
                                                        }
                                                        else
                                                        {
                                                            $sql="select *, SUM(bok_item) as parcel_count from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bokdate BETWEEN  '$start_date' AND '$end_date' AND bok_descityid='$bok_descityid' AND bok_status='0' GROUP BY dcty_name";	 
                                                           // $export_sql="select bokdate,boktime,boklrno,sendname,sendgstno,recvname,recvgstno,bok_vehicleno,bok_memo,bok_paymode,dcplace_name,CASE WHEN bok_status = 0 THEN 'Unloaded' ELSE 'Loaded' END,bok_loaddate,bok_total,bok_item from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' AND bokdate BETWEEN  '$start_date' AND '$end_date'";	
                                                        }
                                                        
                                                       
							$result=mysql_query($sql) or die(mysql_error());
                                                        $total_parcel=0;
                                                        $c=0;
							while($row=mysql_fetch_array($result))
							{ 
								
								$total=$total+$row["bok_total"];
							?>
                                                                 
								<tr class="even pointer">
                                                                    <?php 
                                                                    if($row["dcty_root"]==$root)
                                                                    {   
                                                                        $c++;
                                                                        $total_parcel=$total_parcel+$row["parcel_count"];
                                                                        ?>
                                                                        <td class="a-center "> <?php echo $row["dcty_name"]; ?></td>
                                                                        <td class="a-center "> <?php echo $row["parcel_count"]; ?></td>
                                                                    <?php 
                                                                    }
                                                                    
                                                                    ?>	
                                                                 </tr>
								
							<?php } 
                                                        
                                                        
                                                        ?>
								<tr> 
                                                                   	 <td class="a-center "> Total </td>
									 <td class="a-center "> <?php echo $total_parcel; ?></td>
                                                                </tr>	 
                            </tbody>
						</table>
                                </div>
                            <?php
                            $root++;
                            }
                            ?>
                            
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


   $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#search_report tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
</script>
<script type="text/javascript">
      $(function () {
          $("#start_date").datepicker({ dateFormat: 'dd-mm-yy',changeMonth: true,changeYear: true,showAnim: 'slide'});
          //$('#start_date').datepicker('setDate', 'today');
      });
  </script>
 <script type="text/javascript">
      $(function () {
          $("#end_date").datepicker({ dateFormat: 'dd-mm-yy',changeMonth: true,changeYear: true,showAnim: 'slide'});
        //  $('#end_date').datepicker('setDate', 'today');
      });
  </script>