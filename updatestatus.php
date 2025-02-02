<?php
session_start();
if(isset($_SESSION['password'])){
    include('header.php');
include_once('connection.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_REQUEST['id'])){
$id=$_REQUEST['id'];

$query="select * from User where User_id='$id'";
$view_result=mysqli_query($connection,$query);
if($view_result){
    $row=mysqli_fetch_assoc($view_result);
 ?>
<div class=account_container>
    <form action='updatetable.php' method=post enctype=multipart/form-data>
    <div class="error_container">
            <h3></h3>
          <input type="submit" value="cancel" name="error_cancel" id="errorcancel">
            </div>
        <div class=username_container>
        <div class=userpassword_container>
            <label for=userid_field>User_Id</label>
            <input type=text name=userid id=userid_field required value="<?php echo $row['User_id'];?>">
        </div>
           
        <div class=userstatus_container>
            <label for=userstatus_field>User Status</label>
            <input type=text name=userstatus id=userstatus_field required pattern=[A-Za-z]+ value="<?php echo $row['User_status'];?>">
        </div>
        <div class=userregister_container>
           <input type=submit value=save_Status name=update_Status id=user_register>
        </div>
    </form>
 </div>
<?php
}
else{
    echo "error on commmand";
}
}
?>
  <?php
  if(isset($_REQUEST['update_Status'])){
    $userid=$_REQUEST["userid"];
    $status=$_REQUEST['userstatus'];
    $q="UPDATE user SET User_status='$status' WHERE User_id='$userid'";
    $result=mysqli_query($connection,$q);
    if($result){
        ?>
        <script> 
            var errordiv = document.querySelector('.error_container');
                let h3=errordiv.querySelector('h3');
                h3.style.color="green";
                h3.textContent="Sucussfully up date the user"; 
                    errordiv.style.display = "block";
                    var cancelbutton = document.querySelector("#errorcancel");
                    function cancel() {
                        var errordiv = document.querySelector('.error_container');
                        errordiv.style.display = "none";
                    }
                    cancelbutton.addEventListener('click', cancel);
        </script>
     <?php
 }
 else{
    ?>
    <script> 
    var errordiv = document.querySelector('.error_container');
                let h3=errordiv.querySelector('h3');
                h3.style.color="green";
                h3.textContent="ERROR IS OCCURED ON UPDATING THE USER"; 
                    errordiv.style.display = "block";
                    var cancelbutton = document.querySelector("#errorcancel");
                    function cancel() {
                        var errordiv = document.querySelector('.error_container');
                        errordiv.style.display = "none";
                    }
                    cancelbutton.addEventListener('click', cancel);
    </script>
 <?php
 }
 }
}
else{
    header('location:login.php');
}
  ?>
</body>
</html>


