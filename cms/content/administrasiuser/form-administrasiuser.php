<?php
$seo='administrasiuser';

$params['ID']=isset($_REQUEST['id'])?$_REQUEST['id']:'';
$act='ADD';
$objDetail=null;
if($params['ID']>0){
	$act='EDIT';
	$objDetail=getRecord('tbl_user',$params);
	$objDetail=$objDetail['RESULT'][0];
    $passwd=decrypt($objDetail['PASSWD'],5);
    if(strlen($objDetail['PASSWD'])<2){
        $passwd=$objDetail['CPS'];
    }
}


?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Admin</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="stdform stdform2" method="post"
                action="<?php echo CMS_URL?>/index.php?page=data-<?php echo $seo?>">
                <input type='hidden' name='PK-ID' value="<?php echo $params['ID']?>">
                <input type='hidden' name='ACT' value="<?php echo $act?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="" name="EMAIL" id="firstname2"
                            value="<?php echo $objDetail['EMAIL']?>">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="" name="USERNAME" id="lastname2"
                            value="<?php echo $objDetail['USERNAME']?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="" name="PASSWD" id="lastname2"
                            value="<?php echo $passwd?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="" name="FULLNAME" id="email2"
                            value="<?php echo $objDetail['FULLNAME']?>">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="textarea" placeholder="" name="DESCRIPTION" id="location2"
                            style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;">
                            <?php echo $objDetail['DESCRIPTION']?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="ID_GROUP">
                            <option value=''>-</option>
                            <?php 
								$var['LIMIT']='50';
								$var['STATUS']='1';
                                $listGroup=getRecord('tbl_group',$var);
                                echo ['SQL'];
								foreach($listGroup['RESULT'] as $list){
								?>
                            <option value="<?php echo $list['ID']?>"
                                <?php if($list['ID']==$objDetail['ID_GROUP']) echo 'selected'?>>
                                <?php echo $list['GROUP_NAME']?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <span class="field" style="display:block;">
                            <input type="radio" name="STATUS" value='1'
                                <?php if($objDetail['STATUS']=='1') echo 'checked'?>>
                            Publish
                            <input type="radio" name="STATUS" value='0'
                                <?php if($objDetail['STATUS']=='0') echo 'checked'?>>
                            Unpublish
                        </span>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" name='submituser' value='1'>Save</button>
                    <button class="btn btn-warning" name='submituser' value='0' style="color:#fff;">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>