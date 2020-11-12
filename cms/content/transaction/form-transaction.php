<?php
$pageseo='transaction';

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
                <h3 class="card-title">Detail Transaction</h3>
            </div>
            <form class="stdform stdform2" method="post"
                action="<?php echo CMS_URL?>/index.php?page=data-<?php echo $pageseo?>" enctype="multipart/form-data">
                <div class="card-body">
                    <input type='hidden' name='PK-ID' value='<?php echo $objDetail['ID']?>'>
                    <input type='hidden' name='ACT' value='<?php echo $act?>'>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control" placeholder="<?php echo $objDetail['FULLNAME']?>"
                                    name="FULLNAME" id="firstname2" value="<?php echo $objDetail['FULLNAME']?>">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="ADDRESS" ><?php echo $objDetail['ADDRESS']?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="PHONE"
                                    value="<?php echo $objDetail['PHONE']?>">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control"
                                    placeholder="<?php echo $objDetail['EMAIL']?>" name="EMAIL" id="firstname2"
                                    value="<?php echo $objDetail['EMAIL']?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label>Province</label>
                                <input type="text" class="form-control" placeholder="" name="PROV" id="location2"
                                    value="<?php echo $objDetail['PROV']?>">
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" placeholder="" name="KAB"
                                    value="<?php echo $objDetail['KAB']?>">
                            </div>
                            <div class="form-group">
                                <label>Courier</label>
                                <input type="text" class="form-control" name="SHIPMENT"
                                    value="<?php echo $objDetail['SHIPMENT']?>">
                            </div>
							<div class="form-group">
                                <label>Shipping Cost</label>
                                <input type="text" class="form-control" name="SHIPMENT"
                                    value="<?php echo $objDetail['SHIPPING']?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Items</label>
								<br>
                                <?php
								$vi['TRID']=$objDetail['ID'];
								$lp=getRecord('tbl_transaction_dtl',$vi);
								foreach($lp['RESULT'] as $lp){
									echo 'Code : '.$lp['CODE'].' - Size : '.$lp['SIZE'].' - QTY : '.$lp['QTY'].'<br>';
								}
								?>
								<hr>
								TOTAL : <?php echo $objDetail['TOTAL']?>
                            </div>

                            
                        </div>
						
						<div class="form-group">
                        <label>Status</label>
                        <span class="field" style="display:block;">
							<?php foreach($trStatus as $k=>$v){?>
                            <input type="radio" name="STATUS" value='<?php echo $k?>' <?php if($objDetail['STATUS']==$k) echo 'checked'?>> <?php echo $v?><br>
							<?php } ?>
                        </span>
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