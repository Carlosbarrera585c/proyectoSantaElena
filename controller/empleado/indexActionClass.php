<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Empleado
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      $where = null;
      if (request::getInstance()->hasPost('filter')) {
        $filter = request::getInstance()->getPost('filter');
        //aqui validar datos
        if (isset($filter['Nombre']) and $filter['Nombre'] !== null and $filter['Nombre'] !== "") {
          $where[empleadoTableClass::NOM_EMPLEADO] = $filter['Nombre'];
        }
        if (isset($filter['Apellido']) and $filter['Apellido'] !== null and $filter['Apellido'] !== "") {
          $where[empleadoTableClass::APELL_EMPLEADO] = $filter['Apellido'];
        }
        if (isset($filter['NumIdentificacion']) and $filter['NumIdentificacion'] !== null and $filter['NumIdentificacion'] !== "") {
          $where[empleadoTableClass::NUMERO_IDENTIFICACION] = $filter['NumIdentificacion'];
        }
        if (isset($filter['Telefono']) and $filter['Telefono'] !== null and $filter['Telefono'] !== "") {
          $where[empleadoTableClass::TELEFONO] = $filter['Telefono'];
        }
        if (isset($filter['Direccion']) and $filter['Direccion'] !== null and $filter['Direccion'] !== "") {
          $where[empleadoTableClass::DIRECCION] = $filter['Direccion'];
        }
        if (isset($filter['Correo']) and $filter['Correo'] !== null and $filter['Correo'] !== "") {
          $where[empleadoTableClass::CORREO] = $filter['Correo'];
        
        }
      session::getInstance()->setAttribute('empleadoIndexFilters', $where);
      } else if(session::getInstance()->hasAttribute('empleadoIndexFilters')) {
        $where = session::getInstance()->getAttribute('empleadoIndexFilters');
      }
      $fields = array(
          empleadoTableClass::ID,
          empleadoTableClass::NOM_EMPLEADO,
          empleadoTableClass::APELL_EMPLEADO,
          empleadoTableClass::TELEFONO,
          empleadoTableClass::DIRECCION,
          empleadoTableClass::TIPO_ID_ID,
          empleadoTableClass::NUMERO_IDENTIFICACION,
          empleadoTableClass::CREDENCIAL_ID,
          empleadoTableClass::CORREO
      );
      $this->objEmpleado = empleadoTableClass::getAll($fields, false, null, null, null, null, $where);
      $this->defineView('index', 'empleado', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
    }
  }

}
