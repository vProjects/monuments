<?php
	
	session_start();
	
	include('../class/class.getinfo.php');
	
	//create a getInfo object
	$getinfo = new getInfo();
	
	
	
	
		
	//takes the image size
	$img = getimagesize('../../temp/'.$GLOBALS['_POST']['imagename']);
	//print_r($img);
	//gets the image extension
	$ext = pathinfo('../../temp/'.$GLOBALS['_POST']['imagename'], PATHINFO_EXTENSION);
	

	
	


	$responsiveWidth = $GLOBALS['_POST']['width'];
	$responsiveHeight = $GLOBALS['_POST']['height'];
	
	$actualWidth = $img[0];
	$actualHeight = $img[1];
	
	$xCoordinate = ($actualWidth/$responsiveWidth)*$GLOBALS['_POST']['xcordinate'];
	$yCoordinate = ($actualHeight/$responsiveHeight)*$GLOBALS['_POST']['ycordinate'];
	
	
	$targ_w = ($actualWidth/$responsiveWidth)*150;
	$targ_h = ($actualHeight/$responsiveHeight)*150;
	
	
	$jpeg_quality = 90;
	$png_quality = 9;
	
	$src = '../../temp/'.$GLOBALS['_POST']['imagename'];
	
	
	if($ext == 'png') {
		$img_r = imagecreatefrompng($src);
		$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
		imagecopyresampled($dst_r,$img_r,0,0,$xCoordinate,$yCoordinate,$targ_w,$targ_h,$targ_w,$targ_h);
		imagepng($dst_r,'../../userimage/'.$GLOBALS['_POST']['imagename'], $png_quality);
		
		//save the ancestors profile image into the database
		$getinfo->saveProfileImage($_SESSION['username'],$GLOBALS['_POST']['imagename']);
	}
	else if($ext == 'jpeg' ) {
		$img_r = imagecreatefromjpeg($src);
		$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
		imagecopyresampled($dst_r,$img_r,0,0,$xCoordinate,$yCoordinate,$targ_w,$targ_h,$targ_w,$targ_h);
		imagejpeg($dst_r,'../../userimage/'.$GLOBALS['_POST']['imagename'], $jpeg_quality);
		
		//save the ancestors profile image into the database
		$getinfo->saveProfileImage($_SESSION['username'],$GLOBALS['_POST']['imagename']);
	}
	else if($ext == 'jpg') {
		$img_r = imagecreatefromjpeg($src);
		$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
		imagecopyresampled($dst_r,$img_r,0,0,$xCoordinate,$yCoordinate,$targ_w,$targ_h,$targ_w,$targ_h);
		imagejpeg($dst_r,'../../userimage/'.$GLOBALS['_POST']['imagename'], $jpeg_quality);
		
		//save the ancestors profile image into the database
		$getinfo->saveProfileImage($_SESSION['username'],$GLOBALS['_POST']['imagename']);
	}/*
	else if($ext == 'bmp') {
			$img_r = imagecreatefromwbmp($src);
			$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
			imagecopyresampled($dst_r,$img_r,0,0,$xCoordinate,$yCoordinate,$targ_w,$targ_h,$actualWidth,$actualHeight);
			imagewbmp($dst_r,'../../userimage/'.$GLOBALS['_POST']['imagename'], $jpeg_quality);
			
		}*/
	
	
	
		
	echo 'userimage/'.$GLOBALS['_POST']['imagename'];



?>