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
								Update Media
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
						<div class="form-container">
							<form class="form-horizontal" action="v-includes/functions/function.uploadImage.php" role="form" method="post" enctype="multipart/form-data">
								 <div class="form-group">
								    <label class="col-md-6 control-label label-form">Profile Pic</label>
								    <div class="col-md-6">
								      <input type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary" value="upload pic" >
								    </div>
								 </div>
								 <div class="form-group">
								    <label class="col-md-6 control-label label-form">Memorial Vid</label>
								    <div class="col-md-6">
								      <input type="text" id="youtubevideo" placeholder="Enter youtube video url" class="form-control form-custom" >
								      <button type="button" id="video-update" data-loading-text="updating..." class="btn btn-primary">Update</button>
								      
								    </div>
								 </div>
                                 <div id="gal_img">
                                     <div class="form-group">
                                        <label class="col-md-6 control-label label-form">Gallary Pic </label>
                                        <div class="col-md-6">
                                          <input type="file" name="file[]">
                                        </div>
                                     </div>
                                     <div class="form-group">
                                        <label class="col-md-6 control-label label-form">Gallary Pic </label>
                                        <div class="col-md-6">
                                          <input type="file" name="file[]">
                                        </div>
                                     </div>
                                     <div class="form-group">
                                        <label class="col-md-6 control-label label-form">Gallary Pic </label>
                                        <div class="col-md-6">
                                          <input type="file" name="file[]">
                                        </div>
                                     </div>
                                 </div>
								 <div class="form-group">
                                    <button class="btn btn-primary btn-custom">Submit</button>
                                    <button type="button" class="btn btn-warning btn-custom" id="add_img">Add Another</button>
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
	<!-- modal for crop and image upload -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">Download data in Excel</h4>
		      </div>
		      <div class="modal-body">
		      	<div class="row">
					<div class="col-lg-12 col-md-12 col-xs-12">
						<form class="form-horizontal" action="lib/function.uniquekey.php" method="post" role="form">
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10 upload-modal">
						      <input type="file" name="profile pic" id="fileToUpload" value="Click to choose file" class="btn btn-default">
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10 crop-picture upload-modal">
						      
						    </div>
							<input type="hidden" id="x" name="x" />
							<input type="hidden" id="y" name="y" />
							<input type="hidden" id="w" name="w" />
							<input type="hidden" id="h" name="h" />
						  </div>
						  
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10 upload-modal">
						      <input type="button" onclick="uploadFile();" name="profile picture" value="upload" id="uploadButton" class="btn btn-default">
						      <input type="button" name="crop file" value="crop" id="cropButton" class="btn btn-default">
						    </div>
						  </div>
						</form>	
					</div>	
				</div>	        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>	
	<!-- modal for crop and image upload -->
	


<?php include('v-includes/footer.php'); ?>
	<script>
		$('#myModal').on('hidden', function(){
		    $(this).data('modal', null);
		});
	</script>
