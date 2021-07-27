<?php 

include "init.php";

include $tpl .  "header.php";


session_start();

$type = $_SESSION['type'];

if($type == "creator"){

  $id = $_SESSION['creatorid'];
	
}else if($type == "investor"){
	
	
	$id = $_SESSION['investorid'];
	
}

?>

       <!-- Start Apper Bar -->

		
			 <nav class="navbar navbar-default" style="font-size:14px">
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

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1 nav">
				  <ul class="nav navbar-nav navbar-right login links" style="height:65px">
					<li><a style="color:#515A5A;margin-top:25px" href="ideas.php">Ideas</a></li>
					<li><a style="color:#515A5A;margin-top:25px" href="investors.php">Investors</a></li>
					<li><a style="color:#515A5A;margin-top:25px" href="about.php">About Us</a></li>
					<li><a style="color:#515A5A;margin-top:25px" href="contact.php">Contact Us</a></li>  
					<!--<li title="Sign In"><a style="background-color:#D9D9D9;color:#515A5A;width:40px;height:40px;border:none;margin-top:-20px;margin-right:-5px" href="login.php" class="btn btn-primary log"><i style="font-size:22px;color:#D68910" class="fa fa-user"></i></a></li>-->
					<?php if(!isset($_SESSION['password'])){  ?> 
					  
					<li><a style="background-color:#D9D9D9;color:#515A5A;width:40px;height:40px;border:none;margin-top:-20px;margin-right: -15px;font-weight:bold;width:100px" href="signup.php" class="up">Sign Up</a></li>
					<li><a style="background-color:#D9D9D9;color:#515A5A;width:40px;height:40px;border:none;margin-top:-20px;margin-right: -15px;font-weight:bold;width:100px" href="login.php" class="up">Sign In</a></li>    
					 
					 <?php  }else{
					  
					  if($_SESSION['type'] == "creator"){
					  
					  ?> 
					  
					  <li class="dropdown" style="margin-top:-20px;margin-right:-5px">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i style="font-size:24px;color:#D68910" class="fa fa-user"></i> <!--<span class="caret"></span>--></a>
					  <ul class="dropdown-menu">
						<li><a href="Creator/profile.php" style="color:#000"><i class="fa fa-user"></i> Account Information</a></li>
						<li><a href="Creator/chat.php" style="color:#000"><i class="fa fa-envelope"></i> Messages</a></li>  
						<li><a href="logout.php" style="color:#000"><i class="fa fa-sign-out"></i> Sign out</a></li>
					  </ul>
					</li> 
					  
					  
					  
					 <?php 
					  
					  }elseif($_SESSION['type'] == "investor"){ ?>
						  
						  
					  <li class="dropdown" style="margin-top:-20px;margin-right:-5px">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i style="font-size:24px;color:#D68910" class="fa fa-user"></i> <!--<span class="caret"></span>--></a>
					  <ul class="dropdown-menu">
						<li><a href="Investor/profile.php" style="color:#000"><i class="fa fa-user"></i> Account Information</a></li>
						<li><a href="Investor/chat.php" style="color:#000"><i class="fa fa-envelope"></i> Messages</a></li>  
						<li><a href="logout.php" style="color:#000"><i class="fa fa-sign-out"></i> Sign out</a></li>
					  </ul>
					</li> 
					  
						  
					<?php	  
					  }elseif($_SESSION['type'] == "admin"){ ?>
					  
					  <li class="dropdown" style="margin-top:-20px;margin-right:-5px">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i style="font-size:24px;color:#D68910" class="fa fa-user"></i> <!--<span class="caret"></span>--></a>
					  <ul class="dropdown-menu">
						<li><a href="admin/Ideas.php" style="color:#000"><i class="fa fa-user"></i> Account Information</a></li>  
						<li><a href="logout.php" style="color:#000"><i class="fa fa-sign-out"></i> Sign out</a></li>
					  </ul>
					</li>
					  
					  
				  <?php	  }}  ?> 
				  </ul>
				</div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
       
	   <!-- End Apper Bar -->
    <?php


   $budget = $_POST["budget"];
   $part = $_POST["part"];
   $ideaid = $_POST["ideaid"];
   $creatorid = $_POST["creatorid"];

   

    include('connect.php');  
 
		$stmt = $con->prepare("INSERT INTO  requests(part , budget , creator_id , investor_id , 	idea_id) VALUES(:part, :budget, :creatorid, :investorid , :ideaid)");

		$stmt->execute(array(

			'part' => $part,
			'budget' => $budget,
			'creatorid'    => $creatorid,
			'investorid' => $id,
			'ideaid' => $ideaid

		));
	
	$sql = $con->prepare("SELECT ideas.* , creator.Fname FROM ideas INNER JOIN creator ON ideas.creator_ID = creator.nationalid WHERE ideas_ID=$ideaid");
	$sql->execute();
	$rows = $sql->fetchAll();

	foreach($rows as $pat)
	{


    ?>
     <div class="container">
		<div style="margin-top:40px" class="alert alert-info">Your Request Has Been Sent For <?php echo $pat["Fname"]; ?> On his Idea
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	</div> 
     <div class="idea_detail" style="height:500px">
        <div class="container">
			<div class="row">
				<a class="col-md-1" style="font-size:22px;color:#D68910" href="ideas.php" class="btn btn-primary confirm"><i class="fa fa-chevron-left"></i></a>
				<div class="col-md-5">
					<img style="width:440px;height:330px" class="img-responsive" src="data:image;base64,<?php echo $pat["image"]; ?>" alt="...">
				</div>
				<div class="col-md-6 details">
					<h3 style="color:#D68910"><?php echo $pat["title"]; ?></h3>
					<h4>By <?php echo $pat["Fname"]; ?></h4>
					<p><?php echo $pat["idea_description"]; ?></p>
					<p>Category:<span style="color:#D68910"> <?php echo $pat["idea_category_id"]; ?></span></p>
					<p>Tag:<span style="color:#D68910"> <?php echo $pat["idea_tag_id"]; ?></span></p>
					<p>Raised Amount:<span style="color:#D68910"> <?php echo $pat["Raised_money"] . " R"; ?></span></p>
					<p>Budget Amount:<span style="color:#D68910"> <?php echo $pat["Budget"] . " R"; ?></span></p>
					<p>Current Investors:<span style="color:#D68910"> <?php echo $pat["Current_investors"]; ?> </span></p>
					<p>Expired Date:<span style="color:#D68910"> <?php echo $pat["expiredDate"]; ?></span></p>
					<p>Status:<span style="color:#D68910"> <?php echo $pat["Status"]; ?></span></p>
					<p style="font-size:18px">Are You Interested?</p>
					<a style="font-size:18px" href="#" data-toggle="modal" data-target="#request" class="request"><i class="fa fa-envelope-o"></i> Send Request To Creator</a>
				</div>
			</div>
		</div>
     </div>
     
   <?php } ?>

