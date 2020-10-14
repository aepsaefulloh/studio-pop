<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
function getRecord($TABLE,$COND){
	$obj=null;    
	
	$obj['SQL']="SELECT * from {$TABLE} where 1=1";

	foreach($COND as $k=>$v){
		if (($k!='LIMIT') && ($k!='ORDER') && ($k!='KEYWORD') && ($k!='ACT') && ($k!='LIKE_USER')&& ($k!='CUSTOM')){
			if($v!=''){
				$obj['SQL'].=" AND {$k}='".cleanParam($v)."'";
			}
		}
	}
	
	if(isset($COND['KEYWORD'])&& $COND['KEYWORD']!=''){
		$obj['SQL'].=" AND (DESCRIPTION like '%".$COND['KEYWORD']."%' or KEYWORD like '%".$COND['KEYWORD']."%') ";
	}	
	
	if(isset($COND['LIKE_USER'])&& $COND['LIKE_USER']!=''){
		$obj['SQL'].=" AND (USERNAME like '%".$COND['LIKE_USER']."%') ";
	}	
	
    
    if(isset($COND['CUSTOM'])&& $COND['CUSTOM']!=''){
		$obj['SQL'].=" AND ".$COND['CUSTOM'];
	}
	
	
	if($TABLE=='tbl_story'){
		$obj['SQL'].=" AND STATUS < 2";
	}
    
	if(isset($COND['ORDER'])&& $COND['ORDER']!=''){
		$obj['SQL'].=" ORDER by ".$COND['ORDER'];	
	}	
	
	if(isset($COND['LIMIT'])&& $COND['LIMIT']!=''){
		$obj['SQL'].=" LIMIT ".$COND['LIMIT'];
	}else{
		$obj['SQL'].=" LIMIT 1";
	}
	
	
		
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;	
}


function countRecord($TABLE,$COND){
	$obj=null;    
	
	$obj['SQL']="SELECT count(1) as TOTAL from {$TABLE} where 1=1";

	foreach($COND as $k=>$v){
		if (($k!='LIMIT') && ($k!='ORDER') && ($k!='KEYWORD') && ($k!='ACT')&& ($k!='CUSTOM')){
			if($v!=''){
				$obj['SQL'].=" AND {$k}='".$v."'";
			}
		}
	}
    
    if(isset($COND['CUSTOM'])&& $COND['CUSTOM']!=''){
		$obj['SQL'].=" AND ".$COND['CUSTOM'];
	}
	
	if(isset($COND['KEYWORD'])&& $COND['KEYWORD']!=''){
		$obj['SQL'].=" AND (DESCRIPTION like '%".$COND['KEYWORD']."%' or KEYWORD like '%".$COND['KEYWORD']."%') ";
	}	
		
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;	
}


function saveRecord($TABLE,$objItem){
	$obj=null;
    $obj['SQL']="";
	//LIST COL
	$colup='';
	$col='';
	$val='';
	$where='';	
	$i=0;
	foreach($objItem as $k=>$v){
		$exp=explode("-",$k);		
		if (($k!='ACT')&&($exp[0]!='PK')&&($k!='CUSTOM')){
			$i++;
			
			//EDIT VAR			
			if ($i>1){
				$colup.=",".$k."='".cleanParam($v)."'";				
			}else{
				$colup.=$k."='".cleanParam($v)."'";
			}
			
			
			//ADD VAR
			if ($i>1){
				$col.=",".$k;
				$val.=",'".cleanParam($v)."'";
			}else{
				$col.=$k;
				$val.="'".cleanParam($v)."'";
			}
			
		}
		
		//GET WHERE KEY
		if (sizeof($exp)>1){
				$where=' where '.$exp[1]."='".cleanParam($v)."'";
		}
	}
	
	if (strtoupper($objItem['ACT'])=="ADD"){
        $obj['SQL']="insert into {$TABLE} (".$col.") values (".$val.")";		
	}else if(strtoupper($objItem['ACT'])=="EDIT"){
		$obj['SQL']="UPDATE {$TABLE} set ".$colup;
		if($objItem['CUSTOM']!=''){
			$obj['SQL'].=' where '.$objItem['CUSTOM'];
		}else{
			$obj['SQL'].=$where;	
		}
		
		if($TABLE=='tbl_participant'){
			//$obj['SQL'].=' and STATUS=0';
		}
	}
			
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    
}


function statistik(){
    $obj=null;
    
	$obj['SQL']="SELECT CATEGORY,count(1) as TOTAL from tbl_content where STATUS=1";

	//$obj['SQL'].=" AND CATEGORY IN ('gerbangnasional','gerbangdaerah','materipenyuluhan','diseminasiteknologi','materilokalita') ";	
    
	$obj['SQL'].=" GROUP BY CATEGORY";	
		
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;	
}

function personName($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * from tbl_writer where 1=1";

    if(isset($objItem['EMAIL'])&& $objItem['EMAIL']!='')
        $obj['SQL'].=" AND EMAIL='".$objItem['EMAIL']."'";	
	
	if(isset($objItem['ID'])&& $objItem['ID']!='')
        $obj['SQL'].=" AND ID='".$objItem['ID']."'";		
	
	$obj['SQL'].=" order by FULLNAME";	
		
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;	
}

