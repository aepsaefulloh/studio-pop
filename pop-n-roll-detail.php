<?php
require_once 'config.php';
require_once ROOT_PATH.'/lib/dao_utility.php';
require_once ROOT_PATH.'/lib/mysqlDao.php';
require_once ROOT_PATH.'/lib/json_utility.php';
require_once ROOT_PATH.'/lib/init.php';
$var['ID'] = isset($_REQUEST['id'])?$_REQUEST['id']:'';
$list = getRecord('tbl_content', $var);
$list = $list['RESULT'][0];
$url = getNewsUrl($list);   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $list['TITLE']?> | <?php echo $objConf['DD_SITENAME']?></title>
    <!-- Meta Tag -->
    <meta name="description" content="<?php echo $list['CONTENT']?>">
    <meta name="keywords" content="<?php echo $list['KEYWORD']?>">
    <meta name="author" content="https://www.sketsahouse.com">
    <meta property="og:url" content="<?php echo $url?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $list['TITLE']?>" />
    <meta property="og:description" content="<?php echo $list['CONTENT']?>" />
    <meta property="og:image" content="<?php echo ROOT_URL.'/images/content/'.$list['IMAGE'].'?v='.rand()?>" />
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
                        <li class="breadcrumb-item"><a href="<?php echo ROOT_URL?>/pop-n-roll">Pop 'n Roll</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $list['TITLE']?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="section-primary mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="title h1">Pop 'n Roll
                </h1>
                <div class="image-detail-article ptb-3">
                    <img src="<?php echo ROOT_URL.'/images/content/'.$list['IMAGE'].'?v='.rand()?>"
                        class="img-fluid img-detail" alt="">
                </div>
                <h3 class="title"> <?php echo $list['TITLE']?>
                </h3>
                <div class="playlist-author">
                    <span> <?php echo $list['CREATE_BY']?></span>
                    <span> <?php echo $list['CREATE_TIMESTAMP']?></span>
                </div>
                <span class="line-grey mb-3"></span>
                <p class="body-text text-justify">
                    <?php echo $list['CONTENT']?>
                </p>
            </div>
            <div class="col-md-4 offset-md-1">
                <div class="sportify-embed detail">
                    <iframe src="<?php echo $list['SPORTIFY']?>" style="border: 0; width: 100%; height: 500px;"
                        allowfullscreen></iframe>
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