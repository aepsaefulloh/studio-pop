<?php
$tbl['tbl_user'] = array
  (
  array("NAME"=>"EMAIL","TYPE"=>"text","PLACEHOLDER"=>"Email","TITLE"=>"Email","FORM"=>"Y"),
  array("NAME"=>"DESC","TYPE"=>"text","PLACEHOLDER"=>"Description","TITLE"=>"Description","FORM"=>"Y"),
  array("NAME"=>"PASSWD","TYPE"=>"password","PLACEHOLDER"=>"Password","TITLE"=>"Password","FORM"=>"Y"),
  array("NAME"=>"FULLNAME","TYPE"=>"text","PLACEHOLDER"=>"Full Name","TITLE"=>"Full Name","FORM"=>"Y"),
  array("NAME"=>"ROLE","TYPE"=>"radio","PLACEHOLDER"=>"Access","TITLE"=>"Access","FORM"=>"Y",
			'OPTION' => array
			(
				array("TEXT"=>"admin","VALUE"=>"admin"),
				array("TEXT"=>"uploader","VALUE"=>"uploader"),
				array("TEXT"=>"viewer","VALUE"=>"viewer"),
			)
		),
  array("NAME"=>"PHOTO","TYPE"=>"FILE","PLACEHOLDER"=>"Photo","TITLE"=>"Photo","FORM"=>"Y"),
  array("NAME"=>"STATUS","TYPE"=>"radio","PLACEHOLDER"=>"Status","TITLE"=>"Status","FORM"=>"Y",
			'OPTION' => array
			(
				array("TEXT"=>"On","VALUE"=>"1"),
				array("TEXT"=>"off","VALUE"=>"0")				
			)
		),
  array("NAME"=>"LAST_LOGIN","TYPE"=>"text","PLACEHOLDER"=>"Last Login","TITLE"=>"Last Login","FORM"=>"N")
  );
  
  
$entity['group']=array('ACT','PK-ID','GROUP_NAME','ACCESS');
$entity['photographer']=array('ACT','PK-EMAIL','EMAIL','NAME','REMARK','PHOTO','STATUS');
$entity['category']=array('ACT','PK-ID','CATEGORY','SEO','TIPE','STATUS');
$entity['user']=array('ACT','PK-ID','EMAIL','USERNAME','PASSWD','CPS','FULLNAME','JOB','ID_GROUP','ID_PROPINSI','ID_KABUPATEN','ID_KECAMATAN','DESCRIPTION','STATUS','LASTLOGIN');

$entity['config']=array('ACT','PK-CKEY','CVALUE');
$entity['profile']=array('ACT','PK-EMAIL','EMAIL','PASSWD');  
$entity['menu']=array('ACT','PK-ID','TITLE','URL','POS','STATUS','LEVEL','PARENT_ID','ORDNUM');  
$entity['propinsi']=array('ACT','PK-ID','PROPINSI','IBUKOTA','KODEBPS','KODEISO','LUAS','POPULASI','STATUS');  
$entity['article']=array('ACT','PK-ID','TITLE','SUMMARY','CONTENT','IMAGE','KEYWORD','HIT','STATUS');  
$entity['banner']=array('ACT','PK-ID','TITLE','POS','FILENAME','URL','ORDERNUM','STATUS');  
$entity['product']=array('ACT','PK-ID','CODE','PRODUCT','CATEGORY','SUMMARY','PRICE','SPECS','BROCHURE','IMAGE','STATUS','ORDNUM','AVAIL'); 
$entity['content']=array('ACT','PK-ID','TITLE','SUBTITLE','SUMMARY','CONTENT','IMAGE','VIDEO','KEYWORD','CATEGORY','ARTIST','SPORTIFY','HIT','CREATE_TIMESTAMP','CREATE_BY','STATUS');
$entity['contact']=array('ACT','PK-ID','FULLNAME','EMAIL','TELP','QABOUT','MESSAGE','STATUS');
$entity['addimage']=array('ACT','PK-ID','PRODUCT_ID','IMAGE','CAPTION','TIPE','STATUS');
$entity['address']=array('ACT','PK-ID','TITLE','CATEGORY','ADDRESS','PHONE','FAX','ORDNUM','STATUS');
$entity['testimoni']=array('ACT','PK-ID','FULLNAME','TESTI','LOKASI','IMAGE','STATUS');
$entity['transaction']=array('ACT','PK-ID','TRADE','FULLNAME','ADDRESS','PHONE','EMAIL','PROV','KAB','KODEPOS','SHIPMENT','PAYMENT','TOTAL','STATUS');
$entity['stock']=array('ACT','PK-ID','STOCK_DATE','CODE','SIZE','TOTAL','STATUS');



?>