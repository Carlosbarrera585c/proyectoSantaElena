<?php

$GLOBALS['timeIni'] = microtime(true);
session_name('mvcSite');
session_start();
ob_start();

if (is_file('../config/config.php') !== true) {
  include_once '../installer/installerClass.php';
  $installer = new installerClass();
  $installer->install();
} else {
  include_once __DIR__ . '/../libs/vendor/autoLoadClass.php';
  mvc\autoload\autoLoadClass::getInstance()->autoLoad();
  mvc\dispatch\dispatchClass::getInstance()->main();
}