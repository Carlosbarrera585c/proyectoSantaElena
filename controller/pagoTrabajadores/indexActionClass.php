<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of Pago Trabajadores
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {

            $where = null;
            if (request::getInstance()->hasPost('filter') and request::getInstance()->isMethod('POST')) {
                $filter = request::getInstance()->getPost('filter');
                $fecha = $filter['Fecha'];
                $periodoInicio = $filter['PeriodoInicio'];
                $periodoFin = $filter['PeriodoFin'];
                $valor = $filter['Valor'];

                //aqui validar datos
                $this->Validate($fecha, $periodoInicio, $periodoFin, $valor);
                session::getInstance()->setAttribute('pagoTrabajadoresIndexFilters', $where);
            } else if (session::getInstance()->hasAttribute('pagoTrabajadoresIndexFilters')) {
                $where = session::getInstance()->getAttribute('pagoTrabajadoresIndexFilters');
            }
            $orderBy = array(
                pagoTrabajadoresTableClass::ID
            );
            $fields = array(
                pagoTrabajadoresTableClass::ID,
                pagoTrabajadoresTableClass::FECHA,
                pagoTrabajadoresTableClass::PERIODO_INICIO,
                pagoTrabajadoresTableClass::PERIODO_FIN,
                pagoTrabajadoresTableClass::TIPO_PAGO_ID,
                pagoTrabajadoresTableClass::VALOR
            );
            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }
            $this->cntPages = pagoTrabajadoresTableClass::getTotalPages(config::getRowGrid(), $where);
            $this->objPagoTrabajadores = pagoTrabajadoresTableClass::getAll($fields, false, $orderBy, 'ASC', config::getRowGrid(), $page, $where);
            session::getInstance()->deleteAttribute('pagoTrabajadoresIndexFilters');
            $this->defineView('index', 'pagoTrabajadores', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

    private function Validate($fecha, $periodoInicio, $periodoFin, $valor) {
        $bandera = FALSE;
        if ($periodoInicio === '') {
            session::getInstance()->setError(i18n::__('errorNull', NULL, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_INICIO, true), true);
        }
        if ($periodoFin === '') {
            session::getInstance()->setError(i18n::__('errorNull', Null, 'default'));
            $bandera = true;
            session::getInstance()->setFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_FIN, true), true);
        }
        if ($bandera === true) {
            request::getInstance()->setMethod('GET');
            session::getInstance()->setFlash('modalFilter', true);
            routing::getInstance()->forward('pagoTrabajadores', 'index');
        }
    }

}