function getJadwal($objItem=null){
	$obj=null;
    
	$obj['SQL']="SELECT * from tbl_schedule where status=1 AND EDATE >= curdate()";
	
	if(isset($objItem['ENAME'])&& $objItem['ENAME']!='')
        $obj['SQL'].=" AND ENAME='".$objItem['ENAME']."'";
	
	$obj['SQL'].=" order by EDATE ASC";	
		
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;	
}


function getMenu($objItem=null){
	$obj=null;
    
	$obj['SQL']="SELECT * from tbl_menu where status=1";
	
	if(isset($objItem['ID'])&& $objItem['ID']!='')
        $obj['SQL'].=" AND ID='".$objItem['ID']."'";
	
	if(isset($objItem['TIPE'])&& $objItem['TIPE']!='')
        $obj['SQL'].=" AND TIPE='".$objItem['TIPE']."'";
	
	if(isset($objItem['POS'])&& $objItem['POS']!='')
        $obj['SQL'].=" AND POS='".$objItem['POS']."'";
	
	$obj['SQL'].=" order by ORDNUM";	
		
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;	
}


function getSubMenu($objItem=null){
	$obj=null;
    
	$obj['SQL']="SELECT * from tbl_submenu where status=1";
	
	if(isset($objItem['ID'])&& $objItem['ID']!='')
        $obj['SQL'].=" AND ID='".$objItem['ID']."'";
	
	if(isset($objItem['MENU_ID'])&& $objItem['MENU_ID']!='')
        $obj['SQL'].=" AND MENU_ID='".$objItem['MENU_ID']."'";
	
	$obj['SQL'].=" order by ORDNUM";	
		
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;	
}

function getStatic($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * from tbl_static where 1=1";

    if(isset($objItem['ID'])&& $objItem['ID']!='')
        $obj['SQL'].=" AND ID='".$objItem['ID']."'";	
	
	if(isset($objItem['TITLE'])&& $objItem['TITLE']!='')
        $obj['SQL'].=" AND TITLE='".$objItem['TITLE']."'";		
	
	if(isset($objItem['SEO'])&& $objItem['SEO']!='')
        $obj['SQL'].=" AND SEO='".$objItem['SEO']."'";		
	
	$obj['SQL'].=" order by TITLE";	
		
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;	
}


function getConfig($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * from tbl_config where 1=1";

    if(isset($objItem['ID'])&& $objItem['ID']!='')
        $obj['SQL'].=" AND ID='".$objItem['ID']."'";		
		
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;	
}

function getBanner($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * from jnw_banner where status=1 AND time_start<=CURDATE() AND time_end>=CURDATE()";

    if(isset($objItem['id'])&& $objItem['id']!='')
        $obj['SQL'].=" AND id='".$objItem['id']."'";	
	
	if(isset($objItem['location_id'])&& $objItem['location_id']!='')
        $obj['SQL'].=" AND location_id='".$objItem['location_id']."'";		
	
	$obj['SQL'].=" order by title ASC";	
		
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;	
}


function getFocus($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_focus where STATUS=1";
	
	if(isset($objItem['ID'])&& $objItem['ID']!='')
     	$obj['SQL'].=" AND ID='".$objItem['ID']."'";
	
	if(isset($objItem['TITLE'])&& $objItem['TITLE']!='')
     	$obj['SQL'].=" AND TITLE like '%".$objItem['TITLE']."%'";		
		
	$obj['SQL'].=" ORDER BY ID DESC";
	$obj['SQL'].=" LIMIT ".$objItem['FIRST'].",".$objItem['END']."";
	
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    	
}

function getBanners($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * from tbl_banners where status=1 AND START_DATE<=CURDATE() AND END_DATE>=CURDATE() and SITE='".SITE."'";

    if(isset($objItem['ID'])&& $objItem['ID']!='')
        $obj['SQL'].=" AND ID='".$objItem['ID']."'";	
	
	if(isset($objItem['POS'])&& $objItem['POS']!='')
        $obj['SQL'].=" AND POS='".$objItem['POS']."'";		
	
	$obj['SQL'].=" order by ORDERNUM ASC";	
		
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;	
}


function getBreaking($objItem=null){
	$obj=null;
    
	$obj['SQL']="SELECT * from tbl_sekilasinfo where STATUS=1 AND PUBLISH_TIMESTAMP <= Now()";

    if(isset($objItem['ID'])&& $objItem['ID']!='')
        $obj['SQL'].=" AND ID='".$objItem['ID']."'";	
	
	$obj['SQL'].=" order by PUBLISH_TIMESTAMP DESC";

	if(isset($objItem['END'])&& $objItem['END']>0){
		$obj['SQL'].=" LIMIT ".$objItem['FIRST'].",".$objItem['END']."";
	}else{
		$obj['SQL'].=" LIMIT 1";
	}
		
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;	
}


