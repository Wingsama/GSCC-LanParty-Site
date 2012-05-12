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
        
        function grab_array($tablename){
            $mqquery = "SELECT name FROM $tablename";
            
            $result =$this->conn->query($mqquery);
            $final = array("null");
            while($row = mysql_fetch_array($result)){
                array_push($final, $row['name']);
            }
            array_shift($final);
            $row->close();
            $result->close();
            return $final;
        }
        
        function verify_Admin($un) {
				
		$query = "SELECT *
				FROM users
				WHERE username = ? AND admin = ?
				LIMIT 1";
				
		if($stmt = $this->conn->prepare($query)) {
			$stmt->bind_param('si', $un, 1);
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
        
        function add_to_Database($un){
                $add = "INSERT INTO roster VALUES ('$un')";
                if($this->conn->query($add) === true){
                    return true;
                }
        }
}