<?php

require_once 'includes/constants.php';

class Mysql {
	private $conn;
	
	function __construct() {
		$this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or 
					  die('There was a problem connecting to the database.');
	}
	
	function verify_Username_and_Pass($un, $pwd) {
				
		$query = "SELECT *
				FROM users
				WHERE username = ? AND password = ?
				LIMIT 1";
				
		if($stmt = $this->conn->prepare($query)) {
			$stmt->bind_param('ss', $un, $pwd);
			$stmt->execute();
			
			if($stmt->fetch()) {
				$stmt->close();
				return true;
			}
		}
		
	}
        
        function check_username($un) {
				
		$query = "SELECT *
				FROM users
				WHERE username = ?
				LIMIT 1";
				
		if($stmt = $this->conn->prepare($query)) {
			$stmt->bind_param('s', $un);
			$stmt->execute();
			
			if($stmt->fetch()) {
				$stmt->close();
				return true;
			}
		}
		
	}
        
        function add_to_Database($un, $pwd, $rname){
                $hash = md5($pwd);
                $add = "INSERT INTO `users`(`username`, `realname`, `password`) VALUES (\"$un\",\"$rname\",'$hash')";
                if($this->conn->query($add) === true){
                    return true;
                }
        }
}