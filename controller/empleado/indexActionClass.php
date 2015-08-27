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
      if (request::getInstance()->hasPost('filter') and request::getInstance()->isMethod('POST')) {
        $filter = request::getInstance()->getPost('filter');
        $nomEmpleado = $filter['Nombre'];
        $apellEmpleado = $filter['Apellido'];
        $telefono = $filter['Telefono'];
        $direccion = $filter['Direccion'];
        $numeroIdentificacion = $filter['NumIdentificacion'];
        $correo = $filter['Correo'];
        if (isset($filter['Nombre']) and $filter['Nombre'] !== null and $filter['Nombre'] !== "") {
          $where[empleadoTableClass::NOM_EMPLEADO] = $filter['Nombre'];
        }
        if (isset($filter['Apellido']) and $filter['Apellido'] !== null and $filter['Apellido'] !== "") {
          $where[empleadoTableClass::APELL_EMPLEADO] = $filter['Apellido'];
        }
        if (isset($filter['Telefono']) and $filter['Telefono'] !== null and $filter['Telefono'] !== "") {
          $where[empleadoTableClass::TELEFONO] = $filter['Telefono'];
        }
        if (isset($filter['Direccion']) and $filter['Direccion'] !== null and $filter['Direccion'] !== "") {
          $where[empleadoTableClass::DIRECCION] = $filter['Direccion'];
        }
        if (isset($filter['NumIdentificacion']) and $filter['NumIdentificacion'] !== null and $filter['NumIdentificacion'] !== "") {
          $where[empleadoTableClass::NUMERO_IDENTIFICACION] = $filter['NumIdentificacion'];
        }
        if (isset($filter['Correo']) and $filter['Correo'] !== null and $filter['Correo'] !== "") {
          $where[empleadoTableClass::CORREO] = $filter['Correo'];
        }
        //aqui validar datos
//                $this->Validate($nomEmpleado, $apellEmpleado, $telefono, $direccion, $numeroIdentificacion, $correo);
        session::getInstance()->setAttribute('empleadoIndexFilters', $where);
      } else if (session::getInstance()->hasAttribute('empleadoIndexFilters')) {
        $where = session::getInstance()->getAttribute('empleadoIndexFilters');
      }
      $orderBy = array(
          empleadoTableClass::ID
      );
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
      $page = 0;
      if (request::getInstance()->hasGet('page')) {
        $this->page = request::getInstance()->getGet('page');
        $page = request::getInstance()->getGet('page') - 1;
        $page = $page * config::getRowGrid();
      }
      $this->cntPages = empleadoTableClass::getTotalPages(config::getRowGrid(), $where);
      $this->objEmpleado = empleadoTableClass::getAll($fields, false, $orderBy, 'ASC', config::getRowGrid(), $page, $where);
      session::getInstance()->deleteAttribute('empleadoIndexFilters');
      $this->defineView('index', 'empleado', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

//
//    private function Validate($nomEmpleado, $apellEmpleado, $telefono, $direccion, $numeroIdentificacion, $correo) {
//        $bandera = FALSE;
//        if (strlen($nomEmpleado) > empleadoTableClass::NOM_EMPLEADO_LENGTH) {
//            session::getInstance()->setError(i18n::__('errorLengthEmployee', NULL, 'default', array('%nombre%' => $nomEmpleado, '%caracteres%' => empleadoTableClass::NOM_EMPLEADO_LENGTH)), 'errorNombre');
//            $bandera = true;
//            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::NOM_EMPLEADO, true), true);
//        } elseif (!preg_match('/^[a-zA-Z ]*$/', $nomEmpleado)) {
//            session::getInstance()->setError(i18n::__('errorText', NULL, 'default', array('%texto%' => $nomEmpleado)), 'errorNombre');
//            $bandera = true;
//            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::NOM_EMPLEADO, true), true);
//        }
//        if (strlen($apellEmpleado) > empleadoTableClass::APELL_EMPLEADO_LENGTH) {
//            session::getInstance()->setError(i18n::__('errorLengthLastEmployee', NULL, 'default', array('%apellido%' => $apellEmpleado, '%caracteres%' => empleadoTableClass::APELL_EMPLEADO_LENGTH)), 'errorApellido');
//            $bandera = true;
//            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::APELL_EMPLEADO, true), true);
//        } elseif (!preg_match('/^[a-zA-Z ]*$/', $apellEmpleado)) {
//            session::getInstance()->setError(i18n::__('errorText', NULL, 'default', array('%texto%' => $apellEmpleado)), 'errorApellido');
//            $bandera = true;
//            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::APELL_EMPLEADO, true), true);
//        }
//        if ($telefono > empleadoTableClass::TELEFONO) {
//            session::getInstance()->setError(i18n::__('errorLengthPhone', NULL, 'default', array('%telefono%' => $telefono, '%caracteres%' => empleadoTableClass::TELEFONO_LENGTH)), 'errorTelefono');
//            $bandera = true;
//            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true), true);
//        } elseif (!is_numeric($telefono)) {
//            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorTelefono');
//            $bandera = true;
//            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true), true);
//        }
//        if (strlen($direccion) > empleadoTableClass::DIRECCION_LENGTH) {
//            session::getInstance()->setError(i18n::__('errorLengthDirection', NULL, 'default', array('%direccion%' => $direccion, '%caracteres%' => empleadoTableClass::DIRECCION_LENGTH)), 'errorDireccion');
//            $bandera = true;
//            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::DIRECCION, true), true);
//        }
//        if (strlen($numeroIdentificacion) > empleadoTableClass::NUMERO_IDENTIFICACION_LENGTH) {
//            session::getInstance()->setError(i18n::__('errorLengthNumIdentification', NULL, 'default', array('%numIdentification%' => $numeroIdentificacion, '%caracteres%' => empleadoTableClass::NUMERO_IDENTIFICACION_LENGTH)), 'errorNumeroIdentificacion');
//            $bandera = true;
//            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::NUMERO_IDENTIFICACION, true), true);
//        } elseif (!is_numeric($numeroIdentificacion)) {
//            session::getInstance()->setError(i18n::__('errorNumeric', NULL, 'default'), 'errorNumeroIdentificacion');
//            $bandera = true;
//            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::NUMERO_IDENTIFICACION, true), true);
//        }
//        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
//            session::getInstance()->setError(i18n::__('errorMailCharacters', NULL, 'default'), 'errorCorreo');
//            $bandera = true;
//            session::getInstance()->setFlash(empleadoTableClass::getNameField(empleadoTableClass::CORREO, true), true);
//        }
//
//        if ($bandera === true) {
//            request::getInstance()->setMethod('GET');
//            session::getInstance()->setFlash('modalFilter', true);
//            routing::getInstance()->forward('empleado', 'index');
//        }
//    }
}
