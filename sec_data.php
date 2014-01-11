<?php
header("Content-Type: text/html; charset=utf-8");

include 'conf/env_router.php';
$conf = Conf::getActive();


if (!(isset($_SERVER['HTTPS']) && 'on' == $_SERVER['HTTPS']) && !isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
  die("Diese Seite darf nur über https aufgerufen werden");
}

$dataReader = new SettingDataReader('users');

if (!isset($_SERVER['PHP_AUTH_USER'])) {
  header('WWW-Authenticate: Basic realm="Preview Mode"');
  header('HTTP/1.0 401 Unauthorized');
  echo 'Zugriff nur mit Passwort';
  exit;
} else {

  if (!$dataReader->getVal('users',$_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Preview Mode"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Zugriff nur mit Passwort';
    exit;
  }

  if ( $dataReader->getVal('users',$_SERVER['PHP_AUTH_USER']) !== sha1($_SERVER['PHP_AUTH_PW']) ){
    header('WWW-Authenticate: Basic realm="Preview Mode"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Zugriff nur mit Passwort';
    exit;
  }
}

$encrypted = $_GET['val'];

$decrypter = new UtilEncrypt();
echo $decrypter->decrypt($encrypted,$conf->crypt_pwd);







