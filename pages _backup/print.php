<?php 
	$bok_descityid=isset($_GET["bok_descityid"]) ? addslashes($_GET["bok_descityid"]):"";
	$bok_by=isset($_GET["bok_by"]) ? addslashes($_GET["bok_by"]):"";
	$start_lr=isset($_GET["start_lr"]) ? addslashes($_GET["start_lr"]):"";
	$end_lr=isset($_GET["end_lr"]) ? addslashes($_GET["end_lr"]):"";
        $memo_no=isset($_GET["memo_no"]) ? addslashes($_GET["memo_no"]):"";
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
                                    <h2><i class="fa fa-home"></i> <a href="index.php?do=home">Home</a> / print </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
									<form class="form-horizontal form-label-left" enctype="multipart/form-data" method="get" action="index.php" novalidate>
									<input type="hidden" name="do" value="print">
										<?php if(isset($msg)) echo $msg;?>
                                       <center> <span class="section"><b>PARCEL PRINT</b></span></center>
										<div class="item form-group">  
                                                                                      <div class="col-md-3 col-sm-3 col-xs-12">
											<label>By *</label> 
												 <select name="bok_by" style="width:250px;height:35px;" id="main-select" onChange="getBox(this.value)" required="required" >
                                                                                                    <option value="1" <?php if($bok_by==1) echo "selected";?>>By City</option>
												     <option value="2" <?php if($bok_by==2) echo "selected";?>>By LR No.</option>
                                                                                                     <option value="3" <?php if($bok_by==2) echo "selected";?>>BY Memo</option>
														
												</select> 
                                                                                        </div> 
                                            <div id="city" class="col-md-3 col-sm-3 col-xs-12">
											<label>Destination City *</label> 
												 <select name="bok_descityid" style="width:250px;height:35px;" id="name"  required="required" >
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
                                                                                     <div id="lr" class="col-md-6 col-sm-6 col-xs-12">
											 
                                                                                       <div class="col-md-3 col-sm-3 col-xs-12">
															<label>Start LR No*</label> 
															<input id="name" class="form-control col-md-7 col-xs-12"  name="start_lr" value="<?php echo $start_lr; ?>" required="required" type="text">
														
                                                                                       </div>
                                                                                        <div class="col-md-3 col-sm-3 col-xs-12">
															<label>End LR No*</label> 
															<input id="name" class="form-control col-md-7 col-xs-12"  name="end_lr" value="<?php echo $end_lr; ?>" required="required" type="text">
                                                                                        </div>
                                                                                    </div>
                                                                                     <div id="memo_no" class="col-md-6 col-sm-6 col-xs-12">
											 
                                                                                      <div class="col-md-3 col-sm-3 col-xs-12">
															<label>Memo No.</label> 
															<input class="form-control col-md-7 col-xs-12"  name="memo_no" value="<?php echo $memo_no; ?>"  type="text">
														
                                                                                       </div>
                                                                                    </div>
                                                                                 
<!--											<div class="col-md-3 col-sm-3 col-xs-12">
												<label>Date *</label>  
                                                <input id="name" class="form-control"  name="bokdate" value="<?php echo $bokdate; ?>" required="required" type="date"> 
											</div> -->
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
if($_GET["do"]=="print" && isset($_GET["bok_descityid"]) && isset($_GET["bok_by"]) && isset($_GET["start_lr"]) && isset($_GET["end_lr"]) || isset($_GET["memo_no"]))
{ 
	$bok_descityid=$_GET["bok_descityid"];
	$bokby=$_GET["bok_by"];
        $start_lr=$_GET["start_lr"];
        $end_lr=$_GET["end_lr"];
         $memo_no=$_GET["memo_no"];
        
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
                                    <th>Date</th>
                                    <th>Lr no </th>
                                    <th>Sender</th>
                                    <th>Reciver</th>
                                    <th>City</th>
                                    <th>Status</th>
                                    <th>Loaded Ammount</th>
                                    <th>Big Parcel</th>
                                    <th>Small Parcel</th>  
                                </tr>
                            </thead>
							<tbody>
							<?php
                                                        if($bokby==2)
                                                        {
                                                          $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where boklrno BETWEEN  '$start_lr' AND '$end_lr'";	 
                                                        }
                                                        elseif($bokby==3)
                                                        {
                                                            $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_memo=$memo_no";	 
                                                        }
                                                        elseif($bok_descityid==0 && $bokby==1)
                                                        {
                                                         $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid)"; 	    
                                                        }
							else
                                                        {
                                                        $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok.bok_descityid='$bok_descityid'"; 	 
                                                        }
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
?>	<script>
  

     var city = document.getElementById("city");
        var lr = document.getElementById("lr");
        var memo = document.getElementById("memo_no");
       
//       if(document.getElementById("main-select").value==0)
//       {
//        city.style.display='none';
//        lr.style.display='none';        
//    }
lr.style.display='none';
memo.style.display='none';
</script>
<script>
<?php 
if($start_lr)
{
    $bok_descityid=0;
}
if($bok_descityid && $bok_descityid>0)
{ ?>
    lr.style.display='none';
    memo.style.display='none';
    city.style.display='block';
<?php
}
elseif($_GET["start_lr"])
{ ?>
    lr.style.display='block';
    city.style.display='none';
    memo.style.display='none';
    <?php
}
else{ ?>
    memo.style.display='block';
    lr.style.display='none';
    city.style.display='none';
<?php }

?>
    </script>
<script>
function getBox(value) 
{
    if(value==1)
    {
        city.style.display='block';
        lr.style.display='none';
        memo.style.display='none';
    }
    else if(value==2)
    {
       city.style.display='none';
       memo.style.display='none';
        lr.style.display='block';
    }
    else
    {
        city.style.display='none';
        lr.style.display='none';
        memo.style.display='block';
    }
   
}

</script>