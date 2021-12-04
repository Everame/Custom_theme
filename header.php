<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DartServices</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <?php 
        wp_head();
    ?>
    <style>
        @font-face {
            font-family: "Raleway light";
            src: url("<?php echo get_theme_file_uri();?>/assets/fonts/Raleway/Raleway-Light.ttf");
        }

        @font-face {
            font-family: "Raleway Bold";
            src: url("<?php echo get_theme_file_uri();?>/assets/fonts/Raleway/Raleway-Bold.ttf");
        }

        @font-face {
            font-family: "Raleway ExtraBold";
            src: url("<?php echo get_theme_file_uri();?>/assets/fonts/Raleway/Raleway-ExtraBold.ttf");
        }

        @font-face {
            font-family: "Raleway ExtraLight";
            src: url("<?php echo get_theme_file_uri();?>/assets/fonts/Raleway/Raleway-ExtraLight.ttf");
        }

        @font-face {
            font-family: "Raleway Regular";
            src: url("<?php echo get_theme_file_uri();?>/assets/fonts/Raleway/Raleway-Regular.ttf");
        }

        @font-face {
            font-family: "Raleway SemiBold";
            src: url("<?php echo get_theme_file_uri();?>/assets/fonts/Raleway/Raleway-SemiBold.ttf");
        }

        @font-face {
            font-family: "Raleway ThinItalic";
            src: url("<?php echo get_theme_file_uri();?>/assets/fonts/Raleway/Raleway-ThinItalic.ttf");
        }

        @font-face {
            font-family: "Raleway Thin";
            src: url("<?php echo get_theme_file_uri();?>/assets/fonts/Raleway/Raleway-Thin.ttf");
        }

        @font-face {
            font-family: "Raleway Medium";
            src: url("<?php echo get_theme_file_uri();?>/assets/fonts/Raleway/Raleway-Medium.ttf");
        }
    </style>
</head>

<body>
    <header class="container-fluid" style="background-image: url('<?php echo get_theme_file_uri();?>/assets/img/Header-bg.png')">
        <div class="container">
            <div class="row  topHead">
                <div class="brandLogo">
                    <img class="logo" src="<?php echo get_theme_file_uri();?>/assets/img/Logo.png" alt="Logo">
                    <div class="companyTitle">
                        <span class="light">Dart</span>
                        <span class="bold uppercase">Service manager</span>
                    </div>
                </div>

                <div class="nav">
                    <a href="#">Home</a>
                    <a href="#">Service</a>
                    <a href="#">Extension</a>
                    <a href="#">Pricing</a>
                    <a href="#">Help</a>
                </div>

                <div class="mediaNav">
                    <div class="burgSelector">
                        <i class="fa fa-bars bars" aria-hidden="true"></i>
                        <div class="navItems">
                            <a href="#">Home</a>
                            <a href="#">Service</a>
                            <a href="#">Extension</a>
                            <a href="#">Pricing</a>
                            <a href="#">Help</a>
                        </div>
                    </div>

                    <a href="#" class="btn lowercase">sign up</a>
                </div>
            </div>
        </div>
        <div class="container descr">
            <div class="text-block">
                <h1 class="block-title uppercase">
                    lorem Ipsum Dolor sit amet
                </h1>
                <span class="block-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamc
                </span>
                <div class="btns-container">
                    <a href="#" class="btn-blue uppercase">BUY NOW</a>
                    <a href="#" class="btn-white header-btn">TRY FOR FREE</a>
                </div>
            </div>
            <div class="media-block">
                <video controls poster="<?php echo get_theme_file_uri();?>/assets/video/video_bg.png">
                    <source src="<?php echo get_theme_file_uri();?>/assets/video/video.mp4" type="video/mp4">
                </video>
            </div>
        </div>
    </header>