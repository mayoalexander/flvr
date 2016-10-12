<?php
    include '../config.php';

    $site = new Config();
// exit;

    // $zoom = new Zoom();
    $posts = $site->get_user_media('admin', 0);
    $ads = $site->getPhotoAds('admin', 'freelabel front', 6);
    $i=0;
?>

    <link rel="stylesheet" href="<?php echo $site->url?>public/templates/walk/css/style.css">
    <!--[if lt IE 9]>
        <script src="<?php echo $site->url?>public/templates/walk/js/html5.js"></script>
        <script src="<?php echo $site->url?>public/templates/walk/js/respond.js"></script>
    <![endif]-->

    <div class="main">
        <header>
            <div class="wrap">
                <img src="<?php echo $site->url;?>img/iphone.png" height="532" width="252" alt="" class="header-img">
                <div class="header-wrapper">
                    <h1><?php echo $site->title?></h1>
                    <h2>Create An Account</h2>
                    <p>Get yourself in the mix. Create a following. Upload and share music, videos, podcasts, images to get featured in Magazine, Radio, and TV publications.</p>
                    <div class="buttons-wrapper">
                        <a href="http://freelabel.net/confirm/trial/#" class="button">Try For Free</a>
                        <!-- <a href="http://freelabel.net/confirm/sub/#"" class="button button-stripe">Create Basic ($10/mo)</a> -->
                    </div>
                </div>
                <!-- /.header-wrapper -->
            </div>
            <!-- /.wrap -->
        </header>
        <div class="spanning">
                    <!-- /.newsletter clearfix -->
            <div class="simple clearfix">
                <div class="wrap">
                    <div class="simple-content">
                        <h3>BUILT FOR CREATORS</h3>
                        <ul>
                            <li class="clearfix"><img src="<?php echo $site->url?>public/templates/walk/upload/ico1.png" height="32" width="32" alt=""><span>Tailored to Your Location</span></li>
                            <li class="clearfix"><img src="<?php echo $site->url?>public/templates/walk/upload/ico2.png" height="32" width="32" alt=""><span>Worldwide Tour + Events</span></li>
                            <li class="clearfix"><img src="<?php echo $site->url?>public/templates/walk/upload/ico3.png" height="32" width="32" alt=""><span>Custom Dashboard Analytics</span></li>
                            <li class="clearfix"><img src="<?php echo $site->url?>public/templates/walk/upload/ico4.png" height="32" width="32" alt=""><span>Take Pics/Video Directly From Mobile</span></li>
                            <li class="clearfix"><img src="<?php echo $site->url?>public/templates/walk/upload/ico5.png" height="32" width="32" alt=""><span>Sync Everything in Your Cloud</span></li>
                        </ul>
                    </div>
                    <div class="simple-img">
                        <!-- <img src="<?php echo $ads[$i]['image'];$i++;?>" height="508" width="587" alt=""> -->
                        <img src="<?php echo $site->url;?>img/chrisinterview.png" height="508" width="587" alt="">

                    </div>
                </div>
                <!-- /.wrap -->
            </div>
            <!-- /.promo clearfix -->
            <div class="discover clearfix">
                <div class="wrap">
                    <div class="discover-content clearfix">
                        <h2>At Your Fingertips</h2>
                        <p>Use FREELABEL to collect all of your favorite music, videos, and articles in one place. Create playlists, upload tracks, and share your profile to the world. Introduce your friends to all the new music that you love and create new movements.
                        <div class="discover-button clearfix">
                            <a href="#" class="button button-download">
                                <span class="button-download-title">Coming soon to</span>
                                <span class="button-download-subtitle">Apple iOS</span>
                            </a>
                            <a href="#" class="button button-download android">
                                <span class="button-download-title">Coming soon to</span>
                                <span class="button-download-subtitle">Android</span>
                            </a>
                        </div>
                    </div>
                    <div class="discover-img">
                        <div class="discover-img-inside"><img src="<?php echo $site->url;?>img/mobilefriendly.png" height="486" width="634" alt=""></div>
                    </div>
                </div>
                <!-- /.wrap -->
            </div>
            <!-- /.discover clearfix -->
            <div class="video clearfix">
                <div class="wrap">
                    <div class="video-share-wrapper clearfix">
                        <ul class="social-list clearfix">
                            <li class="video-share-title">Share it with your friends:</li>
                            <li><a href="<?php echo $site->twitter_url; ?>#" class="social-twitter">via <strong>Twitter</strong></a></li>
                            <li><a href="<?php echo $site->facebook_url; ?>#" class="social-facebook">via <strong>Facebook</strong></a></li>
                            <li><a href="<?php echo $site->google_url; ?>#" class="social-google">via <strong>Google+</strong></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.wrap -->
            </div>
        </div>
        <!-- /.spanning-columns -->
    </div>
    <!-- /.main -->
    <script src="<?php echo $site->url?>public/templates/walk/js/jquery.js"></script>
    <script src="<?php echo $site->url?>public/templates/walk/js/library.js"></script>
    <script src="<?php echo $site->url?>public/templates/walk/js/script.js"></script>
    <script src="<?php echo $site->url?>public/templates/walk/js/retina.js"></script>