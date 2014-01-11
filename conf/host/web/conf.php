<?php


$this->settings = array(

  // relevante pfade
  "page_root"     => "SimFi_CMS_Skeleton",
  "fw_root"       => "SimFi_CMS/",
  //"base_url"      => "http://127.0.0.1/workspace/SimFi_CMS_Skeleton/",
  //"ssl_base_url"  => "http://127.0.0.1/workspace/SimFi_CMS_Skeleton/",
  //"redirect_mobile" => "http://localhost/workspace/SimFi_CMS_Skeleton/",
  "img_path"      => "./theme/classic/images",
  "files_path"    => "./files/",

  // configuration des contents
  "title"         => "SimFi Example",
  'project_label' => "SimFi Example",
  "start_page"    => "home",

  "theme"         => "classic",
  "lang"          => "de",
  "langs"          => array('de','en'),

  "author"         => "Dominik Bonsch",
  "vendor"         => "Dominik Bonsch",

  // die session ID
  "session_id"    => "SIMFI_SID",

  //# google integration
  //"google_site_verification" => '',
  //"google_ua" => '',
  //"google_domain" => '',

  //# piwik tracker
  //"track_url"     => '',

  "admin_mail"    => "",
  "dev_mail"      => "",
  "def_mail_sender" => '',
  "watch_user"     => '',
  "watch_word"     => '',
  "watch_login"    => '',
  "crypt_pwd"    => '',

  // scripte und styles welche eingebunden werden sollen


  'scopes' => array(
    'cms' => array(
      "scripts" => array(
        "../SimFi_CMS/javascript/jquery/jquery-1.min.js",
        "../SimFi_CMS/javascript/bootstrap/bootstrap.min.js",
        "../SimFi_CMS/javascript/placeholder/placeholder.js",
      ),
      "styles" => array(
        "theme/fontawesome/css/font-awesome.min.css",
        'theme/classic/bootstrap.css',
        'theme/classic/style.css',
      ),
    ),
    'admin' => array(
      "scripts" => array(
        "../SimFi_CMS/javascript/jquery/jquery-1.min.js",
        "../SimFi_CMS/javascript/lightbox/js/jquery.lightbox-0.5.js",
        "../SimFi_CMS/javascript/placeholder/placeholder.js",
        "../SimFi_CMS/javascript/jcarousel/jquery.jcarousel.min.js",
        "../SimFi_CMS/javascript/dropzone/dropzone-amd-module.min.js",
        "../SimFi_CMS/javascript/tinymce/tinymce.min.js",
        "../SimFi_CMS/javascript/tinymce/jquery.tinymce.min.js",
        "../SimFi_CMS/javascript/notify/jNotify.jquery.min.js",
      ),
      "styles" => array(
        'theme/classic/style.css',
        'theme/classic/bootstrap.css',
        "../SimFi_CMS/css/fontawesome/css/font-awesome.min.css",
        "../SimFi_CMS/javascript/dropzone/css/dropzone.css"
      ),
    )
  ),

  // sonstige conf
  "viewport" => '', // "width=device-width, initial-scale=1, maximum-scale=1",

  "db" => array(
    'default' =>  array(
      'driver' => 'mysql',
      'host' => 'localhost',
      'port' => '3306',
      'name' => '',
      'user' => '',
      'pwd' => ''
    )
  ),


  // sitemap
  'sitemap' => array(
    'lastmod' => '2013-10-29T23:18:36+00:00',
    'cfreq' => 'weekly',
    'pages' => array(
      'de' => array(
        'home',
      ),
    ),
    'files' => array(
    )
  ),

);

$this->routes = array(
  'save_contact' => 'Contact'
);

$this->pageRoutes = array(
  'home' => 'home',
);
