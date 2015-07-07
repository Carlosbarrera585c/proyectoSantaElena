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
 * @author Carlos Alberto Barrera Montoya <cabarera22@misena.edu.co>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
          $where = null;
      if (request::getInstance()->hasPost('filter')) {
        $filter = request::getInstance()->getPost('filter');
//aqui validar datos
        if (isset($filter['Credencial']) and $filter['Credencial'] !== null and $filter['Credencial'] !== "") {
          $where[credencialTableClass::NOMBRE] = $filter['Credencial'];
        }
        if ((isset($filter['creado1']) and $filter['creado1'] !== null and $filter['creado1'] !== "") and ( isset($filter['creado2']) and $filter['creado2'] !== null and $filter['creado2'] !== "")) {
          $where[credencialTableClass::CREATED_AT] = array(
              date(config::getFormatTimestamp(), strtotime($filter['creado1'] . '00:00:00')),
              date(config::getFormatTimestamp(), strtotime($filter['creado2'] . '23:59:59'))
          );
        }
        if ((isset($filter['editado1']) and $filter['editado1'] !== null and $filter['editado1'] !== "") and ( isset($filter['editado2']) and $filter['editado2'] !== null and $filter['editado2'] !== "")) {
          $where[credencialTableClass::UPDATED_AT] = array(
              date(config::getFormatTimestamp(), strtotime($filter['editado1'] . '00:00:00')),
              date(config::getFormatTimestamp(), strtotime($filter['editado2'] . '23:59:59'))
          );
        }

        session::getInstance()->setAttribute('credencialIndexFilters', $where);
      } else if (session::getInstance()->hasAttribute('credencialIndexFilters')) {
        $where = session::getInstance()->getAttribute('credencialIndexFilters');
      }
          
            $fields = array(
                credencialTableClass::ID,
                credencialTableClass::NOMBRE,
                credencialTableClass::CREATED_AT
            );
            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }
            $this->cntPages = credencialTableClass:: getTotalPages(config::getRowGrid(), $where);
            $this->objCredencial = credencialTableClass::getAll($fields, true, null, null, config::getRowGrid(), $page, $where);
            $this->defineView('index', 'credencial', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
