<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * @author Gonzalo Andres Bejarano, Elcy Milena Guerrero, Andres Eduardo Bahamon 
 * @date: fecha de inicio del desarrollo.
 * @category: modulo de defautl.
 */
class insertActionClass extends controllerClass implements controllerActionInterface {

  /**
   * @author: Gonzalo Andres Bejarano, Elcy Milena Guerrero, Andres Eduardo Bahamon .
   * @date: fecha de inicio del desarrollo.
   * @return               
   * define la vista  y la accion en la variable $defineView
   */
  public function execute() {
    try {
     
      
//       $id = array(
//		   controlCalidadTableClass::ID => request::getInstance()->getRequest(controlCalidadTableClass::ID)
//        );
//        print_r($id); 
//         session::getInstance()->setAttribute('idControl', $id);
//    exit();
      $fields = array(
          controlCalidadTableClass::ID,
		  controlCalidadTableClass::EMPLEADO_ID,
		  controlCalidadTableClass::PROVEEDOR_ID,
		  controlCalidadTableClass::VARIEDAD,
		  controlCalidadTableClass::BRIX,
          controlCalidadTableClass::PH,
		  controlCalidadTableClass::AR,
		  controlCalidadTableClass::SACAROSA,
      );
      $orderBy = array(
          controlCalidadTableClass::ID
      );
       
	  
	   $fieldsProveedor = array(
                  proveedorTableClass::ID,
                  proveedorTableClass::RAZON_SOCIAL
            );
               $this->objProveedor = proveedorTableClass::getAll($fieldsProveedor,false);

      $this->objControlCalidad = controlCalidadTableClass::getAll($fields, false, $orderBy, 'ASC');
      $this->defineView('insert', 'reportes', session::getInstance()->getFormatOutput());
    } //cierre del try
    catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
    }//cierre del catch
  }

//cierre de la funcion execute
}

//cierre de la clase
