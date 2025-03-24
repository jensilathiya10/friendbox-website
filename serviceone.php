<?php
include("config.php");
session_start();
if(!isset($_SESSION['username'])){
    header("location: index.php");
}
error_reporting(0);
if(isset($_GET["servicename"])){
    $sername = $_GET["servicename"];
}


    $query = "select * from services where name ='$sername' ";
    $result = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($result)){
    $servicename = $row['name'];
    $desc = $row['desc'];

}

if(isset($_GET['servicebook'])){
    session_start();
    $service = $_GET['service'];
    $username = $_SESSION['username'];
    $name = $_GET['name'];
    $email = $_GET['email'];
    $mobile = $_GET['mobile'];
    $date = $_GET['date'];
    if($username==null || $email==null || $mobile==null || $date==null){
        echo "<script>alert('All fields are required')</script>";
    }
    else{
        $query = "insert into booking(username,Name,service,email,mobile,date_time) values('$username','$name','$service','$email','$mobile','$date')";
        mysqli_query($con,$query);
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>ServicesFinder</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">

        <?php
            include("nav.php");
            
        ?>
        <section id="booking-form">
            <div class="modal fade" id="book-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content" style="height: 476px;">
                        <div class="modal-header" align="center">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="fa fa-times" aria-hidden="true"></span>
                            </button>
                        </div>
                        <form>
                            <div class="control-group">
                                <div class="input-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name"  />
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="far fa-user"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="input-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email"  />
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="far fa-envelope"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="input-group">
                                    <input type="text" name="mobile" class="form-control" placeholder="Mobile"  />
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-mobile-alt"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="input-group date" id="date" data-target-input="nearest">
                                    <input type="date" name="date" class="form-control datetimepicker-input" placeholder="Date"
                                        data-target="#date" data-toggle="datetimepicker" />
                                    <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <div class="input-group">
                                    <input type="hidden" name="servicename" value="<?php echo $sername ?>">
                                    <input type="text" class="form-control" name="service" value="<?php echo $sername ?>" readonly />
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-cogs"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn smoothscroll btn-primary" type="submit" name="servicebook"
                                    style=" margin-left: 35%;">Book Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>

        
        <div class="site-blocks-cover overlay bg-light" style="    min-height: 350px;
    height: calc(74vh); background-image: url('images/hero_bg_3.jpg'); " id="home-section">

            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-12 text-center align-self-center text-intro">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <h1 class="text-white" data-aos="fade-up" data-aos-delay="">We Are Digital Services</h1>
                                <p class="lead text-white" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit
                                    amet, consectetur adipisicing elit. Dignissimos magnam maxime voluptates libero,
                                    nobis impedit aut corrupti sunt possimus.</p>
                                <p data-aos="fade-up" data-aos-delay="200"><a href="index.php"
                                        class="btn smoothscroll btn-primary">Home</a></p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="wrapper">
            <div class="backgroud-color">
                <div class="bg-1"></div>
                <div class="bg-2"></div>
            </div>
            <div class="about-container">
                <div class="image-container">
                    <img src="images/img_1.jpg" alt="">
                </div>
                <div class="text-container">
                    <h1><?php echo $servicename; ?></h1>
                    <p><?php echo $desc; ?>
                    <ul>
                        <li> Installation</li>
                        <li> Repair</li>
                        <li> Upgrades</li>
                        <li> After Sales Services</li>
                        <li> Safety Inspections</li>
                        <li> Surge Protection</li>
                    </ul>


                    </p>
                    <a href="#" class="log-top btn" data-toggle="modal" style="margin: 0px 15px;"
                        data-target="#book-modal">Get Service</a>

                </div>
            </div>

        </div>
        
        <?php include("footer.php"); ?>

    </div> <!-- .site-wrap -->

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>