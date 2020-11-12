<?php
session_start();
require_once 'config.php';
require_once ROOT_PATH.'/lib/dao_utility.php';
require_once ROOT_PATH.'/lib/mysqlDao.php';
require_once ROOT_PATH.'/lib/json_utility.php';
require_once ROOT_PATH.'/lib/init.php';
require_once ROOT_PATH.'/lib/mail_utility.php';




$text='<h3 class="mb-3">Thank you for shopping with STUDIO POP</h3>';
$text.="<p><strong>Hi,&nbsp;".$_REQUEST['FULLNAME']."</strong></p>";
$text.="<p class='mb-3'><strong>Thank you for your order! Your items will be delivered after the payment has been made. Please make your payment within 24 hours to avoid order cancellation and send the payment receipt to shopping@studiopop.id</strong></p>";
$text.="<div class='box-text'>";
$text.="<p><strong>Order No : ".$_REQUEST['TRID']."</strong></p>";
		$shipping=$_REQUEST['SHIPPING'];
		$subtotal=0;
		if(!empty($_SESSION["cart_item"])){
		foreach ($_SESSION["cart_item"] as $item){
			$sub=$item['QTY']*$item['PRICE'];
			$subtotal+=$sub;
		
//$text.="<li><p>".$item['PRODUCT']."(".$item['SIZE'].")  x ".$item['QTY']."</p></li>";
		}}
		$total=$shipping+$subtotal;
//$text.="</ul>";
$text.="<p><strong>SubTotal : Rp. ".number_format($subtotal)."</strong></p>";
$text.="<p><strong>Shipping : Rp. ".number_format($shipping)."</strong></p>";
$text.="<p class='mb-3'><strong>Total &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Rp. ".number_format($total)."</strong></p>";
$text.="<p><i><strong>Please settle the payment by transferring it to the following bank account with your order number as the reference.<br><br>

BCA 7310160371 a/n Daiva Prayudi </strong></i></p>";
$text.='<hr class="dash"></br>';

$text.='<center><p class="text-center">STUDIO POP Terms</p>';
$text.='<p class="text-center">All sales are final. No refunds. No exchanges.</p><br>';

$text.='<p class="text-center">Shipping</p>';
$text.='<p class="text-center">Kindly make sure that the shipping address is correct and somebody is home to receive the package from 9 am to 6 pm on the estimated delivery date.</p><br>';

$text.='<p class="text-center">Please transfer to</p>';

$text.='<p class="text-center">BCA 7310160371 a/n Daiva Prayudi</p><br>';

$text.='<p class="text-center">Please complete your payment within 24 hours. The order will automatically be canceled if there’s no payment within 24 hours.</p>';
$text.='<p class="text-center">Please send a confirmation after you make the payment along with the prove of payment.</p><br>';

$text.='<p class="text-center">Once again, thank you for shopping with STUDIO POP!</p><br>';

$text.='<p class="text-center"><strong>STUDIO POP</strong></p>';
$text.='<p class="text-center">www.studiopop.id</p></div></center>';
	
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
                    <h1 class="title h1">Store</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="section-primary mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron jumbotron-after-shop">
                        <div class="container">
                            <?php echo $text ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
	

if($_REQUEST['TRID']!=''){
	
	//check if trid exist
	$p['TRID']=$_REQUEST['TRID'];
	$pt=getRecord('tbl_transaction',$p);
	if(empty($pt['RESULT'])){

	$v['ACT']='ADD';
	$v['FULLNAME']=$_REQUEST['FULLNAME'];
	$v['TRID']=$_REQUEST['TRID'];
	$v['ADDRESS']=$_REQUEST['ADDRESS'];
	$v['PHONE']=$_REQUEST['PHONE'];
	$v['EMAIL']=$_REQUEST['EMAIL'];
	$v['KODEPOS']=$_REQUEST['KODEPOS'];
	$v['PROV']=$_REQUEST['PROV'];
	$v['KAB']=$_REQUEST['KAB'];
	$v['PAYMENT']='BCA';
	$v['SHIPMENT']=$_REQUEST['SHIPMENT'];
	$v['SHIPPING']=$shipping;
	$v['TOTAL']=$total;
	$v['STATUS']=0;
	$v['TRDATE']=date('Y-m-d H:i:s');
	$rs=saveRecord('tbl_transaction',$v);
	//echo $rs['SQL'].'<br>';
	
	//getInsertedID
	$vi['TRDATE']=$v['TRDATE'];
	$list=getRecord('tbl_transaction',$vi);
	$id=$list['RESULT'][0]['ID'];
	
	
		//save detail
		foreach ($_SESSION["cart_item"] as $item){ 
			$vitem['ACT']='ADD';
			$vitem['TRID']=$id;
			$vitem['CODE']=$item['CODE'];
			$vitem['QTY']=$item['QTY'];
			$vitem['SIZE']=$item['SIZE'];
			$vitem['PRICE']=$item['PRICE'];
			$vitem['TOTAL']=$item['PRICE']*$item['QTY'];
			$rs2=saveRecord('tbl_transaction_dtl',$vitem);
			//echo $rs2['SQL'].'<br>';		
		}
		
		
	//SEND NOTIFICATION

	
	$msc['NAME']=$_REQUEST['FULLNAME'];
	$msc['MAILTO']=$_REQUEST['EMAIL'];
	$msc['SUBJECT']='Studio Pop Notificaton';
	$msc['BODY']=$text;
	
	
	$status=sendmail($msc);

	//clear session
	unset($_SESSION["cart_item"]);
	}
	
	
}
	?>


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