<div class="container modal" style="height:350px;width:400px;margin-top:170px;background-color:#FFF;padding-top:30px;border-radius:5px;font-family:Athelas" id="request" tabindex="-1" role="dialog" aria-hidden="true">
	
	     <form style="margin-top:20px" action="add_part.php" method="post">
			<h3 class="text-center" style="font-weight:bold;color:#515A5A;padding-bottom:10px;margin-top:10px">Do You Participate Or Not?</h3> 
			<div class="form-group" style="margin-left:40px">
              <div class="form-label-group">
                <input id="yes" type="radio" value="Yes" name="part" style="width:15px;height:15px" required="required" autofocus="autofocus">
				<label for="yes" style="font-size:15px">Yes</label>  
              </div>
            </div>
			<div class="form-group">
              <div class="form-label-group" style="margin-left:40px">
                <input id="no" type="radio" value="No" name="part" style="width:15px;height:15px" required="required" autofocus="autofocus">
				<label for="no" style="font-size:15px">No</label>   
              </div>
            </div>  
			<h3 class="text-center" style="font-weight:bold;color:#515A5A;padding-bottom:10px;margin-top:25px">Do You Add Budget Amount?</h3> 
            <div class="form-group" style="margin-left:40px">
              <div class="form-label-group">
                <input style="width:300px" type="text" name="budget" class="form-control" placeholder="Budget Amount" required="required" autofocus="autofocus">
              </div>
            </div>
            <input style="background-color:#FFF;color:#D68910;border:1px solid #D68910;width:300px;margin-left:40px" type="submit" class="btn btn-primary btn-block" value="Send"/>
          </form>
	
	
</div>


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
<?php include  $tpl . "footer.php"; ?>