<?php
	include ('class.dbconnection.php');
	include('Hashids.php');
	$error ='';
	
	
	class uniqueKey{
	
	/*
	* link used to store the database connectivity throuhout manage user class
	*/
	
	public $link;
	
	
	/*
	 * Applications hash property which will make our urls unique in the world
	*/
	private $salt = 'Living Monument';
	
	
	/* 
	 * hash library object 
	*/
	private $hashids;  
	
	/*
	 * Total hash values stored in an array
	 */
	 private $hashValues = array();
	 
	 /*
	  * values corresponding to hash values
	  */ 
	 private $keyValues = array();
	 
	 
	
	/*
	* basic constructor which enables the database connectivity 
	*/
	
	function __construct(){
		$dbconnection = new dbconnnection();
		$this->link = $dbconnection->ConnectToDb('secure');
		
		$this->hashids = new Hashids\Hashids($this->salt,5);
		
	}
	
	
	 function getLastCount() {
	 	
		$query = $this->link->prepare("SELECT COUNT(*) FROM `uniquekey`");
		$query->execute();
		return $query->fetchALL(PDO::FETCH_ASSOC);
		
	 }
	 function keyGenerate($lastCount) {
	 	
		
		$upperLimit = $lastCount + 100;
		//increment  lastCount by one
		$lastCount++;
		
		
		
		for($lastCount; $lastCount<=$upperLimit; $lastCount++){
			$hash = $this->hashids->encrypt($lastCount);
			$keys = $this->hashids->decrypt($hash);
			array_push($this->hashValues, $hash);
			array_push($this->keyValues, $keys[0]);
		}
	 }
	 function saveKeys($hash,$keys) {
	 	$queryString = 'INSERT INTO `uniquekey`(`serialKey`, `uniqueKey`) VALUES ';
		$queryAppend = '';
		
		for($i=0; $i<count($hash); $i++){
			$queryAppend.= '("'.$keys[$i].'","'.$hash[$i].'"),';
		}
		
		$queryAppend =  rtrim($queryAppend, ",");
		
		$queryString.= $queryAppend;
		
		
		
		$query = $this->link->prepare($queryString);
		$query->execute();
	 	
	 }



	/*
	 * function to store uniqueKeys into the database
	 * 
	 */
	 
	 function uniqueKeyGenerator() {
	 	$lastCount = $this->getLastCount();
		
		$keys = $this->keyGenerate($lastCount[0]['COUNT(*)']);
		
		
		$this->saveKeys($this->hashValues,$this->keyValues);

		
	 }
	 
	 /*
	  * function to get keys of an specific range
	  */
	  
	  function getKeys($from, $to){
	  		$queryString = 'select * from uniquekey WHERE id BETWEEN '.$from.' AND '.$to;
	  		$query = $this->link->prepare($queryString);
			$query->execute();
			return $query->fetchALL(PDO::FETCH_ASSOC);			
		
	  }
	 

	
	
}





?>