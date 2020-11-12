<?php
$pageseo='product';

$submitcontent=isset($_REQUEST['submitcontent'])?$_REQUEST['submitcontent']:'0';
$sSearchContent=isset($_REQUEST['sSearchContent'])?$_REQUEST['sSearchContent']:'';
$hal=isset($_REQUEST['hal'])?$_REQUEST['hal']:'1';


//=============IF SUBMIT CONTENT=====================
if($submitcontent=='1'){	
	$objVar=array();
	foreach($_REQUEST as $k=>$v){
		//GET COL VAR
		//echo "raw <i>".strtoupper($k)."=".$v."</i><br>";
		if (in_array(strtoupper($k), $entity['product'])){
			$v=str_replace("'","`",$v);
			$objVar[strtoupper($k)]=$v;
			//echo "<i>".strtoupper($k)."=".$v."</i><br>";
		}
	}

	
	//FILES
	foreach($_FILES as $k=>$v){
		//echo $k.'<br>';
		if (in_array(strtoupper($k), $entity['product'])){
			$dir=ROOT_PATH.'/images/product/';
			$allowExt=array('jpg','png','jpeg','pdf','xls','xlsx','doc','docx');
			$ext = pathinfo($v['name'], PATHINFO_EXTENSION);
			if (in_array($ext, $allowExt)){
				$nfname=md5($v['name']).'.'.strtolower($ext);
				$nfname_thumb=md5($v['name']).'_thumb.'.strtolower($ext);
				$target=$dir.'/'.$nfname;
				move_uploaded_file($v['tmp_name'],$target);							
				
				//BUAT thumbnail
				if(!create_thumbnail_preserve_ratio($target, ROOT_PATH.'/images/product/'.$nfname_thumb, '300')){
					copy($target,ROOT_PATH.'/images/product/'.$nfname_thumb);
				}
				
				$objVar[$k]=$nfname;
			}
		}
	}
	
	$result=saveRecord('tbl_'.$pageseo,$objVar);
	// echo $result['SQL'];
	
	//----cached-------
	$res=writeCache('tbl_'.$pageseo,$pageseo);
	//echo 'SQL :'.$res['SQL'].'<hr>';
	//----------end cached-------	
	
}


$REC_PERPAGE=20;
$params['LIMIT']=($hal-1)*$REC_PERPAGE.','.$REC_PERPAGE;
$params['sSearchContent']=$sSearchContent;
$list=getRecord('tbl_product',$params);

?>



<div class="row">
    <div class="col-md-12">
        <div class="card card-custom gutter-b">
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">Product</span>
                </h3>
                <div class="card-toolbar">
                    <a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=add'?>" type="button"
                        class="btn btn-success font-weight-bolder font-size-sm">
                        <span class="svg-icon svg-icon-md svg-icon-white">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <path
                                        d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                    <path
                                        d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                        fill="#000000" fill-rule="nonzero"></path>
                                </g>
                            </svg>
                        </span>Add New Product</a>
                    </a>
                </div>
            </div>

            <div class="card-body py-0">
                <div class="table-responsive">
                    <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Code</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Varian</th>
                                <th>Status</th>
                                <th>...</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
						foreach($list['RESULT'] as $list){
							$url=getNewsUrl($list);							
						?>
                            <tr>
                                <td>
                                    <span
                                        class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo $list['ID']?></span>
                                </td>
                                <td>
                                    <span
                                        class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo $list['PRODUCT']?></span>
                                </td>
                                <td>
                                    <span
                                        class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo $list['CODE']?></span>
                                </td>
                                <td>
                                    <span
                                        class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo $arrCategory[$list['CATEGORY']]?></span>
                                </td>
                                <td>
                                    <img src="<?php echo ROOT_URL.'/images/'.$pageseo.'/'.$list['IMAGE']?>"
                                        style="max-width:70px">
                                </td>
                                <td>

                                    <a href='<?php echo CMS_URL.'/index.php?page=form-product-image&pid='.$list['ID'];?>'
                                        class="label label-dark label-inline mr-2">Add Image</a><br>
                                    <?php 
                                        $vi['PRODUCT_ID']=$list['ID'];
                                        $vi['STATUS']=1;
                                        $vi['LIMIT']=20;
                                        $listAi=getRecord('tbl_addimage',$vi);
                                        foreach($listAi['RESULT'] as $listAi){
							        ?>
                                    <div style='float:left;padding:10px'><img
                                            src="<?php echo ROOT_URL.'/images/'.$pageseo.'/'.$listAi['IMAGE']?>"
                                            style="max-width:70px"></div>
                                    <?php } ?>

                                </td>

                                <td>
                                    <?php if($list['STATUS']>0){ ?>
                                    <a href="" class="label label-lg label-light-success label-inline">Publish</a>
                                    <?php }else{ ?>
                                    <a href="" class="label label-lg label-light-danger label-inline">Unpublish</a>
                                    <?php } ?>
                                </td>
                                <td class="pr-0">
                                    <a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=edit&id='.$list['ID']?>"
                                        class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                        <span class="svg-icon svg-icon-md svg-icon-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
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
                                    </a>

                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <ul class="pagination pagination-sm m-0">
                        <a href='<?php echo CMS_URL.'/index.php?page=data-'.$pageseo.'&hal='.($hal-1)?>'>
                            <button class="btn btn-outline-primary"><i class="iconfa-backward"></i> prev</button></a>
                        <button class="btn btn-default ml-2 mr-2"><?php echo $hal?></button>
                        <a href='<?php echo CMS_URL.'/index.php?page=data-'.$pageseo.'&hal='.($hal+1)?>'>
                            <button class="btn btn-outline-primary">next <i class="iconfa-forward"></i></button></a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>