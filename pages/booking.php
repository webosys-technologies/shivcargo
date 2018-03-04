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
    
<style>
    .table-striped{ 
        overflow-x:scroll !important; 
/*    overflow: auto !important;*/
    white-space: nowrap;
    }
th, td { min-width: 50px; 
 border: none;
    text-align: left;
   
   }
   
   
   
  
    
</style>

<style>
    
/*    td{
     
    }*/
    </style>
<?php 

//--------------------------------------------------------------------------------------------------
// All variables Declaration
//--------------------------------------------------------------------------------------------------
        $sendid=isset($_POST["sendid"]) ? addslashes($_POST["sendid"]):"";
	$sendname=isset($_POST["sendname"]) ? addslashes($_POST["sendname"]):"";
	$sendaddress=isset($_POST["sendaddress"]) ? addslashes($_POST["sendaddress"]):"";
	$sendmobile=isset($_POST["sendmobile"]) ? addslashes($_POST["sendmobile"]):""; 
	$sendgstno=isset($_POST["sendgstno"]) ? addslashes($_POST["sendgstno"]):"";
        $recvid=isset($_POST["recvid"]) ? addslashes($_POST["recvid"]):"";
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
	$bok_weight=isset($_POST["bok_weight"]) ? addslashes($_POST["bok_weight"]):"";
	$bok_pivatemark=isset($_POST["bok_pivatemark"]) ? addslashes($_POST["bok_pivatemark"]):"";
	$bok_item=isset($_POST["bok_item"]) ? addslashes($_POST["bok_item"]):"";
	$bok_freight=isset($_POST["bok_freight"]) ? addslashes($_POST["bok_freight"]):"";
	$bok_hamali=isset($_POST["bok_hamali"]) ? addslashes($_POST["bok_hamali"]):"";
	$bok_others=isset($_POST["bok_others"]) ? addslashes($_POST["bok_others"]):"";
	$bok_gst=isset($_POST["bok_gst"]) ? addslashes($_POST["bok_gst"]):""; 
	$bok_total=isset($_POST["bok_total"]) ? addslashes($_POST["bok_total"]):""; 
	$bok_remark=isset($_POST["bok_remark"]) ? addslashes($_POST["bok_remark"]):""; 
	$action=isset($_REQUEST["action"]) ? $_REQUEST["action"]:"add_booking";
	$msg=isset($_GET["msg"]) ? $_GET["msg"]:"";
	$id=isset($_GET["id"]) ? $_GET["id"]:""; 
        $amountdeclare=isset($_GET["amountdeclare"]) ? $_GET["amountdeclare"]:"";
        $amountdeclare_desc=isset($_GET["amountdeclare_desc"]) ? $_GET["amountdeclare_desc"]:"";
       

	function check_sender($sendid,$sendgstno,$sendname,$sendaddress,$sendmobile)
	{
		$sql="select COUNT(*) as count from sender where sendgstno='$sendgstno'";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$count=$row["count"];
                
            if($sendid=="new")
            {
                if($sendgstno=="NA" || $count==0)
                {
                    mysql_query("insert into sender (sendname,sendaddress,sendmobile,sendgstno) values ('$sendname','$sendaddress','$sendmobile','$sendgstno')");
                    $row_sendid=mysql_fetch_array(mysql_query("select * from sender where sendgstno='$sendgstno'"));
                    return $row_sendid["sendid"];
                }
                else 
                {
                    return 0;
                }
            }
            else
            {
		if($count >0)
		{
                    $sql_sender="select * from sender where sendid='$sendid'"; 
                    $res_sender=mysql_query($sql_sender);
                    $row_sender=mysql_fetch_array($res_sender);
                    $existing_gstno=$row_sender["sendgstno"];
                    if($existing_gstno==$sendgstno || $sendgstno=="NA")
                    {
                        $sql1="update sender set sendname='$sendname',sendaddress='$sendaddress',sendmobile='$sendmobile',sendgstno='$sendgstno' where sendid='$sendid'";              
                        $p=mysql_query($sql1);
                     //   return $row_sender["$sendid"];
                        return $sendid;
                    }
                    else 
                    {
                        return 0;
                    }
		}
		else
		{
			$sql1="update sender set sendname='$sendname',sendaddress='$sendaddress',sendmobile='$sendmobile',sendgstno='$sendgstno' where sendid='$sendid'";              
                        $p=mysql_query($sql1);
                     //   return $row_sender["$sendid"];
                        return $sendid;
		}

                
            }
	}
      
	function check_reciver($recvid,$recvgstno,$recvname,$recvaddress,$recvmobile)
	{
           $sql="select COUNT(*) as count from recivers where recvgstno='$recvgstno' ";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$count=$row["count"];
                
            if($recvid=="new")
            {
                if($recvgstno=="NA" || $count==0)
                {
                    mysql_query("insert into recivers (recvname,recvaddress,recvmobile,recvgstno) values ('$recvname','$recvaddress','$recvmobile','$recvgstno')");
                    $row_recid=mysql_fetch_array(mysql_query("select * from recivers where recvgstno='$recvgstno'"));
                    return $row_recid["recvid"];
                }
                else 
                {
                    return 0;
                }
            }
            else
            {
		if($count >0)
		{
                    $sql_reciver="select * from recivers where recvid='$recvid'"; 
                    $res_reciver=mysql_query($sql_reciver);
                    $row_reciver=mysql_fetch_array($res_reciver);
                    $existing_gstno=$row_reciver["recvgstno"];
                    if($existing_gstno==$recvgstno || $recvgstno=="NA")
                    {
                        $sql1="update recivers set recvname='$recvname',recvaddress='$recvaddress',recvmobile='$recvmobile',recvgstno='$recvgstno' where recvid='$recvid'";              
                        $p=mysql_query($sql1);
                     //   return $row_reciver["recvid"];
                        return $recvid;
                    }
                    else 
                    {
                        return 0;
                    }
		}
		else
		{
			  
                       
                        $sql1="update recivers set recvname='$recvname',recvaddress='$recvaddress',recvmobile='$recvmobile',recvgstno='$recvgstno' where recvid='$recvid'";              
                        $p=mysql_query($sql1);
                     //   return $row_reciver["recvid"];
                        return $recvid;
		}
              
                
            }
		
		
	}		
