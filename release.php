<?php
require_once 'config.php';
require_once ROOT_PATH.'/lib/dao_utility.php';
require_once ROOT_PATH.'/lib/mysqlDao.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio Pop</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo ROOT_URL?>/assets/plugins/bootstrap/bootstrap.min.css?<?php echo rand()?>">
    <!-- Owl Carousel -->
    <link rel="stylesheet"
        href="<?php echo ROOT_URL?>/assets/plugins/owl-carousel/owl.carousel.min.css?<?php echo rand()?>">
    <link rel="stylesheet" href="<?php echo ROOT_URL?>/assets/plugins/animate/animate.css?<?php echo rand()?>">
    <link rel="stylesheet" href="<?php echo ROOT_URL?>/assets/plugins/odometer/odometer.min.css?<?php echo rand()?>">
    <!-- ionicon -->
    <link rel="stylesheet" href="<?php echo ROOT_URL?>/assets/css/ionicons.min.css?<?php echo rand()?>">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo ROOT_URL?>/assets/css/style.css?<?php echo rand()?>">
    <link rel="stylesheet" href="<?php echo ROOT_URL?>/assets/css/responsive.css?<?php echo rand()?>">
</head>

<body>
    <!-- header -->
    <?php
        require_once 'include/header.php';
    ?>
    <!-- End Header -->


    <section class="section-first mb-sm-4 d-md-block d-none">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white p-0">
                            <li class="breadcrumb-item"><a href="<?php echo ROOT_URL?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Release</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>


    <section class="section-primary mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title h1">Release</h1>
                </div>
            </div>
        </div>
    </section>


    <section class="section-primary mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="ads-img">
                        <img src="<?php echo ROOT_URL?>/assets/img/release/ads1.jpg?<?php echo rand()?>"
                            class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="owl-carousel owl-theme owl-thumb-video">
                        <div class="card item-video border-0">
                            <div class="card-body p-0" data-merge="1">
                                <a class="owl-video" href="https://www.youtube.com/watch?v=F11PkcUVAgA"></a>
                            </div>
                        </div>
                        <div class="card item-video border-0">
                            <div class="card-body p-0" data-merge="3">
                                <a class="owl-video" href="https://www.youtube.com/watch?v=F11PkcUVAgA"></a>
                            </div>
                        </div>
                        <div class="card item-video border-0">
                            <div class="card-body p-0" data-merge="2">
                                <a class="owl-video" href="https://www.youtube.com/watch?v=F11PkcUVAgA"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="ads-img">
                        <img src="<?php echo ROOT_URL?>/assets/img/release/ads1.jpg?<?php echo rand()?>"
                            class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-primary mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-release mb-3 border-0">
                        <div class="row no-gutters">
                            <div class="col-md-12 col-4">
                                <img src="<?php echo ROOT_URL?>/assets/img/release/1.jpg?<?php echo rand()?>"
                                    class="card-img" alt="...">
                            </div>
                            <div class="col-md-12 col-8">
                                <div class="card-body pl-sm-0 pr-sm-0">
                                    <h5 class="card-title mb-0">Eva Celia - Live</h5>
                                    <p class="card-text"><small class="text-muted">Eva Celia - Live</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-release mb-3 border-0">
                        <div class="row no-gutters">
                            <div class="col-md-12 col-4">
                                <img src="<?php echo ROOT_URL?>/assets/img/release/1.jpg?<?php echo rand()?>"
                                    class="card-img" alt="...">
                            </div>
                            <div class="col-md-12 col-8">
                                <div class="card-body pl-sm-0 pr-sm-0">
                                    <h5 class="card-title mb-0">Eva Celia - Live</h5>
                                    <p class="card-text"><small class="text-muted">Eva Celia - Live</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-release mb-3 border-0">
                        <div class="row no-gutters">
                            <div class="col-md-12 col-4">
                                <img src="<?php echo ROOT_URL?>/assets/img/release/1.jpg?<?php echo rand()?>"
                                    class="card-img" alt="...">
                            </div>
                            <div class="col-md-12 col-8">
                                <div class="card-body pl-sm-0 pr-sm-0">
                                    <h5 class="card-title mb-0">Eva Celia - Live</h5>
                                    <p class="card-text"><small class="text-muted">Eva Celia - Live</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php
        require_once 'include/footer.php';
    ?>
    <!-- End Footer -->





    <!--Plugin -->
    <script src="<?php echo ROOT_URL?>/assets/plugins/modernizr/modernizr-3.6.0.min.js?<?php echo rand()?>"></script>
    <script src="<?php echo ROOT_URL?>/assets/plugins/jquery/jquery.min.js?<?php echo rand()?>"></script>
    <script src="<?php echo ROOT_URL?>/assets/plugins/bootstrap/bootstrap.min.js?<?php echo rand()?>"></script>
    <script src="<?php echo ROOT_URL?>/assets/plugins/popper/popper.min.js?<?php echo rand()?>"></script>
    <script src="<?php echo ROOT_URL?>/assets/plugins/owl-carousel/owl.carousel.min.js?<?php echo rand()?>"></script>
    <script src="<?php echo ROOT_URL?>/assets/plugins/odometer/odometer.min.js?<?php echo rand()?>"></script>
    <script src="<?php echo ROOT_URL?>/assets/plugins/waypoints/waypoints.min.js?<?php echo rand()?>"></script>
    <script src="<?php echo ROOT_URL?>/assets/plugins/wow/wow.min.js?<?php echo rand()?>"></script>
    <script src="<?php echo ROOT_URL?>/assets/plugins/appear/appear.min.js?<?php echo rand()?>"></script>
    <!-- Custom JS -->
    <script src="<?php echo ROOT_URL?>/assets/js/app.js?<?php echo rand()?>"></script>
    <script src="<?php echo ROOT_URL?>/assets/js/main.js?<?php echo rand()?>"></script>
</body>

</html>