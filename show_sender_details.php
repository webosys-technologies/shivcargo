<?php
include "db/config.php";
$sendid=$_POST["sendid"];
$sql="select * from sender where sendid='$sendid'";
$res=mysql_query($sql);
$count=mysql_num_rows($res);
if($count==1)
{
	$row=mysql_fetch_array($res);  
        
?>
	<input name="sendname" value="<?php echo $row["sendname"]; ?>" type="hidden">
	<input name="sendmobile" value="<?php echo $row["sendmobile"]; ?>"  type="hidden" >
    <input name="sendaddress" value="<?php echo $row["sendaddress"]; ?>" type="hidden">
    <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sender GST Number<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="sendgstno"  value="<?php echo $row["sendgstno"]; ?>"  required="required" type="text">
                                                <span><?php if(isset($msg_s)) echo $msg_s;?></span>
                                            </div>
                                        </div> 
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sender Name<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="sendname"  value="<?php echo $row["sendname"]; ?>"  required="required" type="text">
                                            </div>
                                        </div> 
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sender Mobile Number
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="sendmobile"  value="<?php echo $row["sendmobile"]; ?>"  type="text">
                                            </div>
                                        </div> 
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sender Address
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="sendaddress" value="<?php echo $row["sendaddress"]; ?>" type="text">
                                            </div>
                                        </div> 
<?php } else { ?>
    
    <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sender GST Number<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="sendgstno" value="<?php  ?>"  required="required" type="text">
                                            </div>
                                        </div> 
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sender Name<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="sendname" value=""  required="required" type="text">
                                            </div>
                                        </div> 
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sender Mobile Number<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="sendmobile" value=""  required="required" type="text">
                                            </div>
                                        </div> 
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sender Address<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" name="sendaddress" value=""  required="required" type="text">
                                            </div>
                                        </div> 
<?php } ?>