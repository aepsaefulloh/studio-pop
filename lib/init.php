<?php
$objConf=array();
$varConf['CATEGORY']='conf';
$siteconf=getConfig($varConf);
foreach($siteconf['RESULT'] as $list){
	$objConf[$list['CKEY']]=$list['CVALUE'];	
}
?>