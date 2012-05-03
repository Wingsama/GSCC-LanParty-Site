<?php
session_start();
require_once 'classes/Membership.php';
$membership = new Membership();

// If the user clicks the "Log Out" link on the index page.
if(isset($_GET['status']) && $_GET['status'] == 'loggedout') {
	$membership->log_User_Out();
}

// Did the user enter a password/username and click submit?
if($_POST && !empty($_POST['username']) && !empty($_POST['pwd'])) {
	$response = $membership->validate_User($_POST['username'], $_POST['pwd']);
}
														

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login to access the secret files!</title>
<link rel="stylesheet" type="text/css" href="css/default.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</head>

<body>
<div id="login">
	<form method="post" action="">
    	<h2>LAN Party <small>enter your credentials</small></h2>
        <table id="regtable">
            <tr >
		<td id="label"><label for="name">Username: </label></td>
		<td><input type="text" name="username" /></td>
            </tr>
            <tr>
		<td id="label"><label for="pwd">Password: </label></td>
		<td><input type="password" name="pwd" /></td>
            </tr>
            <tr>
		<td id="label"><input type="submit" id="submit" value="Login" name="submit" /></td>
		<td><input type="button" id="button" value="First time here? Register!" name="regis" ONCLICK="window.location.href='register.php'" /></td>
            </tr>
        </table>
    </form>
    <?php if(isset($response)) echo "<h4 class='alert'>" . $response . "</h4>"; ?>
</div><!--end login-->
</body>
</html>