function getFocusNews($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_focus_article where 1=1";
	
	if(isset($objItem['ID'])&& $objItem['ID']!='')
     	$obj['SQL'].=" AND ID='".$objItem['ID']."'";
	
	if(isset($objItem['FOCUS_ID'])&& $objItem['FOCUS_ID']!='')
     	$obj['SQL'].=" AND FOCUS_ID='".$objItem['FOCUS_ID']."'";		
		
	$obj['SQL'].=" ORDER BY ID DESC";
	
	
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    	
}

function getTaicing($objItem){
	$finTc=null;
	
	$uplength=len($objItem['TAICING']);
	if (trim($uplength)>1){
		$finTc=$objItem['TAICING'];
	}else{
		$brContent=explode('<p>',$objItem['CONTENT']);
		$finTc=$brContent[0];
	}
	
	return $finTc;	
}	

function getRandomNews(){
	$obj=null;
    	
	$obj['SQL']="SELECT * FROM tbl_article WHERE STATUS=1 and PUBLISH_TIMESTAMP <= Now() AND PUBLISH_TIMESTAMP > (CURDATE() - interval 15 DAY) ORDER BY RAND() LIMIT 1";	
		   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;
}




function getParser($objItem=null){    
	$obj=null;
    	
	$obj['SQL']="SELECT * FROM tbl_article";
	$obj['SQL'].=" WHERE PUPDATE=0 ";	
	
	if(isset($objItem['LIMIT'])&& $objItem['LIMIT']!=''){
			$obj['SQL'].=" LIMIT ".$objItem['LIMIT'];
		}else{
			$obj['SQL'].=" LIMIT 1";
		}
   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;
}

function saveParser($objItem){
	$obj=null;
    $obj['SQL']="";
	$obj['SQL']="UPDATE tbl_article set 
				CATEGORY='".$objItem['CATEGORY']."', 
				KEYWORD='".$objItem['KEYWORD']."', 
				REPORTER='".$objItem['REPORTER']."',
				IMAGE='".$objItem['IMAGE']."',
				PUPDATE=1
				WHERE ID='".$objItem['GUID']."'";
				
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    
}

function getNewsPopular($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_article ";
	$obj['SQL'].=" WHERE STATUS=1 and PUBLISH_TIMESTAMP <= Now() AND CATEGORY<>13";
		
	if(isset($objItem['NID'])&& $objItem['NID']!='')
     	$obj['SQL'].=" AND ID<>'".$objItem['NID']."'";	
	
	if(isset($objItem['CATEGORY'])&& $objItem['CATEGORY']!='')
     	$obj['SQL'].=" AND CATEGORY='".$objItem['CATEGORY']."'";			
		
	$obj['SQL'].=" AND PUBLISH_TIMESTAMP > (CURDATE() - interval 7 DAY)";	
		
		
	$obj['SQL'].=" ORDER BY HIT DESC ";
	
	if(isset($objItem['LIMIT'])&& $objItem['LIMIT']!=''){
			$obj['SQL'].=" LIMIT ".$objItem['LIMIT'];
		}else{
			$obj['SQL'].=" LIMIT 1";
		}
   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}

function getNews($objItem){
    
	$obj=null;
    	
	$obj['SQL']="SELECT * , TIMEDIFF(NOW(),PUBLISH_TIMESTAMP) AS selisih FROM tbl_article";
	$obj['SQL'].=" WHERE STATUS=1 and PUBLISH_TIMESTAMP <= Now() ";
	
	if(isset($objItem['ID'])&& $objItem['ID']!='')
     	$obj['SQL'].=" AND ID='".$objItem['ID']."'";
	
	if(isset($objItem['NID'])&& $objItem['NID']!='')
     	$obj['SQL'].=" AND ID<>'".$objItem['NID']."'";	
		
	if(isset($objItem['NNID'])&& $objItem['NNID']!='')
     	$obj['SQL'].=" AND ID  NOT IN ".$objItem['NNID'];	
	
	if(isset($objItem['CATEGORY'])&& $objItem['CATEGORY']!='')
     	$obj['SQL'].=" AND CATEGORY='".$objItem['CATEGORY']."'";	
		
	if(isset($objItem['NCATEGORY'])&& $objItem['NCATEGORY']!='')
     	$obj['SQL'].=" AND CATEGORY  NOT IN ".$objItem['NCATEGORY'];				
		
	if(isset($objItem['SUBCATEGORY'])&& $objItem['SUBCATEGORY']!='')
     	$obj['SQL'].=" AND SUBCATEGORY='".$objItem['SUBCATEGORY']."'";	
	
	if(isset($objItem['EDITORPICK'])&& $objItem['EDITORPICK']!='')
     	$obj['SQL'].=" AND EDITORPICK='".$objItem['EDITORPICK']."'";
	
	if(isset($objItem['SEO'])&& $objItem['SEO']!='')
     	$obj['SQL'].=" AND SEO='".$objItem['SEO']."'";
	
	if(isset($objItem['STATUS_UC'])&& $objItem['STATUS_UC']!='')
     	$obj['SQL'].=" AND STATUS_UC='".$objItem['STATUS_UC']."'";	
		
	if(isset($objItem['TIPE'])&& $objItem['TIPE']!='')
     	$obj['SQL'].=" AND TIPE='".$objItem['TIPE']."'";	
		
	if(isset($objItem['KEYWORD'])&& $objItem['KEYWORD']!='')
     	$obj['SQL'].=" AND KEYWORD like '%".$objItem['KEYWORD']."%'";
	
	if(isset($objItem['UPPERDECK'])&& $objItem['UPPERDECK']!='')
     	$obj['SQL'].=" AND UPPERDECK like '%".$objItem['UPPERDECK']."%'";
	
	if(isset($objItem['PUBLISH_DATE'])&& $objItem['PUBLISH_DATE']!='')
     	$obj['SQL'].=" AND date(PUBLISH_TIMESTAMP)='".$objItem['PUBLISH_DATE']."'";		
				
	$obj['SQL'].=" ORDER BY PUBLISH_TIMESTAMP DESC ";
	
	if(isset($objItem['LIMIT'])&& $objItem['LIMIT']!=''){
			$obj['SQL'].=" LIMIT ".$objItem['LIMIT'];
		}else{
			$obj['SQL'].=" LIMIT 1";
		}
   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;

}



