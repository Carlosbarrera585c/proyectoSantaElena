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
                if ((isset($filter['fechaFB1']) and $filter['fechaFB1'] !== null and $filter['fechaFB1'] !== "") and ( isset($filter['fechaFB2']) and $filter['fechaFB2'] !== null and $filter['fechaFB2'] !== "")) {
                    $where[detalleEntradaTableClass::FECHA_FABRICACION] = array(
                        date(config::getFormatTimestamp(), strtotime($filter['fechaFB1'] . '00:00:00')),
                        date(config::getFormatTimestamp(), strtotime($filter['fechaFB2'] . '23:59:59'))
                    );
                }

                if ((isset($filter['fechaVC1']) and $filter['fechaVC1'] !== null and $filter['fechaVC1'] !== "") and ( isset($filter['fechaVC2']) and $filter['fechaVC2'] !== null and $filter['fechaVC2'] !== "")) {
                    $where[detalleEntradaTableClass::FECHA_VENCIMIENTO] = array(
                        date(config::getFormatTimestamp(), strtotime($filter['fechaVC1'] . '00:00:00')),
                        date(config::getFormatTimestamp(), strtotime($filter['fechaVC2'] . '23:59:59'))
                    );
                }
                if (isset($filter['cantidad']) and $filter['cantidad'] !== null and $filter['cantidad'] !== "") {
                    $where[detalleEntradaTableClass::CANTIDAD] = $filter['cantidad'];
                }

                if (isset($filter['valor']) and $filter['valor'] !== null and $filter['valor'] !== "") {
                    $where[detalleEntradaTableClass::VALOR] = $filter['valor'];
                }
            } else if (session::getInstance()->hasAttribute('detalleEntradaIndexFilters')) {
                $where = session::getInstance()->getAttribute('detalleEntradaIndexFilters');
            }

            $fields = array(
                detalleEntradaTableClass::ID,
                detalleEntradaTableClass::CANTIDAD,
                detalleEntradaTableClass::VALOR,
                detalleEntradaTableClass::FECHA_FABRICACION,
                detalleEntradaTableClass::FECHA_VENCIMIENTO,
                detalleEntradaTableClass::ID_DOC,
                detalleEntradaTableClass::ENTRADA_BODEGA_ID,
                detalleEntradaTableClass::INSUMO_ID
            );

            $fieldsDoc = array(
                tipoDocTableClass::ID,
                tipoDocTableClass::DESC_TIPO_DOC
            );

            $fieldsEntrada = array(
                entradaBodegaTableClass::ID,
                entradaBodegaTableClass::FECHA
            );

            $fieldsInsumo = array(
                insumoTableClass::ID,
                insumoTableClass::DESC_INSUMO
            );

            $page = 0;

            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }
            $this->cntPages = detalleEntradaTableClass:: getTotalPages(config::getRowGrid(), $where);


            $this->objTipoDoc = tipoDocTableClass::getAll($fieldsDoc, false);
            $this->objEntradaBodega = entradaBodegaTableClass::getAll($fieldsEntrada);
            $this->objInsu = insumoTableClass::getAll($fieldsInsumo);

            $this->objDetalleEntrada = detalleEntradaTableClass::getAll($fields, false, null, null, config::getRowGrid(), $page, $where);
            $this->defineView('index', 'detalleEntrada', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
