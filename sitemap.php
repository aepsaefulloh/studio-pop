<?php
require_once "config.php";
require_once ROOT_PATH."/lib/dao_utility.php";
require_once ROOT_PATH."/lib/mysqlDao.php";

$params['CATEGORY']=isset($_REQUEST['category'])?$_REQUEST['category']:'';

header("Content-type: text/xml");
echo "<?";?>xml version="1.0" encoding="UTF-8"?>
<?php 
echo "<?";?>xml-stylesheet type="text/xsl" href="/css/xml-sitemap.xsl"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <?php
$params['STATUS']='1';
$params['LIMIT']=100;
$list=getRecord('tbl_content',$params);
foreach($list['RESULT'] as $list)
{	
	$pageLink=getNewsURL($list);
	$categoryID=$row[1];
	$lastMod=substr($list['CREATE_TIMESTAMP'],0,10);	
?>
    <url>
        <loc><?php echo $pageLink;?></loc>
        <lastmod><?php echo $lastMod; ?></lastmod>
        <priority>0.80</priority>
        <changefreq>hourly</changefreq>
    </url>
    <?php
}
?>

    <url>
        <loc><?php echo ROOT_URL?></loc>
        <lastmod>2020-09-14</lastmod>
        <priority>0.80</priority>
        <changefreq>hourly</changefreq>
    </url>
	<url>
        <loc><?php echo ROOT_URL?>/promo</loc>
        <lastmod>2020-09-14</lastmod>
        <priority>0.80</priority>
        <changefreq>hourly</changefreq>
    </url>
	<url>
        <loc><?php echo ROOT_URL?>/tentangtrada</loc>
        <lastmod>2020-09-14</lastmod>
        <priority>0.80</priority>
        <changefreq>hourly</changefreq>
    </url>
	<url>
        <loc><?php echo ROOT_URL?>/karir</loc>
        <lastmod>2020-09-14</lastmod>
        <priority>0.80</priority>
        <changefreq>hourly</changefreq>
    </url>
	<url>
        <loc><?php echo ROOT_URL?>/csr</loc>
        <lastmod>2020-09-14</lastmod>
        <priority>0.80</priority>
        <changefreq>hourly</changefreq>
    </url>
	<url>
        <loc><?php echo ROOT_URL?>/visi-misi</loc>
        <lastmod>2020-09-14</lastmod>
        <priority>0.80</priority>
        <changefreq>hourly</changefreq>
    </url>
	<url>
        <loc><?php echo ROOT_URL?>/sales</loc>
        <lastmod>2020-09-14</lastmod>
        <priority>0.80</priority>
        <changefreq>hourly</changefreq>
    </url>
	<url>
        <loc><?php echo ROOT_URL?>/berita</loc>
        <lastmod>2020-09-14</lastmod>
        <priority>0.80</priority>
        <changefreq>hourly</changefreq>
    </url>
	<url>
        <loc><?php echo ROOT_URL?>/produk</loc>
        <lastmod>2020-09-14</lastmod>
        <priority>0.80</priority>
        <changefreq>hourly</changefreq>
    </url>
	<url>
        <loc><?php echo ROOT_URL?>/service</loc>
        <lastmod>2020-09-14</lastmod>
        <priority>0.80</priority>
        <changefreq>hourly</changefreq>
    </url>
	<url>
        <loc><?php echo ROOT_URL?>/body-repair</loc>
        <lastmod>2020-09-14</lastmod>
        <priority>0.80</priority>
        <changefreq>hourly</changefreq>
    </url>
	<url>
        <loc><?php echo ROOT_URL?>/kontak</loc>
        <lastmod>2020-09-14</lastmod>
        <priority>0.80</priority>
        <changefreq>hourly</changefreq>
    </url>
</urlset>