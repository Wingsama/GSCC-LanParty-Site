<?php

require '../classes/Membership.php';
$admin = New Membership();
$admin->confirm_Admin();


/*if ($GDLIB_INSTALLED) {
    $im = $KO->getImage("Tournament name here");
    
}*/
if($_POST && !empty($_POST['round']) && !empty($_POST['match']) && !empty($_POST['p1']) && !empty($_POST['p2'])) {
    $myFile = "exampleres.php";
    $fh = fopen($myFile, 'a') or die("can't open file");
    $stringData = "\$KO->setResByMatch($_POST\[\'round\'\], $_POST\[\'match\'\], $_POST\[\'p1\'\], $_POST\[\'p2\'\]);";
    fwrite($fh, $stringData);
    fclose($fh);
}
?>

<form action=""method="post">
    <LABEL for="round">Round #</LABEL><INPUT type="text" id="round" /><BR>
    <LABEL for="match">Match #</LABEL><INPUT type="text" id="match" /><BR>
    <LABEL for="p1">P1 Points</LABEL><INPUT type="text" id="p1" /><BR>
    <LABEL for="p2">P2 Points</LABEL><INPUT type="text" id="p2" /><BR>
    <input type="submit" value="Edit" />
</form>