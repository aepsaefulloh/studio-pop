<?php
$pageseo='banner';

$submitcontent=isset($_REQUEST['submitcontent'])?$_REQUEST['submitcontent']:'0';
$sSearchBanner=isset($_REQUEST['sSearchContent'])?$_REQUEST['sSearchContent']:'';
$hal=isset($_REQUEST['hal'])?$_REQUEST['hal']:'1';


//=============IF SUBMIT CONTENT=====================
if($submitcontent=='1'){	
	$objVar=array();
	foreach($_REQUEST as $k=>$v){
		//GET COL VAR
		//echo "raw <i>".strtoupper($k)."=".$v."</i><br>";
		if (in_array(strtoupper($k), $entity['banner'])){
			$v=str_replace("'","`",$v);
			$objVar[strtoupper($k)]=$v;
			//echo "<i>".strtoupper($k)."=".$v."</i><br>";
		}
	}

	//IF IMAGE EXIST
	if($_FILES['IMAGE']['name'] != "") {		
		$allowExt=array('jpg','png','jpeg');
		$ext = pathinfo($_FILES['IMAGE']['name'], PATHINFO_EXTENSION);
		if (in_array($ext, $allowExt)){
			$nfname=md5($_FILES['IMAGE']['name']).'.'.strtolower($ext);			
			$nfname_thumb=md5($_FILES['IMAGE']['name']).'_thumb.'.strtolower($ext);
			$target=ROOT_PATH.'/images/banner/'.$nfname;			
			
			move_uploaded_file($_FILES['IMAGE']['tmp_name'],$target);
			
			//BUAT thumbnail
			if(!create_thumbnail_preserve_ratio($target, ROOT_PATH.'/images/banner/'.$nfname_thumb, '300')){
				copy($target,ROOT_PATH.'/images/banner/'.$nfname_thumb);
			}
			
			
			$objVar['FILENAME']=$nfname;
		}
	}

	if($objVar['POS']==''){
		// $objVar['POS']='SLIDER-MOBILE';
	}


	// $objVar['ORDERNUM']='';
	$result=saveRecord('tbl_banners',$objVar);
	// echo $result['SQL'];
	
	
	//----cached-------
	$res=writeCache('tbl_banners',$pageseo);
	//echo 'SQL :'.$res['SQL'].'<hr>';
	//----------end cached-------	
}


$REC_PERPAGE=15;
$params['LIMIT']=($hal-1)*$REC_PERPAGE.','.$REC_PERPAGE;
$params['sSearchBanner']=$sSearchBanner;
// $params['STATUS']='1';
$params['ORDER']='POS,ORDERNUM ASC';
$list=getRecord('tbl_banners',$params);

?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=add'?>" type="button"
                    class="btn bg-gradient-primary">Tambah
                    Banner</a>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search"
                            id="search_field">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="myTable">
                    <thead class=".t_head">
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Position</th>
                        <th>Urutan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						foreach($list['RESULT'] as $list){
							$url=getNewsUrl($list);							
						?>
                        <tr>

                            <td><?php echo $list['ID']?></td>
                            <td><?php echo $list['TITLE']?></td>
                            <td>
                                <img src='<?php echo ROOT_URL.'/images/banner/'.$list['FILENAME']?>'
                                    style='max-width:300px'>
                            </td>
                            <td>
                                <?php echo $list['POS']?>
                            </td>
                            <td><?php echo $list['ORDERNUM']?></td>
                            <td>
                                <?php if($list['STATUS']>0){ ?>
                                <a href="" class="badge badge-success">Publish</a>
                                <?php }else{ ?>
                                <a href="" class="badge badge-danger">Unpublish</a>
                                <?php } ?>
                            </td>

                            <td>
                                <a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=edit&id='.$list['ID']?>"
                                    style="color: black;">
                                    <button type="button" class="btn bg-gradient-info">Edit</button>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
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