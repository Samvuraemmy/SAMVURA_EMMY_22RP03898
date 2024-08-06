<?php
     include("conn.php");
     session_start();
if(!isset($_SESSION['user_name'])){
header("location:login.php");
}
    if(isset($_GET['id'])){
    $sql="SELECT * FROM student WHERE std_id=".$_GET['id'];
    $check=mysqli_query($conn,$sql);
    while ($row=mysqli_fetch_array($check)) {
    $std_id=$row['std_id'];
    $std_names=$row['std_names'];
    $Reg_no=$row['Reg_no'];
    $dept=$row['dept'];
    $age=$row['age'];
    $se=$row['gender'];
    }}

    if(isset($_POST['sub'])){
    $a=$_POST['std_id'];
    $b=$_POST['std_names'];
    $c=$_POST['Reg_no'];
    $d=$_POST['dept'];
    $e=$_POST['age'];
    $f=$_POST['radio'];
    $up="UPDATE `student` SET `std_names`='$b',`Reg_no`='$c',`dept`='$d',`age`='$e',`gender`='$f' WHERE `std_id`='$a'";
    $check=mysqli_query($conn,$up);
    if($check){
        echo "<script>alert('data updated')</script>";
        header("location:view.php");
    }
    else{
        echo "<script>alert('data not updated')</script>";
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
                    <input type="text" name="std_id" value=" <?php echo" $std_id";?> ">
                    <br><br>
                    <input type="text" name="std_names" value="<?php echo"$std_names";?> ">
                    <br><br>
                    <input type="text" name="Reg_no" value=" <?php echo"$Reg_no";?> ">
                    <br><br>
                    <input type="text" name="dept" value="<?php echo"$dept";?> ">
                    <br><br>
                    <input type="text" name="age" value="<?php echo"$age";?> ">
                    <br><br>
                    <input type="radio" name="radio" value="Male" value="<?php echo"$se";?> ">Male
                    <input type="radio" name="radio" value="Female" value="<?php echo"$se"; ?>">Female <br><br>
                    <input type="submit" name="sub">
                </form>

            </p>
        </div>
        <!-- You can add more sections here as needed -->
    </div>
</body>
</html>
