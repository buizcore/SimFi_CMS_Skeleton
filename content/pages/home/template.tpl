
<section id="page-content" class="container"  >

Hallo welt

<a href="<?php echo $this->cmsLink('home') ?>" >Link auf Home route: home</a><br />
<a href="<?php echo $this->cmsLink('start') ?>" >Link auf Home route: start</a><br />
<a href="<?php echo $this->cmsLink('start',true) ?>" >Link auf eine Https geschützte Seite: home</a><br />
<a href="<?php echo $this->cmsLink('home',null,'en') ?>" >Link auf die Englische Version: home</a><br />
siehe: /SimFi_CMS_Skeleton/content/links/de.php

</section>