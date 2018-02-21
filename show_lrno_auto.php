<?php
$bok_srccitybranchid=$_POST["bok_srccitybranchid"];
if($bok_srccitybranchid==1)
{
?>
<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Receipt no./ LR No<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="boklrno" value="<?php echo 'B1'.rand(1,10000); ?>" required="required" type="text">
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
                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="boklrno" value="<?php echo 'C2'.rand(1,10000); ?>" required="required" type="text">
                                            </div>
                                        </div> 
<?php	
}
?>