<?php 
	$bok_descityid=isset($_GET["bok_descityid"]) ? addslashes($_GET["bok_descityid"]):"";
	$bokdate=isset($_GET["bokdate"]) ? addslashes($_GET["bokdate"]):"";
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
                                    <h2><i class="fa fa-home"></i> <a href="index.php?do=home">Home</a> / Recipt </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
									<form class="form-horizontal form-label-left" enctype="multipart/form-data" method="get" action="index.php" novalidate>
									<input type="hidden" name="do" value="recipt">
										<?php if(isset($msg)) echo $msg;?>
                                       <center> <span class="section"><b>SEARCH PARCEL RECIPT</b></span></center>
										<div class="item form-group">  
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
											<div class="col-md-3 col-sm-3 col-xs-12">
												<label>Date *</label>  
                                                <input id="name" class="form-control"  name="bokdate" value="<?php echo $bokdate; ?>" required="required" type="date"> 
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
if($_GET["do"]=="recipt" && isset($_GET["bok_descityid"]) && isset($_GET["bokdate"]))
{ 
	$bok_descityid=$_GET["bok_descityid"];
	$bokdate=$_GET["bokdate"];
?>				
<div class="">
		<div class="clearfix"></div>
        <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel"> 
                                <div class="x_title">
									<h2><i class="fa fa-home"></i> <a href="index.php?do=home">Home</a> / Recipt </h2>
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
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="printableArea">
                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                            <thead>
                                <tr class="headings">
                                    <th>Dispatch Date</th>
                                    <th>Memo No</th>
                                    <th>Total Amount</th>  
                                    <th>Paid Status</th>  
                                    <th>Paid Amount</th> 
                                     <th>back Dept</th> 
                                    <th>Action</th> 
                                  
                                </tr>
                            </thead>
							<tbody>
							<?php 
							$SrNo=1;
							if($bok_descityid==0)
							{
								$sql="select *,SUM(bok_total) as total_bok_amt from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) left join des_city_place dcp on(dcp.dcplace_ctyid=dc.dcty_id) where bok_status='1' &&  bok_loaddate='$bokdate' group by bok_memo";
							}
							else	
							{
								$sql="select *,SUM(bok_total) as total_bok_amt from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) left join des_city_place dcp on(dcp.dcplace_ctyid=dc.dcty_id) where bok_status='1' && bok_loaddate='$bokdate' && bok_descityid='$bok_descityid' group by bok_memo";
							}								
							$result=mysql_query($sql) or die(mysql_error());
							while($row=mysql_fetch_array($result))
							{  
								$sql_rec="select *,SUM(recptamt) as amt from recipt where recptmemono=".$row["bok_memo"]." group by recptmemono";
								$f_rec=mysql_fetch_array(mysql_query($sql_rec));
								$count=mysql_num_rows(mysql_query($sql_rec));
							?> 
								<tr class="even pointer">
                                    <td class="a-center "> <?php echo $row["bok_loaddate"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["bok_memo"]; ?></td>  
                                    <td class="a-center "> <?php echo $row["total_bok_amt"]; ?></td>   
                                    <td class="a-center "> <?php if($count==0){ echo "pending";} else { echo "paid"; } ?></td>   
                                    <td class="a-center ">
										<?php if($count==0){ echo "0";} else { echo $f_rec["amt"]; } ?>
									</td> 
                                                                        <td>
                                                                        <?php if($count==0){ echo "0";} else { echo $row["total_bok_amt"]-$f_rec["amt"]; } ?>
                                                                        </td>   
                                                                        
									<td>  
									<script>
									function Addpayment<?php echo $SrNo;?>()
									{   
										var recptmemono=<?php echo $row["bok_memo"]; ?>;  
										var recptamt=pay<?php echo $SrNo;?>.recptamt.value;   
										$.post("<?php echo $sitename;?>make_payment.php",{recptmemono:recptmemono,recptamt:recptamt},function(data)
										{ 
											$("#show_SuccessMsg<?php echo $SrNo;?>").html(data);
										}); 
									}
									</script>
										<span id="show_SuccessMsg<?php echo $SrNo;?>"></span>
										<form name="pay<?php echo $SrNo;?>"  action="" method="post" > 
											<div class="col-md-6 col-sm-6 col-xs-12">
												  <input id="name" placeholder="Ammount" class="form-control col-md-7 col-xs-12" name="recptamt" value="0"  required="required" type="text">
											</div> 
                                                                                    <button id="send" type="button" onclick="return Addpayment<?php echo $SrNo;?>();" class="btn btn-success">Add Payment </button> 
										</form> 
                                                                                     
											
									</td> 
                                                                        
                                </tr> 
							<?php $SrNo++; } ?>	 	
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