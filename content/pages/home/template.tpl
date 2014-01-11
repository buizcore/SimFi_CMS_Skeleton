
<section id="page-content" class="container"  >

<?php echo $this->text('page.hello') ?> <?php echo $this->text('page.world') ?><br />

<a href="<?php echo $this->cmsLink('home') ?>" >Link auf Home route: home</a><br />
<a href="<?php echo $this->cmsLink('start') ?>" >Link auf Home route: start (geht nur in der deutschen version)</a><br />
<a href="<?php echo $this->cmsLink('start',true) ?>" >Link auf eine Https geschützte Seite: home</a><br />
<a href="<?php echo $this->cmsLink('home',null,'en') ?>" >Link auf die Englische Version: home</a><br />
<a href="<?php echo $this->cmsLink('home',null,'de') ?>" >Link auf die Deutsch Version: home</a><br />
siehe: /SimFi_CMS_Skeleton/content/links/de.php

</section>