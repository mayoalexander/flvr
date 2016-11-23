<?php
    include '../config.php';
    $site = new Config();


    // $data = $site->getPhotoAds('admin' , 'advertise registration', 10);
    // $site->view('cover',$data);
    $dir = "../../view/themes/demo/content/sales/";
    include($dir.'registration.htm');
    // echo 'user not logged in: show cover page';
?>