//	function check_reciver($recvid,$recvgstno,$recvname,$recvaddress,$recvmobile)
//	{
//            //die("yes".$recvgstno);
//            if($recvid=="new")
//            {
//                if($recvgstno=="NA")
//                {
//                    $count_reciver=0;
//                }
//                else
//                {
//                    $sql_reciver="select * from recivers where recvgstno='$recvgstno'"; 
//                    $res_reciver=mysql_query($sql_reciver);
//                    $count_reciver=mysql_num_rows($res_reciver);
//                
//                }
//            }
//            else
//            {
//                $sql_reciver="select * from recivers where recvid='$recvid'"; 
//		$res_reciver=mysql_query($sql_reciver);
//		$count_reciver=mysql_num_rows($res_reciver);
//                
//            }
//		
//		if($count_reciver > 0)
//		{
//			$row_reciver=mysql_fetch_array($res_reciver);  
//                        
//			
//                       // $recvid=$row_reciver["recvid"];
//                        $sql1="update recivers set recvname='$recvname',recvaddress='$recvaddress',recvmobile='$recvmobile',recvgstno='$recvgstno' where recvid='$recvid'";              
//                        $p=mysql_query($sql1);
//                     //   return $row_reciver["recvid"];
//                        return $recvid;
//		}
//		else
//		{
//                        
//			mysql_query("insert into recivers (recvname,recvaddress,recvmobile,recvgstno) values ('$recvname','$recvaddress','$recvmobile','$recvgstno')");
//			$row_recid=mysql_fetch_array(mysql_query("select * from recivers where recvgstno='$recvgstno'"));
//			return $row_recid["recvid"];
//                        
//		}
//	}		
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
<script>
function show_senderdetails(sendid)
{
	$.post("<?php echo $sitename;?>show_sender_details.php",{sendid:sendid},function(data)
		{
			$("#show_sender").html(data);
		});
}
function show_reciverdetails(recvid)
{
	$.post("<?php echo $sitename;?>show_reciver_details.php",{recvid:recvid},function(data)
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
function getCity(dcty_id)
{

	$.post("<?php echo $sitename;?>show_city.php",{dcty_id:dcty_id},function(data)
		{
			$("#show_city").html(data);
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
		$bok_senderid=check_sender($sendid,$sendgstno,$sendname,$sendaddress,$sendmobile);
		$bok_reciverid=check_reciver($recvid,$recvgstno,$recvname,$recvaddress,$recvmobile); 
                
                if($bok_senderid==0)
                {
                    $msg="<span style='color:red; font-size:14px; font-weight:bold;'>Sender GST Number Already Exists. Enter New GST Number</span>";
                    $msg_s="<span style='color:red; font-size:14px; font-weight:bold;'>Sender GST Number Already Exists. Enter New GST Number</span>";
                }
                elseif($bok_reciverid==0)
                {
                    $msg="<span style='color:red; font-size:14px; font-weight:bold;'>receiver GST Number Already Exists. Enter New GST Number</span>";
                    $msg_r="<span style='color:red; font-size:14px; font-weight:bold;'>receiver GST Number Already Exists. Enter New GST Number</span>";
                }
                else 
                {
                    $bok_total=$bok_freight+$bok_hamali+$bok_others;
                    $sql="insert into booking(boklrno,bokdate,boktime,bok_senderid,bok_reciverid,bok_srccitybranchid,bok_descityid,bok_cityplaceid,bok_paymode,bok_parcel,bok_weight,bok_pivatemark,bok_item,bok_freight,bok_hamali,bok_others,bok_gst,bok_total,bok_remark,amountdeclare_desc,bok_addedby) values ('$boklrno','$bokdate','$boktime','$bok_senderid','$bok_reciverid','$bok_srccitybranchid','$bok_descityid','$bok_cityplaceid','$bok_paymode','$bok_parcel','$bok_weight','$bok_pivatemark','$bok_item','$bok_freight','$bok_hamali','$bok_others','$bok_gst','$bok_total','$bok_remark','$amountdeclare_desc','$admid')";


                    if(mysql_query($sql))
                    {
                            $msg="<span style='color:green'>Added Successfully....</span><meta http-equiv=refresh content='1'>";
                    }
                    else
                    {
                            $msg="<span style='color:red'>Not Added</span>";
                    }
                    
                }
		
                 
	}      
        if(isset($_POST["do_update_booking"]) && $_POST["do_update_booking"]=="true")
	{ 
            
           
            $bokid=$_GET["bokid"];
		$bok_senderid=check_sender($sendgstno,$sendname,$sendaddress,$sendmobile);
		$bok_reciverid=check_reciver($recvid,$recvgstno,$recvname,$recvaddress,$recvmobile); 
                
                if($bok_senderid==0)
                {
                    $msg="<span style='color:red; font-size:14px; font-weight:bold;'>Sender GST Number Already Exists. Enter New GST Number</span>";
                    $msg_s="<span style='color:red; font-size:14px; font-weight:bold;'>Sender GST Number Already Exists. Enter New GST Number</span>";
                }
                elseif($bok_reciverid==0)
                {
                    $msg="<span style='color:red; font-size:14px; font-weight:bold;'>receiver GST Number Already Exists. Enter New GST Number</span>";
                    $msg_r="<span style='color:red; font-size:14px; font-weight:bold;'>receiver GST Number Already Exists. Enter New GST Number</span>";
                }
                else
                {
                   // $bok_total=$bok_freight+$bok_hamali+$bok_others;
                    $sql="update booking set boklrno='$boklrno',bokdate='$bokdate',boktime='$boktime',bok_senderid='$bok_senderid',bok_reciverid='$bok_reciverid',bok_srccitybranchid='$bok_srccitybranchid',bok_descityid='$bok_descityid',bok_cityplaceid='$bok_cityplaceid',bok_paymode='$bok_paymode',bok_parcel='$bok_parcel',bok_weight='$bok_weight',bok_pivatemark='$bok_pivatemark',bok_item='$bok_item',bok_freight='$bok_freight',bok_hamali='$bok_hamali',bok_others='$bok_others',bok_gst='$bok_gst',bok_total='$bok_total',bok_remark='$bok_remark',amountdeclare_desc='$amountdeclare_desc',bok_addedby='$admid' where bokid='$bokid'";

                    if(mysql_query($sql))
                    {
                            $msg="<span style='color:green'>Update Successfully....</span><meta http-equiv=refresh content='1'>";
                    }
                    else
                    {
                            $msg="<span style='color:red'>Not Updated</span>";
                    }
                }
	}
        if(isset($_GET["bokid"]))
        {

        $bokid=$_GET["bokid"]; 

        $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bokid='$bokid'";	
        $result=mysql_query($sql) or die(mysql_error());
        $row=mysql_fetch_array($result);
       
        $sendid=$row["sendid"]; 
        $sendname=$row["sendname"];
	$sendaddress=$row["sendaddress"];
	$sendmobile=$row["sendmobile"];
	$sendgstno=$row["sendgstno"];
         
        $recvid=$row["recvid"];
	$recvname=$row["recvname"];
	$recvaddress=$row["recvaddress"];
	$recvmobile=$row["recvmobile"];
	$recvgstno=$row["recvgstno"];
	$boklrno=$row["boklrno"];
	$bok_srccitybranchid=$row["bok_srccitybranchid"];
	$bokdate=$row["bokdate"];
	$boktime=$row["boktime"];
	$bok_descityid=$row["bok_descityid"];
	$dcty_name=$row["dcty_name"];

	$bok_cityplaceid=$row["bok_cityplaceid"];
	$bok_paymode=$row["bok_paymode"];
	$bok_parcel=$row["bok_parcel"];
	$bok_weight=$row["bok_weight"];
	$bok_pivatemark=$row["bok_pivatemark"];
	$bok_item=$row["bok_item"];
	$bok_freight=$row["bok_freight"];
	$bok_hamali=$row["bok_hamali"];
	$bok_others=$row["bok_others"];
	$bok_gst=$row["bok_gst"];
        $bok_total=$row["bok_total"];
	$bok_remark=$row["bok_remark"];
//	$amountdeclare=$row["amountdeclare"];
        $amountdeclare_desc=$row["amountdeclare_desc"];

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
                                     <button class="btn btn-danger"  onclick="printDiv('invoice')"><i class="fa fa-print"></i> Print</button> 
                                     
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
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sender Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="sendid" style="width:234px;height:35px;" id="name" onChange="return show_senderdetails(this.value);" required="required" >
												 <option value="">Select Sender Name</option>
                                                                                                 <option value="new">Add New</option>
												<?php
												$res_descity=mysql_query("select * from sender");
												while($sender=mysql_fetch_array($res_descity))
												{
												?>
                                                    <option <?php if($sender["sendid"]==$sendid) echo "selected";?> value="<?php echo $sender["sendid"] ?>"><?php echo $sender["sendname"]?></option>
												<?php } ?>		
												</select>
                                            </div>
                                        </div> 
                                           
                                            <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Receiver Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                
                                                <select name="recvid" style="width:234px;height:35px;" id="name" onChange="return show_reciverdetails(this.value);" required="required" >
												 <option value="">Select Receiver name</option>
                                                                                                 <option value="new">Add New</option>
												<?php
												$res_descity=mysql_query("select * from recivers");
												while($receiver=mysql_fetch_array($res_descity))
												{
												?>
                                                    <option <?php if($receiver["recvid"]==$recvid) echo "selected";?> value="<?php echo $receiver["recvid"] ?>"><?php echo $receiver["recvname"]?></option>
												<?php } ?>		
												</select>
                                            </div>
                                            </div>
<!--                                           
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
                                                    <option <?php //if($f_descity["dcty_id"]==$bok_descityid) echo "selected";?> value="<?php //echo $f_descity["dcty_id"]?>"><?php echo $f_descity["dcty_name"]?></option>
												<?php } ?>		
												</select>
                                            </div>
                                        </div>  -->
										<div id="show_places">
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">City Place *
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                
                                                <select name="dcplace_id" style="width: 234px !important; height: 35px !important;" id="name" onChange="getCity(this.value)" required="required"> 
                                                    <option value="">Select Place </option> 
                                                    <?php 
                                                    $sql_cityplace="select * from des_city_place"; //where dcplace_ctyid='$bok_descityid'
                                                    $res_cityplace=mysql_query($sql_cityplace) or die(mysql_error());
                                                    while($cplace=mysql_fetch_array($res_cityplace))
                                                    {
                                                    ?>
                                                    <option <?php if($cplace["dcplace_id"]==$bok_cityplaceid) echo "selected";?> value="<?php echo $cplace["dcplace_id"] ?>"><?php echo $cplace["dcplace_name"]?></option>
                                                    <?php } ?>
												</select>	
                                            </div>
                                        </div> 
										</div>
                                           
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">City *
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                 <div id="show_city">
                                                     <input id="name" class="form-control col-md-7 col-xs-12" name="dcty_name" value="<?php if(isset($dcty_name)) echo $dcty_name; ?>" disabled="disabled"  type="text" required="required">
                                                     <input id="name" class="form-control col-md-7 col-xs-12" name="bok_descityid" value="<?php echo $bok_descityid; ?>"  type="hidden" required="required">
                                                </div>
                                            </div>
                                        </div> 
										
                                            <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">No Of Parcel *
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="bok_item" value="<?php echo $bok_item; ?>"  type="text" required="required">
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
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Freight
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input onChange="getTotal(this.id,this.value)" id="bok_freight"  class="cal form-control col-md-7 col-xs-12" name="bok_freight" value="<?php if($bok_freight){echo $bok_freight;}else{echo "";} ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  type="text">
                                            </div>
                                        </div>
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Hamali
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input onChange="getTotal(this.id,this.value)" id="bok_hamali"  class="cal form-control col-md-7 col-xs-12" name="bok_hamali" value="<?php if($bok_hamali){echo $bok_hamali;}else{echo "";}  ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  type="text">
                                            </div>
                                        </div>
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Other
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input onChange="getTotal(this.id,this.value)" id="bok_others"  class="cal form-control col-md-7 col-xs-12" name="bok_others" value="<?php if($bok_others){echo $bok_others;}else{echo "";} ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text">
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
                                                <input id="total" class="form-control col-md-7 col-xs-12" name="bok_total" value="<?php echo $bok_total; ?>" type="text">
                                            </div>
                                        </div>
                                            <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <button id="send" type="submit" class="btn btn-success">Add</button>
                                                <button type="reset" class="btn btn-primary">Cancel</button>
                                            </div>
                                        </div>
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
                                            
                                             <div id="show_sender">
                                                 <?php if($sendid != ""){ ?>
					<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sender GST Number<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="sendgstno"  value="<?php echo $sendgstno; ?>"  required="required" type="text">
                                                 <span><?php if(isset($msg_s)) echo $msg_s;?></span>
                                            </div>
                                        </div> 
                                                 <?php } ?>
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
                                             <div id="show_reciver">
					  	
                                                   <?php if($recvid != ""){ ?>
						<div class="item form-group">
        
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Receiver GST Number
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="recvgstno" value="<?php echo $recvgstno; ?>" type="text">
                                                <span><?php if(isset($msg_r)) echo $msg_r;?></span>	
                                            </div>
                                        </div>	
                                                   <?php } ?>
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
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Weight
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="bok_weight" value="<?php echo $bok_weight; ?>" type="text">
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
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="amountdeclare_desc" value="<?php echo $amountdeclare_desc; ?>"  type="text">
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
                                        
                                    </form>

                                </div>
                            </div>
                                                            
                             <div class="x_content" id="invoice" style="display:none;">
                                        
                                        <?php 
                                        if(isset($_GET["bokid"]))
                                        {
                                        $bokid=$_GET["bokid"];
                                         $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) where bokid='$bokid'";	
                                        $result=mysql_query($sql) or die(mysql_error());
                                        }
                                        else
                                        {                                            
                                            $sql="select * from booking bok join des_cities dc on (bok.bok_descityid=dc.dcty_id) join des_city_place dcp on (bok.bok_cityplaceid=dcp.dcplace_id) join sender s on (bok.bok_senderid=s.sendid) join recivers r on (bok.bok_reciverid=r.recvid) ORDER BY bokid DESC LIMIT 1"; 	
                                           $result=mysql_query($sql) or die(mysql_error());
                                        }
                                        
                                      $row=mysql_fetch_array($result);
                                        
                                        ?>
 <table style="margin-bottom: 0px; font-size: 11px; padding: 2px; height: 336px; width: 100%; border-left: 1px solid #c1c1c1;border-right: 1px solid #c1c1c1;border-bottom: 1px solid #c1c1c1;" id="example" class="table">
                                         <!--<table id="example" class="table table-striped responsive-utilities jambo_table">-->
<tbody>
<tr style="padding: 2px; height: 23px;">
<td style="padding: 2px; width: 354px; height: 25px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="4" rowspan="3">SHIV CARGO AGENCY <br /> A-64 , RAM LAXMAN SANKUL , NEW COTTON MARKET ROAD <br /> AMRAVATI PH : 0721-2590820 <br /> BRANCH : BUSYLAND COMPLEX NANDGAON PETH PH : 0721- 2381577 <br />BRANCH : CITYLAND COMPLEX , BORGAON DHARMALE</td>
<td style="padding: 2px; width: 179px; height: 23px;     background-color: #e6e4e4; color: black; font-weight: bold; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">&nbsp;AT OWNER&rsquo;S RISK</td>
<td style="width: 222px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">&nbsp;</td>
</tr>
<tr style="padding: 2px; height: 2px;">
<td style="padding: 2px; width: 179px; height: 2px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">To:&nbsp; <?php echo $row["dcplace_name"]; ?></td>
<td style="padding: 2px; width: 222px; height: 2px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">LR No.: <?php echo $row["boklrno"]; ?></td>
</tr>
<tr style="padding: 2px; height: 2px;">

<td style="padding: 2px; width: 179px; height: 52px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" rowspan="2">&nbsp;FRIGHT UPTO:</td>
<td style="padding: 2px; width: 222px; height: 26px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">
<p>&nbsp;DATE : <?php echo $row["bokdate"]; ?></p>
</td>
</tr>
<tr style="padding: 2px; height: 26px;">
<td style="padding: 2px; width: 334px; height: 26px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="2"><strong>TRUCK NO. : &nbsp;  <?php echo $row["bok_vehicleno"]; ?></strong></td>
<td style="padding: 2px; width: 334px; height: 26px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="2"><strong>FROM : <?php echo "Amravati"; ?></strong></td>
<td style="padding: 2px; width: 222px; height: 26px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">
<p>&nbsp;TIME: <?php echo $row["boktime"]; ?></p>
</td>
</tr>
<tr style="padding: 2px; height: 55px;">
<td style="padding: 2px;  height: 55px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;CONSIGNOR&rsquo;S NAME &amp; ADDRESS &amp; GST : &nbsp;  <?php echo $row["sendname"]; echo ","; ?> &nbsp; <?php echo $row["sendaddress"]; echo ","; ?> &nbsp; <?php echo $row["sendgstno"]; ?></td>
<td style="padding: 2px;  height: 55px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="3">&nbsp;&nbsp;CONSIGNOR&rsquo;S NAME &amp; ADDRESS &amp; GST : &nbsp;  <?php echo $row["recvname"]; echo ","; ?> &nbsp; <?php echo $row["recvaddress"]; echo ","; ?> &nbsp; <?php echo $row["recvgstno"]; ?></td>


</tr>
<tr style="padding: 2px; height: 29px;">
<td style="padding: 2px; width: 530px; height: 29px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="3">&nbsp; &nbsp; &nbsp;Ph. No.&nbsp;  <?php echo $row["bok_vehicleno"]; ?></td>
<td style="padding: 2px; width: 503px; height: 29px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="2">&nbsp;PVT. MKS.&nbsp;  <?php echo $row["bok_pivatemark"]; ?></td>
<td style="padding: 2px; width: 222px; height: 29px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">&nbsp;Ph. No.</td>
</tr>
<tr style="padding: 2px; height: 29px;">
<td style="padding: 2px; width: 530px; height: 29px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="3">&nbsp;</td>
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
<td style="padding: 2px; width: 46px; height: 139px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" rowspan="7">&nbsp;</td>
<td style="padding: 2px; width: 157px; height: 139px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" rowspan="7">&nbsp  <?php echo $row["amountdeclare_desc"]; ?></td>
<td style="padding: 2px; width: 66px; height: 46px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="" rowspan="2">&nbsp; <?php echo $row["bok_weight"]; ?></td>
<td style="padding: 2px; width: 66px; height: 46px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="" rowspan="2">&nbsp; <?php //echo $row["bok_weight"]; ?></td>
<td style="padding: 2px; width: 151px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">Frieght &nbsp;  <?php echo $row["bok_freight"]; ?></td>
</tr>
<tr style="padding: 2px; height: 23px;">
    <td style="padding: 2px; width: 151px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">Hamali &nbsp;  <?php echo $row["bok_hamali"]; ?></td>
</tr>
<tr style="padding: 2px; height: 20px;">
<td style="padding: 2px; width: 66px; height: 24px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" rowspan="2">&nbsp;</td>
<td style="padding: 2px; width: 75px; height: 24px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" rowspan="2">&nbsp;</td>
<td style="padding: 2px; width: 151px; height: 20px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">BC</td>
</tr>
<tr style="padding: 2px; height: 0px;">

</tr>
<tr style="padding: 2px; height: 23px;">
<td style="padding: 2px; width: 66px; height: 69px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="" rowspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="padding: 2px; width: 66px; height: 69px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="" rowspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="padding: 2px; width: 151px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">Other &nbsp;  <?php echo $row["bok_other"]; ?></td>
</tr>
<tr style="padding: 2px; height: 23px;">
<td style="padding: 2px; width: 151px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">&nbsp;</td>
</tr>
<tr style="padding: 2px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">
<td style="padding: 2px; width: 151px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">Total &nbsp;  <?php echo $row["bok_total"]; ?></td>
</tr>
<tr style="padding: 2px; height: 23px;">
<td style="padding: 2px; width: 46px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">&nbsp;Remark</td>
<td style="padding: 2px; width: 157px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="2">&nbsp;&nbsp;</td>
<td style="padding: 2px; width: 75px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="2"><strong>Total Freight Rs.</strong>&nbsp; <?php echo $row["bok_total"]; ?> </td>
</tr>
<tr style="padding: 2px; height: 24px;">
<td style="padding: 2px; width: 46px; height: 24px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="2">&nbsp;&nbsp;Delivery At</td>
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
<td style="padding: 2px; width: 354px; height: 25px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="4" rowspan="3">SHIV CARGO AGENCY <br /> A-64 , RAM LAXMAN SANKUL , NEW COTTON MARKET ROAD <br /> AMRAVATI PH : 0721-2590820 <br /> BRANCH : BUSYLAND COMPLEX NANDGAON PETH PH : 0721- 2381577 <br />BRANCH : CITYLAND COMPLEX , BORGAON DHARMALE</td>
<td style="padding: 2px; width: 179px; height: 23px;     background-color: #e6e4e4; color: black; font-weight: bold; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">&nbsp;AT OWNER&rsquo;S RISK</td>
<td style="width: 222px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">&nbsp;</td>
</tr>
<tr style="padding: 2px; height: 2px;">
<td style="padding: 2px; width: 179px; height: 2px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">To:&nbsp; <?php echo $row["dcplace_name"]; ?></td>
<td style="padding: 2px; width: 222px; height: 2px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">LR No.: <?php echo $row["boklrno"]; ?></td>
</tr>
<tr style="padding: 2px; height: 2px;">

<td style="padding: 2px; width: 179px; height: 52px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" rowspan="2">&nbsp;FRIGHT UPTO:</td>
<td style="padding: 2px; width: 222px; height: 26px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">
<p>&nbsp;DATE : <?php echo $row["bokdate"]; ?></p>
</td>
</tr>
<tr style="padding: 2px; height: 26px;">
<td style="padding: 2px; width: 334px; height: 26px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="2"><strong>TRUCK NO. : &nbsp;  <?php echo $row["bok_vehicleno"]; ?></strong></td>
<td style="padding: 2px; width: 334px; height: 26px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="2"><strong>FROM : <?php echo "Amravati"; ?></strong></td>
<td style="padding: 2px; width: 222px; height: 26px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">
<p>&nbsp;TIME: <?php echo $row["boktime"]; ?></p>
</td>
</tr>
<tr style="padding: 2px; height: 55px;">
<td style="padding: 2px;  height: 55px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;CONSIGNOR&rsquo;S NAME &amp; ADDRESS &amp; GST : &nbsp;  <?php echo $row["sendname"]; echo ","; ?> &nbsp; <?php echo $row["sendaddress"]; echo ","; ?> &nbsp; <?php echo $row["sendgstno"]; ?></td>
<td style="padding: 2px;  height: 55px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="3">&nbsp;&nbsp;CONSIGNOR&rsquo;S NAME &amp; ADDRESS &amp; GST : &nbsp;  <?php echo $row["recvname"]; echo ","; ?> &nbsp; <?php echo $row["recvaddress"]; echo ","; ?> &nbsp; <?php echo $row["recvgstno"]; ?></td>


</tr>
<tr style="padding: 2px; height: 29px;">
<td style="padding: 2px; width: 530px; height: 29px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="3">&nbsp; &nbsp; &nbsp;Ph. No.&nbsp;  <?php echo $row["bok_vehicleno"]; ?></td>
<td style="padding: 2px; width: 503px; height: 29px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="2">&nbsp;PVT. MKS.&nbsp;  <?php echo $row["bok_pivatemark"]; ?></td>
<td style="padding: 2px; width: 222px; height: 29px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">&nbsp;Ph. No.</td>
</tr>
<tr style="padding: 2px; height: 29px;">
<td style="padding: 2px; width: 530px; height: 29px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="3">&nbsp;</td>
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
<td style="padding: 2px; width: 46px; height: 139px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" rowspan="7">&nbsp;</td>
<td style="padding: 2px; width: 157px; height: 139px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" rowspan="7">&nbsp  <?php echo $row["amountdeclare_desc"]; ?></td>
<td style="padding: 2px; width: 66px; height: 46px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="" rowspan="2">&nbsp; <?php echo $row["bok_weight"]; ?></td>
<td style="padding: 2px; width: 66px; height: 46px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="" rowspan="2">&nbsp; <?php //echo $row["bok_weight"]; ?></td>
<td style="padding: 2px; width: 151px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">Frieght &nbsp;  <?php echo $row["bok_freight"]; ?></td>
</tr>
<tr style="padding: 2px; height: 23px;">
    <td style="padding: 2px; width: 151px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">Hamali &nbsp;  <?php echo $row["bok_hamali"]; ?></td>
</tr>
<tr style="padding: 2px; height: 20px;">
<td style="padding: 2px; width: 66px; height: 24px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" rowspan="2">&nbsp;</td>
<td style="padding: 2px; width: 75px; height: 24px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" rowspan="2">&nbsp;</td>
<td style="padding: 2px; width: 151px; height: 20px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">BC</td>
</tr>
<tr style="padding: 2px; height: 0px;">

</tr>
<tr style="padding: 2px; height: 23px;">
<td style="padding: 2px; width: 66px; height: 69px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="" rowspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="padding: 2px; width: 66px; height: 69px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="" rowspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="padding: 2px; width: 151px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">Other &nbsp;  <?php echo $row["bok_freight"]; ?></td>
</tr>
<tr style="padding: 2px; height: 23px;">
<td style="padding: 2px; width: 151px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">&nbsp;</td>
</tr>
<tr style="padding: 2px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">
<td style="padding: 2px; width: 151px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">Total &nbsp;  <?php echo $row["bok_total"]; ?></td>
</tr>
<tr style="padding: 2px; height: 23px;">
<td style="padding: 2px; width: 46px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;">&nbsp;Remark</td>
<td style="padding: 2px; width: 157px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="2">&nbsp;&nbsp;</td>
<td style="padding: 2px; width: 75px; height: 23px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="2"><strong>Total Freight Rs.</strong>&nbsp; <?php echo $row["bok_total"]; ?></td>
</tr>
<tr style="padding: 2px; height: 24px;">
<td style="padding: 2px; width: 46px; height: 24px; border-left: 1px solid #c1c1c1 !important; border-right: 1px solid #c1c1c1 !important; border-bottom: 1px solid #c1c1c1 !important;" colspan="2">&nbsp;&nbsp;Delivery At</td>
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
      if(freight=="")
      {
          freight=0;
      }
      if(hamali=="")
      {
          hamali=0;
      }
      if(others=="")
      {
          others=0;
      }
      
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
