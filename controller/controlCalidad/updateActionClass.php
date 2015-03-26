
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
 * @author Bayron Henao <bairon_henao_1995@hotmail.com>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $id = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::ID, true));
        $fecha = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::FECHA, true));
        $turno = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::TURNO, true));
        $brix = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::BRIX, true));
        $ph = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::PH, true));
        $ar = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::AR, true));
        $sacarosa = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::SACAROSA, true));
        $pureza = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::PUREZA, true));
        $empleado_id = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::EMPLEADO_ID, true));
        $proveedor_id = request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::PROVEEDOR_ID, true));
        if (strlen($fecha) > controlCalidadTableClass::FECHA_LENGTH) {
          throw new PDOException('La fecha No Puede Ser Mayor A: ' . controlCalidadTableClass::FECHA_LENGTH . ' Caracteres');
        }
        if (strlen($turno) > controlCalidadTableClass::TURNO_LENGHT) {
          throw new PDOException('El turno No Puede Ser Mayor A: ' . controlCalidadTableClass::TURNO_LENGHT . ' Caracteres');
        }
        if (strlen($brix) > controlCalidadTableClass::BRIX_LENGHT) {
          throw new PDOException('El Brix No Puede Ser Mayor A: ' . controlCalidadTableClass::BRIX_LENGHT . ' Caracteres');
        }
        if (strlen($ph) > controlCalidadTableClass::PH_LENGHT) {
          throw new PDOException('El PH No Puede Ser Mayor A: ' . controlCalidadTableClass::PH_LENGHT . ' Caracteres');
        }
        if (strlen($ar) > controlCalidadTableClass::AR_LENGHT) {
          throw new PDOException('El Ar No Puede Ser Mayor A: ' . controlCalidadTableClass::AR_LENGHT . ' Caracteres');
        }
        if (strlen($sacarosa) > controlCalidadTableClass::SACAROSA_LENGHT) {
          throw new PDOException('La Sacarosa No Puede Ser Mayor A: ' . controlCalidadTableClass::SACAROSA_LENGHT . ' Caracteres');
        }
        if (strlen($pureza) > controlCalidadTableClass::PUREZA_LENGHT) {
          throw new PDOException('La Pureza No Puede Ser Mayor A: ' . controlCalidadTableClass::PUREZA_LENGHT . ' Caracteres');
        }
        $ids = array(
            controlCalidadTableClass::ID => $id
        );

        $data = array(
            controlCalidadTableClass::ID => $id,
            controlCalidadTableClass::FECHA => $fecha,
            controlCalidadTableClass::TURNO => $turno,
            controlCalidadTableClass::BRIX => $brix,
            controlCalidadTableClass::PH => $ph,
            controlCalidadTableClass::AR => $ar,
            controlCalidadTableClass::SACAROSA => $sacarosa,
            controlCalidadTableClass::PUREZA => $pureza,
            controlCalidadTableClass::EMPLEADO_ID => $empleado_id,
            controlCalidadTableClass::PROVEEDOR_ID => $proveedor_id
        );

        controlCalidadTableClass::update($ids, $data);
      }
      session::getInstance()->setSuccess(i18n::__('successfulUpdate'));
      routing::getInstance()->redirect('controlCalidad', 'index');
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
    }
  }

}
