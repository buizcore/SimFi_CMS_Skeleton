<?php

include 'conf/env_router.php';
$conf = Conf::getActive();

/*

  if($conf->preview_sec){
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
      header('WWW-Authenticate: Basic realm="Preview Mode"');
      header('HTTP/1.0 401 Unauthorized');
      echo 'Zugriff nur mit Passwort';
      exit;
    } else {

      if (!isset($conf->preview_sec[$_SERVER['PHP_AUTH_USER']])) {
        header('WWW-Authenticate: Basic realm="Preview Mode"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Zugriff nur mit Passwort';
        exit;
      }

      if ( $conf->preview_sec[$_SERVER['PHP_AUTH_USER']] !== $_SERVER['PHP_AUTH_PW'] ){
        header('WWW-Authenticate: Basic realm="Preview Mode"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Zugriff nur mit Passwort';
        exit;
      }
    }
  }
*/

$page = $request->param( 'page', Validator::FOLDERNAME );

$request->ajax = true;

if (isset($conf->routes[$page])) {
  $request->service = $conf->routes[$page];
}

$conClass = $request->service.'_Controller';

if( SimFi::classLoadable( $conClass ) ) {

  $controller = new $conClass();
  /* @var $controller MvcController   */
  $controller->setRequest( $request );
  $controller->setConsole( $console );

  try {
    $controller->execute( $request->action );
  } catch( SimFiException $exc ) {
    $console->error( $exc->getMessage() );
  }

} else {

  $controller = new Error_Controller();
  /* @var $controller MvcController   */
  $controller->setRequest( $request );
  $controller->setConsole( $console );

  try {
    $controller->missingService( $request->service );
  } catch( SimFiException $exc ) {
    $console->error( $exc->getMessage() );
  }
}


$console->publish();