function getCountNews($objItem){
    
	$obj=null;
    	
	$obj['SQL']="SELECT count(1) as TOTAL FROM tbl_article";
	$obj['SQL'].=" WHERE STATUS=1 and PUBLISH_TIMESTAMP <= Now()";
	
	if(isset($objItem['ID'])&& $objItem['ID']!='')
     	$obj['SQL'].=" AND ID='".$objItem['ID']."'";
	
	if(isset($objItem['NID'])&& $objItem['NID']!='')
     	$obj['SQL'].=" AND ID<>'".$objItem['NID']."'";	
		
	if(isset($objItem['NNID'])&& $objItem['NNID']!='')
     	$obj['SQL'].=" AND ID  NOT IN ".$objItem['NNID'];	
	
	if(isset($objItem['CATEGORY'])&& $objItem['CATEGORY']!='')
     	$obj['SQL'].=" AND CATEGORY='".$objItem['CATEGORY']."'";	
		
	if(isset($objItem['NCATEGORY'])&& $objItem['NCATEGORY']!='')
     	$obj['SQL'].=" AND CATEGORY  NOT IN ".$objItem['NCATEGORY'];				
	
	if(isset($objItem['SUBCATEGORY'])&& $objItem['SUBCATEGORY']!='')
     	$obj['SQL'].=" AND SUBCATEGORY='".$objItem['SUBCATEGORY']."'";
	
	if(isset($objItem['TIPE'])&& $objItem['TIPE']!='')
     	$obj['SQL'].=" AND TIPE='".$objItem['TIPE']."'";	
		
	if(isset($objItem['KEYWORD'])&& $objItem['KEYWORD']!='')
     	$obj['SQL'].=" AND KEYWORD like '%".$objItem['KEYWORD']."%'";		
	
	if(isset($objItem['PUBLISH_DATE'])&& $objItem['PUBLISH_DATE']!='')
     	$obj['SQL'].=" AND date(PUBLISH_TIMESTAMP)='".$objItem['PUBLISH_DATE']."'";		
					   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;

}

function getNewsRelated($objItem){
	
	$KEYWORD=explode(",",$objItem['KEYWORD']);
	$ksize=sizeof($KEYWORD);
	
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_article ";
	$obj['SQL'].=" WHERE STATUS=1 and PUBLISH_TIMESTAMP <= Now() AND CATEGORY<>13";
		
	
	if(isset($objItem['NID'])&& $objItem['NID']!='')
     	$obj['SQL'].=" AND ID<>'".$objItem['NID']."'";			
		
	if(isset($objItem['CATEGORY'])&& $objItem['CATEGORY']!='')
     	$obj['SQL'].=" AND CATEGORY='".$objItem['CATEGORY']."'";				
	
	
	if($ksize==1){
     	$obj['SQL'].=" AND (KEYWORD like '%".trim($KEYWORD[0])."%'";
	}else if($ksize==2){
     	$obj['SQL'].=" AND (KEYWORD like '%".trim($KEYWORD[0])."%' or KEYWORD like '%".trim($KEYWORD[1])."%')";
	}else if($ksize==3){
     	$obj['SQL'].=" AND (KEYWORD like '%".trim($KEYWORD[0])."%'  or KEYWORD like '%".trim($KEYWORD[1])."%'  or KEYWORD like '%".trim($KEYWORD[2])."%')";
	}else if($ksize==4){
     	$obj['SQL'].=" AND (KEYWORD like '%".trim($KEYWORD[0])."%'  or KEYWORD like '%".trim($KEYWORD[1])."%'  or KEYWORD like '%".trim($KEYWORD[2])."%' or KEYWORD like '%".trim($KEYWORD[3])."%')";
	}
		
	//$obj['SQL'].=" AND PUBLISH_TIMESTAMP > (curdate()-interval 1 MONTH)";					
		
	$obj['SQL'].=" ORDER BY PUBLISH_TIMESTAMP DESC ";
	$obj['SQL'].=" LIMIT ".$objItem['FIRST'].",".$objItem['END']."";
   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}

