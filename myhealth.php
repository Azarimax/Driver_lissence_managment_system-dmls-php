<?php
session_start();
// include("db_conn.php");
require 'db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Driver Personal Information</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <nav class="Rnavbar">
    <a href="register.php"> Personal</a>
    <a href="Health.php">Health Status</a>
    <a href="Practical.php">Practical Result</a>
    <a href="theory.php">theory Result</a>
    <a href="logout.php">Logout</a>
</nav>
</header>  
<form  class="reg" action=""  method="POST" enctype="multipart/form-data"> 
    <div class="Bform">  
<div class="Bfrom1">
<div class="lo">
        <!-- <label for="fname">First Name</label> -->
        <input type="text" name="fname" id="fname" placeholder="First Name" required>
    </div>
    <div class="lo">
        <!-- <label for="mname">Middle Name</label> -->
        <input type="text" name="mname" id="mname" placeholder="Middle Name" required>
    </div>
    <div class="lo">
        <!-- <label for="lname">Last Name</label> -->
        <input type="text" name="lname" id="lname"  placeholder="Last Name" required>
    </div>
    <div class="lg G">
        <label>Gender:</label>
      Female:<input class="r" type="radio" name="gender"
  <?php if (isset($gender) && $gender=="Female") echo "checked";?>
  value="Female">
      Male:<input class="r" type="radio" name="gender"
      <?php if (isset($gender) && $gender=="Male") echo "checked";?>
      value="Male">
    </div>
    <div class="lg">
        <label for="fname">BirthDate</label>
        <input type="date" name="BirthDate" placeholder="BirthDate" required>
    </div>
</div>
<div class="Bform2"> 
    <div class="lo">
        <!-- <label for="zone">Zone</label> -->
        <input type="text" name="zone" id="zone" placeholder="Zone" required>
    </div>
    <div class="lo">
        <!-- <label for="worda">Worda</label> -->
        <input type="text" name="worda" id="worda" placeholder="Zone"  required>
    </div>
    <div class="lo">
        <!-- <label for="kabala">Kebala</label> -->
        <input type="number" max="20" name="kabala" id="kabala"  placeholder="Kebala"  required>
    </div>
    <div class="lo">
        <!-- <label for="phone">Phone number</label> -->
        <input type="number" name="phone" id="phone"  placeholder="Phone number"  required>
    </div>
    <div class="lo">
        <!-- <label for="Dl">Driving License Number</label> -->
        <input type="number" name="Dl" id="Dl"  placeholder="Driving License Number"  required>
    </div>
    <div class="lg ">
        <label for="img">Image</label>
        <input type="file" name="image" id="image" required>
    </div>
</div>
</div>
<input class="reset R" type="submit" class="stu" name="Reg" value="Register">
<a href="displyay_register.php">See_Student</a>
  

</form>
<?php
if(isset($_REQUEST['Reg'])){  
$Dl=$_POST['Dl'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
// $gender=$_POST['gender'];
$birth_date=$_POST['BirthDate'];
$zone=$_POST['zone'];
$worda=$_POST['worda'];
$kabala=$_POST['kabala'];
$phone=$_POST['phone'];
$folder="C:\wamp64\www\DLIMS\image";
$filename=$_FILES["image"]["name"];
$tempname=$_FILES["image"]["tmp_name"];
$targetPath = $folder . $filename;
}
else{
    header('location:displyay_register.php');
}
?>
<footer></footer>
</body>
</html>
