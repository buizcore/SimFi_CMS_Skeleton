<?php

$dataReader = new SettingDataReader('users');

if (!isset($_SERVER['PHP_AUTH_USER'])) {
  header('WWW-Authenticate: Basic realm="Secure Area');
  header('HTTP/1.0 401 Unauthorized');
  echo 'Zugriff nur mit Passwort';
  exit;
} else {

  if (!$dataReader->getVal('users',$_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Secure Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Zugriff nur mit Passwort';
    exit;
  }

  if ( $dataReader->getVal('users',$_SERVER['PHP_AUTH_USER']) !== sha1($_SERVER['PHP_AUTH_PW']) ){
    header('WWW-Authenticate: Basic realm="Secure Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Zugriff nur mit Passwort';
    exit;
  }
}


echo __FILE__;

phpinfo();