<?php
session_start();
require("config.php");
$user = $_SESSION['username'];
    
$sql = "select * from followings INNER JOIN users where followings.username='$user' and users.username = followings.following";
$followings = $conn->query($sql);
$totalfollowing = mysqli_num_rows($followings); 
$sql = "select * from followers INNER JOIN users where followers.username='$user' and users.username = followers.followedby";
$followers = $conn->query($sql);
$totalfollowers = mysqli_num_rows($followers); 
?>
<li class="nav-item followings"><a class="active" href="#frends" data-toggle="tab">Followings</a>
    <span><?php echo $totalfollowing; ?></span>
</li>
<li class="nav-item followers"><a class="" href="#frends-req" data-toggle="tab">Followers</a>
    <span><?php echo $totalfollowers; ?></span>
</li>
    <!-- <script src="action.js"></script> -->
