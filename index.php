<?php

require_once 'classes/Membership.php';
$membership = New Membership();

$membership->confirm_Member();

?>

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

<div id="container">
	<div style="margin-left:50px;">
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
            <li><a href="login.php?status=loggedout">Log out</a>
            </li>
            <li><a href="#">Information</a>
                <ul id="help">
                    <li>
                        <img class="corner_inset_left" alt="" src="images/corner_inset_left.png"/>
                        <a href="#">General Info</a>
                        <img class="corner_inset_right" alt="" src="images/corner_inset_right.png"/>
                    </li>
                    <li><a href="#">Rules</a></li>
                    <li><a href="#">Game Servers</a></li>
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
                        <a href="#">TF2</a>
                        <img class="corner_inset_right" alt="" src="images/corner_inset_right.png"/>
                    </li>
                    <li><a href="#">SC2</a></li>
                    <li><a href="#">LoL</a></li>
                    <li class="last">
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

</body>
</html>
