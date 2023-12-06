<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet"  type="text/css" href="style.css">
</head>
<body>
    <div class="register">
        <h2>Register</h2>
        <form action="config.php" method="POST">
            <label for="username">Username</label> 
            <input type="text" name="username" placeholder="Username" id="username" required><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" placeholder="Password" id="password" required><br>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Email" id="email" required><br>
            <input type="submit" value="register">
        </form>
    </div>
    
</body>
</html>