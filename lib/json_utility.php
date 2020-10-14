<?php
function getCache($objItem){
	$results=null;
	$json = file_get_contents(CACHE_URL.'/'.$objItem.'.json');
	$results = json_decode($json,true);
	
	return $results['RESULT'];
}
?>