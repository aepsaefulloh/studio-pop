<?php require_once ROOT_PATH.'/include/gtag.php'?>
<header class="header-area">
    <div class="main-header d-none d-lg-block">
        <div class="main-menu-wrapper sticky header-transparent">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="brand-logo">
                            <a href="<?php echo ROOT_URL?>">
                                <img src="<?php echo ROOT_URL.'/images/conf/'.$objConf['DD_LOGO']?>" class="img-fluid"
                                    width="100" alt="brand logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="main-menu-inner">
                            <nav class="main-menu">
                                <ul>
                                    <li><a href="<?php echo ROOT_URL?>/about">About</a></li>
                                    <li><a href="<?php echo ROOT_URL?>/project">Project</a></li>
                                    <li><a href="<?php echo ROOT_URL?>/journal">Journal</a></li>
                                    <li><a href="<?php echo ROOT_URL?>/pop-n-roll">Pop 'n Roll</a></li>
                                    <li><a href="<?php echo ROOT_URL?>/store"> Store </a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-header d-lg-none d-md-block sticky">
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
    </div>

    <aside class="off-canvas-wrapper">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="ion-android-close"></i>
            </div>
            <div class="off-canvas-inner">
                <div class="mobile-logo pt-3 pb-3 pr-3 pl-1">
                    <a href="<?php echo ROOT_URL?>">
                        <img src="<?php echo ROOT_URL.'/images/conf/'.$objConf['DD_LOGO']?>" width="80"
                            alt="Brand Logo">
                    </a>
                </div>
                <div class="mobile-navigation">
                    <nav>
                        <ul class="mobile-menu">
                            <li><a href="<?php echo ROOT_URL?>/about">About</a></li>
                            <li><a href="<?php echo ROOT_URL?>/project">Project</a></li>
                            <li><a href="<?php echo ROOT_URL?>/journal">Journal</a></li>
                            <li><a href="<?php echo ROOT_URL?>/pop-n-roll">Pop 'n Roll</a></li>
                            <li><a href="<?php echo ROOT_URL?>/store"> Store </a></li>
                        </ul>
                    </nav>
                </div>
                <!-- <div class="offcanvas-widget-area">
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
                </div> -->
            </div>
        </div>
    </aside>
</header>