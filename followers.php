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
<script src="actions.js"></script>
<form action="viewprofile.php" method="get">

<ul class="nearby-contct">
    <?php
    foreach($followers as $row){
    ?>
    <li>
        <div class="nearly-pepls">
            <figure>
                <button type="submit" name="viewprofile"
                    value="<?php echo $row['username'] ?>"
                    class="profilebtn"><img style="height:9vh;"
                        src="./userdata/profileimg/<?php echo $row['profile']; ?>"
                        alt=""></button>
            </figure>
            <div class="pepl-info">
                <button type="submit" name="viewprofile"
                    value="<?php echo $row['username'] ?>"
                    class="profilebtn">
                    <h5><?php echo $row['name'] ?></h5>
                </button>
                <span><?php echo $row['username'] ?></span>

                <!-- <a href="#" title="" class="add-butn more-action" data-ripple="">unfriend</a> -->
                <button type="button" name="remove"
                    class="remove"
                    value="<?php echo $row['username'] ?>">remove</button>
            </div>
        </div>
    </li>
    <?php
}
?>
</form>