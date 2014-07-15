<?php 
	include('v-includes/class/class.getinfo.php');
	
	$getInfo = new getInfo(); 
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: login.php');
	}
	else {
		$ansestorDetails = $getInfo->getAncestorDetails($_SESSION['username']);
	}
	include('v-includes/header.php'); 


	

?>
	<div class="row row-main-form mrgn-nul">
		<div class="col-sm-12">
			<div class="container">
				
				<div class="inner-form">
					<div class="row">
						<div class="col-xs-4">
							<div class="line-img">
							</div>
						</div>
						<div class="col-xs-4">
							<h3 class="head-reg">
								Manage Details
							</h3>
						</div>
						<div class="col-xs-4">
							<div class="line-img">
							</div>
						</div>
					<h1 class="head-reg-2">
						<div class="inside-navigation">
							<div class="links"><a href="profile.php">View Profile</a></div>
							<div class="links"><a href="editprofile.php">Edit Profile</a></div>
							<div class="links"><a href="updatemedia.php">Edit Media</a></div>
							<div class="links">Pass Details</div>
							<div class="clearfix"></div>
						</div>	
					</h1>
						
					</div>
					<div class="img-decoration">
						<img src="images/decoration.png" class="img-responsive" />
					</div><!-- img-decoration -->
					
					<div class="main-form-cont">
						
						<div class="row row-deco-btm">
							<div class="col-xs-4">
								<img src="images/decoration.png" class="img-responsive" />
							</div>
							<div class="col-xs-4">
								<h3 class="home-head-btm">HOME</h3>
							</div>
							<div class="col-xs-4">
								<img src="images/decoration.png" class="img-responsive" />
							</div>
						</div>
					</div><!-- main-form-cont -->
					
				</div><!-- inner form -->
				
				
			</div><!-- container -->
		</div>
	</div>
	
	
<?php include('v-includes/footer.php'); ?>