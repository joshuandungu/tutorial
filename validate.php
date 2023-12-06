<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate </title>
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
    <?php 
    // define variables and set to empty
    $nameErr = $emailErr = $websiteErr = $commentErr = $genderErr = "";
    $name = $email = $gender = $comment = $website = "";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(empty($_POST["name"])){
            $nameErr = "Please enter a valid name";
        } else {
            $name = test_input($_POST["name"]);
            if(preg_match("/^[a-zA-Z-']*$/", $name)){
                $nameErr = "Only letters and white spaces allowed";
            }
        }
    }

    if(empty($_POST["email"])){
        $emailErr = "Valid Email Address";
    } else {
        $email = test_input($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "The email address is incorrect";
        }
    }

    if(empty($_POST["website"])){
        $websiteErr = "Please enter a  valid website url ";
    } else {
        $website = test_input($_POST["website"]);
        if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]+[-a-z0-9+&@#\/%=~|]/i", $website)){
            $websiteErr = "Enter a valid website URL";
        }
    }

    if(empty($_POST["comment"])){
        $commentErr = "Please enter some text in the comments section";
    } else {
        $comment = test_input($_POST["comment"]);
    }

    if(empty($_POST["gender"])){
        $genderErr = "Please select gender";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>PHP Form Validation Example</h2>
    <p><span class="error">* required field </span></p>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="user">Name:</label>
        <input type="text" name="name" id="user" required>
        <span class="error">* <?php echo $nameErr; ?></span>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <span class="error">* <?php echo $emailErr; ?></span>

        <label for="website-url">Website Url:</label>
        <input type="text" name="number" id="website-url" required>
        <span class="error">* <?php echo $websiteErr; ?></span>

        <label for="comment">Comment:</label>
        <textarea name="comment" rows="10" cols="20" id="comment"></textarea>
        <span class="error">* <?php echo $commentErr; ?></span>

        <label for="gender">Gender:</label>
        <h4>Female</h4> <input type="radio" name="gender" id="female" value="Female" required>
        <h4>Male</h4><input type="radio" name="gender" id="male" value="Male" required>
        <span class="error">* <?php echo $genderErr; ?></span>

        <input type='submit' name='submit' value="Submit" id="submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h2>Your Input:</h2>";
        echo "Name: $name <br>";
        echo "Email: $email <br>";
        echo "Website URL: $website <br>";
        echo "Comment: $comment <br>";
        echo "Gender: $gender <br>";
    }
    ?>
</body>

</html>