function getCounter($objItem){
	$obj=null;
    	
	$obj['SQL']="select * from tbl_counter where 1=1";
    
    if(isset($objItem['SYS_DATE'])&& $objItem['SYS_DATE']!='')
     	$obj['SQL'].=" AND SYS_DATE='".$objItem['SYS_DATE']."'";				
    
    if(isset($objItem['CATEGORY'])&& $objItem['CATEGORY']!='')
     	$obj['SQL'].=" AND CATEGORY='".$objItem['CATEGORY']."'";				
		
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    	
}

function sumCounter($objItem){
    $obj=null;
    $obj['SQL']='select sum(HIT) as TOTAL from tbl_counter where 1=1';

    if(isset($objItem['SYS_DATE'])&& $objItem['SYS_DATE']!='')
        $obj['SQL'].=" AND SYS_DATE='".$objItem['SYS_DATE']."'";

    if(isset($objItem['LDATE'])&& $objItem['LDATE']!='')
        $obj['SQL'].=" AND SYS_DATE<='".$objItem['LDATE']."'";

    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
    return $obj;	
}



function setCounter($objItem){
	$obj=null;
    if($objItem['HIT']>1){
        $obj['SQL']="UPDATE tbl_counter set HIT='".$objItem['HIT']."' WHERE SYS_DATE='".$objItem['SYS_DATE']."' and CATEGORY='".$objItem['CATEGORY']."'";
    }else{
        $obj['SQL']="insert into tbl_counter values ('".$objItem['SYS_DATE']."','".$objItem['CATEGORY']."',".$objItem['HIT'].")";
    }
		
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    	
}

function upcount($objItem){
	$obj=null;
    	
	$obj['SQL']="UPDATE tbl_content set HIT='".$objItem['HIT']."' WHERE ID='".$objItem['ID']."'";
		
    $obj['RESULT']=DAOExecuteSQL($obj['SQL']);
	return $obj;    	
}


function getNewsOther($objItem){
	$objResult=null;
    
	$strSQL="SELECT * FROM jnwnews ";
	$strSQL.=" WHERE publish_status=1 and MediaAbbreviation='JNW' and capekdehpublished_at <= Now()";
		
	if(isset($objItem['nid'])&& $objItem['nid']!='')
     	$strSQL.=" AND id<>'".$objItem['nid']."'";	
	
	if(isset($objItem['NewsCategory1_id'])&& $objItem['NewsCategory1_id']!='')
     	$strSQL.=" AND NewsCategory1_id='".$objItem['NewsCategory1_id']."'";	
		
	if(isset($objItem['NewsCategory2_id'])&& $objItem['NewsCategory2_id']!='')
     	$strSQL.=" AND NewsCategory2_id='".$objItem['NewsCategory2_id']."'";	

	if(isset($objItem['NewsCategory3_id'])&& $objItem['NewsCategory3_id']!='')
     	$strSQL.=" AND NewsCategory3_id='".$objItem['NewsCategory3_id']."'";		
		
	if(isset($objItem['quality'])&& $objItem['quality']!='')
     	$strSQL.=" AND quality='".$objItem['quality']."'";			
		
	$strSQL.=" AND capekdehpublished_at > (CURDATE()-interval 1 month)";	
		
		
	$strSQL.=" ORDER BY RAND() ";
	$strSQL.=" LIMIT ".$objItem['FIRST'].",".$objItem['END']."";
   
    $objResult=DAOQuerySQL($strSQL);
	return $objResult;
    //return $strSQL;
	
}

function getPopularTag($objItem=null) {
	$obj = null;
	$obj['SQL'] = "SELECT * from tbl_article where STATUS=1 ORDER BY HIT DESC limit 10"; 
	$obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;
}

function getNewsURLMotorina($objItem){
	// ARTIKEL/ID/TITLE/
	
	$search = array("`","quot",".","(",")","'", "\"","/", ":", ",", "!", ".", "$", "'", "+", "%", "&",'lsquo;',"rsquo;","?","rlm;",";", " ","<i>","</i>");  
    $replace = array("","","","","","","-","-","","","","","","","","","","","","","","","-","",""); 
					 
	$seo=str_replace("\\","",(str_replace($search, $replace, $objItem['TITLE'])));		
	$result='http://www.motorinanews.id/artikel/'.$objItem['ID'].'/'.$seo.'/';
	return $result;
}

 
function getNewsURL($objItem){
	// ARTIKEL/ID/TITLE/
	
	$search = array("`","quot",".","(",")","'", "\"","/", ":", ",", "!", ".", "$", "'", "+", "%", "&",'lsquo;',"rsquo;","?","rlm;",";", " ","<i>","</i>");  
    $replace = array("","","","","","","-","-","","","","","","","","","","","","","","","-","",""); 
					 
	$seo=str_replace("\\","",(str_replace($search, $replace, $objItem['TITLE'])));		
	$result=ROOT_URL.'/artikel/'.$objItem['ID'].'/'.strtolower($seo).'/';
	return $result;
}

