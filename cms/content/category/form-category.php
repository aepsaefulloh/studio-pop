<?php
$pageseo='category';


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
                <h3 class="card-title">Tambah Kategori</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="stdform stdform2" method="post"
                action="<?php echo CMS_URL?>/index.php?page=data-<?php echo $pageseo?>" enctype="multipart/form-data">
                <div class="card-body">
                    <input type='hidden' name='PK-ID' value='<?php echo $objDetail['ID']?>'>
                    <input type='hidden' name='ACT' value='<?php echo $act?>'>

                    <div class="form-group">
                        <label>Category</label>
                        <input type="text" class="form-control" placeholder="<?php echo $objDetail['CATEGORY']?>"
                            name="CATEGORY" id="firstname2" value="<?php echo $objDetail['CATEGORY']?>">
                    </div>

                    <div class="form-group">
                        <label>Seo</label>
                        <input type="text" class="form-control" placeholder="<?php echo $objDetail['SEO']?>" name="SEO"
                            id="location2">
                    </div>

                    <div class="form-group">
                        <label>Tipe</label>
                        <input type="text" class="form-control" placeholder="<?php echo $objDetail['TIPE']?>" name="TIPE"
                            id="location2">
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