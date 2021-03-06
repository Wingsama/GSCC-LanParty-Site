<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/menu.css" />
<link rel="stylesheet" href="css/default.css" />

<!--[if lt IE 7]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.7a-min.js"></script>
<![endif]-->


<title>QUAKERCON 2012 || LAN Party</title>




<script type="text/javascript">

// Current Server Time script (SSI or PHP)- By JavaScriptKit.com (http://www.javascriptkit.com)
// For this and over 400+ free scripts, visit JavaScript Kit- http://www.javascriptkit.com/
// This notice must stay intact for use.

//Depending on whether your page supports SSI (.shtml) or PHP (.php), UNCOMMENT the line below your page supports and COMMENT the one it does not:
//Default is that SSI method is uncommented, and PHP is commented:

//var currenttime = '<!--#config timefmt="%B %d, %Y %H:%M:%S"--><!--#echo var="DATE_LOCAL" -->' //SSI method of getting server date
var currenttime = '<?php print date("F d, Y h:i:s", time())?>' //PHP method of getting server date

///////////Stop editting here/////////////////////////////////

var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
var serverdate=new Date(currenttime)

function padlength(what){
var output=(what.toString().length==1)? "0"+what : what
return output
}

function displaytime(){
serverdate.setSeconds(serverdate.getSeconds()+1)
var datestring=montharray[serverdate.getMonth()]+" "+padlength(serverdate.getDate())+", "+serverdate.getFullYear()
var timestring=padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds())
document.getElementById("servertime").innerHTML=datestring+" "+timestring
}

window.onload=function(){
setInterval("displaytime()", 1000)
}
</script>
</head>

<body>
<div id="index">
<div id="container">
	<div style="margin-left:57px;">
        <ul id="menu">
            <li class="logo">
                <img style="float:left;" alt="" src="images/menu_left.png"/>
                <ul id="main">
                    <li>Welcome to <b>QuakerCon 2012 Lan Party</b></li>
                    <li class="last">
                        <img class="corner_left" alt="" src="images/corner_blue_left.png"/>
                        <img class="middle" alt="" src="images/dot_blue.png"/>
                        <img class="corner_right" alt="" src="images/corner_blue_right.png"/>
                    </li>
                </ul>
                
            </li>
            <?php /*<li><a href="login.php?status=loggedout">Log out</a>*/ ?>
            </li>
            <li><a href="./index.php">Information</a>
                <ul id="help">
                    <li>
                        <img class="corner_inset_left" alt="" src="images/corner_inset_left.png"/>
                        <a href='./index.php?page=home'>General Info</a>
                        <img class="corner_inset_right" alt="" src="images/corner_inset_right.png"/>
                    </li>
                    <li><a href="./index.php?page=rules">Rules</a></li>
                    <li><a href="./index.php?page=links">Downloads</a></li>
                    <li class="last">
                        <img class="corner_left" alt="" src="images/corner_left.png"/>
                        <img class="middle" alt="" src="images/dot.gif"/>
                        <img class="corner_right" alt="" src="images/corner_right.png"/>
                    </li>
                </ul>
            </li>
            <li><a href="#">Roster</a>
                
                <ul id="help">
                    <li>
                        <img class="corner_inset_left" alt="" src="images/corner_inset_left.png"/>
                        <a href="./index.php?page=register">Register Here</a>
                        <img class="corner_inset_right" alt="" src="images/corner_inset_right.png"/>
                    </li>                    <li class="last">
                        <img class="corner_left" alt="" src="images/corner_left.png"/>
                        <img class="middle" alt="" src="images/dot.gif"/>
                        <img class="corner_right" alt="" src="images/corner_right.png"/>
                    </li>
                </ul>
            </li>
            <li>Current Server Time: <span id="servertime"></span></li>
        </ul>
        <img style="float:left;" alt="" src="images/menu_right.png"/>
    </div>
</div><!--end container-->
<div id="pagecontents">
<?php

if($_GET && ($_GET['page'] == "register")){
?>
    <b>Registration for TF2 Tournament</b> <br>=====================================================================<br>
    <form action="" method="post">
    Name: <input type="text" name="user" />
<?php
require_once('./recaptcha/recaptchalib.php');
require('./classes/Mysql.php');
$publickey = "6LdTYdESAAAAAI99woZW7Bdr2iu8X7fl7BsIjqp-";
$privatekey = "6LdTYdESAAAAAE3RMszCykbrHhM34Qe9tGw3E7XZ";

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;


# was there a reCAPTCHA response?
if ($_POST["recaptcha_response_field"]) {
        $resp = recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);

        if ($resp->is_valid) {
                $mysql = New Mysql();
                $answer = $_POST['user'];
                $mysql->add_to_Database($answer);
        } else {
                # set the error code so that we can display it
                $error = $resp->error;
        }
}
echo recaptcha_get_html($publickey, $error);
?>
<br/><input type="submit" value="submit" />
</form>
    <?php
}elseif($_GET){
$pname = $_GET['page'];
	if ($pname == "links") {
		$dir = "downloads";
		$liPages = scandir($dir);
		
		foreach($liPages as $liPage) {
			if($liPage != "" && $liPage != "." && $liPage !="..") $list .= '<li><a href="/downloads/' . $liPage . '">' . $liPage . '</a></li>';
		}
		print $list;
	} else {
		readfile("./pages/$pname.html");
	}
}else{
    ?><p><b>Hello, and welcome to QuakerCon 2012!</b><br><br><p>Click on a link on the menu bar for more information and rules.</p
    <?php
}
?>
</div>
</div>
</body>
</html>
