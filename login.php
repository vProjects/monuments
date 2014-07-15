<?php 
	
	include('v-includes/header.php'); 
	
	if(isset($_SESSION['username'])){
		header('location: editprofile.php');
	}
	
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
								Log In
							</h3>
						</div>
						<div class="col-xs-4">
							<div class="line-img">
							</div>
						</div>
					</div>
					<div class="img-decoration">
						<img src="images/decoration.png" class="img-responsive" />
					</div><!-- img-decoration -->
					
					<div class="main-form-cont">
						<div class="form-container">
							<form class="form-horizontal" action="v-includes/functions/function.login.php" role="form" method="post">
								 <div class="form-group">
								    <label class="col-md-6 control-label label-form">Username</label>
								    <div class="col-md-6">
								      <input type="text" name="email" class="form-control form-custom-log" >
								    </div>
								 </div>
								 <div class="form-group">
								    <label class="col-md-6 control-label label-form">Password</label>
								    <div class="col-md-6">
								      <input type="password" name="password" class="form-control form-custom-log" >
								    </div>
								 </div>
								 <div class="form-group">
								 	<div class="col-sm-offset-1 col-sm-6">
								      <div class="checkbox">
								        <label class="label-form">
								          <input type="checkbox"> Remember me
								        </label>
								      </div>
								    </div>
								    <div class="col-sm-5">
								 		<button class="btn btn-primary btn-custom-login">Log In</button>
								 	</div>
								 </div>
							</form>
							<a href="#" class="frgt-pass">
								[Forgot Password]
							</a>
						</div><!-- form-container -->
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