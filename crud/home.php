<?php
include("conn.php");
session_start();
if(!isset($_SESSION['user_name'])){
header("location:login.php");
}
if(isset($_POST['sub'])){
    $a=$_POST['std_id'];
    $b=$_POST['std_names'];
    $c=$_POST['Reg_no'];
    $d=$_POST['dept'];
    $e=$_POST['age'];
    $f=$_POST['radio'];
    $sql="INSERT INTO `student`(`std_id`, `std_names`, `Reg_no`, `dept`, `age`, `gender`) VALUES ('$a','$b','$c','$d','$e','$f')";
    $check=mysqli_query($conn,$sql);
    if($check){
        echo "<script>alert('data inserted')</script>";
        header("location");
    }
    else{
        echo "<script>alert('data not inserted')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        nav {
            margin: 0;
            padding: 1em;
            background-color: green;
        }
        nav a {
            color: white;
            margin: 0 1em;
            text-decoration: none;
        }
        .container {
            padding: 2em;
        }
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 1em;
            margin: 1em 0;
        }
        p{
        
    float: right;
    margin-top: -6px;

        }
        input[type=text]{
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

    </style>
</head>
<body>
    
    <nav>
        <a href="#">Home</a>
        <a href="home.php">Add Student</a>
        <a href="view.php">View Students</a>
        <P><a href="logout.php?user_name">logout</a></p>
    </nav>
    <div class="container">
        <div class="card">
            <h2>Welcome to the Student Management System</h2>
            <p> 
        <form method="POST">
        <input type="text" name="std_id"placeholder="std_id"><br><br>
        <input type="text" name="std_names"placeholder="std_names"><br><br>
        <input type="text" name="Reg_no"placeholder="Reg_no"><br><br>
        <input type="text" name="dept"placeholder="dept"><br><br>
        <input type="text" name="age"placeholder="age"><br><br>
        <input type="radio" name="radio" value="Male">Male 
        <input type="radio" name="radio" value="Female">Female <br><br>
        <input type="submit" name="sub">
    </form>

            </p>
        </div>
        <!-- You can add more sections here as needed -->
    </div>
</body>
</html>
