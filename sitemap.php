<?php
include 'conf/env_router.php';

$conf = Conf::getActive();
header("Content-Type:text/xml");

echo '<?xml version="1.0" encoding="UTF-8"?>';

?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
 xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
 xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
  <url>
    <loc><?php echo $conf->base_url; ?></loc>
    <lastmod><?php echo $conf->sitemap['lastmod']; ?></lastmod>
    <changefreq><?php echo $conf->sitemap['cfreq']; ?></changefreq>
  </url>
  <?php foreach($conf->sitemap['pages'] as $lang => $pages){ ?>
    <?php foreach($pages as $page){ ?>
  <url>
    <loc><?php echo $conf->base_url; ?><?php echo $lang ?>/<?php echo $page ?></loc>
    <lastmod><?php echo $conf->sitemap['lastmod']; ?></lastmod>
    <changefreq><?php echo $conf->sitemap['cfreq']; ?></changefreq>
  </url>
    <?php } ?>
  <?php } ?>
  <?php foreach($conf->sitemap['files'] as $file){ ?>
  <url>
    <loc><?php echo $conf->base_url; ?><?php echo $file ?></loc>
    <lastmod><?php echo $conf->sitemap['lastmod']; ?></lastmod>
    <changefreq><?php echo $conf->sitemap['cfreq']; ?></changefreq>
  </url>
  <?php } ?>

</urlset>