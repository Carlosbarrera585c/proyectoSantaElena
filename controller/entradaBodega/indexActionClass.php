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

            $where = null;
            if (request::getInstance()->hasPost('filter')) {
                $filter = request::getInstance()->getPost('filter');
//aqui validar datos
                if ((isset($filter['fecha1']) and $filter['fecha1'] !== null and $filter['fecha1'] !== "") and ( isset($filter['fecha2']) and $filter['fecha2'] !== null and $filter['fecha2'] !== "")) {
                    $where[entradaBodegaTableClass::FECHA] = array(
                        date(config::getFormatTimestamp(), strtotime($filter['fecha1'] . '00:00:00')),
                        date(config::getFormatTimestamp(), strtotime($filter['fecha2'] . '23:59:59'))
                    );
                }
            } else if (session::getInstance()->hasAttribute('entradaBodegaIndexFilters')) {
                $where = session::getInstance()->getAttribute('entradaBodegaIndexFilters');
            }
            $fields = array(
                entradaBodegaTableClass::ID,
                entradaBodegaTableClass::FECHA,
                entradaBodegaTableClass::PROVEEDOR_ID
            );
            $orderBy = array(
                entradaBodegaTableClass::ID
            );

            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }
            $this->cntPages = entradaBodegaTableClass:: getTotalPages(config::getRowGrid(), $where);
            $this->objEntradaBodega = entradaBodegaTableClass::getAll($fields, false, $orderBy, 'ASC', config::getRowGrid(), $page, $where);

            $this->defineView('index', 'entradaBodega', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
