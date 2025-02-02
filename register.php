<?php
session_start();
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
    <a href="logout.php">Logout</a>
    <a href="displyay_register.php">See_Student</a>
</nav>
</header>
<form align="center" class="reg" action="" method="post"  >
    <fieldset style="background-color:lightgray; border-radius:10px; text-align:center; width:40%">
       First Name : <input type="text" name="fname" id="fname" required><br>
       Last Name  : <input type="text" name="lname" id="lname"  required><br>
           Gender : 
                Female:<input class="r" type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="Female">
                Male:<input class="r" type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male"><br>
        Birth Date : <input type="date" name="BirthDate" required><br>
        Phone Number : <input type="number" name="phone" id="phone" required><br>
        DrLic. Number : <input type="number" name="Dl" id="Dl" required><br>
               Image : <input type="file" name="image" id="image" required><br><br>
             
            <input type="submit" name="Register" value="Register"><br>
        </fieldset>
</form>

<?php
if(isset($_POST['Register'])){  
    $Dl=$_POST['Dl'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $gender=$_POST['gender'];
    $birth_date=$_POST['BirthDate'];
    $phone=$_POST['phone'];
    // $folder="C:\wamp64\www\DLIMS\image";
    $filename=$_FILES["image"]["name"];
    $tempname=$_FILES["image"]["tmp_name"];
    $targetPath = "uploads".$filename;

    if(move_uploaded_file($tempname, $targetPath )) {  
        $create = "INSERT INTO register(Dl, fname, mname, lname, gender, birth_date, phone, image) VALUES ('".$Dl."','".$fname."','".$mname."','".$lname."','".$gender."','".$birth_date."','".$phone."','". $targetPath."')";
        $result = mysqli_query($conn,$create);
        if($result){
            header('location:displyay_register.php');
        } else {
            die("Failed!" . mysqli_connect_error());
        }
    } else {
        echo "Image upload failed: " . $_FILES['image']['error'];
    }
}
?>

<footer></footer>
</body>
</html>
