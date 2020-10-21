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
        require_once 'include/header-store.php';
    ?>
    <!-- End Header -->


    <section class="section-first mb-sm-4 d-md-block d-none">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white p-0">
                            <li class="breadcrumb-item"><a href="<?php echo ROOT_URL?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Store</li>
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
                    <h1 class="title h1">Store</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="section-primary mt-3">
        <div class="container">
            <div class="row">
                <?php 
                    for ($i=1; $i < 7; $i++) { 
                ?>
                <div class="col-md-4 col-6">
                    <figure class="figure figure-store text-center">
                        <a href="<?php echo ROOT_URL?>/store-detail.php">
                            <img src="<?php echo ROOT_URL?>/assets/img/store/<?php echo $i ?>.png"
                                class="figure-img img-fluid rounded" alt="...">
                            <figcaption class="figure-caption">Homebreaks</figcaption>
                            <figcaption class="figure-price">Rp. 250.000</figcaption>
                        </a>
                    </figure>
                </div>
                <?php
                }
                ?>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-store justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">Next</a>
                            </li>
                        </ul>
                    </nav>
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