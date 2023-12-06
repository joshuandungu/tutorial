<?php
include "config.php";

$sql = "SELECT * FROM users1";
$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <link rel="stylesheet" href="">
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
         .btn-info {
            background-color: blue;
            border-radius: 4px;
            border: 1px solid blue;
            text-align: center;
            text-shadow: #f2f2f2;
            color: #f2f2f2;
            text-decoration: none;
            height: 30px;
            width: 50px;
            padding: 10px, 10px, 10px, 10px;

         }
         .btn-info:a{
            text-align: center;
            text-decoration: none;
            font-size: 14px;
            font-family: 'Courier New', Courier, monospace;
            font-weight: 100;
         }
         .btn-info:hover{
            color: yellow;
            
         }
         .btn-danger {
            background-color: red;
            border-radius: 4px;
            border: 1px solid blue;
            text-align: center;
            text-shadow: #f2f2f2;
            color: black;
            text-decoration: none;
            height: 30px;
            width: 50px;
            padding: 10px, 10px, 10px, 10px;
         }
         .btn-danger :a {
            text-align: center;
            text-decoration: none;
            font-size: 14px;
            font-family: 'Courier New', Courier, monospace;
            font-weight: 100;
         }
         .btn btn-info:hover{
            color: lightcoral;
         }


        #submit {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .table {
            width: fit-content;
            height: fit-content;
            border: 2px solid black;
            border-radius: 10px;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid black;
            padding: 8px;
        }

        .table th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class= "container">
        <h2>Users</h2>
        <button class="btn btn-info"><a href="create.php">Add New Record</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['firstname'];?></td>
                            <td><?php echo $row['lastname'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['gender'];?></td>
                            <td>
                              <button class = " btn-info">  <a   onclick="return confirm('Are sure sure you want to update this data');"href="update.php?id=<?php echo $row['id'];?>">Edit</a> &nbsp;</button>
                               <button class="btn-danger"> <a onclick="return confirm('Are sure sure you want to delete this data');" href="delete.php?id=<?php echo $row['id'];?>">Delete</a></button>
                            </td>
                        </tr>
                    <?php }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>