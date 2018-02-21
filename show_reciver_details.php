<?php
include "db/config.php";
$recvid=$_POST["recvid"];
$sql="select * from recivers where recvid='$recvid'";
$res=mysql_query($sql);
$count=mysql_num_rows($res);
if($count==1)
{
	$row=mysql_fetch_array($res);
?>
	<input name="recvname" value="<?php echo $row["recvname"]; ?>" type="hidden">
	<input name="recvmobile" value="<?php echo $row["recvmobile"]; ?>"  type="hidden" >
    <input name="recvaddress" value="<?php echo $row["recvaddress"]; ?>" type="hidden">
    <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Receiver GST Number
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="recvgstno" value="<?php echo $row["recvgstno"]; ?>" type="text">
                                            </div>
                                        </div>
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Receiver Name<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" value="<?php echo $row["recvname"]; ?>"  required="required" type="text">
                                            </div>
                                        </div> 
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Receiver Mobile Number
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" value="<?php echo $row["recvmobile"]; ?>"  type="text">
                                            </div>
                                        </div> 
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Receiver Address
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" value="<?php echo $row["recvaddress"]; ?>"  type="text">
                                            </div>
                                        </div>  
<?php } else { ?>
    
    <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Receiver GST Number<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" onchange=""  name="recvgstno" value="<?php  ?>"  required="required" type="text">
                                            </div>
                                        </div> 
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Receiver Name<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="recvname" value=""  required="required" type="text">
                                            </div>
                                        </div> 
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Receiver Mobile Number<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="recvmobile" value=""  required="required" type="text">
                                            </div>
                                        </div> 
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Receiver Address<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="recvaddress" value=""  required="required" type="text">
                                            </div>
                                        </div>  
<?php } ?>