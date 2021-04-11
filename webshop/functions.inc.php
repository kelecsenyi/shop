<?php

	function invalid($name,$postcode,$szamname,$szampostcode)
	{
		$result;

		if(!preg_match('/^[a-zA-Z]$/', $name)) {
			$result=true;
		}
		else
		{
			$result=false;
		}
		if (!preg_match('/^[a-zA-Z]$/', $szamname)) 
		{
			$result=true;
		}
		else
		{
			$result=false;
		}
		if (!is_numeric($postcode)) 
		{
			$result=true;
		}
		else
		{
			$result=false;
		}
		if (!is_numeric($szampostcode))  
		{
			$result=true;
		}
		else
		{
			$result=false;
		}
		return $result;
	}

	function pwdMatch($password,$repassword)
	{
		$result;
		if ($password==$repassword) {
			$result=true;
		}
		else{
			$result=false;
		}
		return $result;
	}


	function uidExists($conn,$email)
	{	

		$sqlexist = "SELECT COUNT(id) AS num FROM user WHERE email = ?";
		$stmte = $conn->prepare($sqlexist); 
		$stmte->bind_param("s",$email);
		$stmte->execute();
		$result = $stmte->get_result();
		$num = $result->fetch_assoc();
		if ($num['num'] > 0) 
		{
			$sql = "SELECT id,password FROM user WHERE email = ?";
			$stmt = $conn->prepare($sql); 
			$stmt->bind_param("s",$email);
			$stmt->execute();
			$resultp = $stmt->get_result();
			if ($row = $resultp->fetch_assoc()) 
			{		    
			  	return $row;
			}
			else
			{
				 $res=false;
				 return $res;
			 }
			
			return $res;
		}
	}

	function createUser($conn,$name,$email,$mobil,$password,$postcode,$city,$address,$szamname,$szampostcode,$szamcity,$szamaddress,$taxnumber)
	{

		$sqlexist = "SELECT COUNT(id) AS num FROM user WHERE email = ?";
		$stmte = $conn->prepare($sqlexist); 
		$stmte->bind_param("s",$email);
		$stmte->execute();
		$result = $stmte->get_result();
		$num = $result->fetch_assoc();
		if ($num['num'] == 0) {
			$sql = "INSERT INTO user (name,email,mobil,password,postcode,city,address,billname,billpostcode,billcity,billaddress,taxcode) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt,$sql))
			{
				header("location: registration.php?error=stmtfailed2");
				exit();
			}
			$passwordhashed=password_hash($password, PASSWORD_DEFAULT);
			mysqli_stmt_bind_param($stmt,"ssssisssisss",$name,$email,$mobil,$passwordhashed,$postcode,$city,$address,$szamname,$szampostcode,$szamcity,$szamaddress,$taxnumber);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
			header("location: belepes.php?succes=succes");
		}
		else
		{
			header("location: registration.php?error=emailtaken");
			exit();
		}
	}

 	function loginUser($conn,$email,$password)
 	{	
 		$row=uidExists($conn,$email);
 		if ($row==false) {
 			header("location: belepes.php?error=nouser");
			exit();
 		}
 		
 		if (password_verify($password, $row["password"])==1) {
 			session_start();
 			$_SESSION["id"]=$row["id"];
 			$_SESSION["password"]=$row["password"];
 			header("location: indexcustomer.php");
 			exit();
 		}
 		else
 		{
 			header("location: belepes.php?error=wrongpassword");
 			exit();
 		}
 	}


 	function createNewpwd($conn,$password,$id)
 	{
		$passwordhashed=password_hash($password, PASSWORD_DEFAULT);
 		$sqlnewpwd = "UPDATE user SET password = ?  WHERE id = ?";
	 		$stmt = $conn->prepare($sqlnewpwd);
	 		$stmt->bind_param("si",$passwordhashed,$id);
	 		if ($stmt->execute()) {
	 			header("location: customerpwd.php?succes=succesupdate");
	 			exit();
	 		}
	 		else
	 		{
	 			header("location: customerpwd.php?error=fail");
	 			exit();
	 		}
 	}
 	/*function emptyInputLogin($email,$password)
	{
		$result;
		if (empty($email)||empty($password)) {
			$result=true;
		}
		else{
			$result=false;
		}
		return $result;
	}*/
#------------------------ Update product functions -------------------------------
/*
 	function updateProduct($conn,$brand,$name,$details,$price,$image,$quantity,$pcode)
 	{	
 		$sqlexist = "SELECT COUNT(pname) AS num FROM products WHERE pcode = ?";
		$stmte = $conn->prepare($sqlexist); 
		$stmte->bind_param("s",$pcode);
		$stmte->execute();
		$result = $stmte->get_result();
		$num = $result->fetch_assoc();

 		if ($num['num'] > 0) {
 			mysqli_stmt_close($stmte);
	 		$sql = "UPDATE products SET pbrand = ?,pname = ?,pdetails = ?,pprice = ?,pimage = ?,pquantity = ? WHERE pcode = ?";
	 		$stmt = $conn->prepare($sql);
	 		$stmt->bind_param("sssisis",$brand,$name,$details,$price,$image,$quantity,$pcode);
	 		if ($stmt->execute()) {
	 			header("location: update.php?succes=succesupdate");
	 			exit();
	 		}
	 		else
	 		{
	 			header("location: update.php?error=fail");
	 			exit();
	 		}
		}
		else
		{
			header("location: update.php?error=fail");
			exit();
		}
		mysqli_stmt_close($stmt);	
		
 	}

 	function deleteProduct($conn,$pcode)
 	{
 		$sqlexist = "SELECT pname FROM products WHERE pcode = (?)";
		$stmte = $conn->prepare($sqlexist); 
		$stmte->bind_param("s",$pcode);

		if ($stmte->execute() && $pcode!=="0") {
			mysqli_stmt_close($stmte);
			$sql = "DELETE FROM products WHERE pcode = ?";
		 	$stmt = $conn->prepare($sql);
			$stmt->bind_param("s",$pcode);
			if ($stmt->execute())
			{
				header("location: update.php?succes=succesupdate");
				exit();
			}
			else
			{
				header("location: update.php?error=fail");
				exit();
			}
		}
		else
		{
			header("location: update.php?error=fail");
			exit();
		}
		mysqli_stmt_close($stmt);
 	}

 	function upimageTaken($conn,$image,$pcode)
 	{	
 		$res=false;
 		$sql = "SELECT pimage FROM products";
		$stmt = $conn->prepare($sql); 
		$stmt->execute();
		$result = $stmt->get_result();
		foreach($result as $row)
		{	  
		  if ($row['pimage']==$image) 
		  {   
		  	$res=true;
		  }
		}
		mysqli_stmt_close($stmt);

		$sqlexist = "SELECT pimage FROM products WHERE pcode = (?)";
		$stmte = $conn->prepare($sqlexist); 
		$stmte->bind_param("s",$pcode);
		$stmte->execute();
		$result = $stmte->get_result();
		foreach($result as $row)
		{	  
		  if ($row['pimage']==$image) 
		  {   
		  	$res=false;
		  }
		}
		mysqli_stmt_close($stmte);
		return $res;
 	}
?>*/
