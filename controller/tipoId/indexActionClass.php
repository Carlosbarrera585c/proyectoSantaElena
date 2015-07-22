<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Tipo Identificación
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
                if (isset($filter['Desc']) and $filter['Desc'] !== null and $filter['Desc'] !== "") {
                    $where[tipoIdTableClass::DESC_TIPO_ID] = $filter['Desc'];
                }
                session::getInstance()->setAttribute('tipoIdIndexFilters', $where);
            } else if (session::getInstance()->hasAttribute('tipoIdIndexFilters')) {
                $where = session::getInstance()->getAttribute('tipoIdIndexFilters');
            }
            $fields = array(
                tipoIdTableClass::ID,
                tipoIdTableClass::DESC_TIPO_ID
            );
            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }
            $this->cntPages = tipoIdTableClass::getTotalPages(config::getRowGrid(), $where);
            $this->objTipoId = tipoIdTableClass::getAll($fields, false, null, null, config::getRowGrid(), $page, $where);
            $this->defineView('index', 'tipoId', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
