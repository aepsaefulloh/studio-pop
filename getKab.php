<?php
require_once 'config.php';
require_once ROOT_PATH.'/lib/dao_utility.php';
require_once ROOT_PATH.'/lib/mysqlDao.php';
require_once ROOT_PATH.'/lib/util.php';

$id_propinsi = isset($_REQUEST['id_propinsi'])?$_REQUEST['id_propinsi']:'';



if($id_propinsi>0)
{
$data=getCity($id_propinsi);

$options = "<option value='0'>-kabupaten-</option>";
foreach ($data['rajaongkir']['results'] as $list) { 
$vKab['ACT']='ADD';
$vKab['ID']=$list['city_id'];
$vKab['PROV_ID']=$id_propinsi;
$vKab['KAB']=$list['city_name'];
$vKab['STATUS']=1;
$rpro=saveRecord('tbl_kab',$vKab);


$options .= "<option value='".$list['city_id']."'>".$list['city_name']."</option>";
}
echo $options;
}
?>