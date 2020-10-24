<?php
$pageseo='contact';

$params['ID']=isset($_REQUEST['id'])?$_REQUEST['id']:'';

$act='ADD';
$objDetail=null;
if($params['ID']>0){
	$act='EDIT';	
	$objDetail=getRecord('tbl_'.$pageseo,$params);
	
	$objDetail=$objDetail['RESULT'][0];
	
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Konten</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="stdform stdform2" method="post"
                action="<?php echo CMS_URL?>/index.php?page=data-<?php echo $pageseo?>" enctype="multipart/form-data">
                <div class="card-body">
                    <input type='hidden' name='PK-ID' value='<?php echo $objDetail['ID']?>'>
                    <input type='hidden' name='ACT' value='<?php echo $act?>'>
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" placeholder="<?php echo $objDetail['TITLE']?>"
                            name="TITLE" id="firstname2" value="<?php echo $objDetail['TITLE']?>">
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="CATEGORY">
                            <?php
								$pv['LIMIT']=20;
								$pv['STATUS']=1;
								$pv['TIPE']='content';
								$listCat=getRecord('tbl_category',$pv);
								foreach($listCat['RESULT'] as $list){
								?>
                            <option value="<?php echo $list['ID']?>"
                                <?php if($list['ID']==$objDetail['CATEGORY']){echo 'selected';}?>>
                                <?php echo $list['CATEGORY']?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Summary</label>
                        <input type="text" class="form-control" placeholder="<?php echo $objDetail['SUMMARY']?>"
                            name="SUMMARY" id="location2">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Konten</label>
                        <textarea class="textarea" placeholder="" name="CONTENT" id="location2"
                            style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;"><?php echo $objDetail['CONTENT']?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Keyword</label>
                        <input type="text" class="form-control" placeholder="<?php echo $objDetail['KEYWORD']?>"
                            name="KEYWORD" id="lastname2">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="IMAGE" id="lastname2">
                                <label class="custom-file-label">Choose
                                    file</label>
                                <img src="<?php echo ROOT_URL.'/images/'.$pageseo.'/'.$objDetail['IMAGE']?>"
                                    width='300px'>
                            </div>
                        </div>
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
                    <button class="btn btn-primary" name='submitcontent' value='1'>Save</button>
                    <button class="btn btn-warning" name='submitcontent' value='0' style="color:#fff;">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>