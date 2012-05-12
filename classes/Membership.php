<?php

require 'Mysql.php';

class Membership {
	
	function validate_user($un, $pwd) {
		$mysql = New Mysql();
		$ensure_credentials = $mysql->verify_Username_and_Pass($un, crypt($pwd, SALT));
		
                if($ensure_credentials) {
                        $_SESSION['status'] = 'authorized';
			header("location: index.php");
		} else return "Please enter a correct username and password";
		
	} 
        function validate_admin($un) {
		$mysql = New Mysql();
		$ensure_credentials = $mysql->verify_Admin($un);
		
                if($ensure_credentials) {
                        $_SESSION['status'] = 'authorized';
			header("location: index.php");
		} else return "Please enter a correct username and password";
		
	}
	
        function register_user($un, $pwd, $pwdc, $rname){
                $mysql = New Mysql();
                $taken = $mysql->check_username($un);
                if($taken === true){
                    return "That username was already taken, Try another.";
                }elseif($pwd != $pwdc){
                    return "The passwords do not match eachother. Try again.";
                }
                $register_user = $mysql->add_to_Database($un, $pwd, $rname);
                
                if($register_user){
                    $_SESSION['status'] = 'authorized';
                    header("location: index.php");
                } else return "There was a problem. Please check the fields.";
        }
        
	function log_User_Out() {
		if(isset($_SESSION['status'])) {
			unset($_SESSION['status']);
			unset($_SESSION['admin']);
			if(isset($_COOKIE[session_name()])) 
				setcookie(session_name(), '', time() - 1000);
				session_destroy();
		}
	}
	
	function confirm_Member() {
		session_start();
		if($_SESSION['status'] !='authorized') header("location: login.php");
	}
        function confirm_Admin() {
		session_start();
		if($_SESSION['admin'] !='authorized') header("location: login.php");
	}
       
	
}