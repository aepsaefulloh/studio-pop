<?php
$pageseo='product';

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
            <form method="post" action="<?php echo CMS_URL?>/index.php?page=data-<?php echo $pageseo?>"
                enctype="multipart/form-data">
                <div class="card-body">
                    <input type='hidden' name='PK-ID' value='<?php echo $objDetail['ID']?>'>
                    <input type='hidden' name='ACT' value='<?php echo $act?>'>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product</label>
                                <input type="text" class="form-control" name="PRODUCT"
                                    value="<?php echo $objDetail['PRODUCT']?>">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control" name="PRICE"
                                    value="<?php echo $objDetail['PRICE']?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="CATEGORY">
                                    <?php
								$pv['LIMIT']=20;
								$pv['STATUS']=1;
								$pv['TIPE']='product';
								$listCat=getRecord('tbl_category',$pv);
								foreach($listCat['RESULT'] as $list){
								?>
                                    <option value="<?php echo $list['ID']?>"
                                        <?php if($list['ID']==$objDetail['CATEGORY']){echo 'selected';}?>>
                                        <?php echo $list['CATEGORY']?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sumamry</label>
                                <input type="text" class="form-control" name="SUMMARY"
                                    value="<?php echo $objDetail['SUMMARY']?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="right"
                                        title="ukuran: 1024x1024 & kurang dari 300kb"></i></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="IMAGE">
                                        <label class="custom-file-label">Choose
                                            file</label>
                                    </div>
                                </div>
                                <br>
                                <img src="<?php echo ROOT_URL.'/images/'.$pageseo.'/'.$objDetail['IMAGE']?>"
                                    width='300px'>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Varian</i></label>
                                <br>
                                <span class="label label-info label-inline mr-2"> <a
                                        href='<?php echo CMS_URL.'/index.php?page=form-product-image&pid='.$list['ID'];?>'
                                        style="color:#fff;">Add
                                        Varian</a></span>
                                <br>
                                <?php 
										$vi['PRODUCT_ID']=$list['ID'];
										$vi['STATUS']=1;
										$vi['LIMIT']=20;
										$listAi=getRecord('tbl_addimage',$vi);
										foreach($listAi['RESULT'] as $listAi){
										?>
                                <div class="varians-img">
                                    <img src="<?php echo ROOT_URL.'/images/'.$pageseo.'/'.$listAi['IMAGE']?>"
                                        width='100px'>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" name="CONTENT"
                                    id="kt-ckeditor-5"><?php echo $objDetail['CONTENT']?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <div class="input-group date" id="kt_datetimepicker_2" data-target-input="nearest">
                                    <input type="datetime-local" class="form-control" name="CREATE_TIMESTAMP"
                                        value="<?php echo $objDetail['CREATE_TIMESTAMP']?>" />

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