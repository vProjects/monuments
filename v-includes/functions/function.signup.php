<?php

	
	include('../class/class.getinfo.php');
	
	$getinfo = new getInfo();
	
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		header('location: index.php');
			
	}
	else if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		if(substr($_SERVER['HTTP_REFERER'], -5) == $_POST['key']){
			
			//create a users array to save users email and password
			$user = array(
						'email' => $_POST['email'],
						'password' => md5($_POST['password']),
						'key'=> $_POST['key']
						);
			
			//calls a function which saves user and his ancestor
			$saveValues = $getinfo->saveUserAndAncestor($GLOBALS['_POST'],$user);
			
			header('location: editprofile.php?id='.$_POST['key']);
			
			
		}
		else {
			echo 'something is wrong';
		}
		
	} 

?>