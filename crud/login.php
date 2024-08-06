<?php
session_start();
include("conn.php");
if(isset($_POST['sub'])){
	$b=$_POST['name'];
	$c=$_POST['pass'];
	extract($_POST);
	$sql=mysqli_query($conn,"SELECT * FROM user WHERE user_name='$b'AND Password='$c'");
	$row=mysqli_fetch_array($sql);
	if(is_array($row)){
		$_SESSION['user_name']=$row['user_name'];
		$_SESSION['Password']=$row['Password'];
echo "<script>alert('login seccessfuly')</script>";
	}
	else{
		echo "<script>alert('inviled user /password')</script>";
	}
}
if(isset($_SESSION['user_name'])){
	$u_Name=$_SESSION['user_name'];
	echo'<meta http-equiv="refresh" content="0.5;url=home.php">';
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN</title>
	<style>input[type=text]{
  width: 30%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=password]{
  width: 30%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
 
}
P{
	color: green;
}
a{
		background-color: green;
  color: white;
  border: 2px solid green;
  padding: 10px 10px;
  border-radius: 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
 margin-top: 10px;
}</style>
</head>
<body>
	<center>
		<p>LOGIN</p>
	<form method="POST">
		<input type="text" name="name"placeholder="name"><br><br>
		<input type="password" name="pass"placeholder="password"><br><br>
		<input type="submit" name="sub"> Click here: <a href="create.php">signup</a>
	</form>
</center>
</body>
</html>