<?php
$seo='administrasiuser';

$params['ID']=isset($_REQUEST['id'])?$_REQUEST['id']:'';
$act='ADD';
if($params['ID']>0){
	$act='EDIT';
}

$objDetail=getRecord('tbl_group',$params);
$objDetail=$objDetail['RESULT'][0];
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Role </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="stdform stdform2" method="post"
                action="<?php echo CMS_URL?>/index.php?page=data-<?php echo $seo?>">
                <input type='hidden' name='PK-ID' value="<?php echo $params['ID']?>">
                <input type='hidden' name='ACT' value="<?php echo $act?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="" name="GROUP_NAME" id="firstname2"
                            value="<?php echo $objDetail['GROUP_NAME']?>">
                    </div>

                    <div class="form-group">
                        <?php 
                            $acpl=explode('|',$objDetail['ACCESS']);
                            $varModul['LIMIT']='50';
                            $varModul['STATUS']='1';
                            $listModul=getRecord('tbl_modul',$varModul);
                            foreach($listModul['RESULT'] as $list){
						?>
                        <input type="checkbox" name="ACCESS[]" value="<?php echo $list['SEO']?>"
                            <?php if (in_array($list['SEO'], $acpl)) echo 'checked' ?> />
                        <?php echo $list['MODUL']?><br />

                        <?php } ?>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" name='submitgroup' value='1'>Save</button>
                    <button class="btn btn-warning" name='submitgroup' value='0' style="color:#fff;">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>