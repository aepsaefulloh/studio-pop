<?php
$pageseo='addimage';

$params['PRODUCT_ID']=isset($_REQUEST['pid'])?$_REQUEST['pid']:'';
$params['ID']=isset($_REQUEST['id'])?$_REQUEST['id']:'';
$act=isset($_REQUEST['act'])?$_REQUEST['act']:'';

$submitcontent=isset($_REQUEST['submitcontent'])?$_REQUEST['submitcontent']:'';

$submited=0;
//IF DELETE
if($act=='delete'){
	$vd['ACT']='EDIT';
	$vd['STATUS']='99';
	$vd['PK-ID']=$params['ID']	;
	$res=saveRecord('tbl_addimage',$vd);
	//echo $res['SQL'];
}


//=============IF SUBMIT CONTENT=====================
if($submitcontent=='1'){
	
	$objVar=array();
	foreach($_REQUEST as $k=>$v){
		//GET COL VAR
		//echo "raw <i>".strtoupper($k)."=".$v."</i><br>";
		if (in_array(strtoupper($k), $entity['addimage'])){
			$v=str_replace("'","`",$v);
			$objVar[strtoupper($k)]=$v;
			//echo "<i>".strtoupper($k)."=".$v."</i><br>";
		}
	}

	
	//FILES
	foreach($_FILES as $k=>$v){
		//echo $k.'<br>';
		if (in_array(strtoupper($k), $entity['addimage'])){
			$dir=ROOT_PATH.'/images/product/';
			$allowExt=array('jpg','png','jpeg','pdf','xls','xlsx','doc','docx');
			$ext = pathinfo($v['name'], PATHINFO_EXTENSION);
			if (in_array($ext, $allowExt)){
				$nfname=md5($v['name']).'.'.strtolower($ext);
				$target=$dir.'/'.$nfname;
				move_uploaded_file($v['tmp_name'],$target);			
				$objVar[$k]=$nfname;
			}
		}
	}
	
	$result=saveRecord('tbl_'.$pageseo,$objVar);
	echo $result['SQL'];
	
	//----cached-------
	//$res=writeCache('tbl_'.$pageseo,$pageseo);
	//echo 'SQL :'.$res['SQL'].'<hr>';
	//----------end cached-------	
	$submited=1;
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-custom gutter-b">
            <div class="card-header border-0 py-5">
                <form method='post' enctype="multipart/form-data">
                    <input type='hidden' name='ACT' value='ADD'>
                    <input type='hidden' name='PRODUCT_ID' value='<?php echo $params['PRODUCT_ID']?>'>
                    <input type='hidden' name='STATUS' value='1'>
                    <div class="form-group">
                        <label>File Browser</label>
                        <div></div>
                        <div class="custom-file">
                            <input type="file" name="IMAGE" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose
                                file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Select</label>
                        <div></div>
                        <select class="custom-select form-control" name='TIPE'>
                            <option value='color'>Color</option>
                        </select>
                    </div>
                    <button class="btn btn-primary mr-2" name='submitcontent' value='1'>Upload</button>
                </form>
            </div>


            <div class="card-body">
                <div class="row">
                    <?php 
                            $var['STATUS']='1';
                            $var['LIMIT']=100;
                            $var['PRODUCT_ID']=$params['PRODUCT_ID'];
                            $list=getRecord('tbl_addimage',$var);
                            foreach($list['RESULT'] as $list){
                            ?>
                    <div class="col-6 col-sm-3">
                        <span class="label label-dark label-inline mr-2 mb-3"><?php echo $list['TIPE']?></span>
                        <img src="<?php echo ROOT_URL.'/images/product/'.$list['IMAGE']?>" class="img-fluid">
                        <div><?php echo $list['CAPTION'] ?></div>
                        <br>
                        <a href="<?php echo CMS_URL.'/index.php?page=form-product-image&act=delete&pid='.$list['PRODUCT_ID'].'&id='.$list['ID']?>"
                            class="btn btn-icon btn-light btn-hover-primary btn-sm">
                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path
                                            d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                            fill="#000000" fill-rule="nonzero"></path>
                                        <path
                                            d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                            fill="#000000" opacity="0.3"></path>
                                    </g>
                                </svg>
                            </span>
                        </a>
                        <!-- <a href="<?php echo CMS_URL.'/index.php?page=form-product-image&act=edit&pid='.$list['PRODUCT_ID'].'&id='.$list['ID']?>"
                            class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path
                                            d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)">
                                        </path>
                                        <path
                                            d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                    </g>
                                </svg>
                            </span>
                        </a> -->
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>