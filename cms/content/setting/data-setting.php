<?php
$objVar['ACT']=isset($_REQUEST['act'])?$_REQUEST['act']:"EDIT";
$objVar['ID']=isset($_REQUEST['id'])?$_REQUEST['id']:"";
$objVar['CKEY']=isset($_REQUEST['ckey'])?$_REQUEST['ckey']:'';
$submitcontent=isset($_REQUEST['submitcontent'])?$_REQUEST['submitcontent']:'0';


//IF SUBMITTED
if($submitcontent=='1'){

$objVar['CATEGORY']=isset($_REQUEST['CATEGORY'])?$_REQUEST['CATEGORY']:'';
$objVar['ckey']=isset($_REQUEST['ckey'])?$_REQUEST['ckey']:'';

foreach($_FILES as $x=>$y){	
	//echo $x.':'.$y['name'].':'.$y['tmp_name'];
	if($y['name']!=''){
	$gambar = ROOT_PATH."/images/conf/conf-".$y['name'];
	move_uploaded_file($y['tmp_name'], $gambar);
	$var['CKEY']=$x;
	$var['CVALUE']="conf-".$y['name'];
	$var['CATEGORY']=$objVar['CATEGORY'];
	$result=saveConfig($var);
	//echo $result['SQL'];
	//echo $gambar;
	}
}

foreach($_REQUEST as $key=>$v){
	if (substr($key,0,3)=='DD_'){
		//echo $key." = ".$v."<br>";	
		$var['CKEY']=$key;
		$var['CVALUE']=$v;
		$var['CATEGORY']=$objVar['CATEGORY'];
		$result=saveConfig($var);
		//echo $result['SQL']."<br>";		
		
		//----------------CACHED-----------------------	
		$res=writeCache('tbl_config','config');
		//echo 'SQL :'.$res['SQL'].'<hr>';
		//----------------END CACHED--------------------
	}
}
}
//END SUBMIT

$objList=null;
$conf=array();
if ($objVar['ACT']=='EDIT'){	
	$objList=getConfig($objVar);
	// echo "SQL : ".$objList['SQL'];
	foreach($objList['RESULT'] as $list){
		$conf[$list['CKEY']]=$list['CVALUE'];
	}
}


$cat=getDistConfig();
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Setting</h3>
            </div>
            <?php
				foreach($cat['RESULT'] as $cat){
			?>
            <form role="form" method="post" action="<?php echo CMS_URL?>/index.php?page=data-setting"
                enctype="multipart/form-data">
                <input type="hidden" name="CATEGORY" value="<?php echo $cat['CATEGORY']?>">

                <div class="card-body">
                    <?php
							$params['CATEGORY']=$cat['CATEGORY'];
							$params['CKEY']=$objVar['CKEY'];
							$params['STATUS']=1;
							$input=getConfig($params);
							foreach($input['RESULT'] as $input){
								if ($input['CTYPE']=='text'){
								?>
                    <div class="form-group">
                        <label><?php echo $input['LABEL']?></label>
                        <input type="text" class="form-control" name="<?php echo $input['CKEY']?>" id="firstname2"
                            value="<?php echo $input['CVALUE']?>">
                    </div>
                    <?php	}else if ($input['CTYPE']=='textarea'){	?>

                    <div class="form-group">
                        <label><?php echo $input['LABEL']?></label>
                        <input type="text" class="form-control" name="<?php echo $input['CKEY']?>" id="location2"
                            value="<?php echo $input['CVALUE']?>">
                    </div>
                    <?php	}else if ($input['CTYPE']=='image'){ ?>

                    <div class="form-group">
                        <label><?php echo $input['LABEL']?></label>
                        <input type="file" class="form-control" name="<?php echo $input['CKEY']?>" id="lastname2">
                        <br>
                        <img src="<?php echo ROOT_URL."/images/conf/".$input['CVALUE']?>"
                            style='width:300px;background:#f8f6f6;'>
                    </div>
                    <?php }} ?>

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" name='submitcontent' value='1'>Save</button>
                    <button class="btn btn-warning" name='submitcontent' value='0' style="color:#fff;">Cancel</button>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>