function getNewsURLMobile($objItem){
	// ARTIKEL/ID/TITLE/	
	
	$search = array("`","quot",".","(",")","'", "\"","/", ":", ",", "!", ".", "$", "'", "+", "%", "&",'lsquo;',"rsquo;","?","rlm;",";", " ","<i>","</i>");  
    $replace = array("","","","","","","-","-","","","","","","","","","","","","","","","-","",""); 
					 
	$seo=str_replace("\\","",(str_replace($search, $replace, $objItem['TITLE'])));		
	$result=MROOT_URL.'/artikel/'.$objItem['ID'].'/'.$seo.'/';
	return $result;
}

function getCategory($objItem=null){	
	$obj=null;
	$obj['SQL']="SELECT * from tbl_category where STATUS=1";
	
	if(isset($objItem['ID'])&& $objItem['ID']!='')
     	$obj['SQL'].=" AND ID='".$objItem['ID']."'";	
	
	if(isset($objItem['SEO'])&& $objItem['SEO']!='')
     	$obj['SQL'].=" AND SEO='".$objItem['SEO']."'";
	
	$obj['SQL'].=" order by NO ASC";
	
	
	$obj['RESULT']=DAOQuerySQL($obj['SQL']);
		
	return $obj;
}

function getSubCategory($objItem=null){	
	$obj=null;
	$obj['SQL']="SELECT * from tbl_subcategory where STATUS=1";
	
	if(isset($objItem['ID'])&& $objItem['ID']!='')
     	$obj['SQL'].=" AND ID='".$objItem['ID']."'";

	if(isset($objItem['CATEGORY_ID'])&& $objItem['CATEGORY_ID']!='')
     	$obj['SQL'].=" AND CATEGORY_ID='".$objItem['CATEGORY_ID']."'";	
	
	if(isset($objItem['SEO'])&& $objItem['SEO']!='')
     	$obj['SQL'].=" AND SEO='".$objItem['SEO']."'";	
	
	$obj['RESULT']=DAOQuerySQL($obj['SQL']);
		
	return $obj;
}


function getAdvertorial($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM jnwnews WHERE id IN ".$objItem['id']."";	
		 
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;
    //return $strSQL;
	
}


function getPolling($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_polling WHERE 1=1";
    
    if(isset($objItem['ID'])&& $objItem['ID']!='')
        $obj['SQL'].=" AND ID='".$objItem['ID']."'";	
	 
	if(isset($objItem['STATUS'])&& $objItem['STATUS']!='')
        $obj['SQL'].=" AND STATUS='".$objItem['STATUS']."'";	
				
	$obj['SQL'].=" ORDER BY ID DESC";					
	   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}

function getPollingOption($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_polling_option WHERE 1=1";
    
    if(isset($objItem['ID'])&& $objItem['ID']!='')
        $obj['SQL'].=" AND ID='".$objItem['ID']."'";	
	 
	if(isset($objItem['POLLING_ID'])&& $objItem['POLLING_ID']!='')
        $obj['SQL'].=" AND POLLING_ID='".$objItem['POLLING_ID']."'";	
				
	$obj['SQL'].=" ORDER BY ID DESC";					
	   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}

//------------------------------TWITTER-------------------------------------------------
function getSocial($objItem){
	$objResult=null;
    
	$strSQL="SELECT * FROM tbl_social where STATUS='1' AND CATEGORY='".$objItem['SOCIAL_CATEGORY']."'";
	
    $objResult=DAOQuerySQL($strSQL);
	return $objResult;
    //return $strSQL;
	
}


//---------------------------------------RSS--------------------------------------------
function getRss(){
	$objResult=null;
    
	$strSQL="SELECT * FROM `tbl_article`  WHERE concat(tanggal,' ',`hour`) <= Now() and Article_Status=1  order by concat(tanggal,' ',`hour`) desc LIMIT 100";
	
    $objResult=DAOQuerySQL($strSQL);
	return $objResult;
    //return $strSQL;
	
}



