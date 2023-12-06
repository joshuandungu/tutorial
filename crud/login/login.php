<?php 
session_start();
include "db_conn.php";

if(isset($_POST['username']) && isset($_POST['password'])){
 function validate ($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }
}
$username = validate($_POST['username']);
$password = validate($_POST['password']);

if(empty($username)){
    header("location:index.php?error=Username is required");
    exit();
}
else if(empty($password)){
    header("location: index.php?error=Password is required");
    exit();
}
$sql = "SELECT * FROM users3 WHERE username='$username'  AND password = '$password'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if($row['username'] ===  $username && $row['password'] === $password) {
        echo "Logged in successfully";
        $_SESSION['user_name']  = $row['username'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("location:home.php");
        exit();

    } else {
        header("location:index.php");
    }
    
}
?>



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>