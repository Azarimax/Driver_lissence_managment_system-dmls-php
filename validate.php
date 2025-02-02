<?php
session_start();

$server_name='localhost';
$user_name='root';
$password="";
$db_name="dlmsss";
$status = "Active";
$status1 = "on";
$conn=mysqli_connect($server_name,$user_name,$password,$db_name);
if(!$conn){
die("connection failed!".mysqli_connect_error());
 }

// Handle form submission
if (isset($_POST['submit'])) {
    $uname = $_POST['User_name'];
    $upw = $_POST['password'];
    $encryptedPassword = md5($upw); // Encrypt the password

    // Prepare and execute the SQL query with encrypted password
    $sql = "SELECT * FROM user WHERE User_name = '$uname' AND password = '$encryptedPassword'";
    $result = $conn->query($sql);

    // Check if a user with matching credentials exists
    if ($result->num_rows > 0) {
        // Fetch user details
        $row = $result->fetch_assoc();

        // Set session variables
        $_SESSION["uname"] = $row["User_name"];
        $_SESSION["utype"] = $row["User_type"];

        // Redirection based on user type
        if ($row["User_type"] == "Admin") {
            header("Location: home.php");
        } else if ($row["User_type"] == "Owner") {
            header("Location: issueL.php");
        } else if ($row["User_type"] == "user") {
            header("Location: register.php");
        } else {
            echo "Invalid user type.";
        }

        exit(); // Stop further execution
    } else {
        echo "Invalid username or password.";
    }

    $conn->close(); // Close database connection
}
?>
</body>
</html>