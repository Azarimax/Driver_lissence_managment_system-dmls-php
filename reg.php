<!-- 
include("$db_conn.php");
if(isset($_POST['Register'])){
$Dl=$_POST['Dl'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$birth_date=$_POST['BirthDate'];
$zone=$_POST['zone'];
$worda=$_POST['worda'];
$kabala=$_POST['kabala'];
$phone=$_POST['phone'];     //Reg_table
$image=$_FILES['image'];
$create="INSERT INTO register(Dl,fname,mname,lname,gender,birth_date,zone,worda,
kabala,phone,image)VALUES ('$Dl','$fname','$mname',$lname','$gender','$birth_date',
'$zone','$worda','$kabala','$kabala','$image')";
$result=mysqli_query($conn,$create);
if(!$result){
    die("failed!".mysqli_connect_error());
}else{
    echo"register sussfully!";
}

} -->
<!-- <?php
session_start();
include "db_conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login page</title>
</head>
<body>
<header class="heading">
    <nav class="navbar">
    <a href="login.php">login</a>
    <a href="homepage.php">Service</a>
    <a href="#about">About us</a>
    <a href="#contact">Contact us</a>
    <a href="logout.php">Logout</a>
</nav>
   <form action="" method="post">
    <div class="lo">
    <label for="uname">UserName</label>
    <input type="text" name="uname" id="uname" required><br>
    </div>
   <div class="lo">
   <label for="password">password</label>
    <input type="text" name="password" id="password" required><br>
   </div>
    <!-- <select name="UserType" id="Types"><br>
<option name="admin" value="Admin">Admin</option>
    <option name="owner"  value="Owner">Owner</option>
    <option name="user" value="User">User</option>
 </select><br> 
<input class="log" type="submit" name="login" value="Login"> 
php
if(isset($_POST['login'])){
$uname=$_POST['uname'];
$password=$_POST['password'];
//$user_type=$_POST['UserType'];
// $sql="INSERT INTO users(user_name,password,user_type)values('$uname','$password','$user_type')";
$sql="SELECT *FROM users WHERE user_name='".$uname."' AND password='".$password."' ";

$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
if($row['user_type']=='Admin'){
    header("Location:Admincreate.php");
}
else if($row['user_type']=='Owner'){
    header("Location:issueL.php");
}
else if($row['user_type']=='User'){
    header("Location: register.php");
}else{
   die("error happend please fix hint".mysqli_connect_error()); 
}
}








 -->











</body>
</html>







