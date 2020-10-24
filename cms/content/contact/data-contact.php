<?php
$pageseo='contact';

$submitcontent=isset($_REQUEST['submitcontent'])?$_REQUEST['submitcontent']:'0';
$sSearchContent=isset($_REQUEST['sSearchContent'])?$_REQUEST['sSearchContent']:'';
$hal=isset($_REQUEST['hal'])?$_REQUEST['hal']:'1';


//=============IF SUBMIT CONTENT=====================
if($submitcontent=='1'){	
	$objVar=array();
	foreach($_REQUEST as $k=>$v){
		//GET COL VAR
		//echo "raw <i>".strtoupper($k)."=".$v."</i><br>";
		if (in_array(strtoupper($k), $entity['contact'])){
			$v=str_replace("'","`",$v);
			$objVar[strtoupper($k)]=$v;
			//echo "<i>".strtoupper($k)."=".$v."</i><br>";
		}
	}

	//IF IMAGE EXIST
	if($_FILES['IMAGE']['name'] != "") {		
		$allowExt=array('jpg','png','jpeg');
		$ext = pathinfo($_FILES['IMAGE']['name'], PATHINFO_EXTENSION);
		if (in_array($ext, $allowExt)){
			$nfname=md5($_FILES['IMAGE']['name']).'.'.strtolower($ext);
			$target=ROOT_PATH.'/images/content/'.$nfname;			
			move_uploaded_file($_FILES['IMAGE']['tmp_name'],$target);
			$objVar['IMAGE']=$nfname;
		}
	}
	
	$result=saveRecord('tbl_'.$pageseo,$objVar);
	//echo $result['SQL'];
	
	//----cached-------
	$res=writeCache('tbl_'.$pageseo,$pageseo);
	//echo 'SQL :'.$res['SQL'].'<hr>';
	//----------end cached-------	
	
}


$REC_PERPAGE=20;
$params['LIMIT']=($hal-1)*$REC_PERPAGE.','.$REC_PERPAGE;
$params['sSearchContent']=$sSearchContent;
$params['ORDER']='ID DESC';

$list=getRecord('tbl_contact',$params);

?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <!-- <div class="card-header">
                <a href="<?php echo CMS_URL.'/index.php?page=form-'.$pageseo.'&act=add'?>" type="button"
                    class="btn bg-gradient-primary">Tambah
                    Konten</a>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search"
                            id="search_field">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="myTable">
                    <thead class=".t_head">
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Subject</th>
                            <th>Pesan</th>
                            <!-- <th>Timestamp</th> -->
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						foreach($list['RESULT'] as $list){					
						?>
                        <tr>
                            <td><?php echo $list['FULLNAME']?></td>
                            <td><?php echo $list['EMAIL']?></td>
                            <td><?php echo $list['TELP']?></td>
                            <td><?php echo $list['SUBJECT']?></td>
                            <td><?php echo $list['MESSAGE']?></td>
                            <!-- <td><?php echo $list['MSG_TIMESTAMP']?></td> -->
                            <!-- <td><button class="btn btn-warning">Edit</button></td> -->
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0">
                    <a href='<?php echo CMS_URL.'/index.php?page=data-'.$pageseo.'&hal='.($hal-1)?>'>
                        <button class="btn btn-outline-primary"><i class="iconfa-backward"></i> prev</button></a>
                    <button class="btn btn-default ml-2 mr-2"><?php echo $hal?></button>
                    <a href='<?php echo CMS_URL.'/index.php?page=data-'.$pageseo.'&hal='.($hal+1)?>'>
                        <button class="btn btn-outline-primary">next <i class="iconfa-forward"></i></button></a>
                </ul>
            </div>
        </div>
    </div>
</div>