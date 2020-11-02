<?php

$objConf=array();
$siteconf=getCache('config');
//$vsos['LIMIT']=50;
//$siteconf=getRecord('tbl_config',$vsos);
foreach($siteconf as $list){
	if ($list['CATEGORY']=='conf'){
	$objConf[$list['CKEY']]=$list['CVALUE'];	
	}
}



?>
