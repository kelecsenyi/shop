<?php

	function invalid($name,$postcode,$szamname,$szampostcode)
	{
		if(preg_match('/^[a-zA-Z]$/', $name)) {
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
		if ($password !== $repassword) {
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
			/*mysqli_stmt_close($stmte);	
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
			
			return $res; id, password*/
			$sql = "SELECT * FROM user WHERE email = '$email'";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) 
			{		    
			  if ($row = mysqli_fetch_assoc($result)) 
			  {
			  	return $row;
			  }
			  else
			  {
			  	$res=false;
			  	return $res;
			  }
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
 		
 		$checkpwd=password_verify($password,$row["password"]);
 		
 		if ($checkpwd===false) {
 			header("location: belepes.php?error=wrongpassword");
 		}
 		elseif ($checkpwd===true) {
 			session_start();
 			$_SESSION["id"]=$row["id"];
 			$_SESSION["name"]=$row["name"];/*
 			$_SESSION["email"]=$row["email"];
 			$_SESSION["mobil"]=$row["mobil"];
 			$_SESSION["postcode"]=$row["postcode"];
 			$_SESSION["city"]=$row["city"];
 			$_SESSION["address"]=$row["address"];
 			$_SESSION["billname"]=$row["billname"];
 			$_SESSION["billpostcode"]=$row["billpostcode"];
 			$_SESSION["billcity"]=$row["billcity"];
 			$_SESSION["billaddress"]=$row["billaddress"];
 			$_SESSION["taxcode"]=$row["taxcode"];*/

 			header("location: indexcustomer.php");
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
#------------------------ Update user functions -------------------------------

 	function updateDatas($conn,$name,$email,$mobil,$postcode,$city,$address,$szamname,$szampostcode,$szamcity,$szamaddress,$taxnumber,$id)
 	{	
 		$sqlexist = "SELECT COUNT(id) AS num FROM user WHERE id = ?";
		$stmte = $conn->prepare($sqlexist); 
		$stmte->bind_param("i",$id);
		$stmte->execute();
		$result = $stmte->get_result();
		$num = $result->fetch_assoc();

 		if ($num['num'] > 0) {
 			mysqli_stmt_close($stmte);
	 		$sql = "UPDATE user SET name = ?,email = ?,mobil = ?,postcode = ?,city = ?,address = ?,billname = ?,billpostcode = ?,billcity = ?,billaddress = ?,taxcode = ? WHERE id = ?";
	 		$stmt = $conn->prepare($sql);
	 		$stmt->bind_param("sssisssisssi",$name,$email,$mobil,$postcode,$city,$address,$szamname,$szampostcode,$szamcity,$szamaddress,$taxnumber,$id);
	 		if ($stmt->execute()) {
	 			header("location: customerdatas.php?succes=succesupdate");
	 			/*session_start();
	 			unset($_SESSION["name"],
	 			$_SESSION["email"],
	 			$_SESSION["mobil"],
	 			$_SESSION["postcode"],
	 			$_SESSION["city"],
	 			$_SESSION["address"],
	 			$_SESSION["billname"],
	 			$_SESSION["billpostcode"],
	 			$_SESSION["billcity"],
	 			$_SESSION["billaddress"],
	 			$_SESSION["taxcode"]);*/
	 			exit();
	 		}
	 		else
	 		{
	 			header("location: customerdatas.php?error=fail");
	 			exit();
	 		}
		}
		else
		{
			header("location: customerdatas.php?error=fail");
			exit();
		}
		mysqli_stmt_close($stmt);	
		
 	}
/*
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
 	}*/
 	function emailExist($conn,$email,$id)
 	{
 		$res=true;
 		$sql = "SELECT COUNT(name) AS num FROM user WHERE email = ?";
		$stmt = $conn->prepare($sql); 
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$result = $stmt->get_result();
		$num = $result->fetch_assoc();
		if ($num['num'] > 0) 
		{
			$res=true;
		}
		else
		{
			$res = false;
		}
		mysqli_stmt_close($stmt);
		$sqlexist = "SELECT COUNT(id) AS numbera FROM user WHERE email = ? AND id = ?";
		$stmte = $conn->prepare($sqlexist); 
		$stmte->bind_param("si",$email,$id);
		$stmte->execute();
		$result2 = $stmte->get_result();
		$num2 = $result2->fetch_assoc();
		if ($num2['numbera'] > 0) {
			$res=false;
		}
		mysqli_stmt_close($stmte);
		return $res;
	}

#------------------------create order--------------------------------
	function createOrder($conn,$name,$email,$phone,$products,$grand_total,$postcode,$pmode,$city,$address,$bname,$bpostcode,$bcity,$baddress,$taxnumber,$odate,$id,$qty)
	{
		$stmt = $conn->prepare('INSERT INTO orders (name,email,phone,postcode,city,address,bname,bpostcode,bcity,baddress,taxnumber,pmode,odate,products,qty,amountpaid,userid)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
	 	$stmt->bind_param('sssisssisssssssii',$name,$email,$phone,$postcode,$city,$address,$bname,$bpostcode,$bcity,$baddress,$taxnumber,$pmode,$odate,$products,$qty,$grand_total,$id);
	 	$stmt->execute();
	 	$stmt2 = $conn->prepare("DELETE FROM cart WHERE userid = '".$_SESSION["id"]."'");
	 	$stmt2->execute();
	 	header('location: succespay.php');
	  	exit();
	  	mysqli_stmt_close($stmt);
	}

	function currentOrder($conn,$name,$email,$phone,$products,$grand_total,$postcode,$pmode,$city,$address,$bname,$bpostcode,$bcity,$baddress,$taxnumber,$odate,$id,$qty)
	{
		$stmt = $conn->prepare('INSERT INTO orders (name,email,phone,postcode,city,address,bname,bpostcode,bcity,baddress,taxnumber,pmode,odate,products,qty,amountpaid,currentuser)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
	 	$stmt->bind_param('sssisssisssssssii',$name,$email,$phone,$postcode,$city,$address,$bname,$bpostcode,$bcity,$baddress,$taxnumber,$pmode,$odate,$products,$qty,$grand_total,$id);
	 	$stmt->execute();
	  $stmt2 = $conn->prepare("DELETE FROM cart WHERE currentuser = '".$_SESSION["currentuser"]."'");
	  if ($stmt2->execute()) {
	  	session_start();
	  	session_unset();
	  	session_destroy();
	  	header('location: succespay.php');
	  	exit();
	  	mysqli_stmt_close($stmt);
	  }
	}

	function invalidorder($name,$postcode,$bname,$bpostcode)
	{
		$result;

		if(!preg_match('/^[a-zA-Z]$/',$name)) 
		{
			$result=true;
		}
		else
		{
			$result=false;
		}
		if (!preg_match('/^[a-zA-Z]$/',$bname)) 
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
		if (!is_numeric($bpostcode))  
		{
			$result=true;
		}
		else
		{
			$result=false;
		}
		return $result;
	}
?>
