<?php
    
	session_start();
	
	include('../class/class.getinfo.php');
	
	$getInfo = new getInfo();
	
	$url = $_POST['url'];
	
	parse_str( parse_url( $url, PHP_URL_QUERY ), $array_of_vars );
	
	//variable that contains the video id
	
	//echo $array_of_vars['v'];    
	
	
	//calling youtube api to check the existence of the video
	$requestAPI = 'http://gdata.youtube.com/feeds/api/videos/'.$array_of_vars['v'];
	
	
	$headers = get_headers($requestAPI);
	if (!strpos($headers[0], '200')) {
	    echo 0;
	}
	else {
		$key = $getInfo->getUserKey($_SESSION['username']);
		
		//save video for the ancestor
		$getInfo->updateAncestorVideo($key,$array_of_vars['v']);
		
		echo 1;
	}
	



    
    
?>