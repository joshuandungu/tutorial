<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="register">
    <form action="login.php" method="POST">
        <h2>LOGIN</h2>
        <?php if(isset($_GET['error'])){
            ?>
            <p class="error"><?php echo $_GET['error'];?></p>
       <?php } ?>
       <label for="username">Username</label><br>
       <input type="text" name="username" id="username" placeholder="Username" required><br>
       <label for="password">Password</label><br>
       <input type="password" name="password" id="password" placeholder="Password"><br>
       <button type="submit" value="submit">Login</button>
    </form>
    </div>
    
</body>
</html>