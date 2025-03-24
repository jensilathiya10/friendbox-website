<?php
    session_start();
    require("config.php");
    $user = $_SESSION['username'];
    if(isset($_POST['user'])){
        $username = $_POST['user'];
        $query = "delete from followings where username = '$user' and following = '$username'";
        $result = mysqli_query($conn,$query);
        if(!$result){
            echo "error";
        }
        $query = "delete from followers where username = '$username' and followedby = '$user' ";
        $result = mysqli_query($conn,$query);
        header("location:friends.php");
    }
?>