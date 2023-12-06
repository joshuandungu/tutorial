<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test1";

$conn = new mysqli($servername, $username, $password, $dbname);
if (mysqli_connect_error()) {
    exit('Error connecting to the database' . mysqli_connect_error());
}

if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
    exit('Empty Field(s)');
}

if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
    exit('Values Empty');
}

if ($stmt = $conn->prepare('SELECT id, password FROM users2 WHERE username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo 'Username Already exists. Try Again';
    } else {
        if ($stmt = $conn->prepare('INSERT INTO users2 (username, password, email) VALUES (?, ?, ?)')) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);
            $stmt->execute();
            echo 'Successfully registered';
        } else {
            echo 'Error occurred';
        }
    }
    $stmt->close();
} else {
    echo 'Error Occurred';
}

$conn->close();
?>
