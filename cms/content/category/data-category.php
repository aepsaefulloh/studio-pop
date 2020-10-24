<?php
$pageseo='category';

$submitcontent=isset($_REQUEST['submitcontent'])?$_REQUEST['submitcontent']:'0';
$sSearchContent=isset($_REQUEST['sSearchContent'])?$_REQUEST['sSearchContent']:'';
$hal=isset($_REQUEST['hal'])?$_REQUEST['hal']:'1';


//=============IF SUBMIT CONTENT=====================
if($submitcontent=='1'){	
	$objVar=array();
	foreach($_REQUEST as $k=>$v){
		//GET COL VAR
		//echo "raw <i>".strtoupper($k)."=".$v."</i><br>";
		if (in_array(strtoupper($k), $entity['category'])){
			$v=str_replace("'","`",$v);
			$objVar[strtoupper($k)]=$v;
			//echo "<i>".strtoupper($k)."=".$v."</i><br>";
		}
	}
	
	$result=saveRecord('tbl_'.$pageseo,$objVar);
	//echo $result['SQL'];
	
	//----cached-------
	$res=writeCache('tbl_'.$pageseo,$pageseo);
	//echo 'SQL :'.$res['SQL'].'<hr>';
	//----------end cached-------	
	
}


$REC_PERPAGE=20;
$params['LIMIT']=($hal-1)*$REC_PERPAGE.','.$REC_PERPAGE;
$params['sSearchContent']=$sSearchContent;
$list=getRecord('tbl_'.$pageseo,$params);
//echo $list['SQL'];

?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=add'?>" type="button"
                    class="btn bg-gradient-primary">Tambah
                    Kategori</a>
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
                        <tr>
                            <th title="category">Category</th>
                            <th>SEO</th>
                            <th>Tipe</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						foreach($list['RESULT'] as $list){
						?>
                        <tr>
                            <td><?php echo $list['CATEGORY']?></td>
                            <td><?php echo $list['SEO']?></td>
                            <td><?php echo $list['TIPE']?></td>
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
                        <?php 
						}
						?>
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