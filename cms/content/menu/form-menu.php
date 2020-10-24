<?php
$pageseo='menu';

$params['ID']=isset($_REQUEST['id'])?$_REQUEST['id']:'';
$params['PARENT_ID']=isset($_REQUEST['parentid'])?$_REQUEST['parentid']:'';

if ($params['PARENT_ID']>1){
	$level=1;
}else{
	$level=0;
}

$act='ADD';
$objDetail=null;
if($params['ID']>0){
	$act='EDIT';	
	$objDetail=getRecord('tbl_menu',$params);
	$objDetail=$objDetail['RESULT'][0];
	
	$params['PARENT_ID']=$objDetail['PARENT_ID'];
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Menu</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="stdform stdform2" method="post"
                action="<?php echo CMS_URL?>/index.php?page=data-<?php echo $pageseo?>">
                <div class="card-body">
                    <input type='hidden' name='PK-ID' value='<?php echo $objDetail['ID']?>'>
                    <input type='hidden' name='PARENT_ID' value='<?php echo $params['PARENT_ID']?>'>
                    <input type='hidden' name='ACT' value='<?php echo $act?>'>
                    <input type='hidden' name='LEVEL' value='<?php echo $level?>'>
                    <div class="form-group">
                        <label>Menu</label>
                        <input type="text" class="form-control" placeholder="<?php echo $objDetail['TITLE']?>"
                            name="TITLE" id="firstname2" value="<?php echo $objDetail['TITLE']?>">
                    </div>

                    <div class="form-group">
                        <label>Sub Menu</label>
                        <select class="form-control" name="PARENT_ID">
                            <option value="0">-</option>
                            <?php
								$pv['LIMIT']=20;
								$pv['STATUS']=1;
								$pv['LEVEL']='0';
								$pv['CUSTOM']='POS <> "XMS" ';
								$listCat=getRecord('tbl_menu',$pv);
								
								foreach($listCat['RESULT'] as $list){
								?>
                            <option value="<?php echo $list['ID']?>"
                                <?php if($list['ID']==$objDetail['PARENT_ID']){echo 'selected';}?>>
                                <?php echo $list['TITLE']?></option>
                            <?php } ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>URL</label>
                        <input type="text" class="form-control" placeholder="<?php echo $objDetail['URL']?>" name="URL"
                            value='<?php echo $objDetail['URL']?>'>
                    </div>

                    <?php if($params['PARENT_ID']<1){?>
                    <div class="form-group">
                        <label>Posisi</label>
                        <span class="field"><br>
                            <input type="radio" name="POS" value='top'
                                <?php if($objDetail['POS']=='top') echo 'checked'?>> Top
                            <input type="radio" name="POS" value='footer'
                                <?php if($objDetail['POS']=='footer') echo 'checked'?>> Footer
                        </span>
                    </div>
                    <?php } ?>

                    <div class="form-group">
                        <label>Order No</label>
                        <input type="text" class="form-control" placeholder="<?php echo $objDetail['ORDNUM']?>"
                            name="ORDNUM" value="<?php echo $objDetail['ORDNUM']?>">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <span class="field" style="display:block;">
                            <input type="radio" name="STATUS" value='1'
                                <?php if($objDetail['STATUS']=='1') echo 'checked'?>> Publish
                            <input type="radio" name="STATUS" value='0'
                                <?php if($objDetail['STATUS']=='0') echo 'checked'?>> Unpublish
                        </span>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" name='submitcontent' value='1'>SIMPAN</button>
                    <button class="btn btn-warning" name='submitcontent' value='0'>BATAL</button>
                </div>
            </form>
        </div>
    </div>
</div>