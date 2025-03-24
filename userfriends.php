<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Friendbox</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="main.js"></script>
    <script src="action.js"></script>
    <style>
    .profilebtn {
        color: black;
        border: none;
        padding: 0;
        background-color: transparent;
    }

    .unfriend {
        right: 0px;
        top: 3px;
        position: absolute;
    }
    </style>
</head>

<body>

    <div class="theme-layout">


        <?php	
        include("nav.php");
		include("userprofile.php");

        if(isset($_GET['viewprofile'])){
            $user =  $_GET['viewprofile'];
        }
		$loginuser = $_SESSION['username'];
        
		if(isset($_POST['addbtn'])){
			$username = $_POST['addbtn'];
			$query = "insert into followings(username,following) values('".$loginuser."','".$username."') ";
			$result = mysqli_query($conn,$query);
			$query = "insert into followers(username,followedby) values('".$username."','".$loginuser."') ";
			$result = mysqli_query($conn,$query);
			header("location:friends.php");
		}
    	$sql = "select * from followings INNER JOIN users where followings.username='$user' and users.username = followings.following";
    	$followings = $conn->query($sql);
		$totalfollowing = mysqli_num_rows($followings); 
		$sql = "select * from followers INNER JOIN users where followers.username='$user' and users.username = followers.followedby";
    	$followers = $conn->query($sql);
		$totalfollowers = mysqli_num_rows($followers); 
		
		
		?>

        <section>
            <div class="gap gray-bg">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row" id="page-contents">
                                <?php
								include("sidenav.php");
							?>
                                <div class="col-lg-6">
                                    <div class="central-meta">
                                        <div class="frnds">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item"><a class="active" href="#frends"
                                                        data-toggle="tab">Followings</a>
                                                    <span><?php echo $totalfollowing; ?></span>
                                                </li>
                                                <li class="nav-item"><a class="" href="#frends-req"
                                                        data-toggle="tab">Followers</a><span><?php echo $totalfollowers; ?></span>
                                                </li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active fade show " id="frends">
                                                    <form action="viewprofile.php" method="get">

                                                        <ul class="nearby-contct">
                                                            <?php
												foreach($followings as $row){
													?>
                                                            <li>
                                                                <div class="nearly-pepls">
                                                                    <figure>
                                                                        <!-- <input type="hidden" name="viewprofile"
                                                                            value="<?php echo $row['username'] ?>"> -->
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

                                                                        <button type="submit" name="viewprofile"
                                                                            class="unfriend"
                                                                            value="<?php echo $row['username'] ?>">View Profile</button>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <?php
												}
												?>
                                                    </form>

                                                    </ul>
                                                    <div class="lodmore"><button
                                                            class="btn-view btn-load-more"></button></div>
                                                </div>
                                                <div class="tab-pane fade" id="frends-req">
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
                                                                        <button type="submit" name="viewprofile"
                                                                            class="unfriend"
                                                                            value="<?php echo $row['username'] ?>">View Profile</button>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <?php
														}
														?>
                                                    </form>

                                                    <button class="btn-view btn-load-more"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- centerl meta -->
                                <?php
								include("suggestions.php");
							?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
		include("footer.php");
	?>

    </div>
    

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/map-init.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script>

</body>


</html>