//------------------------------UTIL-------------------------------------------------
function tanggal($tanggal,$ftanggal)
{
$xbulan='';	
	
$tgl=substr($tanggal,8,2);
$bulan=substr($tanggal,5,2);
$tahun=substr($tanggal,0,4);

$waktu=substr($tanggal,10,9);
if(strlen($waktu)>0){
$twaktu=explode(":",$waktu);
$jam=$twaktu[0];
$menit=$twaktu[1];
$detik=$twaktu[2];
if ($jam>24){
	$jam=$twaktu[0]-24;
}
//$waktu=$jam.':'.$menit.':'.$detik;
$waktu=$jam.':'.$menit;
}


$hari=date('w',mktime(0,0,0,$bulan,$tgl,$tahun));

switch ($hari) {
case 0: $hari="Minggu";
break;
case 1: $hari="Senin";
break;
case 2: $hari="Selasa";
break;
case 3: $hari="Rabu";
break;
case 4: $hari="Kamis";
break;
case 5: $hari="Jum'at";
break;
case 6: $hari="Sabtu";
break;
}
switch ($bulan) {
case 1: $nmbln="Jan";
break;
case 2: $nmbln="Feb";
break;
case 3: $nmbln="Mar";
break;
case 4: $nmbln="Apr";
break;
case 5: $nmbln="Mei";
break;
case 6: $nmbln="Jun";
break;
case 7: $nmbln="Jul";
break;
case 8: $nmbln="Agu";
break;
case 9: $nmbln="Sep";
break;
case 10: $nmbln="Okt";
break;
case 11: $nmbln="Nov";
break;
case 12: $nmbln="Des";
break;
}

	if ($ftanggal=="tipe1"){
		echo "$tgl $nmbln $tahun";
	}else if($ftanggal=="tipe2"){
		echo "$hari, $tgl $nmbln $tahun";    
	}else if($ftanggal=="tipe3"){
		//echo "$hari, $tgl $bulan $tahun | $waktu WIB";
		echo "$hari, $tgl/$bulan/$tahun  $waktu WIB";
	}else if($ftanggal=="tipe4"){
		echo "$tgl $nmbln $tahun";    
	}
}


function remote_file_exists($objVar) 
{ 
	
  //CHECK INI CONFIG 	
  if(ini_get('allow_url_fopen') == 0) 
  { 
    trigger_error('ERROR: allow_url_fopen is not enabled on this server', E_USER_WARNING); 
    return(FALSE); 
  }
  
  
  //CHECK IF IMAGE ALREADY EXIST
  if(($handle = @fopen($objVar['folder']."/thumb/".$objVar['name'], 'r'))&& ($handle = @fopen($objVar['folder']."/thumb/".$objVar['name'], 'r')) )
  { 
    fclose($handle); 
    return(TRUE); 
  }else{
  //COPY IMAGE WHEN NOT EXIST
  
	//------if not exist create folder using news date-----
	if(!file_exists($objVar['folder'])) mkdir($objVar['folder']); 		
	if(!file_exists($objVar['folder']."/thumb")) mkdir($objVar['folder']."/thumb/"); 		
	if(!file_exists($objVar['folder']."/view/")) mkdir($objVar['folder']."/view/");
		
	//-----copy thumbnail and view -------
	
	//CHECK SOURCE 1
	$vimgold=IMG_SOURCE;	
	
	
	$varold = array("[IDPIC]","[K]", "[MD5]", "[SIZE]");
	$varnew_thumb   = array($objVar['id'], $objVar['k'], $objVar['md5'], "thumb");
	$varnew_view   = array($objVar['id'], $objVar['k'], $objVar['md5'], "view");
	
	//build source url
	$varnew_thumb = str_replace($varold, $varnew_thumb,$vimgold);
	$varnew_view = str_replace($varold, $varnew_view,$vimgold);
			
	//Copy if source exist
	if($handle = @fopen($varnew_view, 'r'))
	{
	//copy original to local folder	
	copy($varnew_view, $objVar['folder']."/view/".$objVar['name']);
	//copy thumb to local folder
	copy($varnew_view, $objVar['folder']."/thumb/".$objVar['name']);			
	//resize view to thumb image
	create_thumbnail_preserve_ratio($objVar['folder']."/view/".$objVar['name'], $objVar['folder']."/thumb/".$objVar['name'], '250');		
	}	
  }  
  return(FALSE); 
}

function create_thumbnail_preserve_ratio($source, $destination, $thumbWidth)
{
    //$extension = get_image_extension($source);
	$extension = pathinfo($source, PATHINFO_EXTENSION);
    $size = getimagesize($source);
    $imageWidth  = $size[0];
    $imageHeight = $size[1];
	$newWidth  = 250;
	$newheight = 170;	
	
	
	
    if ($imageWidth > $thumbWidth || $imageHeight > $thumbWidth)
    {
        // Calculate the ratio
        $xscale = ($imageWidth/$thumbWidth);
        $yscale = ($imageHeight/$thumbWidth);
        $newWidth  = ($yscale > $xscale) ? round($imageWidth * (1/$yscale)) : round($imageWidth * (1/$xscale));
        $newHeight = ($yscale > $xscale) ? round($imageHeight * (1/$yscale)) : round($imageHeight * (1/$xscale));
		
		
		$newImage = imagecreatetruecolor($newWidth, $newHeight);

    switch ($extension)
    {
        case 'jpeg':
        case 'jpg':
            $imageCreateFrom = 'imagecreatefromjpeg';
            $store = 'imagejpeg';
            break;

        case 'png':
            $imageCreateFrom = 'imagecreatefrompng';
            $store = 'imagepng';
            break;

        case 'gif':
            $imageCreateFrom = 'imagecreatefromgif';
            $store = 'imagegif';
            break;

        default:
            return false;
    }

    $container = $imageCreateFrom($source);
    imagecopyresampled($newImage, $container, 0, 0, 0, 0, $newWidth, $newHeight, $imageWidth, $imageHeight);
    return $store($newImage, $destination);
    }else{
		//error_log("ukuran gambar kekecilan", 3, "/var/tmp/jurnas-debug.log");
	}

    
}


