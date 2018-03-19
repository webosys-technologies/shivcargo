<?php 
	$bok_descityid=isset($_GET["bok_descityid"]) ? addslashes($_GET["bok_descityid"]):"no";
        $start_load_date=isset($_GET["start_load_date"]) ? addslashes($_GET["start_load_date"]):"";;
        $end_load_date=isset($_GET["end_load_date"]) ? addslashes($_GET["end_load_date"]):"";
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
									<input type="hidden" name="do" value="account_report">
										<?php if(isset($msg)) echo $msg;?>
                                       <center> <span class="section"><b>SEARCH ACCOUNT REPORT</b></span></center>
                                       <div class="item form-group"> 
                                     
											 
                                                                                       <div class="col-md-3 col-sm-3 col-xs-12">
															<label>Start Load Date</label> 
															<input id="start_date" class="form-control col-md-7 col-xs-12"  name="start_load_date" value="<?php echo $start_load_date; ?>"  type="text">
														
                                                                                       </div>
                                                                                        <div class="col-md-3 col-sm-3 col-xs-12">
															<label>End Load Date</label> 
															<input id="end_date" class="form-control col-md-7 col-xs-12"  name="end_load_date" value="<?php echo $end_load_date; ?>" type="text">
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
if(isset($_GET["bok_descityid"]))
{ 
	$bok_descityid=$_GET["bok_descityid"];
        
        if($bok_descityid=="no")
        {

           $sql="select *, COUNT(*) as count from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_loaddate BETWEEN '$start_load_date' AND '$end_load_date' AND bok_status='1' GROUP BY bok_memo";
           $export_sql="select bok_loaddate,bok_memo,dcty_name,bok_vehicleno,COUNT(*) as count,SUM(bok_total) as memo_ttl from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_loaddate BETWEEN '$start_load_date' AND '$end_load_date' AND bok_status='1' GROUP BY bok_memo";
            
        }
        elseif($bok_descityid==0)
        {

            $sql="select *, COUNT(*) as count from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_status='1' GROUP BY bok_memo";	 
            $export_sql="select bok_loaddate,bok_memo,dcty_name,bok_vehicleno,COUNT(*) as count,SUM(bok_total) as memo_ttl from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_status='1' GROUP BY bok_memo";	 
        }

        elseif($start_load_date=="" AND $end_load_date=="")
        {

           $sql="select *, COUNT(*) as count from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' AND bok_status='1' GROUP BY bok_memo";
           $export_sql="select bok_loaddate,bok_memo,dcty_name,bok_vehicleno,COUNT(*) as count,SUM(bok_total) as memo_ttl from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' AND bok_status='1' GROUP BY bok_memo";
        }
        else
        {


            $sql="select *, COUNT(*) as count from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' AND bok_loaddate BETWEEN '$start_load_date' AND '$end_load_date' AND bok_status='1' GROUP BY bok_memo";
            $export_sql="select bok_loaddate,bok_memo,dcty_name,bok_vehicleno,COUNT(*) as count,SUM(bok_total) as memo_ttl from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' AND bok_loaddate BETWEEN '$start_load_date' AND '$end_load_date' AND bok_status='1' GROUP BY bok_memo";
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
						<a class="btn btn-success"  href="<?php echo $sitename;?>export_account_report.php?sql=<?php echo $export_sql;?>">
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
                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                            <thead>
                                <tr class="headings"> 
                                    <th>Memo date</th>
                                    <th>Memo No </th> 
                                    <th>City</th>
                                    <th>Vehicle No.</th>
                                    <th>Parcel Total</th>
                                    <th>Ammount</th>
<!--                                    <th>Comission</th>  -->
                                     <th>Report</th>  
                                </tr>
                            </thead>
							<tbody id="search_report">
							<?php 
							                                                       
                                                        
                                                        
							$result=mysql_query($sql) or die(mysql_error());
							while($row=mysql_fetch_array($result))
							{
                                                            
                                                             $memo_no=$row["bok_memo"];
                                                                $sql_rec1="select *,SUM(bok_total) as memo_ttl from booking where bok_memo='$memo_no'";
								$f_rec1=mysql_fetch_array(mysql_query($sql_rec1));
								$count1=mysql_num_rows(mysql_query($sql_rec1));
                                                                
                                                                $calcu_commi=$row["bok_total"]*$row["dcty_cutrate"]/100;
                                                                $memototal_after_commi=$f_rec1["memo_ttl"]-$calcu_commi;
							?>
                                <form method="post" action="">
								<tr class="even pointer">  
                                    <td class="a-center "> <?php echo $row["bok_loaddate"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["bok_memo"]; ?></td>  
                                     <td class="a-center "> <?php echo $row["dcty_name"]; ?></td>     
                                    <td class="a-center "> <?php echo $row["bok_vehicleno"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["count"]; ?></td>
                                    <td class="a-center "> <?php echo $f_rec1["memo_ttl"]; ?></td>  
<!--                                    <td class="a-center "> <?php echo $row["bok_total"]*$row["dcty_cutrate"]/100; ?></td>  -->
                                    <td class="a-center "><a class="button-getReport" href="index.php?do=dispatch&tab=tab_content2&bok_loaddate=<?php echo $row["bok_loaddate"] ?>&bok_memo=<?php echo $row["bok_memo"] ?>">Get Report</a></td>  
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
          $('#start_date').datepicker('setDate', 'today');
      });
  </script>
 <script type="text/javascript">
      $(function () {
          $("#end_date").datepicker({ dateFormat: 'dd-mm-yy',changeMonth: true,changeYear: true,showAnim: 'slide'});
          $('#end_date').datepicker('setDate', 'today');
      });
  </script>