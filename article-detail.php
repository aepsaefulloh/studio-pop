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
                        <li class="breadcrumb-item"><a href="<?php echo ROOT_URL?>/article.php">Article & Journal</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Lorem ipsum dolor sit amet</li>
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
                <h1 class="title h1">Lorem ipsum dolor sit amet</h1>
            </div>
        </div>
    </div>
</section>
<section class="section-primary mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="image-detail-article">
                    <img src="<?php echo ROOT_URL?>/assets/img/playlist/img-detail.jpg?<?php echo rand()?>"
                        class="img-detail" alt="">
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <h3 class="title">Lorem Ipsum no ademos</h3>
                <p class="body-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ullamcorper eu aenean nibh risus
                    ipsum morbi mauris. Nisi, nunc, varius pellentesque cursus ut euismod lacus. Ultrices orci
                    ridiculus orci mattis. In libero cursus habitant nisi. Nisl mauris sit diam suspendisse a
                    facilisi sem. Arcu eget dui id quis tortor, placerat augue. Viverra aliquet phasellus tristique
                    diam mattis eu ac. Vestibulum adipiscing augue neque eget lobortis volutpat egestas. Consectetur
                    cursus at lacus ut nam cursus.
                    Vestibulum id quam diam pulvinar sollicitudin eget. Quis dui lacus, facilisis quam egestas
                    suspendisse ut. Odio lacus, arcu platea blandit lacus, lobortis. Sit integer ac ornare nisi, in
                    lorem. Nibh morbi sagittis scelerisque in facilisis neque platea ullamcorper. Pretium pretium at
                    purus sit aliquam.
                    Eu nunc magna ut pharetra egestas dictum auctor. Hendrerit egestas rhoncus diam lorem laoreet.
                    Auctor in ac et malesuada nulla cum in. Consequat imperdiet eu nisi nisl dui porta risus. Tortor
                    vitae suspendisse sed consectetur ornare ac eget eget. Vitae et in non eget vel a. Sem gravida
                    hendrerit id lectus egestas magna faucibus.
                    Sem erat iaculis libero sed integer lacus nulla. Vitae donec at risus, scelerisque hendrerit
                    lectus ut ornare. Non tempor nisl volutpat eget vitae ornare orci. Volutpat maecenas at dolor et
                    nunc viverra et. Non fermentum mollis platea aliquam quis elit sem sagittis vel. Tempor aliquam
                    sem ultrices aenean laoreet viverra. Porta eget iaculis semper dui viverra donec dui eros orci.
                    Eu quis dolor lacus, sit porttitor.
                    At eu id nisl libero, mattis sed venenatis imperdiet urna. Laoreet est aliquet egestas habitant
                    commodo. In venenatis libero proin at amet magna.
                </p>
                <span class="line-grey mt-5"></span>

            </div>
        </div>
    </div>
</section>

<section class="section-primary mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="title">You May Also Like</h4>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card card-playlist mb-3 border-0">
                    <div class="row no-gutters">
                        <div class="col-md-3 align-self-center">
                            <img src="<?php echo ROOT_URL?>/assets/img/playlist/img1.jpg?<?php echo rand()?>"
                                class="card-img" alt="...">
                        </div>
                        <div class="col-md-9 align-self-center">
                            <div class="card-body">
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Malesuada accumsan.</p>
                                <p class="card-text">
                                    <li class="ion-ios-clock-outline"><small class="text-muted">
                                            Oct 6, 2014</li></small>
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
                            <img src="<?php echo ROOT_URL?>/assets/img/playlist/img3.jpg?<?php echo rand()?>"
                                class="card-img" alt="...">
                        </div>
                        <div class="col-md-9 align-self-center">
                            <div class="card-body">
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Malesuada accumsan.</p>
                                <p class="card-text">
                                    <li class="ion-ios-clock-outline"><small class="text-muted">
                                            Oct 6, 2014</li></small>
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