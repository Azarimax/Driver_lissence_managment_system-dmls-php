<?php
session_start();
if(isset($_SESSION['password'])){// include("db_conn.php");
require 'db_conn.php';
if (isset($_GET['updatedid1'])) {
    $id = $_GET['updatedid1'];
    
    // Ensure $id is a valid integer value
    if (is_numeric($id)) {
        $update = "SELECT *FROM health WHERE id='$id'";
        $result = mysqli_query($conn, $update);
        
        // if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Rest of your code to retrieve data and display the form
            $id=$row['id'];
            $Dl=$row['Dl'];
            $Year=$row['year'];
            $Blood=$row['blood'];
            $Eye=$row['eye'];
            $GHR=$row['ghr'];
        // } else {
        //     echo "No record found with the provided id.";
        // }
    } else {
        echo "Invalid id value.";
    }
} else {
    echo "No id parameter provided in the URL.";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Status</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <nav class="Rnavbar">
    <a href="register.php"> Personal</a>
    <a href="Health.php">Health Status</a>
    <!--<a href="Practical.php">Practical Result</a>
    <a href="theory.php">theory Result</a>-->
    <a href="logout.php">Logout</a>
</nav>
</header> 
    <form action="" method="post">
        <div class="Bform2">
    <div class="lo">
        <label for="Dl">Driving License Number</label>
        <input type="number" name="Dl" id="Dl" value="<?php echo $Dl;?>">
    </div>
    <div class="lo">
        <label for="year">Year</label>
        <input type="number" name="year" id="year" value="<?php echo $Year ;?>">
    </div>
    <div>
    <label for="">Blood Group</label>
    <select name="Blood" id="blood" selected value=""><br>
    <!-- <option value="BloodG" >Blood Group</option> -->
    <option name="a" value="">A</option>
    <option name="b"  value="">B</option>
    <option name="ab"value="">AB</option>
    <option name="o" value="">O</option>
    <option name="a+" value="">A+</option>
    <option name="b+" value="">B+</option>
 </select><br></div>
 <div>
 <label for="">Eye result</label>
 <select name="eye" id="eye" value="<?php echo $Eye;?>">
    <option value="full">Full</option>
    <option value="semi">Semi</option>
    <option value="null">blind</option>
 </select>
 </div>
 <div>
    <label for="">gengeralHealthResult</label>
    <select name="ghr" id="ghr" value="<?php echo $GHR;?>">
        <option value="">Excellent</option>
        <option value="">Very_good</option>
        <option value="">bad</option>
    </select>
 </div>
 </div>

    <input class="stu"  type="submit" name="updatedid1" value="UpDate"> 
    </form>
<?php
if(isset($_POST['updatedid1'])){  
    $Dl=$_POST['Dl'];
    $Year=$_POST['year'];
    $Blood=$_POST['Blood'];
    $Eye=$_POST['eye'];
    $GHR=$_POST['ghr'];
   // blood=$Blood,eye=$Eye,ghr=$GHR where id=$id";
        $create="update  health set year='".$Year."', blood='".$Blood."', eye='".$Eye."', ghr='".$GHR."' where id='$id' ";
         $result=mysqli_query($conn,$create);
        if($result){
            // echo"updated sussfully!";
            header("location:display_health.php");
        }else{
            die("failed!".mysqli_connect_error());
           
        }
    }
    // Move the new image file to the specified folder
?>
<footer></footer>
<?php
}
else{
    header('location:login.php');
}
?>
</body>
</html>

<!-- please give me the error for this updated page -->






