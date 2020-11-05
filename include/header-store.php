<?php
require_once ROOT_PATH.'/include/gtag.php';
$param['act']=isset($_REQUEST['act'])?$_REQUEST['act']:'';
$param['code']=isset($_REQUEST['code'])?$_REQUEST['code']:'';
$param['size']=isset($_REQUEST['size'])?$_REQUEST['size']:'';
$param['qty']=isset($_REQUEST['qty'])?$_REQUEST['qty']:'';


if($param['act']!=''){
	cartProcess($param);
}



function cartProcess($objItem){

switch($objItem['act']) {
	case "add":
		if(!empty($objItem["qty"])) {
			$vp['CODE']=$objItem['code'];
			$productByCode = getRecord('tbl_product',$vp);
			$productByCode=$productByCode['RESULT'];
			$itemArray = array($productByCode[0]["CODE"]=>array('PRODUCT'=>$productByCode[0]["PRODUCT"], 'CODE'=>$productByCode[0]["CODE"], 'QTY'=>$objItem["qty"], 'SIZE'=>$objItem["size"], 'PRICE'=>$productByCode[0]["PRICE"], 'IMAGE'=>$productByCode[0]["IMAGE"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["CODE"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["CODE"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["qty"])) {
									$_SESSION["cart_item"][$k]["qty"] = 0;
								}
								$_SESSION["cart_item"][$k]["qty"] += $objItem["qty"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($objItem["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}

}

?>
<header class="header-area">
    <div class="main-header d-none d-lg-block">
        <!-- main menu start -->
        <div class="main-menu-wrapper sticky header-transparent">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <!-- logo area start -->
                        <div class="brand-logo">
                            <a href="<?php echo ROOT_URL?>">
                                <img src="<?php echo ROOT_URL.'/images/conf/'.$objConf['DD_LOGO']?>" class="img-fluid"
                                    width="100" alt="brand logo">
                            </a>
                        </div>
                        <!-- logo area end -->
                    </div>
                    <div class="col-lg-9">
                        <div class="main-menu-inner">
                            <!-- main menu navbar start -->
                            <nav class="main-menu">
                                <ul>
                                    <li><a href="<?php echo ROOT_URL?>/about">About</a></li>
                                    <li><a href="<?php echo ROOT_URL?>/project">Project</a></li>
                                    <li><a href="<?php echo ROOT_URL?>/journal">Journal</a></li>
                                    <li><a href="<?php echo ROOT_URL?>/pop-n-roll">Pop 'n Roll</a></li>
                                    <li><a href="<?php echo ROOT_URL?>/store"> Store </a></li>
                                    <li><a href="#" class="cart-button"><img
                                                src="<?php echo ROOT_URL?>/assets/img/icon/cart.png?<?php echo rand()?>"
                                                alt=""><span><?php echo count($_SESSION["cart_item"])?></span>
                                        </a>

                                    </li>
                                </ul>

                            </nav>
                            <!-- main menu navbar end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main menu end -->
    </div>

    <!-- mobile header start -->
    <!-- mobile header start -->
    <div class="mobile-header d-lg-none d-md-block sticky">
        <!--mobile header top start -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="mobile-main-header">
                        <div class="mobile-logo">
                            <a href="<?php echo ROOT_URL?>">
                                <img src="<?php echo ROOT_URL.'/images/conf/'.$objConf['DD_LOGO']?>" class="img-fluid"
                                    alt="Brand Logo">
                            </a>
                        </div>
                        <div class="mobile-menu-toggler">
                            <button class="mobile-menu-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile header top start -->
    </div>
    <!-- mobile header end -->
    <!-- mobile header end -->

    <!-- offcanvas mobile menu start -->
    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="ion-android-close"></i>
            </div>
            <div class="off-canvas-inner">
                <div class="mobile-logo p-3">
                    <a href="<?php echo ROOT_URL?>">
                        <img src="<?php echo ROOT_URL?>/assets/img/logo/logo_100.png?<?php echo rand()?>" width="50"
                            alt="Brand Logo">
                    </a>
                </div>

                <!-- mobile menu start -->
                <div class="mobile-navigation">
                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li><a href="<?php echo ROOT_URL?>/about">About</a></li>
                            <li><a href="<?php echo ROOT_URL?>/project">Project</a></li>
                            <li><a href="<?php echo ROOT_URL?>/journal">Journal</a></li>
                            <li><a href="<?php echo ROOT_URL?>/pop-n-roll">Pop 'n Roll</a></li>
                            <li><a href="<?php echo ROOT_URL?>/store"> Store </a></li>
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->

                <!-- offcanvas widget area start -->
                <div class="offcanvas-widget-area">
                    <div class="off-canvas-contact-widget">
                        <ul>
                            <li><i class="fa fa-mobile"></i>
                                <a href="tel:<?php echo $objConf['DD_PHONE']?>">0123456789</a>
                            </li>
                            <li><i class="fa fa-envelope-o"></i>
                                <a href="mailto:<?php echo $objConf['DD_EMAIL']?>">info@studiopop.id</a>
                            </li>
                        </ul>
                    </div>
                    <div class="off-canvas-social-widget">
                        <a href="<?php echo $objConf['DD_FB']?>"><i class="ion-social-facebook"></i></a>
                        <a href="<?php echo $objConf['DD_IG']?>"><i class="ion-social-instagram"></i></a>
                        <a href="<?php echo $objConf['DD_TW']?>"><i class="ion-social-twitter"></i></a>
                        <a href="<?php echo $objConf['DD_YT']?>"><i class="ion-social-youtube"></i></a>
                    </div>
                </div>
                <!-- offcanvas widget area end -->
            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->
    <!-- offcanvas mobile menu end -->
</header>

<div class="floating-icon">
    <ul>
        <li>
            <a href="#" class="cart-button">
                <img src="<?php echo ROOT_URL?>/assets/img/icon/cart.png?<?php echo rand()?>"
                    alt=""><span><?php echo count($_SESSION["cart_item"])?></span>
            </a>
        </li>
    </ul>
</div>

<?php
        require_once 'include/bag.php';
    ?>