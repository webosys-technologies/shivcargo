<?php
include "db/config.php";
$dcplace_ctyid=$_POST["dcty_id"]; 
$bok_cityplaceid=0;
//$bok_cityplaceid=$_POST["bok_cityplaceid"];
$sql_cityplace="select * from des_city_place";
$res_cityplace=mysql_query($sql_cityplace) or die(mysql_error());
?>
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">City Place
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="dcplace_id" style="width:490px;height:35px;" id="name" required="required">
													<option value="0">Select Place</option>
												<?php 
												while($f_cityplace=mysql_fetch_array($res_cityplace))
												{
												?>
                                                    
                                                     <option value="<?php echo $f_cityplace["dcplace_id"]?>"><?php echo $f_cityplace["dcplace_name"]?></option>
												<?php } ?>		
												</select>
                                            </div>
                                        </div>  