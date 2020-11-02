<?php
//IF IMAGE EXIST
	if($_FILES['IMAGE']['name'] != "") {		
		$allowExt=array('jpg','png','jpeg','pdf');
		$ext = pathinfo($_FILES['IMAGE']['name'], PATHINFO_EXTENSION);
		if (in_array($ext, $allowExt)){
                     
			$nfname_view=md5($_FILES['IMAGE']['name']).'.'.strtolower($ext);
			$nfname_thumb=md5($_FILES['IMAGE']['name']).'_thumb.'.strtolower($ext);
			$target=ROOT_PATH.'/images/content/ori/'.$nfname_view;
			
                                    
			move_uploaded_file($_FILES['IMAGE']['tmp_name'],$target);
			$objVar['IMAGE_FOLDER']=$rpfolder.'/'.date('Ym');
			$objVar['IMAGE']=$nfname_view;
            
            checkFolder($objVar['IMAGE_FOLDER']);
            
			//BUAT view
			if(!create_thumbnail_preserve_ratio($target, ROOT_PATH.'/images/'.$objVar['IMAGE_FOLDER'].'/'.$nfname_view, '700')){
				copy($target,ROOT_PATH.'/images/'.$objVar['IMAGE_FOLDER'].'/'.$nfname_view);
			}
			
			//BUAT thumbnail
			if(!create_thumbnail_preserve_ratio($target, ROOT_PATH.'/images/'.$objVar['IMAGE_FOLDER'].'/'.$nfname_thumb, '300')){
				copy($target,ROOT_PATH.'/images/'.$objVar['IMAGE_FOLDER'].'/'.$nfname_thumb);
			}
			
			
            
            
		}
	}
?>
