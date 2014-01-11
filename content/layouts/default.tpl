<?php $this->rawTemplate = true;
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9) ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if !(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<title><?php echo $this->title(); ?></title>
	
	<meta charset="utf-8" />
    <meta name="description" content="<?php echo $this->renderMetaDesc(); ?>" />
    <meta name="keywords" content="<?php echo $this->renderMetaTags(); ?>" />
    <meta name="author" content="<?php echo $this->conf->author; ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    
	<?php if($this->conf->google_site_verification){ ?>
        <meta name="google-site-verification" content="<?php echo $this->conf->google_site_verification ?>" />
	<?php } ?>

    <?php if ((isset($_SERVER['HTTPS']) && 'on' == $_SERVER['HTTPS']) || isset($_SERVER['HTTP_X_FORWARDED_HOST']) ) { ?>
        <base href="<?php echo $this->conf->ssl_base_url ?>" />
    <?php } else { ?>
        <base href="<?php echo $this->conf->base_url ?>" />
    <?php } ?>


	<!-- Mobile Specific Metas
  ================================================== -->
  <?php if ($this->conf->viewport) { ?>
	  <meta name="viewport" content="<?php echo $this->conf->viewport ?>" />
  <?php } ?>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

  <!-- get ie10+ -->
  <!--[if !IE]><!--><script>
  if (/*@cc_on!@*/false) {
      document.documentElement.className+=' ie10';
  }
  </script><!--<![endif]-->

	<!-- CSS
  ================================================== -->
  <?php if ($this->conf->scopes[$this->scope]['styles']) { foreach( $this->conf->scopes[$this->scope]['styles'] as $style ){  ?>
	  <link type="text/css" rel="stylesheet" href="<?php echo $style; ?>" />
  <?php }} ?>

  <?php echo $this->embededCss(); ?>

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="theme/classic/images/fav/favicon.ico" />

<?php if ($this->conf->scopes[$this->scope]['scripts']) { foreach( $this->conf->scopes[$this->scope]['scripts'] as $script ) {  ?>
  <script src="<?php echo $script; ?>" ></script>
<?php }} ?>

</head>
<body class="p-<?php echo $this->activePage?><?php echo ('admin' == $this->mode || isset($_SESSION['user']))?' mode-admin':'' ?><?php echo ('admin' == $this->mode && !isset($_SESSION['user']))?' hide-content':''; ?>" >


<!-- Primary Page Layout
================================================== -->

    <div id="main-content">

<?php include $this->tplPath.'/editor.tpl'; ?>
<?php include $this->tplPath.'/header.tpl'; ?>
<?php echo $maincontent; ?>
<?php include $this->tplPath.'/footer.tpl'; ?>

    </div>


<!-- End Document
================================================== -->


<!--[if IE]>
<script>
$('input, textarea').placeholder();
</script>
<![endif]-->


<?php include $this->tplPath.'/admin-js.tpl'; ?>
<?php echo $this->embededJS(); ?>

<div id="upload-preview" style="display:none;" ></div>

</body>
</html>