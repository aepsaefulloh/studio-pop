<?php
require_once 'config.php';
require_once ROOT_PATH.'/lib/dao_utility.php';
require_once ROOT_PATH.'/lib/mysqlDao.php';
$page = isset($_REQUEST['page'])?$_REQUEST['page']:"1";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio Pop</title>
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
                            <li class="breadcrumb-item active" aria-current="page">Journal</li>
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
                    <h1 class="title h1">Journal</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="section-primary mt-3">
        <div class="container">
            <div class="row">
                <?php 
                    $var['STATUS']=1;
                    $var ['LIMIT'] = 9;
                    $var['CATEGORY'] = 1;
                    $var['ORDER'] = 'CREATE_TIMESTAMP desc';
                    $list = getRecord('tbl_content', $var);
                    foreach($list['RESULT'] as $list){
                    // $url = getNewsUrl($list); 
                    $url=ROOT_URL.'/journal-detail.php?id='.$list['ID'];

                ?>
                <div class="col-md-4">
                    <div class="card card-article left mb-3 border-0">
                        <a href="<?php echo $url ?>">
                            <div class="row no-gutters">
                                <div class="col-md-6">
                                    <img src="<?php echo ROOT_URL?>/images/content/<?php echo $list['IMAGE'].'?v='.rand()?>"
                                        class="card-img" alt="...">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $list['TITLE']?>
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text">
                                            <li class="ion-ios-clock-outline"><small class="text-muted">
                                                    <?php echo $list['CREATE_TIMESTAMP']?></li></small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php } ?>

                <!-- <div class="col-md-6">
                    <?php
                    $listSd=$list['RESULT'][1];
                    
                    $url = getNewsUrl($listSd); 
                    
		            ?>
                    <div class="card card-article right mb-3 border-0">
                        <a href="<?php echo ROOT_URL?>/journal-detail.php">
                            <div class="row no-gutters">
                                <div class="col-md-3">
                                    <img src="<?php echo ROOT_URL?>/images/content/<?php echo $listSd['IMAGE'].'?v='.rand()?>"
                                        class="card-img" alt="...">
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $listSd['TITLE']?>
                                        </p>
                                        <p class="card-text">
                                            <li class="ion-ios-clock-outline"><small class="text-muted">
                                                    Oct 6, 2014</li></small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                    $listS3=$list['RESULT'][2];
                    
                    $url = getNewsUrl($listSd); 
                    
		            ?>
                    <div class="card card-article right mb-3 border-0">
                        <a href="<?php echo ROOT_URL?>/journal-detail.php">
                            <div class="row no-gutters">
                                <div class="col-md-3">
                                    <img src="<?php echo ROOT_URL?>/images/content/<?php echo $listS3['IMAGE'].'?v='.rand()?>"
                                        class="card-img" alt="...">
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $listS3['TITLE']?>
                                        </p>
                                        <p class="card-text">
                                            <li class="ion-ios-clock-outline"><small class="text-muted">
                                                    Oct 6, 2014</li></small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div> -->
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