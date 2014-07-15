<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: login.php');
	}
	else {
			include('../class/class.getinfo.php');
			
			$getinfo = new getInfo();
			
			
			if($_SERVER['REQUEST_METHOD'] == 'GET') {
				header('Location: ../../editprofile.php');
			}
			else if($_SERVER['REQUEST_METHOD'] == 'POST') {
				
				$getinfo->updateProfile($GLOBALS['_POST']);
				
				header('Location: ../../editprofile.php?info=successfully updated');
				
				
			}
		
		
	}
	



?>