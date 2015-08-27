<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\session\sessionClass as session;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;



/**
 * Description of Empleado
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
         $this->defineView('index', 'grafica', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }
}