<?php
$pageseo='banner';

$params['ID']=isset($_REQUEST['id'])?$_REQUEST['id']:'';

$act='ADD';
$objDetail=null;
if($params['ID']>0){
	$act='EDIT';	
	$objDetail=getRecord('tbl_banners',$params);
	$objDetail=$objDetail['RESULT'][0];
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Banner</h3>
            </div>
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
                        <label>URL</label>
                        <input type="text" class="form-control" placeholder="" name="URL"
                            value="<?php echo $objDetail['URL']?>">
                    </div>

                    <?php if($_SESSION['ID_GROUP']==1){ ?>
                    <div class="form-group">
                        <label>Posisi</label>
                        <span class="field">
                            <select name="POS" class="form-control">
                                <option value=''>-</option>
                                <option value="ADS" <?php if($objDetail['POS']=='ADS') echo 'selected'?>>
                                    Ads Desktop (160x600)</option>
                                <option value="ADS-MOBILE" <?php if($objDetail['POS']=='ADS-MOBILE') echo 'selected'?>>
                                    Ads-Mobile
                                    (2022x250)</option>
                                <option value="SLIDER" <?php if($objDetail['POS']=='SLIDER') echo 'selected'?>>Slider
                                </option>
                            </select>
                        </span>
                    </div>
                    <?php } ?>

                    <div class="form-group">
                        <label>Urutan Ke</label>
                        <input type="text" class="form-control" placeholder="<?php echo $objDetail['ORDERNUM']?>"
                            name="ORDERNUM" id="firstname2" value="<?php echo $objDetail['ORDERNUM']?>">
                    </div>

                    <div class="form-group">
                        <label>Image <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="right"
                                title="Dimensi : 1050 x 700. Ukuran : kurang dari 100kb "></i></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="IMAGE" id="lastname2">
                                <label class="custom-file-label">Choose
                                    file</label>
                            </div>
                        </div>
                        <br>
                        <img src="<?php echo ROOT_URL.'/images/banner/'.$objDetail['FILENAME']?>" width='300px'>
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