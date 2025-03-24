<?php
    include("config.php");
    // error_reporting(0);
    session_start();

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "select * from users where username = '$username' && password = '$password' ";
        $result = mysqli_query($conn,$query);
        foreach($result as $row){
            $img = $row["profile"];
			$name = $row["name"];
        }
        if(mysqli_num_rows($result)>0){
            $_SESSION['username'] = $username;
            $_SESSION['profile'] = $img;
			$_SESSION['name']= $name;
            header("location: index.php");
			
        }
        else{
            echo '<script>alert("failed")</script>';
        }
    }

	if(isset($_POST["register"])){
		$dest = "./userdata/profileimg";
		$name = $_POST["name"];
		$username = $_POST["username"];
		$email = $_POST["email"];
		$pass = $_POST["password"];
		$phone = $_POST["phone"];

		// $date = date("Y/m/d");
		$fileName = $_FILES["file"]['name'];
		$fileTempName = $_FILES['file']['tmp_name'];
		$basename =  basename($_FILES["file"]["name"]);
		move_uploaded_file($fileTempName,"$dest/$basename");
		try{
			$query = "INSERT INTO users( username,name,password,email,phone,profile) VALUES ('".$username."','".$name."','".$pass."','".$email."','".$phone."','$basename')";
			$result = mysqli_query($conn,$query);
			header("location: login.php");
		}
		catch(Exception $e){
			echo $e;
		}
	}
	
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

</head>

<body>
    <!--<div class="se-pre-con"></div>-->
    <div class="theme-layout">
        <div class="container-fluid pdng0">
            <div class="row merged">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="land-featurearea">
                        <div class="land-meta">
                            <h1>Friendbox</h1>
                            <p>
                                Friendbox is free to use for as long as you want with two active projects.
                            </p>
                            <div class="friend-logo">
                                <span><img src="images/wink.png" alt=""></span>
                            </div>
                            <a href="#" title="" class="folow-me">Follow Us on</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="login-reg-bg">
                        <div class="log-reg-area sign">
                            <h2 class="log-title">Login</h2>
                            <p>
                                Don’t use Friendbox Yet? <a href="#" title="">Take the tour</a> or <a href="#"
                                    title="">Join now</a>
                            </p>
                            <form method="post">
                                <div class="form-group">
                                    <input type="text" id="input" name="username" required="required" />
                                    <label class="control-label" for="input">Username</label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" required="required" />
                                    <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked="checked" /><i class="check-box"></i>Always
                                        Remember Me.
                                    </label>
                                </div>
                                <a href="#" title="" class="forgot-pwd">Forgot Password?</a>
                                <div class="submit-btns">
                                    <button class="mtr-btn signin" name="login" type="submit"><span>Login</span></button>
                                    <button class="mtr-btn signup" type="button"><span>Register</span></button>
                                </div>
                            </form>
                        </div>
                        <div class="log-reg-area reg">
                            <h2 class="log-title">Register</h2>
                            <p>
                                Don’t use Friendbox Yet? <a href="#" title="">Take the tour</a> or <a href="#"
                                    title="">Join now</a>
                            </p>
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" name="name" required="required" />
                                    <label class="control-label" for="input">First & Last Name</label><i
                                        class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="text"name="username" required="required" />
                                    <label class="control-label" for="input">User Name</label><i
                                        class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" required="required" />
                                    <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
                                </div>
								<div class="form-group">
                                    <input type="text" name="phone" required="required" />
                                    <label class="control-label" for="input">Mobile No.</label><i class="mtrl-select"></i>
                                </div>
                               
								<div class="form-group" style="display:flex; align-items:center;">
									<label for="file"  class="btn">Select Image</label>
                                    <input type="file" name="file" required="required"/>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="email" required="required" />
                                    <label class="control-label" for="input"><a
                                            href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="6c29010d05002c">[email&#160;protected]</a></label><i
                                        class="mtrl-select"></i>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked="checked" /><i class="check-box"></i>Accept Terms
                                        & Conditions ?
                                    </label>
                                </div>
                                <a href="#" title="" class="already-have">Already have an account</a>
                                <div class="submit-btns">
                                    <button class="btn btn-primry" type="submit" name="register"><span>Register</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>