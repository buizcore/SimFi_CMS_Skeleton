<?php

if( file_exists( './conf/host/'.$_SERVER['SERVER_NAME'].'/bootstrap.php' ) )
    include './conf/host/'.$_SERVER['SERVER_NAME'].'/bootstrap.php';
else
    include './conf/host/web/bootstrap.php';