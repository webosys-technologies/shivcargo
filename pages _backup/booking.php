<style>
    .control-label
    {
        text-align: left !important;
    }
    select[name="dcplace_id"]
    {
        width: 234px !important; height: 35px !important;
    }
    </style>
<?php 

//--------------------------------------------------------------------------------------------------
// All variables Declaration
//--------------------------------------------------------------------------------------------------
	$sendname=isset($_POST["sendname"]) ? addslashes($_POST["sendname"]):"";
	$sendaddress=isset($_POST["sendaddress"]) ? addslashes($_POST["sendaddress"]):"";
	$sendmobile=isset($_POST["sendmobile"]) ? addslashes($_POST["sendmobile"]):""; 
	$sendgstno=isset($_POST["sendgstno"]) ? addslashes($_POST["sendgstno"]):"";
	$recvname=isset($_POST["recvname"]) ? addslashes($_POST["recvname"]):"";
	$recvaddress=isset($_POST["recvaddress"]) ? addslashes($_POST["recvaddress"]):"";
	$recvmobile=isset($_POST["recvmobile"]) ? addslashes($_POST["recvmobile"]):"";
	$recvgstno=isset($_POST["recvgstno"]) ? addslashes($_POST["recvgstno"]):"";
	$boklrno=isset($_POST["boklrno"]) ? addslashes($_POST["boklrno"]):""; 
	$bok_srccitybranchid=isset($_POST["bok_srccitybranchid"]) ? addslashes($_POST["bok_srccitybranchid"]):""; 
	$bokdate=isset($_POST["bokdate"]) ? addslashes($_POST["bokdate"]):"";
	$boktime=isset($_POST["boktime"]) ? addslashes($_POST["boktime"]):"";
	$bok_descityid=isset($_POST["bok_descityid"]) ? addslashes($_POST["bok_descityid"]):"";
//	$bok_cityplaceid=isset($_POST["bok_cityplaceid"]) ? addslashes($_POST["bok_cityplaceid"]):"";
	$bok_cityplaceid=isset($_POST["dcplace_id"]) ? addslashes($_POST["dcplace_id"]):"";
	$bok_paymode=isset($_POST["bok_paymode"]) ? addslashes($_POST["bok_paymode"]):"";
	$bok_parcel=isset($_POST["bok_parcel"]) ? addslashes($_POST["bok_parcel"]):"";
	$bok_pivatemark=isset($_POST["bok_pivatemark"]) ? addslashes($_POST["bok_pivatemark"]):"";
	$bok_item=isset($_POST["bok_item"]) ? addslashes($_POST["bok_item"]):"";
	$bok_freight=isset($_POST["bok_freight"]) ? addslashes($_POST["bok_freight"]):"";
	$bok_hamali=isset($_POST["bok_hamali"]) ? addslashes($_POST["bok_hamali"]):"";
	$bok_others=isset($_POST["bok_others"]) ? addslashes($_POST["bok_others"]):"";
	$bok_gst=isset($_POST["bok_gst"]) ? addslashes($_POST["bok_gst"]):""; 
	$bok_remark=isset($_POST["bok_remark"]) ? addslashes($_POST["bok_remark"]):""; 
	$action=isset($_REQUEST["action"]) ? $_REQUEST["action"]:"add_booking";
	$msg=isset($_GET["msg"]) ? $_GET["msg"]:"";
	$id=isset($_GET["id"]) ? $_GET["id"]:""; 
        $amountdeclare=isset($_GET["amountdeclare"]) ? $_GET["amountdeclare"]:"";
        $amountdeclare_desc=isset($_GET["amountdeclare_desc"]) ? $_GET["amountdeclare_desc"]:"";
	function check_sender($sendgstno,$sendname,$sendaddress,$sendmobile)
	{
		$sql_sender="select * from sender where sendgstno='$sendgstno'";
		$res_sender=mysql_query($sql_sender);
		$count_sender=mysql_num_rows($res_sender);
		if($count_sender > 0)
		{
			$row_sender=mysql_fetch_array($res_sender);
                        
			return $row_sender["sendid"];
		}
		else
		{
			mysql_query("insert into sender (sendname,sendaddress,sendmobile,sendgstno) values ('$sendname','$sendaddress','$sendmobile','$sendgstno')");
			$row_sendid=mysql_fetch_array(mysql_query("select * from sender where sendgstno='$sendgstno'"));
			return $row_sendid["sendid"];
		}
	}
      
	function check_reciver($recvgstno,$recvname,$recvaddress,$recvmobile)
	{
		$sql_reciver="select * from recivers where recvgstno='$recvgstno'";
		$res_reciver=mysql_query($sql_reciver);
		$count_reciver=mysql_num_rows($res_reciver);
		if($count_reciver > 0)
		{
			$row_reciver=mysql_fetch_array($res_reciver);
			return $row_reciver["recvid"];
		}
		else
		{
			mysql_query("insert into recivers (recvname,recvaddress,recvmobile,recvgstno) values ('$recvname','$recvaddress','$recvmobile','$recvgstno')");
			$row_recid=mysql_fetch_array(mysql_query("select * from recivers where recvgstno='$recvgstno'"));
			return $row_recid["recvid"];
		}
	}		
