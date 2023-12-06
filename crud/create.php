<?php

include "config.php";

$firstname = $lastname = $email = $password = $gender = "";

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    // Basic validation
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($gender)) {
        echo "Please fill in all the fields";
    } else {
        // Additional validation (e.g., email format)
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
        } else {
            // Security: Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Use prepared statement to insert data
            $stmt = $conn->prepare("INSERT INTO users1 (firstname, lastname, email, password, gender) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $firstname, $lastname, $email, $hashedPassword, $gender);

            if ($stmt->execute()) {
                echo "New record inserted successfully";
                header('location:view.php');
            } else {
                echo "Failed to insert: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD OPERATIONS</title>

    <style>
        .error {
            color: red;
        }

        body {
            font-family: Arial, sans-serif;
        }

        form {

            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        #submit {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h2><button><a href="view.php">View Added records</a></button></h2>
    <form action="<?php echo ($_SERVER['PHP_SELF']); ?>" method="POST">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" id="firstname" required>

        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" id="lastname" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <label for="gender">Gender:</label>
        <h4>Female</h4> <input type="radio" name="gender" id="female" value="Female" required>
        <h4>Male</h4><input type="radio" name="gender" id="male" value="Male" required>

        <input type='submit' name='submit' value="Submit" id="submit">
    </form>
</body>

</html>
