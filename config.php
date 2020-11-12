<?php
date_default_timezone_set("Asia/Bangkok");
define('DB_HOST', 'localhost');
define('DB_UID', 'studio_user');
define('DB_PWD', 'p4ssword');
define('DB_DATABASE', 'studiopop_db');
define('ROOT_PATH', '/home/nginx/domains/studiopop.id/public');
define('ROOT_URL', 'https://studiopop.id');

define( "CACHE_URL", ROOT_URL."/cache" );
define( "CACHE_PATH", ROOT_PATH."/cache" );

define( "CMS_PATH", ROOT_PATH."/cms" );
define( "CMS_URL", ROOT_URL."/cms" );



$trStatus = array('0'=>'Waiting Payment', '1'=>'Payment Complete', '2'=>'Process', '3'=>'Shipping', '4'=>'Complete');
$confSize = array('1'=>'S', '2'=>'M', '3'=>'L', '4'=>'XL');

//=====SMTP CONFIG=====
 define("SMTP_HOST",'friday.mxlogin.com');
 define("SMTP_USER",'shopping@studiopop.id');
 define("SENDER_NAME",'shopping');
 define("SMTP_PASS",'P+N6XLX[9BnE');
 define("SMTP_PORT", 587);

?>