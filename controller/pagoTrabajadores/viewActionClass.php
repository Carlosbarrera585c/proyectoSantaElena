<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 *  @author Cristian Ramirez <cristianRamirezXD@outlook.es>
 */
class viewActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      $fields = array(
          pagoTrabajadoresTableClass::ID,
          pagoTrabajadoresTableClass::FECHA,
          pagoTrabajadoresTableClass::PERIODO_INICIO,
          pagoTrabajadoresTableClass::PERIODO_FIN,
          pagoTrabajadoresTableClass::EMPRESA_ID
      );
      $orderBy = array(
          pagoTrabajadoresTableClass::FECHA,
    );
    $where = array (
    pagoTrabajadoresTableClass::ID => request::getInstance()->getRequest(pagoTrabajadoresTableClass::ID)
    );
      $this->objPagoTrabajadores = pagoTrabajadoresTableClass::getAll($fields, false, $orderBy, 'ASC', null, null, $where);
      $this->defineView('view', 'pagoTrabajadores', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}
