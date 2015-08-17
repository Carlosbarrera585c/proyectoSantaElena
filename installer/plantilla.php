<?php
$config = "<?php
use mvc\config\configClass as config;
use mvc\session\sessionClass as session;
config::setRowGrid($RowGrid);
config::setDbHost('$host');
config::setDbDriver('$driver'); // mysql
config::setDbName('$dbName');
config::setDbPort($port); // 5432
config::setDbUser('$dbUser');
config::setDbPassword('$dbPass');
// Esto solo es necesario en caso de necesitar un socket para la DB
config::setDbUnixSocket(null);
if (config::getDbUnixSocket() !== null) {
  config::setDbDsn(
          config::getDbDriver()
          . ':unix_socket=' . config::getDbUnixSocket()
          . ';dbname=' . config::getDbName()
  );
} else {
  config::setDbDsn(
          config::getDbDriver()
          . ':host=' . config::getDbHost()
          . ';port=' . config::getDbPort()
          . ';dbname=' . config::getDbName()
  );
}
config::setPathAbsolute('$PathAbsolute/');
config::setUrlBase('http://$UrlBase/');
config::setScope('$Scope'); // dev
if (session::getInstance()->hasDefaultCulture() === false) {
  config::setDefaultCulture('$idioma');
} else {
  config::setDefaultCulture(session::getInstance()->getDefaultCulture());
}
config::setIndexFile('index.php');
config::setFormatTimestamp('$FormatTimestamp');
config::setHeaderJson('Content-Type: application/json; charset=utf-8');
config::setHeaderXml('Content-Type: application/xml; charset=utf-8');
config::setHeaderHtml('Content-Type: text/html; charset=utf-8');
config::setHeaderPdf('Content-type: application/pdf; charset=utf-8');
config::setHeaderJavascript('Content-Type: text/javascript; charset=utf-8');
config::setHeaderExcel2003('Content-Type: application/vnd.ms-excel; charset=utf-8');
config::setHeaderExcel2007('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8');
config::setCookieNameRememberMe('mvcSiteRememberMe');
config::setCookieNameSite('mvcSite');
config::setCookiePath('/$cookiePath/web/' . config::getIndexFile());
config::setCookieDomain('http://$UrlBase/');
config::setCookieTime(3600 * 8); // una hora en segundo 3600 y por 8 serÃ­an 8 horas
config::setDefaultModule('usuario');
config::setDefaultAction('index');
config::setDefaultModuleSecurity('shfSecurity');
config::setDefaultActionSecurity('index');
config::setDefaultModulePermission('shfSecurity');
config::setDefaultActionPermission('noPermission');";