<?php

class DbUtil {
	private static $hostname = 'localhost';
	private static $username = 'root';
	private static $password = '';
	private static $dbh;
	public static $instance;


	private function __construct() {
		try {
			self::$dbh = new PDO("mysql:host=".self::$hostname.";dbname=mysql", self::$username, self::$password);
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
		
	}

	public static function newDbUtil(){
		if(!isset(self::$instance)){
			$c = __CLASS__;
			self::$instance = new $c;
		}
		if(isset(self::$instance)){
			return self::$instance;
		}	
	}
	
	public function query($sql){
		try{
			$stmt = self::$dbh->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
		return $result;
	}
}

?>
