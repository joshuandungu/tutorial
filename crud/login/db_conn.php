<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "test1";

$conn = mysqli_connect($servername, $username, $password, $db_name);

if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error($conn);
}
?>
