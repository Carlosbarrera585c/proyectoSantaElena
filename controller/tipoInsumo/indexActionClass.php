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
class indexActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            $where = NULL;
            if (request::getInstance()->hasPost('filter')) {
                $filter = request::getInstance()->getPost('filter');
                 if (isset($filter['Descripcion']) and $filter['Descripcion'] !== null and $filter['Descripcion'] !== "") {
                    $where[tipoInsumoTableClass::DESC_TIPO_INSUMO] = $filter['Descripcion'];
                }
        
                session::getInstance()->setAttribute('tipoInsumoIndexFilters', $where);
            } else if (session::getInstance()->hasAttribute('tipoInsumoIndexFilters')) {
                $where = session::getInstance()->getAttribute('tipoInsumoIndexFilters');
            }
            
            
            $fields = array(
                tipoInsumoTableClass::ID,
                tipoInsumoTableClass::DESC_TIPO_INSUMO
            );
            
            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }
            $this->cntPages = tipoInsumoTableClass::getTotalPages(config::getRowGrid(), $where);
            $this->objTipoInsumo = tipoInsumoTableClass::getAll($fields, FALSE, null, null, config::getRowGrid(), $page, $where);
            $this->defineView('index', 'tipoInsumo', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
