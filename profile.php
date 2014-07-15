<?php 
	include('v-includes/class/class.getinfo.php');
	
	$getInfo = new getInfo(); 
	session_start();
	if(!isset($_SESSION['username'])){
		
		//try to use the get value provided by the url
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
			if(isset($GLOBALS['_GET']['id'])){
				$url = $getInfo->getUrl($GLOBALS['_GET']['id']);
				
				
				if($url == 'no url attached'){
					
					//if no url is attached send user to index page
					header('Location: index.php');
				}
				else if($url == 'wrong key') {
					//if there is wrong key send user to 404 page
					header('location: 404.php');
				}
				else {
					
					//if url is set then show the profile to the user
					$ansestorDetails = $getInfo->getAncestorDetailsByKey($url);

				}
				
			}
			else {
				header('Location: index.php');
			}
		}
	}
	else {
		$ansestorDetails = $getInfo->getAncestorDetails($_SESSION['username']);
	}
	include('v-includes/header.php'); 


	

?>
	
	<!-- registration form ends -->
	
	<div class="row row-main-form mrgn-nul">
		<div class="col-sm-12">
			<div class="container">
			
				<div class="inner-form-profile">
					<div class="row">
						<div class="col-xs-4">
							<div class="line-img">
							</div>
						</div>
						<div class="col-xs-4">
							<h3 class="head-reg">
								Profile Page
							</h3>
						</div>
						<div class="col-xs-4">
							<div class="line-img">
							</div>
						</div>
					</div>
					<h1 class="head-reg-2">
						<?php echo $ansestorDetails[0]['Obituary']; ?>
					</h1>
					<div class="img-decoration">
						<img src="images/decoration.png" class="img-responsive" />
					</div><!-- img-decoration -->
					
					<div class="visible-xs xs-profile-pic profile-pic">
						<img src="userimage/<?php echo $ansestorDetails[0]['profileimage'] ?>" class="img-responsive img-circle img-thumbnail" />
					</div>
					<p class="profile-name visible-xs">
									<?php echo $ansestorDetails[0]['firstname'].' '.$ansestorDetails[0]['middlename'].' '.$ansestorDetails[0]['lastname']; ?>
					</p>
					<p class="profile-date visible-xs">
						<?php echo '('.$ansestorDetails[0]['born'].'-'.$ansestorDetails[0]['died'].')' ?>
					</p>
					<div class="profile-banner">
						<img class="img-responsive vintage-pic" src="images/vintage-frame.png" />
						
						<div class="row row-banner-profile">
							<div class="col-sm-4 col-sm-offset-1">
								
									<img src="userimage/<?php echo $ansestorDetails[0]['profileimage'] ?>" class="img-responsive img-circle hidden-xs img-thumbnail" />
								
								<p class="profile-name hidden-xs">
									<?php echo $ansestorDetails[0]['firstname'].' '.$ansestorDetails[0]['middlename'].' '.$ansestorDetails[0]['lastname']; ?>
								</p>
								<p class="profile-date hidden-xs">
									<?php echo '('.$ansestorDetails[0]['born'].'-'.$ansestorDetails[0]['died'].')' ?>
								</p>
							</div>
							<div class="col-sm-7">
								<p class="para-profile-det">
									<?php echo strip_tags($ansestorDetails[0]['Biography']); ?>
								</p>
							</div>
						</div>
						
					</div><!-- profile banner -->
					
					<div class="row decoration-profile">
						<div class="col-xs-4">
							<div class="line-img">
							</div>
						</div>
						<div class="col-xs-4">
							<img src="images/decoration.png" class="img-responsive" />
						</div>
						<div class="col-xs-4">
							<div class="line-img">
							</div>
						</div>
					</div><!-- decoration-profile ends -->
					
					<div class="row">
						<div class="col-sm-4 pos-rel-profile">
							<div class="prof-det-cols">
								<img class="img-responsive" src="images/profile-back.png" />
								<div class="content-profile">
									<img src="images/profile2.png" class="img-responsive img-prof" />
									<p class="profile-name">
										George Washington
									</p>
									<p class="prof-det">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut Lorem ipsum dolor sit amet,
									</p>
								</div>
							</div>
						</div>
						<div class="col-sm-4 pos-rel-profile">
							<div class="prof-det-cols">
								<img class="img-responsive" src="images/profile-back.png" />
								<div class="content-profile">
									<img src="images/profile1.png" class="img-responsive img-prof" />
									<p class="profile-name">
										George Washington
									</p>
									<p class="prof-det">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut Lorem ipsum dolor sit amet,
									</p>
								</div>
							</div>
						</div>
						<div class="col-sm-4 pos-rel-profile">
							<div class="prof-det-cols">
								<img class="img-responsive" src="images/profile-back.png" />
								<div class="content-profile">
									<img src="images/profile3.png" class="img-responsive img-prof" />
									<p class="profile-name">
										George Washington
									</p>
									<p class="prof-det">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut Lorem ipsum dolor sit amet,
									</p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row decoration-profile">
						<div class="col-xs-4">
							<div class="line-img">
							</div>
						</div>
						<div class="col-xs-4">
							<img src="images/decoration.png" class="img-responsive" />
						</div>
						<div class="col-xs-4">
							<div class="line-img">
							</div>
						</div>
					</div><!-- decoration-profile ends -->
					
					<div class="vdo-prof">
						<iframe width="560" height="315" class="img-responsive" src="//www.youtube.com/embed/<?php echo $ansestorDetails[0]['videoid'] ?>" frameborder="0" allowfullscreen></iframe>
					</div>
					
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