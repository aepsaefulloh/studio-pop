<?php
$pageseo='stock';


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
                <h3 class="card-title">Form STOCK</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="stdform stdform2" method="post"
                action="<?php echo CMS_URL?>/index.php?page=data-<?php echo $pageseo?>" enctype="multipart/form-data">
                <div class="card-body">
                    <input type='hidden' name='PK-ID' value='<?php echo $objDetail['ID']?>'>
                    <input type='hidden' name='ACT' value='<?php echo $act?>'>

                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" placeholder="<?php echo $objDetail['STOCK_DATE']?>"
                            name="STOCK_DATE" id="firstname2" value="<?php echo $objDetail['STOCK_DATE']?>">
                    </div>

                    <div class="form-group">
						<label>Product</label>
						<select class="form-control" name="CODE">
						<option value=''>-product-</option>
							<?php
						$pv['LIMIT']=120;
						$listCat=getRecord('tbl_product',$pv);
						foreach($listCat['RESULT'] as $list){
						?>
							<option value="<?php echo $list['CODE']?>"
								<?php if($list['CODE']==$objDetail['CODE']){echo 'selected';}?>>
								<?php echo $list['PRODUCT']?>
							</option>
							<?php } ?>
						</select>
					</div>

                    <div class="form-group">
                        <label>Size</label>
						<select class="form-control" name="SIZE">
						<option value=''>-size-</option>
						<?php
												
						foreach($confSize as $k=>$v){
						?>
							<option value="<?php echo $k?>"
								<?php if($k==$objDetail['SIZE']){echo 'selected';}?>><?php echo $v?></option>
							<?php } ?>
						</select>
                    </div>
					
					<div class="form-group">
                        <label>Quantity</label>
                        <input type="text" class="form-control" placeholder="<?php echo $objDetail['TOTAL']?>"
                            name="TOTAL" value="<?php echo $objDetail['TOTAL']?>">
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