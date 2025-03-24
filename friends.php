<?php 
    session_start();
?>
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
    <script src="actions.js"></script>
    <style>
    .profilebtn {
        color: black;
        border: none;
        padding: 0;
        background-color: transparent;
    }

    .remove, .unfriend {
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
		include("profileheader.php");
        
		
		

		
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
                                            <ul class="nav nav-tabs total">
                                                
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content" id="friendsdata">
                                                <div class="tab-pane active fade show " id="frends">
                                                        
                                                </div>
                                           
                                                <div class="tab-pane fade" id="frends-req">
                                                    

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
    
    <!-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
    <script src="js/main.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/map-init.js"></script>
    <!-- <script src="action.js"></script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script>

</body>


</html>