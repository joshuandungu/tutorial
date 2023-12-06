<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation</title>
    <style>
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
    // define variable and set to empty values
    $fullname = $email = $gender = $comment = $number = $age = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullname = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $number = test_input($_POST["number"]);
        $comment = test_input($_POST["comment"]);
        $gender = test_input($_POST["gender"]);
        $age = test_input($_POST["age"]);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>Form Validation</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="user">Name:</label>
        <input type="text" name="name" id="user" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="number">Number:</label>
        <input type="text" name="number" id="number" required>

        <label for="age">Age:</label>
        <input type="text" name="age" id="age" required>

        <label for="comment">Comment:</label>
        <textarea name="comment" rows="10" cols="20" id="comment"></textarea>

        <label for="gender">Gender:</label>
        <h4>Female</h4> <input type="radio" name="gender" id="female" value="Female" required>
        <h4>Male</h4><input type="radio" name="gender" id="male" value="Male" required>

        <input type='submit' name='submit' value="Submit" id="submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h2>Your Input:</h2>";
        echo "Name: $fullname <br>";
        echo "Email: $email <br>";
        echo "Number: $number <br>";
        echo "Age: $age <br>";
        echo "Comment: $comment <br>";
        echo "Gender: $gender <br>";
    }
    ?>
</body>

</html>
