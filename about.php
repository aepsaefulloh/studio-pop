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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="section-primary mt-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="title h1">We creat music, we creat you</h1>
                    <p class="subtitle mt-md-4 text-md-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Eget ullamcorper porttitor id sagittis, tellus pharetra nisl odio neque. Lectus lobortis
                        nascetur amet non aliquam. In sit blandit vivamus vitae condimentum a. Ut nunc, fermentum
                        mi ipsum urna enim, id ultrices.</p>
                    <div class="embed-responsive embed-responsive-16by9 about-video d-flex justify-content-center mt-5">
                        <iframe class="embed-responsive-item"
                            src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
                    </div>

                    <div class="client mt-5">
                        <img src="<?php echo ROOT_URL?>/assets/img/client/1.png" class="img-fluid" alt="">
                        <img src="<?php echo ROOT_URL?>/assets/img/client/2.png" class="img-fluid" alt="">
                        <img src="<?php echo ROOT_URL?>/assets/img/client/3.png" class="img-fluid" alt="">
                        <img src="<?php echo ROOT_URL?>/assets/img/client/4.png" class="img-fluid" alt="">
                        <img src="<?php echo ROOT_URL?>/assets/img/client/5.png" class="img-fluid" alt="">
                    </div>
                    <p class="subtitle text-md-center mt-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Eget ullamcorper porttitor id sagittis, tellus pharetra nisl odio neque. Lectus lobortis
                        nascetur amet non aliquam. In sit blandit vivamus vitae condimentum a. Ut nunc, fermentum
                        mi ipsum urna enim, id ultrices eros. Consequat nulla duis elit in nunc, pellentesque diam. Nisi
                        eget nibh egestas tincidunt eu enim, nec aliquet urna. Ac diam gravida elit vehicula pulvinar
                        aliquam quam. Purus urna tristique cursus
                        id vel nulla.</p>
                </div>
            </div>
        </div>
    </section>

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