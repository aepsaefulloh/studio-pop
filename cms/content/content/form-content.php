<?php
$pageseo='content';

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
                <h3 class="card-title">Add Content</h3>
            </div>
            <form class="stdform stdform2" method="post"
                action="<?php echo CMS_URL?>/index.php?page=data-<?php echo $pageseo?>" enctype="multipart/form-data">
                <div class="card-body">
                    <input type='hidden' name='PK-ID' value='<?php echo $objDetail['ID']?>'>
                    <input type='hidden' name='ACT' value='<?php echo $act?>'>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" placeholder="<?php echo $objDetail['TITLE']?>"
                                    name="TITLE" id="firstname2" value="<?php echo $objDetail['TITLE']?>">
                            </div>
                            <div class="form-group">
                                <label>Artist</label>
                                <input type="text" class="form-control" name="ARTIST"
                                    value="<?php echo $objDetail['ARTIST']?>">
                            </div>
                            <div class="form-group">
                                <label>Keyword <i class="fas fa-info-circle" data-toggle="tooltip"
                                        data-placement="right" title="untuk membantu pada SEO"></i></label>
                                <input type="text" class="form-control" placeholder="" name="KEYWORD"
                                    value="<?php echo $objDetail['KEYWORD']?>">
                            </div>
                            <div class="form-group">
                                <label>Link Sportify</label>
                                <input type="text" class="form-control"
                                    placeholder="<?php echo $objDetail['SPORTIFY']?>" name="SPORTIFY" id="firstname2"
                                    value="<?php echo $objDetail['SPORTIFY']?>">
                            </div>
                        </div>
                        <div class="col-md-6">
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
                                        <?php echo $list['CATEGORY']?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Summary</label>
                                <input type="text" class="form-control" placeholder="" name="SUMMARY" id="location2"
                                    value="<?php echo $objDetail['SUMMARY']?>">
                            </div>
                            <div class="form-group">
                                <label>Creator</label>
                                <input type="text" class="form-control" placeholder="" name="CREATE_BY"
                                    value="<?php echo $objDetail['CREATE_BY']?>">
                            </div>
                            <div class="form-group">
                                <label>Video</label>
                                <input type="text" class="form-control" name="VIDEO"
                                    value="<?php echo $objDetail['VIDEO']?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control ckeditor" placeholder="" id='CONTENT'
                                    name="CONTENT"><?php echo $objDetail['CONTENT']?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Image <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="right"
                                        title="ukuran gambar:1240x656 & kurang dari 300kb"></i></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="IMAGE">
                                        <label class="custom-file-label">Choose
                                            file</label>
                                    </div>
                                </div>
                                <br>
                                <img src="<?php echo ROOT_URL.'/images/'.$pageseo.'/'.$objDetail['IMAGE']?>"
                                    width=' 300px'>
                            </div>
                            <!-- <div class="form-group">
                                <label>Tanggal</label>
                                <input type="text" class="form-control" id="kt_datepicker_1" name="CREATE_TIMESTAMP"
                                    value="<?php echo substr($objDetail['CREATE_TIMESTAMP'],0,10)?>"> 
                            </div> -->
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