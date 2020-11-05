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

    <section class="section-first">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title h1">Complete Order</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="section-primary mt-3">
        <div class="container">
            <div class="row">

                <div class="col-md-5 border-right">

                    <div class="row mt-md-0 mt-5">
                        <div class="col-md-12">
                            <h4>Order Detail</h4>
                        </div>
                    </div>
                    <?php
					$total=0;
					if(!empty($_SESSION["cart_item"])){
					foreach ($_SESSION["cart_item"] as $item){ 
						$sub=$item['QTY']*$item['PRICE'];
						$total+=$sub;
						
					?>
                    <div class="row mt-3">
                        <div class="col-md-3 pb-3">
                            <div class="shipment-img g">
                                <img src="<?php echo ROOT_URL.'/images/product/'.$item['IMAGE'].'?var='.rand()?>"
                                    class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-7 align-self-center">
                            <div class="shipment-item">
                                <h6><?php echo $item['CODE'].' - '.$item['PRODUCT']?></h6>
                                <h6><?php echo $item['SIZE']?></h6>
                                <h6 class="title">Rp. <?php echo number_format($item['PRICE'])?> <small>x
                                        <?php echo $item['QTY']?> = <?php echo number_format($sub)?></small></h6>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>
                    <div class="row">

                        <div class="col-md-12">

                            <input type='hidden' act='finish' value='finish'>
                            <div class="line-grey"></div>
                            <ul class="list-group">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 p-0 pt-2 pb-3">
                                    Sub Total
                                    <span class="badge badge-white">Rp. <?php echo number_format($total)?></span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 p-0">
                                    Shipping
                                    <span class="badge badge-white">9.000,00</span>
                                </li>
                            </ul>
                            <div class="line-grey"></div>
                            <ul class="list-group">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 p-0 pt-2 pb-3">
                                    TOTAL
                                    <span class="badge badge-white"><?php echo number_format($total+9000)?></span>
                                </li>
                            </ul>


                        </div>

                    </div>
                </div>
                <div class="col-md-6 offset-md-1">

                    <form action='<?php echo ROOT_URL?>/thanks.php' method='POST'>
                        <input type='hidden' name='act' value='finish'>
                        <input type='hidden' name='TRID' value='<?php echo 'ST'.time()?>'>
                        <input type='hidden' name='FULLNAME' value='<?php echo $_REQUEST['FULLNAME']?>'>
                        <input type='hidden' name='ADDRESS' value='<?php echo $_REQUEST['ADDRESS']?>'>
                        <input type='hidden' name='EMAIL' value='<?php echo $_REQUEST['EMAIL']?>'>
                        <input type='hidden' name='PHONE' value='<?php echo $_REQUEST['PHONE']?>'>
                        <input type='hidden' name='KODEPOS' value='<?php echo $_REQUEST['KODEPOS']?>'>
                        <input type='hidden' name='PROV' value='<?php echo $_REQUEST['PROV']?>'>
                        <input type='hidden' name='KAB' value='<?php echo $_REQUEST['KAB']?>'>

                        <div class="shipment-method">
                            <h4>Shipping Address</h4>
                            <div class="form-check">
                                <!--input class="form-check-input" type="checkbox" name="SHIPMENT" value="REGULAR"-->
                                <label class="form-check-label label-payment">
                                    <?php echo  $_REQUEST['FULLNAME']?>,
                                    <?php echo  $_REQUEST['ADDRESS'].', '.$_REQUEST['KODEPOS']?>

                                </label>
                            </div>
                        </div>


                        <div class="shipment-method mt-5">
                            <h4>Shipment Method</h4>
                            <div class="form-check">
                                <!--input class="form-check-input" type="checkbox" name="SHIPMENT" value="REGULAR"-->
                                <label class="form-check-label label-payment">
                                    Regular Shipment<span>Rp. 9000</span>
                                </label>
                            </div>
                        </div>
                        <div class="shipment-method mt-5">
                            <h4>Payment</h4>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="PAYMENT" value="BCA" required
                                    selected>
                                <label class="form-check-label label-bank">
                                    <img src="<?php echo ROOT_URL?>/assets/img/icon/bca.png?<?php echo rand()?>"
                                        class="img-fluid img-bank" alt=""> Transfer BCA
                                </label>
                            </div>


                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="PAYMENT" value="BNI" required
                                    disabled>
                                <label class="form-check-label label-bank">
                                    <img src="<?php echo ROOT_URL?>/assets/img/icon/bni.png?<?php echo rand()?>"
                                        class="img-fluid img-bank" alt=""> Transfer BNI
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="PAYMENT" value="BRI" required
                                    disabled>
                                <label class="form-check-label label-bank">
                                    <img src="<?php echo ROOT_URL?>/assets/img/icon/bri.png?<?php echo rand()?>"
                                        class="img-fluid img-bank" alt=""> Transfer BRI
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="PAYMENT" value="MANDIRI" required
                                    disabled>
                                <label class="form-check-label label-bank">
                                    <img src="<?php echo ROOT_URL?>/assets/img/icon/mandiri.png?<?php echo rand()?>"
                                        class="img-fluid img-bank" alt=""> Transfer
                                    Mandiri
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="PAYMENT" value="PERMATA" required
                                    disabled>
                                <label class="form-check-label label-bank">
                                    <img src="<?php echo ROOT_URL?>/assets/img/icon/permata.png?<?php echo rand()?>"
                                        class="img-fluid img-bank" alt=""> Transfer
                                    Permata
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-black btn-block">CONTINUE</button>
                    </form>

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