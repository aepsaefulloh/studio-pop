<?php
$pageseo='gallery';

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
            <form class="stdform stdform2" method="post"
                action="<?php echo CMS_URL?>/index.php?page=data-<?php echo $pageseo?>" enctype="multipart/form-data">
                <div class="card-body">
                    <input type='hidden' name='PK-ID' value='<?php echo $objDetail['ID']?>'>
                    <input type='hidden' name='ACT' value='<?php echo $act?>'>
                    <div class="form-group">
                        <label>Filename</label>
                        <input type="text" class="form-control" name="FILENAME" value="<?php echo $objDetail['FILENAME']?>">
                    </div>

                    <div class="form-group">
                        <label>Caption</label>
                        <input type="text" class="form-control" name="CAPTION" value="<?php echo $objDetail['CAPTION']?>">
                    </div>

                    <div class="form-group">
                        <label>Foto <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="right"
                                title="Dimensi : 557 x 454. Ukuran : kurang dari 100kb "></i></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="IMAGE">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        <br>
                        <img src="<?php echo ROOT_URL.'/images/'.$pageseo.'/'.$objDetail['IMAGE']?>" width='300px'>
                    </div>

					<div class="form-group">
                        <label>Order No</label>
                        <input type="ORDNUM" class="form-control" name="ORDNUM" value="<?php echo $objDetail['ORDNUM']?>">
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