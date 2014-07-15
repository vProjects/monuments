<?php
	session_start();
	
	include('../class/class.getinfo.php');
	
	$getinfo = new getInfo();
	
	
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		
	}
	else if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		
		$result = $getinfo->login($email,$password);
		
		if($result == 1){
			$_SESSION['username'] = $email;
			header('Location: ../../manage.php');
		}
		else {
			header('Location: ../../login.php?error=wrong credentials');
		}
		
	}



?>