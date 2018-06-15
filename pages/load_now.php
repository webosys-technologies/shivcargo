	

<?php $bok_descityid=isset($_GET["bok_descityid"]) ? addslashes($_GET["bok_descityid"]):"";  
$tab=isset($_REQUEST["tab"]) ? $_REQUEST["tab"]:"tab_content1";


if(isset($_GET["bokid"]))
{ 

	$bok_loaddate=date("Y-m-d");
        $bok_loadtime= date("h:i:s");
       	$bok_memo1=rand(100,100000);
	$SrNo=1;
        $bok_memo_total=0;
	
?>
<div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Add memo</h2> 
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">  
                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                            <li role="presentation" class="<?php if($tab=="tab_content1"){ echo 'active'; }?>"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Load In new memo</a>
                                            </li>
                                            <li role="presentation" class="<?php if($tab=="tab_content2"){ echo 'active'; }?>"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">Load In Existing Memo</a>
                                            </li> 
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade <?php if($tab=="tab_content1"){ echo 'active in'; }?>" id="tab_content1" aria-labelledby="profile-tab">  
												
                                            			<?php

        foreach($_GET["bokid"] as $newbokid)
	{ 
            
		$do_unloaded_parcel="do_unloaded".$SrNo;
		$bok_amt="bok_amt".$SrNo;
		$bok_privatemark="bok_privatemark".$SrNo;
                
                $bok_drivername="bok_drivername";
                $bok_drivermobile="bok_drivermobile";
                $bok_vehicleno="bok_vehicleno";
                $bok_total="bok_total".$newbokid;  
              //  $bok_cross="bok_cross".$newbokid; 
		$bokid="bokid".$SrNo;
		$cityid="cityid".$SrNo;
                
                $bok_total=$_GET[$bok_total];
               // $bok_cross=$_GET[$bok_cross];
                $sql2="update booking set bok_total='$bok_total' where bokid='$newbokid'";
                mysql_query($sql2);
                
               // $dcplace_id=$_GET["dcplace_id".$newbokid];
                // $sql3="update des_city_place set dcplace_crossing='$bok_cross' where dcplace_id='$dcplace_id'";
                // mysql_query($sql3);
                
		if(isset($_POST[$do_unloaded_parcel])) 
		{
                    
			$number=$_POST["number"];
//			$bok_amt=$_POST[$bok_amt];
//			$bok_privatemark=$_POST[$bok_privatemark];
                        
                        $bok_drivername=$_POST[$bok_drivername];
                        $bok_drivermobile=$_POST[$bok_drivermobile];
                        $bok_vehicleno=$_POST[$bok_vehicleno];
                        
			$bokid=$_POST[$bokid];
			$cityid=$_POST[$cityid];
			$bok_memo=$cityid.$bok_memo1;
                        $bok_memo_total=$bok_memo_total+$bok_total;
                        
//			//bok_freight
                        $sql_updt="update booking set bok_loaddate='$bok_loaddate',bok_loadtime='$bok_loadtime',bok_drivername='$bok_drivername',bok_drivermobile='$bok_drivermobile',bok_vehicleno='$bok_vehicleno',bok_memo_total='$bok_memo_total',bok_memo='$bok_memo',bok_status='1' where bokid='$bokid'";
                        
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
									   <b>Date</b> :  <?php echo date_format(date_create($row["bokdate"]),"d-m-Y"); ?>&nbsp;&nbsp;&nbsp;
									   <b>Lr no </b> :  <?php echo $row["boklrno"]; ?>&nbsp;&nbsp;&nbsp;
									   <b>No of parcel</b> :  <?php echo $row["bok_item"]; ?>&nbsp;&nbsp;&nbsp;
									   <b>Sender</b> :  <?php echo $row["sendname"]; ?>&nbsp;&nbsp;&nbsp;
									   <b>Sender GST</b> :  <?php echo $row["sendgstno"]; ?>&nbsp;&nbsp;&nbsp;
									   <b>Reciver</b> :  <?php echo $row["recvname"]; ?>&nbsp;&nbsp;&nbsp;
									   <b>Reciver GST</b> :  <?php echo $row["recvgstno"]; ?>&nbsp;&nbsp;&nbsp;
									   <b>City Name</b> :  <?php echo $row["dcty_name"]; ?><br/><br/>
                                                                           </div
									   <input type="hidden" name="do_unloaded_parcel<?php echo $SrNo; ?>" value="true"> 
                                                                           <input type="hidden" name="do_unloaded<?php echo $SrNo; ?>" value="true"> 
									   <input type="hidden" name="bokid<?php echo $SrNo; ?>" value="<?php echo $newbokid;?>"> 
									   <input type="hidden" name="cityid<?php echo $SrNo; ?>" value="<?php echo $row["bok_descityid"]; ?>"> 
<!--										<div class="item form-group">  
                                            <div class="col-md-3 col-sm-3 col-xs-12"> 
                                                <input id="name" class="form-control col-md-7 col-xs-12" placeholder="Enter Ammount" name="bok_amt<?php echo $SrNo; ?>" value="<?php echo $row["bok_freight"]; ?>" required="required" type="text"> 
                                            </div>   
                                            <div class="col-md-3 col-sm-3 col-xs-12">  
                                                <input id="name" class="form-control col-md-7 col-xs-12" placeholder="Private Mark" name="bok_privatemark<?php echo $SrNo; ?>" value="<?php echo $row["bok_privatemark"]; ?>" required="required" type="text">
                                            </div>  
                                               </div> <hr/>-->

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

									
                                            </div> 
                                            <div role="tabpanel" class="tab-pane fade <?php if($tab=="tab_content2"){ echo 'active in'; }?>" id="tab_content2" aria-labelledby="home-tab">  
						
                                                
                                                
                                                <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="" novalidate>
													<input type="hidden" name="do" value="load_now"> 
													<input type="hidden" name="tab" value="tab_content2"> 
													<center> <span class="section"><b>Memo List</b></span></center>
                                                                                                        <?php 
                                                                                                       
	 
                                                                                                        
                                                                                                        
                                                                                                        ?>
													<div class="item form-group">  
														
                                                                                                             <div class="col-md-3 col-sm-3 col-xs-12">
											<label>Destination City *</label> 
												 <select name="bok_descityid" style="width:250px;height:35px;" id="name" onChange="getPackage(this.value)" required="required" >
												 <option value="">Select Destination City</option>
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
                                                			
                                            			<?php	
                                                                
								if(isset($_POST["tab"]) && isset($_POST["bok_descityid"]))
								{
                                                                   
                                                                    $bok_descityid=$_POST["bok_descityid"]; 
                                                                 
                                        if(isset($_POST["do_existing_load"])) 
                                        {
                                         
                                             $SrNo=1;
                                            foreach($_GET["bokid"] as $newbokid)
                                            {
                                              
                                                $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bokid='$newbokid' && bok_status='0'";
                                                $result=mysql_query($sql) or die(mysql_error());
                                                $row=mysql_fetch_array($result);
                                               
                                                if($bok_descityid==$row["bok_descityid"])
                                                {
                                                
                                                $bok_memo_total=$_POST["bok_memo_total"];
                                                $bok_memo=$_POST["bok_memo"];
                                                //$bok_drivername=$_POST["bok_drivername"];
                                                //$bok_drivermobile=$_POST["bok_drivermobile"];
                                                $bok_vehicleno=$_POST["bok_vehicleno"];
                                                if($row["bok_descityid"]==$bok_descityid)
                                                {
                                                  
                                                $bok_total="bok_total".$newbokid;  
                                                $bok_total=$_GET[$bok_total];
                                                
                                                 $bok_memo_total=$bok_memo_total+$bok_total;
                                                
                                                
                                                 $sql_updt5="update booking set bok_loaddate='$bok_loaddate',bok_loadtime='$bok_loadtime',bok_vehicleno='$bok_vehicleno',bok_memo_total='$bok_memo_total',bok_memo='$bok_memo',bok_status='1' where bokid='$newbokid'";  //bok_drivername='$bok_drivername',bok_drivermobile='$bok_drivermobile',

                                                            if(mysql_query($sql_updt5))
                                                            {
//                                                                    if(count($_GET["bokid"])==$SrNo)
//                                                                    {
                                                                            $msg="Parcel Loaded Successfully..<meta http-equiv=refresh content=0;url=index.php?do=make_loaded>";
//                                                                    }
                                                            }
                                                            
                                                }      
                                                
                                                 $sql_updt6="update booking set bok_loaddate='$bok_loaddate',bok_loadtime='$bok_loadtime',bok_vehicleno='$bok_vehicleno',bok_memo_total='$bok_memo_total',bok_status='1' where bok_memo='$bok_memo'";  
                                                 mysql_query($sql_updt6);
                                                }
                                                    $SrNo++;
                                            }
                                             
                                        }
                                                                   
									
										?>
									<!--<button class="btn btn-danger"  onclick="printDiv('printableArea')"><i class="fa fa-print"></i> Print</button>-->
									<div id="printableArea">	
<!--									<span class="section"> 
												<b>SHIV CARGO AGENCY</b><br/>
												A-64 , RAM LAXMAN SANKUL , NEW COTTON MARKET ROAD<br/>
												AMRAVATI PH : 0721-2590820<br/>
												BRANCH : BUSYLAND COMPLEX NANDGAON PETH PH : 0721-2381577<br/>
												BRANCH : CITYLAND COMPLEX , BORGAON DHARMALE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									</span> 	-->
                                                                          <div class="item form-group" id="search_div"> 
								<div class="col-md-4 col-sm-4 col-xs-4">
								<label>Search</label> 
								<input id="search" placeholder="Search..." size="" class="form-control col-md-7 col-xs-12"  name="search" value=""  type="text">
								</div>  
														 
                                                                           </div>  
									<table id="example" class="table table-striped responsive-utilities jambo_table">
										<thead>
											<tr class="headings"> 
												<th>Loaded Date</th>
                                                                                                <th>Memo No.</th>
												<th>TO City</th>
												<th>Vehicle No</th>
												<th>Records</th>
                                                                                                <th>Edit</th>
												
											</tr>
										</thead>
										<tbody id="search_report">
										<?php  
									    
                                                                                if($bok_descityid==0)
                                                                                {
//                                                                                        $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_loaddate='$bok_loaddate' AND bok_status='1'";	 
                                                                                        $sql="select *, COUNT(*) as count from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_status='1' GROUP BY bok_memo ORDER BY bok_loaddate DESC";	 
                                                                                        
                                                                                } 
                                                                                else
                                                                                {
                                                                                        $sql="select *, COUNT(*) as count from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bok_descityid='$bok_descityid' AND bok_status='1' GROUP BY bok_memo ORDER BY bok_loaddate DESC";	 
                                                                                        
                                                                                }
										$result=mysql_query($sql) or die(mysql_error());
//										
                                                                                
                                                                             
										while($row=mysql_fetch_array($result))
										{
//                                                                              
                                                                                    $memo=$row["bok_memo"];
										?> 
                                                                                     <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="" novalidate>
                                                                                   
                                                                                         
                                                                                <input type="hidden" name="do" value="load_now"> 
                                                                                <input type="hidden" name="tab" value="tab_content2"> 
                                                                                <input type="hidden" name="do_existing_load" value="true"> 
                                                                                
											<tr class="even pointer">  
												<td class="a-center "><?php echo date_format(date_create($row["bok_loaddate"]),"d-m-Y"); ?></td>  
												<td class="a-center "> <?php echo $row["bok_memo"]; ?></td>   
												<td class="a-center "> <?php echo $row["dcty_name"]; ?></td>   
                                                                                                <td class="a-center "> <input id="name" class="form-control col-md-7 col-xs-12" placeholder="Vehicle Number" name="bok_vehicleno" value="<?php echo $row["bok_vehicleno"]; ?>" type="text"></td>   
												<td class="a-center "> <?php echo $row["count"]; ?></td>  
                                                                                                <td class="a-center ">
                                                                                                    
                                                                                                    <input type="hidden" name="bok_loaddate" value="<?php echo date_format(date_create($row["bok_loaddate"]),"d-m-Y"); ?>">
                                                                                                    <input type="hidden" name="bok_memo" value="<?php echo $row["bok_memo"]; ?>">
                                                                                                    <input type="hidden" name="bok_descityid" value="<?php echo $row["dcty_id"]; ?>">
                                                                                                    <input type="hidden" name="bok_memo_total" value="<?php echo $row["bok_memo_total"]; ?>"> 
                                                                                                    <button type="submit" class="btn btn-success">LOAD NOW</button></td> 
                                                                                                                                
											</tr> 
                                                                                          </form>
										<?php } ?>		
										</tbody>
									</table> 
                                                                               
									</div>
                                                                <?php } ?>
                                                
                                           </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
<?php
}
?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<script>


   $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#search_report tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  
  
</script>