<?php
        session_start();
        require("config.php");
        $user = $_SESSION['username'];
        if(isset($_POST['pid'])){
          $pid = $_POST['pid'];
          $query = "select * from likes where likedby='$user' and pid = '$pid' ";
		      $result = mysqli_query($conn,$query);
          $isliked = mysqli_num_rows($result);
          if($isliked>0){
            $query = "delete from likes where likedby='$user' and pid = '$pid'";
		        $result = mysqli_query($conn,$query);
          }else{
            $query = "insert into likes(username,likedby,pid) values('".$username."','".$user."','".$pid."') ";
            $result = mysqli_query($conn,$query);
          }
        } 
    ?>