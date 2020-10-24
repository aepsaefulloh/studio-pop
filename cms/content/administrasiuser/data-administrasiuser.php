<?php
$pageseo='administrasiuser';

$submitUsr=isset($_REQUEST['submituser'])?$_REQUEST['submituser']:'0';
$submitGrp=isset($_REQUEST['submitgroup'])?$_REQUEST['submitgroup']:'0';
$hal=isset($_REQUEST['hal'])?$_REQUEST['hal']:'1';
$sSearchUser=isset($_REQUEST['sSearchUser'])?$_REQUEST['sSearchUser']:'';





//IF SUBMIT USERFORM
if($submitUsr=='1'){
	$objVar=array();
	$raw=array();
	foreach($_REQUEST as $k=>$v){
		//GET COL VAR
        $raw[strtoupper($k)]=$v;	
		//echo "<i>".strtoupper($k)."=".$v."</i><br>";
		
		if (in_array(strtoupper($k), $entity['user'])){
			if($k=='PASSWD') $v=encrypt($v,5);
			$objVar[strtoupper($k)]=$v;		
			//echo "<i>".strtoupper($k)."=".$v."</i><br>";
		}
	}
	$objVar['CPS']=$_REQUEST['PASSWD'];
	$objVar['EUP']=encrypt($_REQUEST['USERNAME']).'|'.encrypt($_REQUEST['PASSWD']);
	$result=saveRecord('tbl_user',$objVar);
    //echo $result['SQL'];
    
 
}


require_once CMS_PATH."/lib/submitpost.php";


//GET GROUP
$group=array();
$varG['LIMIT']='50';
$listG=getRecord('tbl_group',$varG);
foreach($listG['RESULT'] as $listG){
	$group[$listG['ID']]=$listG['GROUP_NAME'];
}




//GET USER
$REC_PERPAGE=12;
$params['LIMIT']=($hal-1)*$REC_PERPAGE.','.$REC_PERPAGE;
$params['sSearchUser']=$sSearchUser;
$list=getRecord('tbl_user',$params);

?>
<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="margin-top: 10px;">Administrator</h3>
                <a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=add'?>" type="button"
                    class="btn bg-gradient-primary" style="float: right;">
                    <i class="fas fa-user-plus"></i> Add User</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username/email/pass</th>
                            <th>Role</th>
                            <th>Last Login</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
								foreach($list['RESULT'] as $list){
								?>
                        <tr>
                            <td><?php echo $list['ID']?></td>
                            <td>
                                <?php echo $list['EMAIL']?> / <span><?php echo $list['FULLNAME']?> /
                                    <?php echo decrypt($list['PASSWD'],5)?></span><br>
                            </td>
                            <td><?php echo $group[$list['ID_GROUP']]?></td>
                            <td><?php echo $list['LASTLOGIN']?></td>
                            <td>
                                <a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=edit&id='.$list['ID']?>" class="btn btn-info"> Edit
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="margin-top: 10px;">Role Setting</h3>
                <!-- <a href="./role-add.html" class="btn" style="float: right;"><i class="fas fa-user-cog"></i></a> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
								$paramsGr['LIMIT']='50';
								$paramsGr['STATUS']='1';
								$list=getRecord('tbl_group',$paramsGr);
								foreach($list['RESULT'] as $list){
								?>
                        <tr>
                            <td><?php echo $list['GROUP_NAME']?></td>
                            <td>
                                <a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'-group&act=edit&id='.$list['ID']?>"class="btn btn-info"> Edit
                                </a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>