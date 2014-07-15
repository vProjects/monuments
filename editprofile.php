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
								Edit Profile
							</h3>
						</div>
						<div class="col-xs-4">
							<div class="line-img">
							</div>
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
					<div class="img-decoration">
						<img src="images/decoration.png" class="img-responsive" />
					</div><!-- img-decoration -->
					
					<div class="main-form-cont">
						<div class="form-container-edit-profile">
							<form class="form-horizontal" action="v-includes/functions/function.editprofile.php" role="form" method="post">
								 <div class="form-group">
								    <label class="col-md-4 col-sm-offset-2 control-label label-form">First Name</label>
								    <div class="col-md-6">
								      <input type="text" value="<?php echo $ansestorDetails[0]['firstname'] ?>" name="firstName" class="form-control form-custom" >
								    </div>
								 </div>
								 <div class="form-group">
								    <label class="col-md-4 col-sm-offset-2 control-label label-form">Middle Name</label>
								    <div class="col-md-6">
								      <input type="text" value="<?php echo $ansestorDetails[0]['middlename'] ?>" name="middleName" class="form-control form-custom" >
								    </div>
								 </div>
								 <div class="form-group">
								    <label class="col-md-4 col-sm-offset-2 control-label label-form">Last Name</label>
								    <div class="col-md-6">
								      <input type="text" value="<?php echo $ansestorDetails[0]['lastname'] ?>" name="lastName"  class="form-control form-custom" >
								    </div>
								 </div>
								 <div class="form-group">
								    <label class="col-md-4 col-sm-offset-2 control-label label-form">Nickname</label>
								    <div class="col-md-6">
								      <input type="text" value="<?php echo $ansestorDetails[0]['nickname'] ?>"  name="nickname" class="form-control form-custom" >
								    </div>
								 </div>
								 <div class="form-group">
								    <label class="col-md-4 col-sm-offset-2 control-label label-form">Born</label>
								    <div class="col-md-6">
								      <input type="text" value="<?php echo $ansestorDetails[0]['born'] ?>" name="bornDate" class="form-control form-custom" id="mydate1" name="bornDate" >
								    </div>
								 </div>
								 <div class="form-group">
								    <label class="col-md-4 col-sm-offset-2 control-label label-form">Died</label>
								    <div class="col-sm-6">
								      <input type="text" value="<?php echo $ansestorDetails[0]['died'] ?>" name="diedDate" class="form-control form-custom" id="mydate2" name="diedDate" >
								    </div>
								 </div>
								 <div class="form-group">
								    <label class="col-md-4 col-sm-offset-2 control-label label-form">Obituary</label>
								    <div class="col-md-6">
								      <textarea rows="6" id="editor1" name="Obituary"><?php echo $ansestorDetails[0]['Obituary'] ?></textarea>
								    </div>
								 </div>
								 <div class="form-group">
								    <label class="col-md-4 col-sm-offset-2 control-label label-form">Biography</label>
								    <div class="col-md-6">
								      <textarea rows="6" id="editor2" name="Biography"><?php echo $ansestorDetails[0]['Biography'] ?></textarea>
								    </div>
								 </div>
								 <div class="form-group">
								 	<button class="btn btn-primary btn-custom">Update</button>
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
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
		<script>
			CKEDITOR.replace('editor1', { filebrowserBrowseUrl: 'ss/index.html'});
			CKEDITOR.replace('editor2', { filebrowserBrowseUrl: 'ss/index.html'});
		</script>
	
<?php include('v-includes/footer.php'); ?>