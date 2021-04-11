<?php
include ('config.php');
include ('configPDO.php');
include ('functions.inc.php');
if (isset($_POST["logbutton"])) 
{
	$email = $_POST["email"];
	$password = $_POST["password"];

	session_start();
 	$_SESSION["szar"]=$password;
	#loginUser($conn,$email,$password);
}
else
{
	header("location:belepes.php");
	exit();
}
/*if (emptyInputLogin($email,$password) !== false) 
	{
		header("location:belepes.php?error=emptyinput");
		exit();
	}*/
?>