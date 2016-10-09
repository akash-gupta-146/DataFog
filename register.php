<?php
 include ("php/functions.php");
if(isset($_POST['submit'])){
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email_id = $_POST['email'];
        $password = $_POST['password'];
        $select_query = "SELECT * FROM user WHERE email_id='$email_id' AND password='$password'";
        $select = mysqli_query($con,$select_query);
        if($select) {
            $select_num_row = mysqli_num_rows($select);
            if($select_num_row==0){
                //echo "<script> window.location('register.php') </script>";
            }
            else{
                $user_data = mysqli_fetch_row($select);
                session_start();
                $_SESSION['user_id']=$user_data[0];
                $_SESSION['user_fname']=$user_data[1];
                $_SESSION['user_lname']=$user_data[2];
                $_SESSION['email_id']=$user_data[3];
                $_SESSION['phone_no']=$user_data[4];
                $_SESSION['username']=$user_data[5];
                $_SESSION['password']=$user_data[6];
                echo "<script> window.location='login.php' </script>";
            }
        }

    }
}
?>
<!DOCTYPE html>
<html class="no-js" lang="">
    <head>

        <!-- Site Title -->
        <title>Effacy - Creative One Page Theme</title>

        <!-- Site Meta Info -->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Effacy is a bootstrap3 based creative one page HTML5 Template.">
        <meta name="keywords" content="creative, html5, portfolio, parallax, personal, responsive">
        <meta name="author" content="themebite.com">


        <!-- Essential CSS Files -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/simplelightbox.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/style.css">

        <!-- Color Styles -->
        <link rel="stylesheet" href="css/colors/color-green.css">
        <link rel="stylesheet" href="css/colors/color-blue.css">
        <link rel="stylesheet" href="css/colors/color-purple.css">
        <link rel="stylesheet" href="css/colors/default-color.css">
        <link rel="stylesheet" href="css/colors/color-aqua.css">

        <!-- Responsive CSS -->
        <link rel="stylesheet" href="css/responsive.css">

        <!-- Google Web Fonts =:= Raleway , Montserrat and Roboto -->
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:700,400' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:700,500,400' rel='stylesheet' type='text/css'>

        <!-- Essential JS Files -->
        <script src="js/vendor/jquery-1.11.3.min.js"></script>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>

        <!-- IE9 Scripts -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script>
            $(document).ready(function(){
                $('#loginError').text('Invalid login details. Please retry or register your account.');
                $('#submit').click(function(){
                    $.post('register.php',{},function(data){
                        $('#loginError').text('invalid login details');
                    });
                });
            });
        </script>

    </head>
    <body>

        <!-- Heaser Area Start -->
        <header class="header-area">
            <!-- Navigation start -->
            <nav class="navbar navbar-custom tb-nav" role="navigation">
                <div class="container">        
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#tb-nav-collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand logo" href="#"><h2>Data<span>Fog</span></h2></a>
                 </div>
              
                  <div class="collapse navbar-collapse" id="tb-nav-collapse">
              
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a class="page-scroll" href="#top">Home</a></li>

                    </ul>
                  </div>
                </div>
            </nav>
        </header>
        <!-- Navigation end -->

        
        <!-- Login -->
        <section>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-lg-4 col-lg-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
                <div class="contact-form-section mt-50">
                   <form method="POST" action="" id="loginForm" name="contact-form" role="form">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <!-- Email Field -->
                                <div class="form-group contact-form-icon">
                                    <label for="email" class="sr-only">Email</label>
                                    <i class="fa fa-envelope"></i>
                                    <input type="email" placeholder="Email" id="email" class="form-control" name="email" required>
                                </div>
                                <!-- Subject Field -->
                                <div class="form-group contact-form-icon">
                                    <label for="password" class="sr-only">Password</label>
                                    <i class="fa fa-lock"></i>
                                    <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                </div>
                                <div class="form-group contact-form-icon">
                                    <label>
                                        <input type="checkbox" id="remember"> Remember me
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 text-center contact-button-padding">
                                    <button class="btn-primary btn-contact btn-block" id="submit" name="submit" type="submit">Login</button>
                                    <span id="loginError">sss</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-10 col-md-offset-1 col-lg-4 col-lg-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
                <div class="contact-form-section mt-50">
                    <form method="POST" action="" id="registerForm" name="contact-form" role="form">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <!-- Email Field -->
                                <div class="form-group contact-form-icon">
                                    <label for="email" class="sr-only">Email</label>
                                    <i class="fa fa-envelope"></i>
                                    <input type="email" placeholder="Email" id="email" class="form-control" name="email" required>
                                </div>
                                <!-- Subject Field -->
                                <div class="form-group contact-form-icon">
                                    <label for="password" class="sr-only">Password</label>
                                    <i class="fa fa-lock"></i>
                                    <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                </div>
                                <div class="form-group contact-form-icon">
                                    <label>
                                        <input type="checkbox" id="remember"> Remember me
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 text-center contact-button-padding">
                                    <button class="btn-primary btn-contact btn-block" name="submit2" type="submit">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <div>
        </section>

        <!-- //End Of File Manager -->
        <!-- hero-slider-section -->
        <section id="top"> 
            <!-- Carousel -->
            <div id="main-slide" class="carousel slide carousel-fade" data-ride="carousel">

                <!-- Carousel inner -->
                <div class="carousel-inner">
                    <div class="item active">
                        <!-- Slider Image -->
                        <img class="img-responsive" src="img/bg/slider/slider-bg1.jpg" alt="slider">
                        <div class="slider-content">
                            <div class="col-md-12 col-lg-6 text-center">
                                <h1 class="animated2">We are <span>passionate</span></h1>
                                <h5 class="animated3">we are passionate about web development</h5>
                            </div>
                        </div>
                    </div><!--/ Carousel item end -->
                    <div class="item">.
                        <!-- Slider Image -->
                        <img class="img-responsive" src="img/bg/slider/slider-bg2.jpg" alt="slider">
                        <div class="slider-content">
                            <div class="col-md-12 col-lg-6 text-center">
                                <h1 class="animated4">we are <span>creative</span></h1>
                                <h5 class="animated5">creativity is our stregnth</h5>
                            </div>
                        </div>
                    </div><!--/ Carousel item end -->
                    <div class="item">
                        <!-- Slider Image -->
                        <img class="img-responsive" src="img/bg/slider/slider-bg4.jpg" alt="slider">
                        <div class="slider-content">
                            <div class="col-md-12 text-center">
                                <h1 class="animated6">welcome to <span>effacy</span></h1>
                                <h5 class="animated7">awesome creative one page site</h5>
                            </div>
                        </div>
                    </div><!--/ Carousel item end -->
                </div><!-- Carousel inner end-->

                <!-- Carousel Controls -->
                <a class="left carousel-control" href="#main-slide" data-slide="prev">
                    <span><i class="fa fa-angle-left"></i></span>
                </a>
                <a class="right carousel-control" href="#main-slide" data-slide="next">
                    <span><i class="fa fa-angle-right"></i></span>
                </a>
            </div>
        </section>
        <!-- End of Hero Slider -->

       
        <!-- Footer Section -->

        <footer class="footer-section">
            <div class="container">
                <div class="row mt-30 mb-30">
                    <div class="col-md-12 text-center">
                        <!-- Footer Copy Right Text -->
                        <div class="copyright-info">
                            <a href="http://themebite.com"><span><i class="fa fa-code"></i></span> with <span><i class="fa fa-heart"></i></span> By <span>ThemeBite</span></a>
                        </div>

                        <!-- Footer Social Icons -->
                        <div class="social-icons mt-30">
                            <a href="https://www.facebook.com/themebite/"><i class="fa fa-facebook"></i></a>
                            <a href="https://twitter.com/themebite/"><i class="fa fa-twitter"></i></a>
                            <a href="https://plus.google.com/themebite/"><i class="fa fa-google-plus"></i></a>
                            <a href="https://github.com/themebite/"><i class="fa fa-github"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- End Of Footer Section -->


        <!-- JS Files -->
        <!-- Bootstrap JS -->
        <script src="js/bootstrap.min.js"></script>
        <!-- jQuery Easing -->
        <script src="js/jquery.easing.min.js"></script>
        <!-- PreLoader -->
        <script src="js/queryloader2.min.js"></script>
        <!-- WOW JS Animation -->
        <script src="js/wow.min.js"></script>
        <!-- Simple Lightbox -->
        <script src="js/simple-lightbox.min.js"></script>
        <!-- Sticky -->
        <script src="js/jquery.sticky.js"></script>
        <!-- OWL-Carousel -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- jQuery inview -->
        <script src="js/jquery.inview.js"></script>
        <!-- Shuffle jQuery -->
        <script src="js/jquery.shuffle.min.js"></script>
        <!-- jQuery CountTo -->
        <script src="js/jquery.counTo.js"></script>
        <!-- Goole map API -->
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <!-- gmap.js plugin -->
        <script src="js/gmap.js"></script>
        <!-- Main JS -->
        <script src="js/main.js"></script>

    </body>
</html>