?> 
<script>
function show_senderdetails(sendgstno)
{
	$.post("<?php echo $sitename;?>show_sender_details.php",{sendgstno:sendgstno},function(data)
		{
			$("#show_sender").html(data);
		});
}
function show_reciverdetails(recvgstno)
{
	$.post("<?php echo $sitename;?>show_reciver_details.php",{recvgstno:recvgstno},function(data)
		{
			$("#show_reciver").html(data);
		});
}
function getPlace(dcty_id)
{

	$.post("<?php echo $sitename;?>show_places.php",{dcty_id:dcty_id},function(data)
		{
			$("#show_places").html(data);
		});
}
function getlrnoauto(bok_srccitybranchid)
{
	$.post("<?php echo $sitename;?>show_lrno_auto.php",{bok_srccitybranchid:bok_srccitybranchid},function(data)
		{
			$("#show_lrno").html(data);
		});
}
</script>
<?php 
if($action=="add_booking")
{
	if(isset($_POST["do_add_booking"]) && $_POST["do_add_booking"]=="true")
	{ 
		$bok_senderid=check_sender($sendgstno,$sendname,$sendaddress,$sendmobile);
		$bok_reciverid=check_reciver($recvgstno,$recvname,$recvaddress,$recvmobile); 
		$bok_total=$bok_freight+$bok_hamali+$bok_others;
		$sql="insert into booking(boklrno,bokdate,boktime,bok_senderid,bok_reciverid,bok_srccitybranchid,bok_descityid,bok_cityplaceid,bok_paymode,bok_parcel,bok_pivatemark,bok_item,bok_freight,bok_hamali,bok_others,bok_gst,bok_total,bok_remark,bok_addedby) values ('$boklrno','$bokdate','$boktime','$bok_senderid','$bok_reciverid','$bok_srccitybranchid','$bok_descityid','$bok_cityplaceid','$bok_paymode','$bok_parcel','$bok_pivatemark','$bok_item','$bok_freight','$bok_hamali','$bok_others','$bok_gst','$bok_total','$bok_remark','$admid')";
		if(mysql_query($sql))
		{
			$msg="<span style='color:green'>Added Successfully....</span><meta http-equiv=refresh content='1'>";
		}
		else
		{
			$msg="<span style='color:red'>Not Added</span>";
		}
	}
        if(isset($_POST["do_update_booking"]) && $_POST["do_update_booking"]=="true")
	{ 
           
            $bokid=$_GET["bokid"];
		$bok_senderid=check_sender($sendgstno,$sendname,$sendaddress,$sendmobile);
		$bok_reciverid=check_reciver($recvgstno,$recvname,$recvaddress,$recvmobile); 
		$bok_total=$bok_freight+$bok_hamali+$bok_others;
		$sql="update booking set boklrno='$boklrno',bokdate='$bokdate',boktime='$boktime',bok_senderid='$bok_senderid',bok_reciverid='$bok_reciverid',bok_srccitybranchid='$bok_srccitybranchid',bok_descityid='$bok_descityid',bok_cityplaceid='$bok_cityplaceid',bok_paymode='$bok_paymode',bok_parcel='$bok_parcel',bok_pivatemark='$bok_pivatemark',bok_item='$bok_item',bok_freight='$bok_freight',bok_hamali='$bok_hamali',bok_others='$bok_others',bok_gst='$bok_gst',bok_total='$bok_total',bok_remark='$bok_remark',bok_addedby='$admid' where bokid='$bokid'";
               
		if(mysql_query($sql))
		{
			$msg="<span style='color:green'>Update Successfully....</span><meta http-equiv=refresh content='1'>";
		}
		else
		{
			$msg="<span style='color:red'>Not Updated</span>";
		}
	}
        if(isset($_GET["bokid"]))
        {

        $bokid=$_GET["bokid"]; 

        $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bokid='$bokid'";	
        $result=mysql_query($sql) or die(mysql_error());
        $row=mysql_fetch_array($result);
       
        $sendname=$row["sendname"];
	$sendaddress=$row["sendaddress"];
	$sendmobile=$row["sendmobile"];
	$sendgstno=$row["sendgstno"];
         
	$recvname=$row["recvname"];
	$recvaddress=$row["recvaddress"];
	$recvmobile=$row["recvmobile"];
	$recvgstno=$row["recvgstno"];
	$boklrno=$row["boklrno"];
	$bok_srccitybranchid=$row["bok_srccitybranchid"];
	$bokdate=$row["bokdate"];
	$boktime=$row["boktime"];
	$bok_descityid=$row["bok_descityid"];

	$bok_cityplaceid=$row["bok_cityplaceid"];
	$bok_paymode=$row["bok_paymode"];
	$bok_parcel=$row["bok_parcel"];
	$bok_pivatemark=$row["bok_pivatemark"];
	$bok_item=$row["bok_item"];
	$bok_freight=$row["bok_freight"];
	$bok_hamali=$row["bok_hamali"];
	$bok_others=$row["bok_others"];
	$bok_gst=$row["bok_gst"];
        $bok_total=$row["bok_total"];
	$bok_remark=$row["bok_remark"];
//	$amountdeclare=$row["amountdeclare"];
//        $amountdeclare_desc=$row["amountdeclare_desc"];

        }
?>
				<div class="">
				<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
                                <div class="x_title">
                                    <h2><i class="fa fa-home"></i> <a href="index.php?do=home">Home</a> / New Booking</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
									<form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="" style="border: 2px solid #e8e8e8; padding: 15px;" novalidate>
									<?php
                                                                        if(isset($_GET["bokid"]))
                                                                        { ?>
                                                                            <input type="hidden" name="do_update_booking" value="true">
                                                                       <?php 
                                                                        }
                                                                        else
                                                                        { ?>
                                                                            <input type="hidden" name="do_add_booking" value="true">
                                                                       <?php }
                                                                        ?>
                                                                            
										<span><?php if(isset($msg)) echo $msg;?></span>
                                        <span class="section">
											<center>
												<b>SHIV CARGO AGENCY</b><br/>
												A-64 , RAM LAXMAN SANKUL , NEW COTTON MARKET ROAD<br/>
												AMRAVATI PH : 0721-2590820<br/>
												BRANCH : BUSYLAND COMPLEX NANDGAON PETH PH : 0721-	2381577<br/>
												BRANCH : CITYLAND COMPLEX , BORGAON DHARMALE 
											</center>
										</span>
                                                                                <span class="section"><b>Date :-</b><input type="date" value="<?php echo date("Y-m-d");?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Time :-</b><input type="time" value="<?php echo date("h:i:s") ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Source City :-</b>  Amravati</span>
										<span style="color:red">NOTE : * Indicate Compulsary Fileds</span>	
                                        <input name="bokdate" value="<?php echo date("Y-m-d"); ?>"  type="hidden"> 
                                        <input name="boktime" value="<?php echo date("h:i:s"); ?>"  type="hidden">  
                                        <div class="row">
                                        <div  class="col-md-6 col-sm-6 col-xs-12" style="border-right: 2px solid #e8e5e5;" >
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Source City Branch<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="bok_srccitybranchid" style="width:234px; height:35px;" id="name" onChange="getlrnoauto(this.value)" required="required" >
												 
												<?php 
                                                                                                
												$res_srccitybnch=mysql_query("select * from src_cities_branch");
												while($f_srccitybnch=mysql_fetch_array($res_srccitybnch))
												{
												?>
                                                    <option <?php if($f_srccitybnch["scbrnch_id"]==$bok_srccitybranchid) echo "selected";?> value="<?php echo $f_srccitybnch["scbrnch_id"]?>"><?php echo $f_srccitybnch["scbrnch_name"]?></option>
												<?php } ?>		
												</select>
                                            </div>
                                        </div> 
									<div id="show_lrno">	
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Receipt no./ LR No<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="boklrno" value="<?php if($boklrno){ echo $boklrno; }else{ echo 'B1'.rand(1,10000); } ?>" required="required" type="text">
                                            </div>
                                        </div> 
									</div>	
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Destination City <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="bok_descityid" style="width:234px;height:35px;" id="name" onChange="getPlace(this.value)" required="required">
												 <option value="">Select Destination City</option>
												 	<?php
												$res_descity=mysql_query("select * from des_cities");
												while($f_descity=mysql_fetch_array($res_descity))
												{
												?>
                                                    <option <?php if($f_descity["dcty_id"]==$bok_descityid) echo "selected";?> value="<?php echo $f_descity["dcty_id"]?>"><?php echo $f_descity["dcty_name"]?></option>
												<?php } ?>		
												</select>
                                            </div>
                                        </div>  
										<div id="show_places">
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">City Place *
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                
                                                <select name="dcplace_ctyid" style="width: 234px !important; height: 35px !important;" id="name" required="required"> 
                                                    <option value="">Select Place </option> 
                                                    <?php 
                                                    $sql_cityplace="select * from des_city_place where dcplace_ctyid='$bok_descityid'";
                                                    $res_cityplace=mysql_query($sql_cityplace) or die(mysql_error());
                                                    while($cplace=mysql_fetch_array($res_cityplace))
                                                    {
                                                    ?>
                                                    <option <?php if($cplace["dcplace_id"]==$bok_cityplaceid) echo "selected";?> value="<?php echo $cplace["dcplace_id"]?>"><?php echo $cplace["dcplace_name"]?></option>
                                                    <?php } ?>
												</select>	
                                            </div>
                                        </div> 
										</div>
                                            <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sender GST number <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="sendgstno" style="width:234px;height:35px;" id="name" onChange="return show_senderdetails(this.value);" required="required" >
												 <option value="select">Select Sender GST Number</option>
                                                                                                 <option value="new">Add New</option>
												<?php
												$res_descity=mysql_query("select * from sender");
												while($sender=mysql_fetch_array($res_descity))
												{
												?>
                                                    <option <?php if($sender["sendgstno"]==$sendgstno) echo "selected";?> value="<?php echo $sender["sendgstno"] ?>"><?php echo $sender["sendgstno"]?></option>
												<?php } ?>		
												</select>
                                            </div>
                                        </div> 
                                            <div id="show_sender">
										
										
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sender Name<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="sendname" value="<?php echo $sendname; ?>"  required="required" type="text">
                                            </div>
                                        </div> 
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sender Mobile Number<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="sendmobile" value="<?php echo $sendmobile; ?>"  required="required" type="text">
                                            </div>
                                        </div> 
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sender Address<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="sendaddress" value="<?php echo $sendaddress; ?>"  required="required" type="text">
                                            </div>
                                        </div> 
                                            </div>
                                           		<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Pay Mode 
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="bok_paymode" style="width:234px; height:35px;" id="name" onChange="getPackage(this.value)" > 
                                                    <option value="To pay">To pay</option> 
                                                    <option value="Paid">Paid</option> 
                                                    <option value="FOC ( To pay )">FOC ( To pay )</option> 		
												</select>
                                            </div>
                                        </div>   
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Parcel 
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="bok_parcel" style="width:234px;height:35px;" id="name" onChange="getPackage(this.value)" > 
                                                    <option value="Big ">Big</option>
                                                    <option value="Small">Small</option>  	
                                                    	
												</select>
                                            </div>
                                        </div> 
                                            
                                             <div class="item form-group">
                                           
                                        </div>
                                             <div class="item form-group">
                                           
                                        </div>
                                             <div class="item form-group">
                                           
                                        </div>
									</div>	
                                        <div  class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Receiver GST number <span class="required">*</span>
                                            </label>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                
                                                <select name="recvgstno" style="width:234px;height:35px;" id="name" onChange="return show_reciverdetails(this.value);" required="required" >
												 <option value="select">Select Receiver GST Number</option>
                                                                                                 <option value="new">Add New</option>
												<?php
												$res_descity=mysql_query("select * from recivers");
												while($receiver=mysql_fetch_array($res_descity))
												{
												?>
                                                    <option <?php if($receiver["recvgstno"]==$recvgstno) echo "selected";?> value="<?php echo $receiver["recvgstno"] ?>"><?php echo $receiver["recvgstno"]?></option>
												<?php } ?>		
												</select>
                                            </div>
                                            </div>
                                            <div id="show_reciver">
					  					
									
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Receiver Name<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="recvname" value="<?php echo $recvname; ?>"  required="required" type="text">
                                            </div>
                                        </div> 
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Receiver Mobile Number<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="recvmobile" value="<?php echo $recvmobile; ?>"  required="required" type="text">
                                            </div>
                                        </div> 
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Receiver Address<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="recvaddress" value="<?php echo $recvaddress; ?>"  required="required" type="text">
                                            </div>
                                        </div>  
                                                </div>
                                             		 
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Private Mark
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="bok_pivatemark" value="<?php echo $bok_pivatemark; ?>" type="text">
                                            </div>
                                        </div>  
                                             <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Amount declare
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="amountdeclare" value="<?php echo $amountdeclare; ?>"   type="text">
                                            </div>
                                        </div>
                                              <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Amount declare Description
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="amountdeclare_desc" value="<?php echo $amountdeclare_desc; ?>"  type="text">
                                            </div>
                                        </div>
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Freight
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input onChange="getTotal(this.id,this.value)" id="bok_freight"  class="cal form-control col-md-7 col-xs-12" name="bok_freight" value="<?php if($bok_freight){echo $bok_freight;}else{echo 0;} ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  type="text">
                                            </div>
                                        </div>
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Hamali
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input onChange="getTotal(this.id,this.value)" id="bok_hamali"  class="cal form-control col-md-7 col-xs-12" name="bok_hamali" value="<?php if($bok_hamali){echo $bok_hamali;}else{echo 0;}  ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  type="text">
                                            </div>
                                        </div>
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Other
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input onChange="getTotal(this.id,this.value)" id="bok_others"  class="cal form-control col-md-7 col-xs-12" name="bok_others" value="<?php if($bok_others){echo $bok_others;}else{echo 0;} ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text">
                                            </div>
                                        </div>
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">GST
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input onChange="" id="bok_gst" class="cal form-control col-md-7 col-xs-12" name="bok_gst" value="<?php echo $bok_gst; ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  type="text">
                                            </div>
                                        </div> 
                                            <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Total
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="total" class="form-control col-md-7 col-xs-12" name="bok_total" value="<?php if($bok_others){echo $bok_total;}else{echo 0;} ?>" type="text">
                                            </div>
                                        </div> 
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">No Of Parcel
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="bok_item" value="<?php echo $bok_item; ?>"  type="text">
                                            </div>
                                        </div>
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Note /Remark
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea id="name" class="form-control col-md-7 col-xs-12" name="bok_remark" value="<?php echo $bok_remark; ?>" ><?php echo $bok_remark; ?></textarea>
                                            </div>
                                        </div>
                                            			
                                        </div>
						
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <button id="send" type="submit" class="btn btn-success">Add</button>
                                                <button type="reset" class="btn btn-primary">Cancel</button>
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
<script type="text/javascript">
    var total=0;
    localStorage.setItem("total", total);
    
  function getTotal(id,value) 
{
      
    var total=0;
//    var freight = 0
//    var hamali =0;
//    var others = 0;
   
      var freight = document.getElementById("bok_freight").value;
      var hamali = document.getElementById("bok_hamali").value;
      var others = document.getElementById("bok_others").value;
      
      total=parseInt(freight)+parseInt(hamali)+parseInt(others);
      
      
//      var pre=localStorage.getItem("total");
//       total=parseInt(pre) + parseInt(value);
//       localStorage.setItem("total", total);
       document.getElementById("total").value=total;
    
  }     
    </script>		
<!--<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.4.2'></script>-->
<!--    <script type="text/javascript">
	jQuery(document).ready(function(){

		//iterate through each textboxes and add keyup
		//handler to trigger sum event
		jQuery(".cal").each(function() {

			jQuery(this).keyup(function(){
				calculateSum();
			});
		});

	});

	function calculateSum() {

		var sum = 0;
		//iterate through each textboxes and add the values
		jQuery(".cal").each(function(){

			//add only if the value is number
			if(!isNaN(this.value) && this.value.length!=0) {
				sum += parseFloat(this.value);
			}

		});
		
		jQuery("#total").val(sum.toFixed(2)));
	}
</script>-->

