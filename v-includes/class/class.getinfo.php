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
																					`born`,`died`,`Obituary`,`Biography`) VALUES(?,?,?,?,?,?,?,?)");
					$values = array(
									$ancestor['firstName'],
									$ancestor['middleName'],
									$ancestor['lastName'],
									$ancestor['nickname'],
									$ancestor['bornDate'],
									$ancestor['diedDate'],
									$ancestor['Obituary'],
									$ancestor['Biography']
									);		
				$querySaveAncestor->execute($values);
				$countSaveAncestor = $querySaveAncestor->rowCount();
				
				//update key
				$key = $ancestor['key'];
				$queryUpdateKey = $this->link->prepare("update uniqueKey set url = '$key' where uniqueKey = '$key'");
				$queryUpdateKey->execute();
				
				echo $countUpdateKey = $queryUpdateKey->rowCount();
				
				$saveValues = array(
									'usersave' => $countSaveUser,
									'ancestorsave' => $countSaveAncestor,
									'urlUpdate' => $countUpdateKey
									);
									
				return $saveValues;
			
		 }
		
		
		
	}


?>