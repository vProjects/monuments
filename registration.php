<?php

	include('v-includes/class/class.getinfo.php');
	
	$getinfo = new getInfo();
	
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(isset($GLOBALS['_GET']['id'])){
			$url = $getinfo->getUrl($GLOBALS['_GET']['id']);
			
			if($url == 'no url attached'){
				
				//if no url is attached allow user to sign up
				echo 'no url attached';
			}
			else if($url == 'wrong key') {
				//if there is wrong key send user to 404 page
				header('location: 404.html');
			}
			else {
				
				//if url is set then send the user to the profile page
				header('location: profile.php?id='.$url);
			}
			
		}
		else {
			echo 'I am not set';
		}
	}
	
	

?>
<?php include('v-includes/header.php'); ?>
	<!-- registration form ends -->
	
	<div class="row row-main-form mrgn-nul">
		<div class="col-sm-12">
			<div class="container">
				
				<div class="inner-form inner-form-cntctus">
					<div class="row">
						<div class="col-xs-4">
							<div class="line-img">
							</div>
						</div>
						<div class="col-xs-4">
							<h3 class="head-reg">
								Create Profile
							</h3>
						</div>
						<div class="col-xs-4">
							<div class="line-img">
							</div>
						</div>
					</div>
					<h1 class="head-reg-2">
						Lorem ipsumlorem ip sum lorem ipsumlorem <span class="head-reg">ip</span>
					</h1>
					<div class="img-decoration">
						<img src="images/decoration.png" class="img-responsive" />
					</div><!-- img-decoration -->
					
					<div class="main-form-cont">
						<div class="form-container">
							<form class="form-horizontal" action="v-includes/functions/function.signup.php" role="form" method="post">
								<div class="reg-info">
									<p>Please set your Email and password for future login</p>
								</div>
								<div class="form-group">
								    <label class="col-md-6 control-label label-form">Email</label>
								    <div class="col-md-6">
								      <input type="email" class="form-control form-custom-log" name="email" placeholder="username">
								    </div>
								 </div>
								<div class="form-group">
								    <label class="col-md-6 control-label label-form">Password</label>
								    <div class="col-md-6">
								      <input type="password" class="form-control form-custom-log" name="password" placeholder="password" >
								    </div>
								 </div>	 
								<div class="reg-info">
									<p>Basic info about passed family member</p>
									<span>You can fill it later also</span>
								</div>

								<div class="form-group">
								    <label class="col-md-6 control-label label-form">First Name</label>
								    <div class="col-md-6">
								      <input type="text" class="form-control form-custom-log" name="firstName" >
								    </div>
								 </div>
								 <div class="form-group">
								    <label class="col-md-6 control-label label-form">Middle Name</label>
								    <div class="col-md-6">
								      <input type="text" class="form-control form-custom-log" name="middleName" >
								    </div>
								 </div>
								 <div class="form-group">
								    <label class="col-md-6 control-label label-form">Last Name</label>
								    <div class="col-md-6">
								      <input type="text" class="form-control form-custom-log" name="lastName" >
								    </div>
								 </div>
								 <div class="form-group">
								    <label class="col-md-6 control-label label-form">Nickname</label>
								    <div class="col-md-6">
								      <input type="text" class="form-control form-custom-log" name="nickname" >
								    </div>
								 </div>
								 <div class="form-group">
								    <label class="col-md-6 control-label label-form">Born</label>
								    <div class="col-md-6">
								      <input type="text" class="datepicker form-control form-custom-log" name="bornDate">
								    </div>
								 </div>
								 <div class="form-group">
								    <label class="col-md-6 control-label label-form">Died</label>
								    <div class="col-sm-6">
								      <input type="text" class="datepicker form-control form-custom-log" name="diedDate" >
								    </div>
								 </div>
								 <div class="form-group">
								    <label class="col-md-6 control-label label-form">Obituary</label>
								    <div class="col-md-6">
								      <textarea class="form-control form-custom-log" rows="3" name="Obituary" ></textarea>
								    </div>
								 </div>
								 <div class="form-group">
								    <label class="col-md-6 control-label label-form">Biography</label>
								    <div class="col-md-6">
								      <textarea class="form-control form-custom-log" rows="3" name="Biography"></textarea>
								      <input type="hidden" name="key" value="<?php echo $GLOBALS['_GET']['id'] ?>" />
								    </div>
								 </div>
								 <div class="form-group">
								 	<button class="btn btn-primary btn-custom">Setup Account</button>
								 </div>
							</form>
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