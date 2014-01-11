<?php
include 'conf/env_router.php';

$conf = Conf::getActive();

if (!isset($_SESSION['user_knows_pwd'])) {


  if($conf->preview_sec){
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
      header('WWW-Authenticate: Basic realm="Please enter the passcode. User: "'.$conf->watch_user);
      header('HTTP/1.0 401 Unauthorized');
      echo 'Zugriff nur mit Passwort';
      exit;
    } else {

      if ( $conf->watch_word !== $_SERVER['PHP_AUTH_PW'] ){
        header('WWW-Authenticate: Basic realm="Please enter the passcode. User: "'.$conf->watch_user);
        header('HTTP/1.0 401 Unauthorized');
        echo 'Zugriff nur mit Passwort';
        exit;
      } else {
        $_SESSION['user_knows_pwd'] = true;
      }

    }
  } else {

    header('Location: '.$conf->watch_login);
    exit();
  }

}

$filename = str_replace('../','./',$_GET['f']);

if (file_exists('./secure/'.$filename.'.pdf')) {

  header('Content-type: application/pdf');
  readfile('./secure/'.$filename.'.pdf');
} else {

  echo '<p>File not exists.</p>';
}




