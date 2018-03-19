<?php
    ob_start(); // Initiate the output buffer
?>
<?php
  //$referrer = $_SERVER['REMOTE_ADDR'];
  //if ($referrer!=="196.207.72.171")
  //header('Location: /comming-soon/');    
	//$sitename="http://www.shivcargoagency.com/";
if($_SERVER["HTTP_HOST"]=="localhost")
{
    $sitename="http://localhost/Shivcargo/";
}
elseif($_SERVER["HTTP_HOST"]=="webosys.com")
{
	
	$sitename="http://webosys.com/shivcargo/";
}
else
{
    $sitename="http://www.shivcargoagency.com/";
}
        
	
?>
<?php
    session_start();
	date_default_timezone_set('Asia/Kolkata');
?>
<?php include('./db/config.php'); ?>
<?php
if (isset($_COOKIE["logintoken"]))
{
    $myid=$_COOKIE["myid"];
    $token=$_COOKIE["logintoken"];
    $q="Select * from admin 
	where id='$myid' AND logintoken='$token' AND status='1'";
    $result = mysql_query($q);
	if (mysql_num_rows($result)==0) 
    {
        header("location:login.php");
    }
}
else
{
	header("location:login.php");
}
	$f= mysql_fetch_array($result);
    $logintoken=$f["logintoken"]; 
    $username=$f["username"];
    $admid=$f["id"];
    $fstname=$f["fstname"];
    $lstname=$f["lstname"];
    $cemail=$f["email"];
    $userid=$f["id"]; 
	$img=$f["image"];
        $branch_id=$f["branch_id"];
                ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SHIV CARGO AGENCY</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="css/icheck/flat/green.css" rel="stylesheet" />
    <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />

    <script src="js/jquery.min.js"></script>
    <script src="js/nprogress.js"></script>
    
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
  <script type="text/javascript"src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
   <link href="css/datepicker.css" rel="stylesheet" />
   
    <script>
        NProgress.start();
    </script>
    
    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
		<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<!-- polyfiller file to detect and load polyfills -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>

</head>
<body class="nav-md">
	<div class="container body">
		<div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?php echo $sitename; ?>" class="site_title"> <span>SHIV CARGO AGENCY</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <?php 
							if($img==''){ $img='no-image.jpg';} else { $img=$img;}
						?>
						<div class="profile_pic">
                            <img src="uploads/admin/large/<?php echo $img; ?>" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info"> 
                            <h2><span style="text-transform:capitalize"><?php echo $fstname,' ',$lstname;?> </h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
					<?php include("./include/menu.php"); ?>
					<!-- sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <?php 
										if($img==''){ $img='no-image.jpg';} else { $img=$img;}
									?>
									<img src="uploads/admin/large/<?php echo $img;?>" alt=""><span style="text-transform:capitalize"><?php echo $fstname,' ',$lstname;?> 
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <?php /* <li><a href="index.php?do=profile">  Profile</a>
                                    </li>
									<li><a href="index.php?do=change_password">  Change Password</a>
                                    </li> */?>
                                    <li><a href="index.php?do=logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li> 

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->
			<!-- page content -->
            <div class="right_col" role="main">