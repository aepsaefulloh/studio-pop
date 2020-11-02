<?php
session_start();
require_once 'config.php';
require_once ROOT_PATH.'/lib/dao_utility.php';
require_once ROOT_PATH.'/lib/mysqlDao.php';
require_once ROOT_PATH.'/lib/json_utility.php';
require_once ROOT_PATH.'/lib/init.php';

$var['CODE']=isset($_REQUEST['code'])?$_REQUEST['code']:'';
$detail=getRecord('tbl_product',$var);
$detail=$detail['RESULT'][0];



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $detail['PRODUCT']?> | <?php echo $objConf['DD_SITENAME']?></title>
    <!-- Meta Tag -->
    <meta name="description" content="<?php echo $detail['CONTENT']?>">
    <meta name="keywords" content="<?php echo $detail['KEYWORD']?>">
    <meta name="author" content="https://www.sketsahouse.com">
    <meta property="og:url" content="<?php echo $url?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $detail['TITLE']?>" />
    <meta property="og:description" content="<?php echo $detail['CONTENT']?>" />
    <meta property="og:image" content="<?php echo ROOT_URL.'/images/product/'.$detail['IMAGE'].'?v='.rand()?>" />
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57"
        href="<?php echo ROOT_URL?>/assets/img/icon/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60"
        href="<?php echo ROOT_URL?>/assets/img/icon/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72"
        href="<?php echo ROOT_URL?>/assets/img/icon/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76"
        href="<?php echo ROOT_URL?>/assets/img/icon/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114"
        href="<?php echo ROOT_URL?>/assets/img/icon/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120"
        href="<?php echo ROOT_URL?>/assets/img/icon/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144"
        href="<?php echo ROOT_URL?>/assets/img/icon/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152"
        href="<?php echo ROOT_URL?>/assets/img/icon/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180"
        href="<?php echo ROOT_URL?>/assets/img/icon/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="<?php echo ROOT_URL?>/assets/img/icon/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?php echo ROOT_URL?>/assets/img/icon/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96"
        href="<?php echo ROOT_URL?>/assets/img/icon/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?php echo ROOT_URL?>/assets/img/icon/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo ROOT_URL?>/assets/img/icon/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo ROOT_URL?>/assets/img/icon/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
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
                        <img id="img" src="<?php echo ROOT_URL.'/images/product/'.$detail['IMAGE'].'?var='.rand()?>"
                            class="img-fluid">
                    </div>
                    <div class="image-select" id="thumb_img" class="cf">
                        <img class="active"
                            src="<?php echo ROOT_URL.'/images/product/'.$detail['IMAGE'].'?var='.rand()?>"
                            onclick="changeimg('<?php echo ROOT_URL.'/images/product/'.$detail['IMAGE'].'?var='.rand()?>',this);">
                        <img src="<?php echo ROOT_URL?>/assets/img/store/2.png?<?php echo rand()?>"
                            onclick="changeimg('<?php echo ROOT_URL?>/assets/img/store/2.png?<?php echo rand()?>',this);">
                        <img src="<?php echo ROOT_URL?>/assets/img/store/3.png?<?php echo rand()?>"
                            onclick="changeimg('<?php echo ROOT_URL?>/assets/img/store/3.png?<?php echo rand()?>',this);">
                    </div>
                </div>
                <div class="col-md-5 offset-md-2">
                    <div class="product-name">
                        <h4><?php echo $detail['PRODUCT']?></h4>
                        <span class="line-grey"></span>
                    </div>
                    <form method="POST">
                        <input type='hidden' name='ID' value="<?php echo $detail['ID']?>">
                        <input type='hidden' name='act' value="add">
                        <h5>SIZE :</h5>
                        <div class="product-size">
                            <input type='radio' name='size' value='S' required>S
                            <input type='radio' name='size' value='M' required>M
                            <input type='radio' name='size' value='L' required>L
                            <input type='radio' name='size' value='XL' required>XL
                        </div>
                        <h5>PRICE :</h5>
                        <div class="product-price">
                            <h5 class="title">Rp. <?php echo number_format($detail['PRICE'])?></h5>
                        </div>
                        <h5>QTY :</h5>
                        <div class="product-price">
                            <input type="number" name='qty' value='1' style='padding:5px;width:70px'>
                        </div>

                        <button class="btn btn-black btn-block mb-3">ADD TO
                            CART</button>
                    </form>
                    <span class="line-grey"></span>
                    <div class="info-product">
                        <h6 class="text-muted mt-3">INFO PRODUCT</h6>
                        <p class="text-muted">
                            <?php echo $detail['SPECS']?>
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
                <?php
            $varRP['STATUS']=1;
            $varRP['LIMIT'] = 2;
            $varRP['CATEGORY'] = 2;
            $listRP = getRecord('tbl_content', $varRP);
            foreach($listRP['RESULT'] as $listRP){
                $listRP['SQL'];
                $url = getNewsUrl($listRP);  
        ?>
                <div class="col-md-6">
                    <div class="card card-playlist mb-3 border-0">
                        <div class="row no-gutters">
                            <div class="col-md-3 align-self-center">
                                <a href="<?php echo $url ?>">
                                    <img src="<?php echo ROOT_URL.'/images/content/'.$listRP['IMAGE'].'?v='.rand()?>"
                                        class="card-img" alt="...">
                                </a>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <a href="<?php echo $url ?>">
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $listRP['TITLE']?></p>
                                        <p class="card-text">
                                            <li class="ion-ios-clock-outline"><small class="text-muted">
                                                    Oct 6, 2014</li></small>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
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