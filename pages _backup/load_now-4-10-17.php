<?php
if(isset($_GET["bokid"]))
{ 
  
	$bok_loaddate=date("Y-m-d");
	$bok_memo1=rand(100,100000);
	$SrNo=1;
	foreach($_GET["bokid"] as $newbokid)
	{ 
		$do_unloaded_parcel="do_unloaded_parcel".$SrNo;
		$bok_amt="bok_amt".$SrNo;
		$bok_privatemark="bok_privatemark".$SrNo;
                
                $bok_drivername="bok_drivername";
                $bok_drivermobile="bok_drivermobile";
                $bok_vehicleno="bok_vehicleno";
                                
		$bokid="bokid".$SrNo;
		$cityid="cityid".$SrNo;
		if(isset($_POST[$do_unloaded_parcel])) 
		{
			$number=$_POST["number"];
			$bok_amt=$_POST[$bok_amt];
//			$bok_privatemark=$_POST[$bok_privatemark];
                        
                        $bok_drivername=$_POST[$bok_drivername];
                        $bok_drivermobile=$_POST[$bok_drivermobile];
                        $bok_vehicleno=$_POST[$bok_vehicleno];
                        
			$bokid=$_POST[$bokid];
			$cityid=$_POST[$cityid];
			$bok_memo=$cityid.$bok_memo1;
//			//bok_freight
                        $sql_updt="update booking set bok_freight='$bok_amt',bok_loaddate='$bok_loaddate',bok_drivername='$bok_drivername',bok_drivermobile='$bok_drivermobile',bok_vehicleno='$bok_vehicleno',bok_memo='$bok_memo',bok_status='1' where bokid='$bokid'";
                        
			if(mysql_query($sql_updt))
			{
				if($number-1==$SrNo)
				{
					$msg="Parcel Loaded Successfully..<meta http-equiv=refresh content=0;url=index.php?do=make_loaded>";
				}
			}
		}
		$SrNo++;
	}
?>
			<div class="">
				<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
                                <div class="x_title">
                                    <h2><i class="fa fa-home"></i> <a href="index.php?do=home">Home</a> / <a href="index.php?do=unloaded_parcel">Unloaded Parcel</a> / Load Parcel</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
										<?php if(isset($msg)) echo $msg;?>
                                       <center> <span class="section"><b>LOAD PARCEL</b></span></center> 
									<form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="" novalidate>
<?php  
	$SrNo=1;
	foreach($_GET["bokid"] as $newbokid)
	{ 
		$sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bokid='$newbokid' && bok_status='0'";
		$result=mysql_query($sql) or die(mysql_error());
		$row=mysql_fetch_array($result);
?>  
                                                                            <div>
									   <b>Date</b> :  <?php echo $row["bokdate"]; ?>&nbsp;&nbsp;&nbsp;
									   <b>Lr no </b> :  <?php echo $row["boklrno"]; ?>&nbsp;&nbsp;&nbsp;
									   <b>No of parcel</b> :  <?php echo $row["bok_parcel"]; ?>&nbsp;&nbsp;&nbsp;
									   <b>Sender</b> :  <?php echo $row["sendname"]; ?>&nbsp;&nbsp;&nbsp;
									   <b>Sender GST</b> :  <?php echo $row["sendgstno"]; ?>&nbsp;&nbsp;&nbsp;
									   <b>Reciver</b> :  <?php echo $row["recvname"]; ?>&nbsp;&nbsp;&nbsp;
									   <b>Reciver GST</b> :  <?php echo $row["recvgstno"]; ?>&nbsp;&nbsp;&nbsp;
									   <b>City Name</b> :  <?php echo $row["dcty_name"]; ?><br/><br/>
                                                                           </div
									   <input type="hidden" name="do_unloaded_parcel<?php echo $SrNo; ?>" value="true"> 
									   <input type="hidden" name="bokid<?php echo $SrNo; ?>" value="<?php echo $newbokid;?>"> 
									   <input type="hidden" name="cityid<?php echo $SrNo; ?>" value="<?php echo $row["bok_descityid"]; ?>"> 
										<div class="item form-group">  
                                            <div class="col-md-3 col-sm-3 col-xs-12"> 
                                                <input id="name" class="form-control col-md-7 col-xs-12" placeholder="Enter Ammount" name="bok_amt<?php echo $SrNo; ?>" value="<?php echo $row["bok_freight"]; ?>" required="required" type="text"> 
                                            </div>   
<!--                                            <div class="col-md-3 col-sm-3 col-xs-12">  
                                                <input id="name" class="form-control col-md-7 col-xs-12" placeholder="Private Mark" name="bok_privatemark<?php echo $SrNo; ?>" value="<?php echo $row["bok_privatemark"]; ?>" required="required" type="text">
                                            </div>  -->
                                               </div> <hr/>

<?php
	$SrNo++;
	} 
?>		<div class="item form-group"> 
                                                                                     <div class="col-md-3 col-sm-3 col-xs-12">  
                                                <input id="name" class="form-control col-md-7 col-xs-12" placeholder="Driver Name" name="bok_drivername" value="<?php echo @$_POST["bok_drivername"];?>" required="required" type="text">
                                            </div> 
                                            <div class="col-md-3 col-sm-3 col-xs-12">  
                                                <input id="name" class="form-control col-md-7 col-xs-12" placeholder="Driver Mobile Number" name="bok_drivermobile" value="<?php echo @$_POST["bok_drivermobile"];?>" required="required" type="text">
                                            </div> 
                                            <div class="col-md-3 col-sm-3 col-xs-12">  
                                                <input id="name" class="form-control col-md-7 col-xs-12" placeholder="Vehicle Number" name="bok_vehicleno" value="<?php echo @$_POST["bok_vehicleno"];?>" required="required"  type="text">
                                            </div>  
</div>
                                        
										<input type="hidden" name="number" value="<?php echo $SrNo;?>">
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <button id="send" type="submit" class="btn btn-success">LOAD</button>
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
}
?>				