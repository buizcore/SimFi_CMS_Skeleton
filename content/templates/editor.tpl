<!--  editor -->
<?php if('admin' == $this->mode && !isset($_SESSION['user'])){ ?>

  <div id="bc-admin-editor">
    <div class="controls" >
      <form method="post" action="<?php echo $this->cmsLink($this->activePage) ?>/login" >
        <input name="user" type="text" placeholder="Benutzername" style="margin-right:4px;" />
        <input name="password" type="password" placeholder="Passwort" />
        <button>anmelden</button>
      </form>
    </div>
  </div>
  <div id="hide-content" >&nbsp;</div>

<?php } else if( isset($_SESSION['user']) ){ ?>

  <div id="bc-admin-editor">
    <div class="controls loggedin" >
      <div class="menu left" >
        <i class="fa fa-bars" ></i>
      </div>

      <?php echo $this->adminControls ?>

      <?php if($this->editAble){ ?>
      <div class="block" ><button id="save-page">Änderungen speichern</button></div>
      <?php } ?>
      <div class="logout right" ><a lass="link" href="./logout" >abmelden <i class="fa fa-times-circle" ></i></a></div>
    </div>
  </div>
<?php } ?>


<!--  end -->