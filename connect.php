<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'test1') or die("Connection failed:");

    if (
        isset($_POST['name']) &&
        isset($_POST['email']) &&
        isset($_POST['phone']) &&
        isset($_POST['bgroup'])
    ) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $bgroup = mysqli_real_escape_string($conn, $_POST['bgroup']);

        $sql = "INSERT INTO users (name, email, phone, bgroup) VALUES ('$name', '$email', '$phone', '$bgroup')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo 'Entry successful';
        } else {
            echo 'Error occurred: ' . mysqli_error($conn);
        }
    }
}
?>