function getPhotos($objItem){	
	$image=null;		
	$objItem['k']='f';
	if($objItem['kf_id']<1){
		$objItem['id']=$objItem['kg_id'];
		$objItem['k']='g';
	}
	if(remote_file_exists($objItem)){
		$file_status=true;
		$image['VIEW']=IMG_URL.$objItem['folder']."/view/".$objItem['name'];	
		$image['THUMB']=IMG_URL.$objItem['folder']."/thumb/".$objItem['name'];										
	}

    return $image;
}


function getImagexxx($objItem){
$image=null;

if($objItem['IMAGE_FOLDER']==NULL){
        $image=PHOTO_URL."/files/archieve".$objItem['IMAGE'];
}else{
$filename = CMS_PATH.'/files/'.$objItem['IMAGE_FOLDER'].'/'.$objItem['IMAGE'];

	if (file_exists($filename)) {		
		$image['VIEW']=PHOTO_URL."/files/".$objItem['IMAGE_FOLDER'].'/'.$objItem['IMAGE'];
		$image['THUMB']=PHOTO_URL."/files/".$objItem['IMAGE_FOLDER'].'/'.$objItem['IMAGE'];
	}else{
		$image['VIEW']=PHOTO_URL."/noimage.png";
		$image['THUMB']=PHOTO_URL."/noimage.png";	
	}	
}
return $image;
}



function getImage($objItem){
$image=null;

if($objItem['IMAGE_FOLDER']==NULL){
        $oldfile=CMS_PATH."/files/archieve".$objItem['IMAGE'];
        if (file_exists($oldfile)) {
                $image=PHOTO_URL."/files/archieve".$objItem['IMAGE'];
        }else{
                $image=PHOTO_URL."/files/archieve2".$objItem['IMAGE'];
        }
}else{

        $filename = CMS_PATH.'/files/'.$objItem['IMAGE_FOLDER'].'/'.$objItem['IMAGE'];
        if (file_exists($filename)) {
                $image=PHOTO_URL."/files/".$objItem['IMAGE_FOLDER'].'/'.$objItem['IMAGE'];
        } else {
                $image=PHOTO_URL."/files/default/noimage.png";
        }
}
return $image;
}


function getOldFile($objItem){
$file=null;
	$oldfile=CMS_PATH."/files/archieve/".$objItem['FILES'];
	 $oldfile2=CMS_PATH."/files/archieve2/".$objItem['FILES'];
        if (file_exists($oldfile)) {
                $file=PHOTO_URL."/files/archieve/".$objItem['FILES'];
        }else if (file_exists($oldfile2)){
                $file=PHOTO_URL."/files/archieve2/".$objItem['FILES'];
        }else{
		$file='#';
	}
return $file;
}

function getImageFile($objItem){
	$obj=null;
    
	$obj['SQL']="SELECT * FROM tbl_photos WHERE 1=1";
    
    if(isset($objItem['NAME'])&& $objItem['NAME']!='')
        $obj['SQL'].=" AND NAME='".$objItem['NAME']."'";	
				
	$obj['SQL'].=" ORDER BY ID DESC";					
	   
    $obj['RESULT']=DAOQuerySQL($obj['SQL']);
	return $obj;    
}


function selisihWaktu($waktu){
$waktulalu;
$twaktu=explode(":",$waktu);
$jam=$twaktu[0];
$menit=$twaktu[1];
if (($jam>0) and ($jam<=24)) {    	
	$waktulalu=intval($jam)." jam ".intval($menit)." menit yang lalu";		
}else if ($jam<1){
	$waktulalu=intval($menit)." menit yang lalu";		
}else{
	$waktulalu=floor($jam/24)." hari ".($jam%24)." jam yang lalu";
}

return $waktulalu;
}


function waktuPublish($waktu){
$waktupublish=$waktu;
$twaktu=explode(":",$waktu);
$jam=$twaktu[0];
$menit=$twaktu[1];
$detik=$twaktu[2];
if ($jam>24){
	$jam=$twaktu[0]-24;
}
$waktupublish=$jam.':'.$menit.':'.$detik;

return $waktupublish;
}

function doLog($text)
{
  // open log file
  $filename = "debug.log";
  $fh = fopen($filename, "a") or die("Could not open log file.");
  fwrite($fh, date("d-m-Y, H:i")." - $text\n") or die("Could not write file!");
  fclose($fh);
}


function cleanParam($var){   
    $result=null;
	$search = array("select","insert","update","union","delete",'concat','outfile');  
    $replace = array("","","","","","",""); 
					 
	$result=str_ireplace("\\","",(str_ireplace($search, $replace, $var)));			
	$result=strip_tags($result);	
	return $result;
}

function genString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function setStar($hit){
    $img='star1.png';
    if($hit>160){
        $img='star5.png';
    }else if($hit>80){
        $img='star4.png';
    }else if($hit>40){
        $img='star3.png';
    }else if($hit>20){
        $img='star2.png';
    }else if($hit>10){
        $img='star1.png';
    }
    echo ROOT_URL.'/images/'.$img;
}
?>
