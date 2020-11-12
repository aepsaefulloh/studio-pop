<?php
session_start();
require_once 'config.php';
require_once ROOT_PATH.'/lib/dao_utility.php';
require_once ROOT_PATH.'/lib/mysqlDao.php';
require_once ROOT_PATH.'/lib/json_utility.php';
require_once ROOT_PATH.'/lib/init.php';
$page=isset($_REQUEST['page'])?$_REQUEST['page']:'1';

$var['CODE']=isset($_REQUEST['code'])?$_REQUEST['code']:'';
$detail=getRecord('tbl_product',$var);
$detail=$detail['RESULT'][0];


$cpage='store';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store | <?php echo $objConf['DD_SITENAME']?></title>
    <!-- Meta Tag -->
    <meta name="description" content="<?php echo $objConf['DD_DESCRIPTION']?>">
    <meta name="keywords" content="<?php echo $objConf['DD_KEYWORD']?>">
    <meta name="author" content="https://www.sketsahouse.com">
    <meta property="og:url" content="<?php echo ROOT_URL?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $objConf['DD_SITENAME']?>" />
    <meta property="og:description" content="<?php echo $objConf['DD_DESCRIPTION']?>" />
    <meta property="og:image" content="<?php echo ROOT_URL?>/assets/img/logo/logo_500.png?<?php echo rand()?>" />
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
                   $perpage = 8;
                   $start = ($page-1)*$perpage;
                   $var ['LIMIT'] = $start.','.$perpage;
                    //$var['CATEGORY']=1;
                    $var['STATUS']=1;
                    $list = getRecord('tbl_product', $var);
					//echo $list['SQL'];
                    foreach($list['RESULT'] as $list){
						
                        //$url = getProductUrl($list);
						$url='store-detail.php?code='.$list['CODE'];
                ?>
                <div class="col-md-4 col-6">
                    <figure class="figure figure-store text-center">
                        <a href="<?php echo $url ?>">
                            <img src="<?php echo ROOT_URL.'/images/product/'.$list['IMAGE'].'?var='.rand()?>"
                                class="figure-img img-fluid rounded" alt="...">
                            <figcaption class="figure-caption"><?php echo $list['PRODUCT'] ?></figcaption>
                            <figcaption class="figure-price">Rp. <?php echo number_format($list['PRICE'])?></figcaption>
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
                        <?php 
                            $param['STATUS'] = 1;
                            $param['CATEGORY'] = '1,230';
                            $listCount= countRecord('tbl_content',$param );
                            // echo $listCount['SQL'];
                            $totalrecord = $listCount['RESULT'][0]['TOTAL'];
                            
                            $totalpage = ceil($totalrecord/$perpage);
                            //   echo $totalpage;
                            $prev = ROOT_URL.'/store?page='.($page-1);
                            $next = ROOT_URL.'/store?page='.($page+1);
                        ?>
                        <ul class="pagination pagination-store justify-content-center">
                            <?php 
                                    if ($page > 1){
                                    ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php echo $prev ?>">Previous</a>
                            </li>
                            <?php } ?>
                            <?php 
                                $start=$page-1;
                                $end=$page+1;
                                if($start<1)$start=1;
                                if($end>$totalpage)$end=$totalpage;
                                
                                for($i = $start; $i <= $end; $i++){
                                //style
                                $st='';
                                if($page==$i) $st='background:#ddd';
                                $urlpage = ROOT_URL.'/store?page='.$i;
                            ?>
                            <li class="page-item"><a class="page-link" href="<?php echo $urlpage?>"><?php echo $i?></a>
                            </li>
                            <?php } ?>
                            <?php 
                                            if($page < $totalpage ){
                                        ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php echo $next ?>">Next</a>
                            </li>
                        </ul>
                        <?php } ?>
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