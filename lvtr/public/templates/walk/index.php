<?php
    include '../../../header.php';
    include '../../../config/templates/zoom.php';
    $site = new Config();
    $zoom = new Zoom();
    $posts = $site->get_user_media('admin', 0);
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
                    <h2>TV | MAG | RADIO</h2>
                    <p>With a smartphone and the right app, you can find any spot on Earth. But the best navigation apps do a lot more. Look out for that speed trap.</p>
                    <div class="buttons-wrapper">
                        <a href="http://freelabel.net/confirm/sub/#" class="button">Create Account</a>
                        <a href="http://freelabel.net/lvtr/public/templates/grid/#" class="button button-stripe">View Magazine</a>
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
                        <h3>The Simplest UI</h3>
                        <ul>
                            <li class="clearfix"><img src="upload/ico1.png" height="32" width="32" alt=""><span>Fastest navigation</span></li>
                            <li class="clearfix"><img src="upload/ico2.png" height="32" width="32" alt=""><span>Huge number of cities</span></li>
                            <li class="clearfix"><img src="upload/ico3.png" height="32" width="32" alt=""><span>Only the best routes</span></li>
                            <li class="clearfix"><img src="upload/ico4.png" height="32" width="32" alt=""><span>Beautiful locations</span></li>
                            <li class="clearfix"><img src="upload/ico5.png" height="32" width="32" alt=""><span>Cloud sync</span></li>
                        </ul>
                    </div>
                    <div class="simple-img">
                        <img src="upload/screen.png" height="508" width="587" alt="">
                    </div>
                </div>
                <!-- /.wrap -->
            </div>
            <!-- /.promo clearfix -->
            <div class="discover clearfix">
                <div class="wrap">
                    <div class="discover-content clearfix">
                        <h2>Discover</h2>
                        <p>Human rights momentum. World problem solving turmoil, change movements environmental pursue these aspirations initiative donation. Policy dialogue, underprivileged accessibility, asylum visionary, prevention beneficiaries carbon emissions reductions empower.</p>
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
                        <div class="discover-img-inside"><img src="upload/discover.png" height="486" width="634" alt=""></div>
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
    <?php include '../../../footer.php'; ?>