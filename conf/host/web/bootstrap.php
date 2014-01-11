<?php

define( 'NL', "\n" );

if( 'cli' == php_sapi_name() )
  define( 'IS_CLI', true );
else
  define( 'IS_CLI', false );


date_default_timezone_set("Europe/Berlin");



// wo liegt das framework
define( 'SIMFI_CODE_PATH', realpath( dirname(__FILE__).'/../../../' ).'/' );

// wo liegt der content
define( 'SIMFI_CONTENT_PATH', realpath( dirname(__FILE__).'/../../../' ).'/' );

// root pfad der SimFi Installation
define( 'PATH_ROOT', realpath( SIMFI_CONTENT_PATH.'../' ).'/' );

// der pfad für temporäre dateien
define( 'TMP_PATH', SIMFI_CONTENT_PATH.'tmp/' );

// web root af welcher der Browser zugreift
define( 'WEB_ROOT', '../../' );


// wo liegt die conf
define( 'CONF_PATH', SIMFI_CONTENT_PATH );

include SIMFI_CODE_PATH.'src/Conf.php';



include SIMFI_CODE_PATH.'src/SimFi.php';

Conf::init();
spl_autoload_register( 'SimFi::pathAutoload' );

include SIMFI_CODE_PATH.'src/ui/UiConsoleHttp.php';
$console = new UiConsoleHttp();
UiConsole::setActive( $console );
Console::setActive( $console );

$console = UiConsole::getActive();
$request = Request::parseRequest(  );

include SIMFI_CODE_PATH.'src/I18n.php';
I18n::loadLang( 'de' );

if (SimFi::$conf->session_id) {
  session_name(SimFi::$conf->session_id);
  session_start();
}