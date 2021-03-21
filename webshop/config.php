<?php 
	$conn = new mysqli("localhost","root","","webshop");
	if($conn->connect_error)
	{
		die("Kapcsoladt megszakadt!".$conn->connect_error);
	}
?>