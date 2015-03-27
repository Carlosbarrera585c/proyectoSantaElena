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
 * @author yefri alexander <yefri-1994@hotmail.com>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {

            $where = NULL;
            if (request::getInstance()->hasPost('filter')) {
                $filter = request::getInstance()->getPost('filter');
                if (isset($filter['Descripcion']) and $filter['Descripcion'] !== null and $filter['Descripcion'] !== "") {
                    $where[insumoTableClass::DESC_INSUMO] = $filter['Descripcion'];
                } if (isset($filter['Precio']) and $filter['Precio'] !== null and $filter['Precio'] !== "") {
                    $where[insumoTableClass::PRECIO] = $filter['Precio'];
                }
                session::getInstance()->setAttribute('insumoIndexFilters', $where);
            } else if (session::getInstance()->hasAttribute('insumoIndexFilters')) {
                $where = session::getInstance()->getAttribute('insumoIndexFilters');
            }

            $fields = array(
                insumoTableClass::ID,
                insumoTableClass::DESC_INSUMO,
                insumoTableClass::PRECIO,
                insumoTableClass::TIPO_INSUMO_ID
            );

            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }
            $this->cntPages = insumoTableClass::getTotalPages(config::getRowGrid(), $where);
            $this->objInsu = insumoTableClass::getAll($fields, FALSE, null, null, config::getRowGrid(), $page, $where);
            $this->defineView('index', 'insumo', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
