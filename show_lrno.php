<?php
$bok_srccitybranchid=$_POST["bok_srccitybranchid"];
if($bok_srccitybranchid==1)
{
?>
<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Receipt no./ LR No<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input style="width:15%;" id="name" class="form-control col-md-2 col-xs-4"  name="lr_cap" value="B" required="required" type="text" disabled="disabled" >
                                                <input style="width:80%;" id="name" class="form-control col-md-7 col-xs-12"  name="boklrno" value="-" required="required" type="text" disabled="disabled" >
                                                <span><?php if(isset($msg_lr)) echo $msg_lr;?></span>
                                            </div>
    
                                        </div> 
<?php	
}
elseif($bok_srccitybranchid==2)
{
?>
<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Receipt no./ LR No<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <input style="width:15%;" id="name" class="form-control col-md-2 col-xs-4"  name="lr_cap" value="C" required="required" type="text" disabled="disabled" >
                                                <input style="width:80%;" id="name" class="form-control col-md-7 col-xs-12"  name="boklrno" value="" required="required" type="text" >
                                                <span><?php if(isset($msg_lr)) echo $msg_lr;?></span>
                                            </div>
                                        </div> 
<?php	
}
?>