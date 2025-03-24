<?php
    require("config.php");
    session_start();
    if(isset($_GET['viewprofile'])){
        $username = $_GET['viewprofile'];
        $user = $_SESSION['username'];

        $sql = "SELECT * from followers where username = '$username' ";
        $followers = $conn->query($sql);
        $totalfollowers = mysqli_num_rows($followers);

        $sql = "SELECT * from users where username = '$username' ";
        $userdata = $conn->query($sql);

        $sql = "select pid,uid,photos.username,users.name,source,caption,datetime,users.profile from photos JOIN users where photos.username = users.username and photos.username='$username'";
        $result = $conn->query($sql);

        $sql = "SELECT * from users where username = '$username' ";
        $friend = $conn->query($sql);
        if(mysqli_num_rows($friend)!=0){
            $isfriend = true;
        }
        else{
            $isfriend = false;
        }

        foreach($userdata as $row){
            $name = $row['name'];
            $uname = $row['username'];
            $img = $row['profile'];
            $src = "userdata/profileimg/".$img;
        }

    }
    if(isset($_POST['addfriend'])){
            $viewusername = $_POST['addfriend'];
			$query = "insert into followings(username,following) values('".$user."','".$viewusername."') ";
			$result = mysqli_query($conn,$query);
			$query = "insert into followers(username,followedby) values('".$viewusername."','".$user."') ";
			$result = mysqli_query($conn,$query);
			header("location:friends.php"); 
    }
    
?>
<style>
    .followbtn{
        border-radius: 2px;
    color: #fff;
    display: inline-block;
    font-size: 14px;
    padding: 4px 20px;
    }
</style>
<section>
		<div class="feature-photo">
			<figure><img src="images/resources/timeline-1.jpg" alt=""></figure>
			<div class="add-btn">
                <form action="" method="post">     
				<span style="color:white"><?php echo $totalfollowers; ?> followers</span>
                <?php
                if($isfriend){
                    ?>
                    <button type="submit" class="followbtn">Following</button>
                    <?php
                }else{
                    ?>
                    <button type="submit" name="addfriend" value="<?php echo $username ?>" class="followbtn">Add Friend</button>
                    <?php 
                }
                ?>
            </form>
			</div>
			<form class="edit-phto">
				<i class="fa fa-camera-retro"></i>
				<label class="fileContainer">
					Edit Cover Photo
				<input type="file"/>
				</label>
			</form>
			<div class="container-fluid">
				<div class="row merged">
					<div class="col-lg-2 col-sm-3">
						<div class="user-avatar">
							<figure>
								<img src="<?php echo $src; ?>" alt="">
								<form class="edit-phto">
									<i class="fa fa-camera-retro"></i>
									<label class="fileContainer">
										Edit Display Photo
										<input type="file"/>
									</label>
								</form>
							</figure>
						</div>
					</div>
					<div class="col-lg-10 col-sm-9">
						<div class="timeline-info">
							<ul>
								<li class="admin-name">
								  <h5><?php  echo $name; ?></h5>
								  <span><?php  echo $uname; ?></span>
								</li>
								<li>
									<a <?php if($_SERVER['SCRIPT_NAME']=='/Friendbox/viewprofile.php'){?> class="active" <?php }  ?> href="viewprofile.php?viewprofile=<?php echo $uname ?>" data-ripple="">Photos</a>
									<a <?php if($_SERVER['SCRIPT_NAME']=='/Friendbox/userfriends.php'){?> class="active" <?php }  ?> href="userfriends.php?viewprofile=<?php echo $uname ?>" title="" data-ripple="">Friends</a>
									<a <?php if($_SERVER['SCRIPT_NAME']=='/Friendbox/about.php'){?> class="active" <?php }  ?> href="about.php?viewprofile=<?php echo $uname ?>" title="" data-ripple="">about</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>