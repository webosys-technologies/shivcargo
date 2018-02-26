<?php
include "db/config.php";
$dcplace_ctyid=$_POST["dcty_id"]; 
//$bok_cityplaceid=0;
//$bok_cityplaceid=$_POST["bok_cityplaceid"];
$sql_cityplace="select * from des_city_place where dcplace_id='$dcplace_ctyid'";
$res_cityplace=mysql_query($sql_cityplace) or die(mysql_error());
$f_cityplace=mysql_fetch_array($res_cityplace);
$city_id=$f_cityplace["dcplace_ctyid"];

$sql_city="select * from des_cities where dcty_id='$city_id'";
$res_city=mysql_query($sql_city) or die(mysql_error());

?>
										 <select name="bok_descityid" style="width: 234px !important; height: 35px !important;" id="name" required="required">
													<option value="0">Select City</option>
												<?php 
												while($f_city=mysql_fetch_array($res_city))
												{
												?>
                                                    
                                                     <option value="<?php echo $f_city["dcty_id"]?>"><?php echo $f_city["dcty_name"] ?></option>
												<?php } ?>		
												</select>