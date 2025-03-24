<?php
    session_start();
    require("config.php");
    $user = $_SESSION['username'];
    if(isset($_POST['remove'])){
        $username = $_POST['remove'];
        $query = "delete from followings where username = '$username' and following = '$user'";
        $result = mysqli_query($conn,$query);
        $query = "delete from followers where username = '$user' and followedby = '$username' ";
        $result = mysqli_query($conn,$query);
    }
?>