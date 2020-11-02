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
<div class="rightpanel">
    <div class="pageheader">
        <div class="pageicon"><span class="iconfa-laptop"></span></div>
        <div class="pagetitle">
            <h1>Additional Image</h1>
        </div>
    </div>
    <!--pageheader-->

    <div class="maincontent">
        <div class="maincontentinner">



            <div class="mediamgr">
                <div class="mediamgr_left">
                    <div class="mediamgr_head">
                        <ul class="mediamgr_menu">
                            <form method='post' enctype="multipart/form-data">
                                <input type='hidden' name='ACT' value='ADD'>
                                <input type='hidden' name='PRODUCT_ID' value='<?php echo $params['PRODUCT_ID']?>'>
                                <input type='hidden' name='STATUS' value='1'>
                                <li class="filesearch">
                                    <input type="file" name='IMAGE' id="filekeyword" class="filekeyword">
                                </li>
                                <li>
                                    <select name='TIPE'>
                                        <option value='color'>Color</option>
                                    </select>
                                </li>
                                <li class="right newfilebtn">
                                    <button class="btn btn-primary" name='submitcontent' value='1'>Upload</button>
                                </li>
                            </form>
                        </ul>
                        <span class="clearall"></span>
                    </div>
                    <!--mediamgr_head-->


                    <div class="mediamgr_content">
                        <?php
					
					if(($act=='edit')&&($submited<1)){
					$vd['ACT']='EDIT';
					$vd['ID']=$params['ID']	;
					$res=getRecord('tbl_addimage',$vd);
					//echo $res['SQL'];
					$res=$res['RESULT'][0];
					
					?>
                        <form method='post'>
                            <input type='hidden' name='PK-ID' value='<?php echo $res['ID'] ?>'>
                            <input type='hidden' name='ACT' value='EDIT'>
                            <input type='hidden' name='pid' value='<?php echo $res['PRODUCT_ID'] ?>'>
                            <div style='float:left'>
                                <img src="<?php echo ROOT_URL.'/images/product/'.$res['IMAGE']?>"
                                    style='width:400px;padding-right:20px'>
                            </div>
                            <div>
                                <textarea name='CAPTION' cols="8" rows='5'><?php echo $res['CAPTION']?></textarea><br>
                                <select name='TIPE'>
                                    <option value='color' <?php if($res['TIPE']=='color') echo 'selected'; ?>>Color
                                    </option>
                                    <option value='interior' <?php if($res['TIPE']=='interior') echo 'selected'; ?>>
                                        Interior</option>
                                    <option value='exterior' <?php if($res['TIPE']=='exterior') echo 'selected'; ?>>
                                        Exterior</option>
                                    <option value='varian' <?php if($res['TIPE']=='varian') echo 'selected'; ?>>Varian
                                    </option>
                                </select><br>
                                <input type='text' name='ORDNUM' placeholder='order'
                                    value='<?php echo $res['ORDNUM']?>'><br>
                                <button class="btn btn-primary" name='submitcontent' value='1'>Update</button>

                            </div>
                        </form>
                        <div style='clear:both'></div>
                        <?php } ?>

                        <ul id="medialist" class="listfile isotope"
                            style="position: relative; overflow: hidden; height: 5250px;">
                            <?php 
						$var['STATUS']='1';
						$var['LIMIT']=100;
						$var['PRODUCT_ID']=$params['PRODUCT_ID'];
						$list=getRecord('tbl_addimage',$var);
						//echo $list['SQL'].'<br>';
						foreach($list['RESULT'] as $list){
						?>
                            <li class="image isotope-item">
                                <a href="#" class="cboxElement">
                                    <img src="<?php echo ROOT_URL.'/images/product/'.$list['IMAGE']?>"
                                        style='width:200px'>
                                </a>
                                <div><?php echo $list['CAPTION'] ?></div>
                                <span
                                    style='color:#fff;padding:5px;border:1px solid #ccc;border-radius:10px;background:blue'><?php echo $list['TIPE']?>
                                </span><br><br>
                                <a href='<?php echo CMS_URL.'/index.php?page=form-product-image&act=delete&pid='.$list['PRODUCT_ID'].'&id='.$list['ID']?>'
                                    class="btn trash" title="Trash"><span class="icon-trash"></span></a>
                                <a href='<?php echo CMS_URL.'/index.php?page=form-product-image&act=edit&pid='.$list['PRODUCT_ID'].'&id='.$list['ID']?>'
                                    class="btn edit" title="Edit"><span class="icon-pencil"></span></a>
                            </li>
                            <?php } ?>
                        </ul>

                        <br class="clearall">

                    </div>
                    <!--mediamgr_content-->

                </div>
                <!--mediamgr_left -->


            </div>


            <?php require_once CMS_PATH."/include/footer.php"?>

        </div>
    </div>
    <!--maincontent-->

</div>
<!--rightpanel-->