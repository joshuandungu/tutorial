<?php
include "config.php";
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
}

if (isset($_POST['update'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $gender = $_POST['gender'];

    $sql = "UPDATE users1 SET firstname = '$firstname', lastname = '$lastname', email = '$email', password = '$password', gender = '$gender' WHERE id = '$user_id'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record Updated successfully";
        header('location:view.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql = "SELECT * FROM users1 WHERE id = '$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $first_name = $row['firstname'];
            $last_name = $row['lastname'];
            $email = $row['email'];
            $password = $row['password'];
            $gender = $row['gender'];
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Update</title>
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
            <h2>Update</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <label for="firstname">First Name:</label>
                <input type="text" name="firstname" id="firstname" value="<?php echo htmlspecialchars($first_name); ?>" required>

                <label for="lastname">Last Name:</label>
                <input type="text" name="lastname" id="lastname" value="<?php echo htmlspecialchars($last_name); ?>" required>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" required>

                <label for="password">Password:</label>
                <input type="password" name="password" id="password" value="<?php echo htmlspecialchars($password); ?>" required>

                <label for="gender">Gender:</label>
                <h4>Female</h4> <input type="radio" name="gender" id="female" value="Female" <?php echo ($gender == 'Female') ? 'checked' : ''; ?> required>
                <h4>Male</h4><input type="radio" name="gender" id="male" value="Male" <?php echo ($gender == 'Male') ? 'checked' : ''; ?> required>

                <input type='submit' name='update' value="Update">
            </form>
        </body>

        </html>
<?php
    }
}
?>
