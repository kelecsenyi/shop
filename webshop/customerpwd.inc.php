<?php
session_start();
$id = $_SESSION["id"];
if (isset($_POST["savepwd"])) 
{
	$password = $_POST["password"];
	$repassword = $_POST["repassword"];

	include ('config.php');
	include ('configPDO.php');
	include ('functions.inc.php');

	if (pwdMatch($password,$repassword) !== false) {
			header("location: customerpwd.php?error=pwddontmatch");
			exit();
		}
	createNewpwd($conn,$password,$repassword,$id);
}
else
{
	header("location:belepes.php");
	exit();
}
?>