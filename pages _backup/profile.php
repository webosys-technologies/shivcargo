<?php
//--------------------------------------------------------------------------------------------------------
// view all profile data of current profile
//--------------------------------------------------------------------------------------------------------	
	$sql_profile="select * from admin where id='$admid'";
	$result_profile=mysql_query($sql_profile);
	$row_profile=mysql_fetch_array($result_profile);
?>				
				<div class="">
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
								<div class="clearfix"></div>
                                <div class="x_content">

                                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left"> 
									

                                        <div class="profile_img">

                                            <!-- end of image cropping -->
                                            <div id="crop-avatar">
                                                <!-- Current avatar -->
                                                <?php 
												if($img==''){ $img='no-image.jpg';} else { $img=$img;}
												?>
												<div class="avatar-view" title="Change the avatar">
                                                    <img src="uploads/admin/large/<?php echo $img;?>" height="215" alt="Avatar">
                                                </div> 
                                            </div>
                                           </div>
                                        <h3><span style="text-transform:capitalize"><?php echo $fstname,' ',$lstname;?></h3>

                                        <ul class="list-unstyled user_data"> 

                                            <li>
                                                <i class="fa fa-briefcase user-profile-icon"></i> System Admin
                                            </li>

                                            <li class="m-top-xs">
                                                <i class="fa fa-external-link user-profile-icon"></i>
                                                <a href="$sitename" target="_blank"><?php echo $sitename; ?></a>
                                            </li>
                                        </ul> 

                                    </div>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
										<table class="data table table-striped no-margin">
                                            <tbody>
                                                <tr style="background:pink">
                                                    <td>Name</td>
                                                    <td style="text-transform:capitalize"><?php echo $fstname,' ',$lstname;?></td>
                                                </tr>
												<tr style="background:lightgray">
                                                    <td>Email (Or username)</td>
                                                    <td><?php echo $row_profile["username"]; ?></td>
                                                </tr>
												<tr style="background:pink">
                                                    <td>Access Type</td>
                                                    <td style="text-transform:capitalize">Admin</td>
                                                </tr> 
												<tr style="background:pink">
                                                    <td>Contact Number</td>
                                                    <td><?php echo $row_profile["contct"]; ?></td>
                                                </tr>
												<tr style="background:lightgray">
                                                    <td>Register Date</td>
                                                    <td><?php echo $row_profile["regdate"]; ?></td>
                                                </tr>
												<tr style="background:pink">
                                                    <td>Status</td>
                                                    <td style="text-transform:capitalize"><?php if($f["status"]==1){ echo 'Active';} else { echo "Inactive"; }?></td>
                                                </tr>
												<tr style="background:lightgray">
                                                    <td>Last Login Ip</td>
                                                    <td><?php echo $f["lastloginip"]; ?></td>
                                                </tr>
												<tr style="background:pink">
                                                    <td>Last Login Date</td>
                                                    <td style="text-transform:capitalize"><?php echo $f["lastlogindate"];?></td>
                                                </tr>
                                            </tbody>
                                        </table>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>