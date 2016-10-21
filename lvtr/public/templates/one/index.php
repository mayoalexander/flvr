<?php
// include_once('../../../config.php');
include_once('../../../header.php');
$site = new Config();
$ads = $site->getPhotoAds('admin', 'freelabel front',4); // '0' pulling the 1st page results
$i=0;
// $ads = $site->getPhotoAds('admin', 'current-promo',3); // '0' pulling the 1st page results
?>
<!DOCTYPE html>

    <!-- Custom CSS -->
    <link href="css/one-page-wonder.css" rel="stylesheet">
    <style type="text/css">
        .featurette-image {
            max-width: 500px;
        }
        .header-image {
            background-image:url(<?php echo $ads[$i]['image']; $i++; ?>);
        }
    </style>



    <!-- Full Width Image Header -->
    <header class="header-image">
        <div class="headline">
            <div class="container">
                <h1><?php echo $site->title; ?></h1>
                <h2><?php echo $site->description; ?></h2>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <div class="container">

        <hr class="featurette-divider">

        <!-- First Featurette -->
        <div class="featurette" id="about">
            <img class="featurette-image img-round img-responsive pull-right" src="<?php echo $ads[$i]['image']; $i++; ?>">
            <h2 class="featurette-heading">This First Heading
                <span class="text-muted">Will Catch Your Eye</span>
            </h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>

        <hr class="featurette-divider">

        <!-- Second Featurette -->
        <div class="featurette" id="services">
            <img class="featurette-image img-round img-responsive pull-left" src="<?php echo $ads[$i]['image']; $i++; ?>">
            <h2 class="featurette-heading">The Second Heading
                <span class="text-muted">Is Pretty Cool Too.</span>
            </h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>

        <hr class="featurette-divider">

        <!-- Third Featurette -->
        <div class="featurette" id="contact">
            <img class="featurette-image img-round img-responsive pull-right" src="<?php echo $ads[$i]['image']; $i++; ?>">
            <h2 class="featurette-heading">The Third Heading
                <span class="text-muted">Will Seal the Deal.</span>
            </h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>

        <hr class="featurette-divider">

        <!-- Third Featurette -->
        <div class="featurette text-center" id="contact">
            <img class="featurette-image img-round img-responsive pull-right" src="<?php echo $ads[$i]['image']; $i++; ?>">
            <h2 class="featurette-heading">Create Your Account
                <!-- <span class="text-muted">Start Making Moves.</span> -->
            </h2>
            <p class="lead"><a href="<?php echo $site->packages['sub']; ?>#" target="_blank" class="btn btn-primary btn-lg">Create Account</a></p>
        </div>

        <hr class="featurette-divider">

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

<?php 
include_once('../../../footer.php');
?>
