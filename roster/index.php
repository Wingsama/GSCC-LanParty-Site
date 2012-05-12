
<?php
require '../classes/Mysql.php';
$mysql =  New Mysql();

error_reporting(E_ALL);

// The knock-out class file contains two classes: "Knockout" and "KnockoutGD". KnockoutGD extends Knockout with GD-lib features (explained later).
include("class_knockout.php");

// Depending on whether or not GD-lib is installed this example file will output differently.
$GDLIB_INSTALLED = (function_exists("gd_info")) ? true : false;

// Lets create a knock-out tournament between some of our dear physicists.

$competitors = $mysql->grab_array("sc2roster");
echo $competitors[1];

// Create initial tournament bracket.
$KO = new KnockoutGD($competitors);

// At this point the bracket looks like this:

// Now, lets fill in some match results. This can be done two ways: either by directly specifying round and match indicies or by specifying competitor names.
/*$KO->setResByMatch(0, 0, 2, 1); // Arguments: match index, round index, score 1, score 2.
$KO->setResByCompets('Hans Christian Oersted', 'Richard P. Feynman', 3, 1); // Arguments: competitor 1, competitor 2, score 1, score 2.
$KO->setResByCompets('Murray Gell-Mann', 'Max Planck', 1, 0);

// At this point every undecided competitor from round 1 is now updated with the match winners of the preceding round. Dumping the return of $KO->getBracket() should agree with this - but it takes up to much space in this example file.

// Lets, just for the sake of it, fill out match 1 from round 1 since both competitors are now known!
$KO->setResByMatch(1, 1, 4, 0);*/
// Now, we would like to know some details about the rounds in our bracket structure.

// If GD-lib is installed, the below code will draw the bracket of the knock-out tournament.
if ($GDLIB_INSTALLED) {
    $im = $KO->getImage("Tournament name here");
    header('Content-type: image/png');
    imagepng($im);
    imagedestroy($im);
}

?>
