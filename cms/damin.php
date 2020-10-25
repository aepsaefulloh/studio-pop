<?php

require_once '../config.php';
require_once CMS_PATH.'/lib/dao_utility.php';
require_once CMS_PATH.'/lib/mysqlDao.php';
require_once CMS_PATH.'/lib/navutil.php';
require_once CMS_PATH.'/lib/table.php';
require_once CMS_PATH.'/lib/utils.php';
require_once CMS_PATH.'/lib/auth.php';

if($_SESSION['ISLOGIN']){
	header('Location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="description" content="Singin page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="<?php echo CMS_URL?>/assets/css/pages/login/login-3.css" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="<?php echo CMS_URL?>/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CMS_URL?>/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo CMS_URL?>/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="<?php echo CMS_URL?>/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CMS_URL?>/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CMS_URL?>/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CMS_URL?>/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="<?php echo ROOT_URL?>/assets/img/icon/favicon/favicon.ico?<?php echo rand()?>" />
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-3 wizard d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="login-aside d-flex flex-column flex-row-auto">
                <!--begin::Aside Top-->
                <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                    <!--begin::Aside header-->
                    <a href="#" class="login-logo text-center pt-lg-25 pb-10">
                        <img src="<?php echo CMS_URL?>/assets/img/logo.png?<?php echo rand()?>" class="" alt="" />
                    </a>
                    <!--end::Aside header-->
                    <!--begin::Aside Title-->
                    <h3 class="font-weight-bolder text-center font-size-h4 text-dark-50 line-height-xl">User Experience
                        &amp; Interface Design
                        <br />Strategy Solutions
                    </h3>
                    <!--end::Aside Title-->
                </div>
                <!--end::Aside Top-->
                <!--begin::Aside Bottom-->
                <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center"
                    style="background-position-y: calc(100% + 5rem); background-image: url(<?php echo CMS_URL?>/assets/media/svg/illustrations/login-visual-5.svg)">
                </div>
                <!--end::Aside Bottom-->
            </div>
            <!--begin::Aside-->
            <!--begin::Content-->
            <div class="login-content flex-row-fluid d-flex flex-column p-10">
                <!--begin::Wrapper-->
                <div class="d-flex flex-row-fluid flex-center">
                    <!--begin::Signin-->
                    <div class="login-form">
                        <!--begin::Form-->
                        <form class="form" action="damin.php" method="post">
                            <input type='hidden' name='act' value='login'>
                            <div class="pb-5">
                                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Sign In</h3>
                            </div>
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Username</label>
                                <input class="form-control h-auto py-7 px-6 rounded-lg border-0" type="text"
                                    name="username" autocomplete="off" />
                            </div>
                            <!--end::Form group-->
                            <!--begin::Form group-->
                            <div class="form-group">
                                <div class="d-flex justify-content-between mt-n5">
                                    <label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
                                </div>
                                <input class="form-control h-auto py-7 px-6 rounded-lg border-0" type="password"
                                    name="password" autocomplete="off" />
                            </div>
                            <!--end::Form group-->
                            <!--begin::Action-->
                            <div class="pb-lg-0 pb-5">
                                <button type="submit" id="kt_login_singin_form_submit_button"
                                    class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign
                                    In</button>
                            </div>
                            <!--end::Action-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Signin-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Login-->
    </div>

    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="<?php echo CMS_URL?>/assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?php echo CMS_URL?>/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="<?php echo CMS_URL?>/assets/js/scripts.bundle.js"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="<?php echo CMS_URL?>/assets/js/pages/custom/login/login-3.js"></script>
    <!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>