<?php
	include('class.dbconnection.php');
	include('Hashids.php');
	class getInfo {
		
	   /*
	   * short key scanned by the user
	   */
	 
	    private $shortKey;
	 
		/*
		* url associated with the short key
		*/
		    private $url;
		  
		  
		/*
		* short key value like
		* Here in our system every short key (ex: 'CytsF') has a unique integer values like 5 or 6
		*/
		    private $shortKeyValue;
		   
		/*
		* Applications hash property which will make our urls unique in the world
		*/
		private $salt = 'Living Monument';
		
		
		/* 
		 * hash library object 
		*/
			private $hashids;  
				   
		   
		/*
		* basic constructor which enables the database connectivity 
		*/
		
		function __construct(){
			$dbconnection = new dbconnnection();
			$this->link = $dbconnection->ConnectToDb('secure');
			
			//creates the hashid object by using salt 
			$this->hashids = new Hashids\Hashids($this->salt,5);
		}
		
		
		
		/*
		 * function to get the url if any url is set if not then send 'url not set' and if there is wrong url assigned it says wrong key
		 */	
		
		function geturl($key) {
			$this->shortKey = $key;
			$serialKey = $this->hashids->decrypt($this->shortKey);
			
			if(count($serialKey)){
				
				$serialKey = $serialKey[0];
				$query = $this->link->prepare("SELECT url FROM uniquekey WHERE serialKey = '$serialKey'");
			
				$query->execute();
				$url = $query->fetchALL(PDO::FETCH_ASSOC);
				
				if($url[0]['url'] == null){
					
					//for the first time for every qr code it says no url attached
					return 'no url attached';
				}
				else {
					
					//if url is set then it returns the url which will be used to send user to that url
					return $url[0]['url']; 
				}
				
			}
			else {
			
				//returns wrong key when some one tries to play with url so that he can get the free profile page
				return 'wrong key';
			}
			
		}
		
		
		/*
		 * function to save the users data that activates a basic profile
		 */	   
		 function saveUserAndAncestor($ancestor, $user){
		 		
				//insert user
		 		$querySaveUser = $this->link->prepare("INSERT INTO `users` (`email`,`password`,`key`) VALUES(?,?,?)");
				$values = array($user['email'],$user['password'],$user['key']);
				$querySaveUser->execute($values);
				$countSaveUser = $querySaveUser->rowCount();
				
				//insert ansestor
				$querySaveAncestor = $this->link->prepare("INSERT INTO `ancestor` (`firstname`,`middlename`,`lastname`,`nickname`,
																					`born`,`died`,`Obituary`,`Biography`, `key`) VALUES(?,?,?,?,?,?,?,?,?)");
					$values = array(
									$ancestor['firstName'],
									$ancestor['middleName'],
									$ancestor['lastName'],
									$ancestor['nickname'],
									$ancestor['bornDate'],
									$ancestor['diedDate'],
									$ancestor['Obituary'],
									$ancestor['Biography'],
									$ancestor['key'],
									);		
				$querySaveAncestor->execute($values);
				$countSaveAncestor = $querySaveAncestor->rowCount();
				
				//update key
				$key = $ancestor['key'];
				$queryUpdateKey = $this->link->prepare("update uniquekey set url = '$key' where uniqueKey = '$key'");
				$queryUpdateKey->execute();
				
				$countUpdateKey = $queryUpdateKey->rowCount();
				
				$saveValues = array(
									'usersave' => $countSaveUser,
									'ancestorsave' => $countSaveAncestor,
									'urlUpdate' => $countUpdateKey
									);
									
				return $saveValues;
			
		 }
		 /*
		  * function to get ansestor details
		  */
		 
		 function getAncestorDetails($email) {
		 	$query = $this->link->prepare("select `key` from users where `email` = '$email'");
			$query->execute();
			$values = $query->fetchALL(PDO::FETCH_ASSOC);
			$key = $values[0]['key'];
			
			$queryAncestor = $this->link->prepare("select * from ancestor where `key` = '$key'");
			$queryAncestor->execute();
			$ansestorValues = $queryAncestor->fetchALL(PDO::FETCH_ASSOC);
			return $ansestorValues;
			
		 	
		 }
		 
		 
		 /*
		  * function to get ancestor details using key
		  */
		 
		 function getAncestorDetailsByKey($key) {
			$queryAncestor = $this->link->prepare("select * from ancestor where `key` = '$key'");
			$queryAncestor->execute();
			$ansestorValues = $queryAncestor->fetchALL(PDO::FETCH_ASSOC);
			return $ansestorValues;
		 	
		 } 
		
		/*
		 * function to log in
		 */
		function login($email, $password) {
			$query = $this->link->prepare("select * from users where `email` = '$email' and `password` = '$password'");
			$query->execute();
			
			$result = $query->rowCount();
			return $result;
		}
		
		/* 
		 * function to update Ancestor basic profile
		 */
		 function updateProfile($profileValues){
		 	$email = $_SESSION['username'];
		 	$query = $this->link->prepare("select `key` from users where `email` = '$email'");
			$query->execute();
			$values = $query->fetchALL(PDO::FETCH_ASSOC);
			$key = $values[0]['key'];
			
			
			print_r($profileValues);
			$firstName = $profileValues['firstName'];
			$middleName = $profileValues['middleName'];
			$lastName = $profileValues['lastName'];
			$nickName = $profileValues['nickname'];
			$bornDate = $profileValues['bornDate'];
			$diedDate = $profileValues['diedDate'];
			$obituary = $profileValues['Obituary'];
			$bio = $profileValues['Biography'];
			
		

			//update ancestor basic info
			$queryAncestor = $this->link->prepare("UPDATE `ancestor` SET `firstname`='$firstName',
																		`middlename`='$middleName',
																		`lastname`='$lastName',
																		`nickname`='$nickName',
																		`born`='$bornDate',
																		`died`='$diedDate',
																		`Obituary`='$obituary',
																		`Biography`='$bio' where `key`='$key'");
			$queryAncestor->execute();
			
			
			return $queryAncestor->rowCount();
								
		 }

			
		/*
		 * function to get the key for a user 	
		*/
		
		function getUserKey($email) {
		 	$query = $this->link->prepare("select `key` from users where `email` = '$email'");
			$query->execute();
			$values = $query->fetchALL(PDO::FETCH_ASSOC);
			$key = $values[0]['key'];
			
			return $key;			
			
		}
		 
		   
		/*
		 * function to save users profile picture
		 */
		 
		 function saveProfileImage($email, $imageName){
		 	$key = $this->getUserKey($email);
			
			$query = $this->link->prepare("select profileimage from ancestor where `key` = '$key'");
			$query->execute();
			$values = $query->fetchALL(PDO::FETCH_ASSOC);
			$profileImage = $values[0]['profileimage'];
			
			/*
			 * here I am taking two cased where the profiel image is set and in another one
			 * profile image is not set. Although for both of them I am updating the image but this 
			 * can be used in future
			 */ 
			
			if($profileImage != null) {
					
				$this->UpdateProfileImageName($imageName,$key);
			}
			else {
				$this->UpdateProfileImageName($imageName,$key);
			}
			
		 }
		 
		 /*
		  * function to update the profile image of the ancestor
		  */
		 function UpdateProfileImageName($imageName,$key) {
		 	$query = $this->link->prepare("update ancestor set `profileimage` = '$imageName' where `key` = '$key'");
			$query->execute();
			
		 }
		 
		 /*
		  * function to update ancestor profile video
		  */
		  function updateAncestorVideo($key,$videoID) {
		  	$query = $this->link->prepare("update ancestor set `videoid` = '$videoID' where `key` = '$key'");
			$query->execute();
		  }
		 
		
		 
		 
		
		
	}


?>