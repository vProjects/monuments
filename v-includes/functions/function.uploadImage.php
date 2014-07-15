<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: login.php');
	}
	else {
			include('../class/class.getinfo.php');
			
			$getinfo = new getInfo();
			
			//include file upload class
			include('../class/class.upload_file.php');
			
			$file_upload = new FileUpload();
			
			
			if($_SERVER['REQUEST_METHOD'] == 'GET') {
				header('Location: ../../editprofile.php');
			}
			else if($_SERVER['REQUEST_METHOD'] == 'POST') {
				
				/*$getinfo->updateProfile($GLOBALS['_POST']);
				
				header('Location: ../../editprofile.php?info=successfully updated');*/
				
				/*echo '<pre>';
				print_r($_FILES);
				echo '</pre>';*/
				
				$_SESSION['username'];
			}
		
		
	}
	



?>