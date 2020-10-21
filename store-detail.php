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
                            <li class="breadcrumb-item"><a href="<?php echo ROOT_URL?>/store.php">Store</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Homebreaks</li>
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
                    <h1 class="title h1">Detail Produk</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="section-primary mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="product-img">
                        <img id="img" src="<?php echo ROOT_URL?>/assets/img/store/1.png?<?php echo rand()?>"
                            class="img-fluid">
                    </div>
                    <div class="image-select" id="thumb_img" class="cf">
                        <img class="active" src="<?php echo ROOT_URL?>/assets/img/store/1.png?<?php echo rand()?>"
                            onclick="changeimg('<?php echo ROOT_URL?>/assets/img/store/1.png?<?php echo rand()?>',this);">
                        <img src="<?php echo ROOT_URL?>/assets/img/store/2.png?<?php echo rand()?>"
                            onclick="changeimg('<?php echo ROOT_URL?>/assets/img/store/2.png?<?php echo rand()?>',this);">
                        <img src="<?php echo ROOT_URL?>/assets/img/store/3.png?<?php echo rand()?>"
                            onclick="changeimg('<?php echo ROOT_URL?>/assets/img/store/3.png?<?php echo rand()?>',this);">
                    </div>
                </div>
                <div class="col-md-5 offset-md-2">
                    <div class="product-name">
                        <h4>Homebreaks Blue T-Shirt</h4>
                        <span class="line-grey"></span>
                    </div>
                    <h5>SIZE :</h5>
                    <div class="product-size">
                        <span class="active">s</span>
                        <span>m</span>
                        <span>l</span>
                        <span>xl</span>
                    </div>
                    <h5>PRICE :</h5>
                    <div class="product-price">
                        <h5 class="title">Rp. 250.000,00</h5>
                    </div>
                    <a href="<?php echo ROOT_URL?>/cart.php" class="btn btn-black cd-add-to-cart btn-block mb-3">ADD TO
                        CART</a>
                    <span class="line-grey"></span>
                    <div class="info-product">
                        <h6 class="text-muted mt-3">INFO PRODUCT</h6>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id risus felis
                            nunc velit. Maecenas pharetra, non nam euismod vitae faucibus pharetra vestibulum.
                            <br> S / 49 / 71<br> L / 51 / 74<br> M / 55 / 75<br> XL / 60 / 77

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-secondary mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span class="line-grey"></span>
                </div>
            </div>
        </div>
    </section>
    <section class="section-primary mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title">For You</h4>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                <div class="card card-playlist mb-3 border-0">
                        <div class="row no-gutters">
                            <div class="col-md-3 align-self-center">
                                <img src="<?php echo ROOT_URL?>/assets/img/playlist/img1.jpg" class="card-img"
                                    alt="...">
                            </div>
                            <div class="col-md-9 align-self-center">
                                <div class="card-body">
                                    <p class="card-text title">Jatuh Cinta Bersama Playlist Tahun 2000, dari Naff,
                                        Sheila on
                                        7, Sampai Nineball</p>
                                    <p class="card-text"><small class="text-muted">
                                            Berikut playlist tahun 2000 yang bisa kamu nyanyiin buat doi. Jadi, mari
                                            kita
                                            jatuh cinta ramai-ramai dengan playlist tahun 2000...
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                <div class="card card-playlist mb-3 border-0">
                        <div class="row no-gutters">
                            <div class="col-md-3 align-self-center">
                                <img src="<?php echo ROOT_URL?>/assets/img/playlist/img1.jpg" class="card-img"
                                    alt="...">
                            </div>
                            <div class="col-md-9 align-self-center">
                                <div class="card-body">
                                    <p class="card-text title">Jatuh Cinta Bersama Playlist Tahun 2000, dari Naff,
                                        Sheila on
                                        7, Sampai Nineball</p>
                                    <p class="card-text"><small class="text-muted">
                                            Berikut playlist tahun 2000 yang bisa kamu nyanyiin buat doi. Jadi, mari
                                            kita
                                            jatuh cinta ramai-ramai dengan playlist tahun 2000...
                                        </small>
                                    </p>
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