<?php
    require("config.php");
    session_start();
	if(isset($_GET['viewprofile'])){
		$user =  $_GET['viewprofile'];
		// echo $user;
	}else{
    $user = $_SESSION['username'];
	}
    $sql = "SELECT * from followers where username = '$user' ";
    $result = $conn->query($sql);
    $followers = mysqli_num_rows($result);
    $img = $_SESSION['profile'];
    $src = "userdata/profileimg/".$img;
?>

<section>
		<div class="feature-photo">
			<figure><img src="images/resources/timeline-1.jpg" alt=""></figure>
			<div class="add-btn">
				<!-- <span><?php echo $followers; ?> followers</span> -->
				<a href="#" title="" data-ripple=""><?php echo $followers; ?> followers</a>
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
								  <h5><?php  echo $user; ?></h5>
								  <span><?php  echo $user; ?></span>
								</li>
								<?php
								if(isset($_GET['viewprofile'])){
									$uname =  $_GET['viewprofile'];
								
								?>
        						<li>
									<a <?php if($_SERVER['SCRIPT_NAME']=='/Friendbox/viewprofile.php'){?> class="active" <?php }  ?> href="photos.php?viewprofile=<?php echo $uname ?>" data-ripple="">Photos</a>
									<a <?php if($_SERVER['SCRIPT_NAME']=='/Friendbox/friends.php'){?> class="active" <?php }  ?> href="userfriends.php?viewprofile=<?php echo $uname ?>" title="" data-ripple="">Friends</a>
									<a <?php if($_SERVER['SCRIPT_NAME']=='/Friendbox/about.php'){?> class="active" <?php }  ?> href="about.php?viewprofile=<?php echo $uname ?>" title="" data-ripple="">about</a>
								</li>
								<?php
								}else{	
									?>
									<li>
										<a <?php if($_SERVER['SCRIPT_NAME']=='/Friendbox/photos.php'){?> class="active" <?php }  ?> href="photos.php" title="" data-ripple="">Photos</a>
										<a <?php if($_SERVER['SCRIPT_NAME']=='/Friendbox/friends.php'){?> class="active" <?php }  ?> href="friends.php" title="" data-ripple="">Friends</a>
										<a <?php if($_SERVER['SCRIPT_NAME']=='/Friendbox/about.php'){?> class="active" <?php }  ?> href="" title="" data-ripple="">about</a>
									</li>
								
								<?php
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>