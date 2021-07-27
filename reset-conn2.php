<!DOCTYPE HTML>
<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="admin/layouts/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="admin/layouts/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="layouts/css/front.css" rel="stylesheet" type="text/css" media="all"/>		
<!--js-->
<script src="admin/layouts/js/jquery-2.1.1.min.js"></script> 
<!--icons-css-->
<link href="admin/layouts/css/font-awesome.css" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
</head>
<body>	
<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="homepage.php"><img src="admin/layouts/images/logo.jpg" alt="Forsah" width="60%" height="70px"></a>
				 </div>
			  </div><!-- /.container-fluid -->
			</nav>	
<?php


    session_start();
		

    include('connect.php');  
	
if(isset($_SESSION['creator'])){
    
   $id = $_SESSION['creator'];	

//print_r($_POST);
$password = $_POST['password'];
$hashedPass = sha1($password);		
$sql=$con->prepare("SELECT * FROM creator WHERE 
Password=?");
$sql->execute(array($hashedPass));
$row=$sql->fetch();
//print_r($row);
$count=$sql->rowCount();
	
//echo "<br>".$count;
if($hashedPass != ""){
	
	
if($count>0){
    
    $sql = $con->prepare("SELECT * FROM creator WHERE nationalid != $id");
    $sql->execute();
    $rows = $sql->fetchAll();

    foreach($rows as $pat)
    {
        
        if($hashedPass == $pat["Password"])
        {
           
            
			echo '
	 <div class="container" style="50px">
		  <div class="alert alert-info role="alert">
			   This Pssword Used before Please Try Again.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
		 </div>
	 </div>
	  
	 <div class="login-page">
	<div class="container text-center center-block" style="width:320px">
		<div class="" style="margin-bottom:30px;width:20px;float:left;margin-top:5px">
			
			<i style="font-weight:bold; font-size:28px;color:#B75E21" class="fa fa-key fa-5x"></i>
			
		</div>
		<div style="width:290px;margin-left:20px">
			<h1 class="text-center log" style="">Reset Password</h1>
		</div>
	</div>
	<div class="clearfix"></div>
    <div class="login-mai">  	
			<div class="login-block">
				<form action="reset-conn2.php" method="post" class="login">
					<div class="ast">
						<label style="margin-right:17px"> Password</label>
						<input style="width:400px" type="password" name="password" class="password" class="lock" placeholder="Password" required="">
						<i class="fa fa-check check check-pass"></i>
						<i class="fa fa-close close close-pass"></i>
						<i class="show-pass fa fa-eye fa-2x"></i>
						<div class="alert alert-danger empty-alert">Please Fill Your <strong>Password</strong></div>
						<div class="alert alert-danger long-alert">Please Password Must Be  <strong>6 digits</strong></div>
						<div class="alert alert-danger custom-alert">Please Password Must Be Contains<strong>One Uppercase Character</strong></div>
						<div class="alert alert-danger lower-alert">Please Password Must Be Contains<strong>One Lowercase Character</strong></div>
						<div class="alert alert-danger number-alert">Please Password Must Be Contains<strong>One Number</strong></div>
					</div>
					<input style="background-color:#FAD7A0;color:#000;margin-top:8px" type="submit" name="Sign In" value="Reset Password">
					<h3 style="padding-bottom:30">Remembered Your password?<a href="login.php"> Sign in Here</a></h3>				
				</form>
			</div>
      </div>
</div>	
	  
	  
	  ';
			
			
			
        }
    }
 
} else{
	
	 
	$sql = "UPDATE creator SET Password='$hashedPass'  WHERE nationalid=$id";

	$con->exec($sql);

	echo '
	 <div class="container" style="margin-top:50px">
		  <div class="alert alert-info role="alert">
			   Reset Password Added Successfully.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
		 </div>
	 </div>
	  
	 <div class="login-page">
	<div class="container text-center center-block" style="width:320px">
		<div class="" style="margin-bottom:30px;width:20px;float:left;margin-top:5px">
			
			<i style="font-weight:bold; font-size:28px;color:#B75E21" class="fa fa-key fa-5x"></i>
			
		</div>
		<div style="width:290px;margin-left:20px">
			<h1 class="text-center log" style="">Reset Password</h1>
		</div>
	</div>
	<div class="clearfix"></div>
    <div class="login-mai">  	
			<div class="login-block">
				<form action="reset-conn.php" method="post" class="login">
					<div class="ast show1">
						<input type="text" style="width:100%" name="email" class="email" placeholder="Enter Your Email To Reset password" required="">
						<i class="fa fa-check check"></i>
						<i class="fa fa-close close"></i>
						<div class="alert alert-danger empty-alert">Please Fill Your <strong>Email</strong></div>
						<div class="alert alert-danger long-alert">Please Your E-mail Must Be Contains <strong>@</strong></div>
						<div class="alert alert-danger custom-alert">Please Your E-mail Must Be Contains <strong>.com</strong></div>
					</div>
					<div class="ast show2">
						<input type="text" style="width:100%" name="phone" class="phone" placeholder="Enter Your Phone Number To Reset Password" required="">
						<i class="fa fa-check check"></i>
						<i class="fa fa-close close"></i>
						<div class="alert alert-danger empty-alert">Phone Number Can\'t Be <strong></strong>Empty</div>
						<div class="alert alert-danger long-alert">Phone Number Must Be Contains At Least  <strong>10 Numbers</strong></div>
						<div class="alert alert-danger custom-alert">Phone Number Must Be Contains Numbers <strong>Only</strong></div>
						<div class="alert alert-danger zero-alert">Phone Number Must Be Start With <strong>05</strong> Number</div>
					</div>
					<input style="background-color:#FAD7A0;color:#000;margin-top:8px" type="submit" name="Sign In" value="Reset Password">
					<!--<a style="background-color:#FAD7A0;color:#000;border:none;margin-top:10px;margin-bottom:3px" class="btn btn-info">Reset Password With Phone Number</a>-->
					<h3 style="padding-bottom:30">Remembered Your password?<a href="login.php"> Sign in Here</a></h3>				
				</form>
			</div>
      </div>
</div>';
	
	

	
  
	  }}else{
	
	
	/*include('logout.php');
	include('login.php');*/
	
	//echo "Not found UserName or password";
}
}elseif(isset($_SESSION['investor'])){
	
	
	$id = $_SESSION['investor'];	

//print_r($_POST);
$password = $_POST['password'];
$hashedPass = sha1($password);		
$sql=$con->prepare("SELECT * FROM investor WHERE 
Password=?");
$sql->execute(array($hashedPass));
$row=$sql->fetch();
//print_r($row);
$count=$sql->rowCount();
	
//echo "<br>".$count;
if($hashedPass != ""){
	
	
if($count>0){
    
    $sql = $con->prepare("SELECT * FROM investor WHERE nationalid != $id");
    $sql->execute();
    $rows = $sql->fetchAll();

    foreach($rows as $pat)
    {
        
        if($hashedPass == $pat["Password"])
        {
           
            
			echo '
	 <div class="container" style="50px">
		  <div class="alert alert-info role="alert">
			   This Pssword Used before Please Try Again.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
		 </div>
	 </div>
	  
	 <div class="login-page">
	<div class="container text-center center-block" style="width:320px">
		<div class="" style="margin-bottom:30px;width:20px;float:left;margin-top:5px">
			
			<i style="font-weight:bold; font-size:28px;color:#B75E21" class="fa fa-key fa-5x"></i>
			
		</div>
		<div style="width:290px;margin-left:20px">
			<h1 class="text-center log" style="">Reset Password</h1>
		</div>
	</div>
	<div class="clearfix"></div>
    <div class="login-mai">  	
			<div class="login-block">
				<form action="reset-conn2.php" method="post" class="login">
					<div class="ast">
						<label style="margin-right:17px"> Password</label>
						<input style="width:400px" type="password" name="password" class="password" class="lock" placeholder="Password" required="">
						<i class="fa fa-check check check-pass"></i>
						<i class="fa fa-close close close-pass"></i>
						<i class="show-pass fa fa-eye fa-2x"></i>
						<div class="alert alert-danger empty-alert">Please Fill Your <strong>Password</strong></div>
						<div class="alert alert-danger long-alert">Please Password Must Be  <strong>6 digits</strong></div>
						<div class="alert alert-danger custom-alert">Please Password Must Be Contains<strong>One Uppercase Character</strong></div>
						<div class="alert alert-danger lower-alert">Please Password Must Be Contains<strong>One Lowercase Character</strong></div>
						<div class="alert alert-danger number-alert">Please Password Must Be Contains<strong>One Number</strong></div>
					</div>
					<input style="background-color:#FAD7A0;color:#000;margin-top:8px" type="submit" name="Sign In" value="Reset Password">
					<h3 style="padding-bottom:30">Remembered Your password?<a href="login.php"> Sign in Here</a></h3>				
				</form>
			</div>
      </div>
</div>	
	  
	  
	  ';
			
			
			
        }
    }
 
} else{
	
	 
	$sql = "UPDATE investor SET Password='$hashedPass'  WHERE nationalid=$id";

	$con->exec($sql);

	echo '
	 <div class="container" style="margin-top:50px">
		  <div class="alert alert-info role="alert">
			   Reset Password Added Successfully.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
		 </div>
	 </div>
	  
	 <div class="login-page">
	<div class="container text-center center-block" style="width:320px">
		<div class="" style="margin-bottom:30px;width:20px;float:left;margin-top:5px">
			
			<i style="font-weight:bold; font-size:28px;color:#B75E21" class="fa fa-key fa-5x"></i>
			
		</div>
		<div style="width:290px;margin-left:20px">
			<h1 class="text-center log" style="">Reset Password</h1>
		</div>
	</div>
	<div class="clearfix"></div>
    <div class="login-mai">  	
			<div class="login-block">
				<form action="reset-conn.php" method="post" class="login">
					<div class="ast show1">
						<input type="text" style="width:100%" name="email" class="email" placeholder="Enter Your Email To Reset password" required="">
						<i class="fa fa-check check"></i>
						<i class="fa fa-close close"></i>
						<div class="alert alert-danger empty-alert">Please Fill Your <strong>Email</strong></div>
						<div class="alert alert-danger long-alert">Please Your E-mail Must Be Contains <strong>@</strong></div>
						<div class="alert alert-danger custom-alert">Please Your E-mail Must Be Contains <strong>.com</strong></div>
					</div>
					<div class="ast show2">
						<input type="text" style="width:100%" name="phone" class="phone" placeholder="Enter Your Phone Number To Reset Password" required="">
						<i class="fa fa-check check"></i>
						<i class="fa fa-close close"></i>
						<div class="alert alert-danger empty-alert">Phone Number Can\'t Be <strong></strong>Empty</div>
						<div class="alert alert-danger long-alert">Phone Number Must Be Contains At Least  <strong>10 Numbers</strong></div>
						<div class="alert alert-danger custom-alert">Phone Number Must Be Contains Numbers <strong>Only</strong></div>
						<div class="alert alert-danger zero-alert">Phone Number Must Be Start With <strong>05</strong> Number</div>
					</div>
					<input style="background-color:#FAD7A0;color:#000;margin-top:8px" type="submit" name="Sign In" value="Reset Password">
					<!--<a style="background-color:#FAD7A0;color:#000;border:none;margin-top:10px;margin-bottom:3px" class="btn btn-info">Reset Password With Phone Number</a>-->
					<h3 style="padding-bottom:30">Remembered Your password?<a href="login.php"> Sign in Here</a></h3>				
				</form>
			</div>
      </div>
</div>';
	
	

	
  
	  }}else{
	
	
	/*include('logout.php');
	include('login.php');*/
	
	//echo "Not found UserName or password";
}
	
	
}
	
	    
?>
	
	
	
	<!-- Start Footer -->
         <div class="footer">
			 <div class="container">
				 <div class="row">
					 <div class="col-md-12">
						 <!-- Start Help -->
						 <div class="contact text-center">
							 <div class="container">
								 <div class="row">
									 <div class="col-md-6 con">
										 <h3 style="color:#D68910">Contact</h3>
										 <p><i style="color:#D68910" class="fa fa-envelope-o"></i> contact@Fursah.com</p>
										 <p><i style="color:#D68910" class="fa fa-phone"></i> +966 545446161</p>
									 </div>
									 <!--<div class="col-md-4 con">
										 <h3>Pages</h3>
										 <p><a href="about.php" style="text-decoration:none;color:#FFF">About Us</a></p>
										 <p><a href="contact.php" style="text-decoration:none;color:#FFF">Contact Us</a></p>
									 </div>-->
									 <div class="col-md-6 con">
										 <h3 style="color:#D68910">More</h3>
										 <p><a href="terms.php" style="text-decoration:none;color:#FFF">Terms</a></p>
										 <p><a href="terms.php" style="text-decoration:none;color:#FFF">Privacy</a></p>
									 </div>
								 </div>
							 </div>
						 </div>
						 <!-- End Help -->
					 </div>
					 <div class="col-md-12 copy text-center">
						 Copyrights &copy; All Rights Reserved 2021 <span style="color:#D68910">FURSAH</span>
					 </div>
				 </div>
			 </div>
         </div>
       <!-- End Footer -->
<!--scrolling js-->
		<script src="admin/layouts/js/jquery.nicescroll.js"></script>
		<script src="admin/layouts/js/scripts.js"></script>
	    <script src="layouts/js/front.js"></script>
		<!--//scrolling js-->
<script src="admin/layouts/js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>


                      
						
