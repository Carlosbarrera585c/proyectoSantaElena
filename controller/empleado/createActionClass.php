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
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $nom_empleado = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::NOM_EMPLEADO, true));
        $apell_empleado = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::APELL_EMPLEADO, true));
        $telefono = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true));
        $direccion = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::DIRECCION, true));
        $tipo_id = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::TIPO_ID_ID, true));
        $numero_identificacion = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::NUMERO_IDENTIFICACION, true));
        $credencial_id = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::CREDENCIAL_ID, true));
        $correo = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::CORREO, true));

        if (strlen($nom_empleado) > empleadoTableClass::NOM_EMPLEADO_LENGTH) {
          throw new PDOException('El Nombre No Puede Ser Mayor A: ' . empleadoTableClass::NOM_EMPLEADO_LENGTH . ' Caracteres');
        }
        if (strlen($apell_empleado) > empleadoTableClass::APELL_EMPLEADO_LENGTH) {
          throw new PDOException('El Apellido No Puede Ser Mayor A: ' . empleadoTableClass::APELL_EMPLEADO_LENGTH . ' Caracteres');
        }
        if (strlen($telefono) > empleadoTableClass::TELEFONO_LENGTH) {
          throw new PDOException('El Telefono No Puede Ser Mayor A: ' . empleadoTableClass::TELEFONO_LENGTH . ' Caracteres');
        }
        if (strlen($direccion) > empleadoTableClass::DIRECCION_LENGTH) {
          throw new PDOException('La Direccion No Puede Ser Mayor A: ' . empleadoTableClass::DIRECCION_LENGTH . ' Caracteres');
        }
        if (strlen($tipo_id) > empleadoTableClass::TIPO_ID_ID_LENGTH) {
          throw new PDOException('El Tipo de Identificacion No Puede Ser Mayor A: ' . empleadoTableClass::TIPO_ID_ID_LENGTH . ' Caracteres');
        }
        if (strlen($numero_identificacion) > empleadoTableClass::NUMERO_IDENTIFICACION_LENGTH) {
          throw new PDOException('El Numero De Identificación No Puede Ser Mayor A: ' . empleadoTableClass::NUMERO_IDENTIFICACIONEMPLEADO_LENGTH . ' Caracteres');
        }
        if (strlen($credencial_id) > empleadoTableClass::CREDENCIAL_ID_LENGTH) {
          throw new PDOException('La Credencial No Puede Ser Mayor A: ' . empleadoTableClass::CREDENCIAL_ID_LENGTH . ' Caracteres');
        }
        if (strlen($correo) > empleadoTableClass::CORREO_LENGTH) {
          throw new PDOException('El Correo No Puede Ser Mayor A: ' . empleadoTableClass::CORREO_LENGTH . ' Caracteres');
        }
//        if (!preg_match('{^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$}', $correo)) {
//          throw new PDOException('Correo Invalido');
//        }
//        if (preg_match('{^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$}', $correo)) {
//          throw new PDOException('Correo Valido');
//        }
        $data = array(
            empleadoTableClass::NOM_EMPLEADO => $nom_empleado,
            empleadoTableClass::APELL_EMPLEADO => $apell_empleado,
            empleadoTableClass::TELEFONO => $telefono,
            empleadoTableClass::DIRECCION => $direccion,
            empleadoTableClass::TIPO_ID_ID => $tipo_id,
            empleadoTableClass::NUMERO_IDENTIFICACION => $numero_identificacion,
            empleadoTableClass::CREDENCIAL_ID => $credencial_id,
            empleadoTableClass::CORREO => $correo
        );
        empleadoTableClass::insert($data);
        session::getInstance()->setSuccess(i18n::__('successfulRegister'));
        routing::getInstance()->redirect('empleado', 'insert');
      } else {
        routing::getInstance()->redirect('empleado', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc',$exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
