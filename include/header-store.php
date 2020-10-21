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
                                <img src="<?php echo ROOT_URL?>/assets/img/logo/main-logo.png?<?php echo rand()?>"
                                    class="img-fluid" width="100" alt="brand logo">
                            </a>
                        </div>
                        <!-- logo area end -->
                    </div>
                    <div class="col-lg-9">
                        <div class="main-menu-inner">
                            <!-- main menu navbar start -->
                            <nav class="main-menu">
                                <ul>
                                    <li><a href="<?php echo ROOT_URL?>/about.php">About</a></li>
                                    <li><a href="<?php echo ROOT_URL?>/release.php">Release</a></li>
                                    <li><a href="<?php echo ROOT_URL?>/article.php">Article & Journal</a></li>
                                    <li><a href="<?php echo ROOT_URL?>/playlist.php">Playlist</a></li>
                                    <li><a href="<?php echo ROOT_URL?>/store.php"> Store </a></li>
                                    <li><a href="javascript:void(0)"><img src="<?php echo ROOT_URL?>/assets/img/icon/cart.png?<?php echo rand()?>" alt=""></a></li>
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
                                <img src="<?php echo ROOT_URL?>/assets/img/logo/main-logo.png?<?php echo rand()?>"
                                    class="img-fluid" alt="Brand Logo">
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
                        <img src="<?php echo ROOT_URL?>/assets/img/logo/main-logo.png?<?php echo rand()?>" width="50"
                            alt="Brand Logo">
                    </a>
                </div>

                <!-- mobile menu start -->
                <div class="mobile-navigation">
                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li><a href="<?php echo ROOT_URL?>/about.php">About</a></li>
                            <li><a href="<?php echo ROOT_URL?>/release.php">Release</a></li>
                            <li><a href="<?php echo ROOT_URL?>/article.php">Article & Journal</a></li>
                            <li><a href="<?php echo ROOT_URL?>/playlist.php">Playlist</a></li>
                            <li><a href="<?php echo ROOT_URL?>/store.php"> Store </a></li>
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
                                <a href="#">0123456789</a>
                            </li>
                            <li><i class="fa fa-envelope-o"></i>
                                <a href="#">info@yourdomain.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="off-canvas-social-widget">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                    </div>
                </div>
                <!-- offcanvas widget area end -->
            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->
    <!-- offcanvas mobile menu end -->
</header>