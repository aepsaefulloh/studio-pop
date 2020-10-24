<?php
$pageseo='menu';

$submitcontent=isset($_REQUEST['submitcontent'])?$_REQUEST['submitcontent']:'0';
$sSearchContent=isset($_REQUEST['sSearchContent'])?$_REQUEST['sSearchContent']:'';
$hal=isset($_REQUEST['hal'])?$_REQUEST['hal']:'1';


//=============IF SUBMIT CONTENT=====================
if($submitcontent=='1'){	
	$objVar=array();
	foreach($_REQUEST as $k=>$v){
		//GET COL VAR
		//echo "raw <i>".strtoupper($k)."=".$v."</i><br>";
		if (in_array(strtoupper($k), $entity['menu'])){
			$v=str_replace("'","`",$v);
			$objVar[strtoupper($k)]=$v;
			//echo "<i>".strtoupper($k)."=".$v."</i><br>";
		}
	}
	
	$objVar['LEVEL']=0;
	if($objVar['PARENT_ID']>0){
		$objVar['LEVEL']=1;
	}
	
	$result=saveRecord('tbl_menu',$objVar);
	//echo $result['SQL'];
	
	
	//require_once CMS_PATH."/include/jsonwrite.php";
        $rc=writeCache('tbl_menu','menu');
}


$REC_PERPAGE=20;
$params['LIMIT']=($hal-1)*$REC_PERPAGE.','.$REC_PERPAGE;
$params['sSearchContent']=$sSearchContent;
$params['LEVEL']='0';
$params['ORDER']='POS,ORDNUM ASC';
$params['NIPOS']='("XMS")';
$list=getRecord('tbl_menu',$params);
//echo $list['SQL'];

?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=add'?>" type="button"
                    class="btn bg-gradient-primary">Tambah
                    Menu</a>
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
                        <th>Menu</th>
                        <th>SubMenu</th>
                        <th>Pos</th>
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
                            <td>[<b><a
                                        href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&parentid='.$list['ID']?>">ADD</a></b>]<br>
                                <?php 
								$varSm['LIMIT']=20;
								$varSm['PARENT_ID']=$list['ID'];
								$listSm=getRecord('tbl_menu',$varSm);
								if(!empty($listSm['RESULT'])){
								foreach($listSm['RESULT'] as $listSm){
									?>
                                <?php if($listSm['STATUS']>0){ ?>
                                <a href="" class="btn btn-primary btn-circle"><i class="iconfa-ok"></i></a>
                                <?php }else{ ?>
                                <a href="" class="btn btn-warning btn-circle"><i class="iconfa-time"></i></a>
                                <?php } ?>

                                [<b><a
                                        href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=edit&id='.$listSm['ID']?>">EDIT</a></b>]
                                <?php echo $listSm['TITLE'] ?><br>
                                <?php
								}}
								?>
                            </td>
                            <td>
                                <?php echo $list['POS']?>
                            </td>
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