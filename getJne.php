<?php
require_once 'config.php';
require_once ROOT_PATH.'/lib/dao_utility.php';
require_once ROOT_PATH.'/lib/mysqlDao.php';
require_once ROOT_PATH.'/lib/util.php';

$id_kab = isset($_REQUEST['id_kab'])?$_REQUEST['id_kab']:'';



if($id_kab>0)
{	
$var['origin']='151';
$var['destination']=$id_kab;
$data=getCost($var);
$ao=$data['rajaongkir']['results'][0]['costs'];

$options = "<option value='0'>-shipping-</option>";
foreach ($ao as $list) { 

$options .= "<option value='JNE ".$list['service'].'-'.$list['cost'][0]['value']."'>JNE ".$list['service'].' ('.$list['cost'][0]['etd']." Days) Rp. ".number_format($list['cost'][0]['value'])."</option>";
}
echo $options;
}
?>