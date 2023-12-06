<?php 
include 'config.php';
if(isset($_GET['id'])){
    $user_id = $_GET['id'];
    $sql = "DELETE FROM users1 WHERE id = '$user_id'";
    $result = $conn->query($sql);
    if($result == TRUE)  {
        echo "Data deleted successfuly";
        header('location:view.php');
    } else {
        echo "Error" .$sql  ."<br>" . $conn->error;
    }
    mysqli_close($conn);
}
?>