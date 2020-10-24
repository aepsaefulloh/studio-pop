<?php
$pageseo='doctor';

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
                        <label>Nama</label>
                        <input type="text" class="form-control" name="NAME" value="<?php echo $objDetail['NAME']?>">
                    </div>

                    <div class="form-group">
                        <label>Poli</label>
                        <select class="form-control" name="CATEGORY">
                            <?php
								$pv['LIMIT']=99;
								$pv['STATUS']=1;
								$pv['TIPE']='poli';
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
                        <label>Kutipan</label>
                        <textarea class="span5 mceEditor" name="DESCRIPTION"
                            id="location2"><?php echo $objDetail['DESCRIPTION']?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Pendidikan</label>
                        <textarea class="span5 mceEditor" name="EDUCATION"
                            id="location2"><?php echo $objDetail['EDUCATION']?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Pengalaman</label>
                        <textarea class="span5 mceEditor" name="EXPERIENCE"
                            id="location2"><?php echo $objDetail['EXPERIENCE']?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="EMAIL" value="<?php echo $objDetail['EMAIL']?>">
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="number" class="form-control" name="TELP" value="<?php echo $objDetail['TELP']?>">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Senin</label>
                                <input type="text" class="form-control" name="SEN"
                                    value="<?php echo $objDetail['SEN']?>">
                            </div>
                            <div class="form-group">
                                <label>Selasa</label>
                                <input type="text" class="form-control" name="SEL"
                                    value="<?php echo $objDetail['SEL']?>">
                            </div>
                            <div class="form-group">
                                <label>Rabu</label>
                                <input type="text" class="form-control" name="RAB"
                                    value="<?php echo $objDetail['RAB']?>">
                            </div>
                            <div class="form-group">
                                <label>Kamis</label>
                                <input type="text" class="form-control" name="KAM"
                                    value="<?php echo $objDetail['KAM']?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jumat</label>
                                <input type="text" class="form-control" name="JUM"
                                    value="<?php echo $objDetail['JUM']?>">
                            </div>
                            <div class="form-group">
                                <label>Sabtu</label>
                                <input type="text" class="form-control" name="SAB"
                                    value="<?php echo $objDetail['SAB']?>">
                            </div>
                            <div class="form-group">
                                <label>Minggu</label>
                                <input type="text" class="form-control" name="MIN"
                                    value="<?php echo $objDetail['MIN']?>">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Foto <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="right"
                                title="Dimensi : 480 x 567"></i></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="IMAGE">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        <br>
                        <img src="<?php echo ROOT_URL.'/images/'.$pageseo.'/'.$objDetail['IMAGE']?>" width='300px'>
                    </div>
					<!-- <div class="form-group">
                        <label>Order No</label>
                        <input type="ORDNUM" class="form-control" name="ORDNUM" value="<?php echo $objDetail['ORDNUM']?>">
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
                <div class="card-footer">
                    <button class="btn btn-primary" name='submitcontent' value='1'>Save</button>
                    <button class="btn btn-warning" name='submitcontent' value='0' style="color:#fff;">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>