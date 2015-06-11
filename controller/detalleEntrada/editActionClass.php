
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
class editActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->hasRequest(detalleEntradaTableClass::ID)) {
                $fields = array(
                    detalleEntradaTableClass::ID,
                    detalleEntradaTableClass::CANTIDAD,
                    detalleEntradaTableClass::VALOR,
                    detalleEntradaTableClass::FECHA_FABRICACION,
                    detalleEntradaTableClass::FECHA_VENCIMIENTO,
                    detalleEntradaTableClass::ID_DOC,
                    detalleEntradaTableClass::ENTRADA_BODEGA_ID,
                    detalleEntradaTableClass::INSUMO_ID,
                );
                $where = array(
                    detalleEntradaTableClass::ID => request::getInstance()->getRequest(detalleEntradaTableClass::ID)
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

            $this->objTipoDoc = tipoDocTableClass::getAll($fieldsDoc,false);
            $this->objEntradaBodega = entradaBodegaTableClass::getAll($fieldsEntrada);
            $this->objInsu = insumoTableClass::getAll($fieldsInsumo);

                $this->objDetalleEntrada = detalleEntradaTableClass::getAll($fields, NULL, NULL, NULL, NULL, NULL, $where);
                $this->defineView('edit', 'detalleEntrada', session::getInstance()->getFormatOutput());
            } else {
                routing::getInstance()->redirect('entradaBodega', 'index');
            }

//            if (request::getInstance()->isMethod('POST')) {
//
//                $cedula = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CEDULA, true));
//                $nombre = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE, true));
//                $apellido = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO, true));
//                $usuario_id = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::USUARIO_ID, true));
//
//                if (strlen($cedula) > datoUsuarioTableClass::CEDULA_LENGTH) {
//                    throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => datoUsuarioTableClass::CEDULA_LENGTH)), 00001);
//                }
//                if (strlen($nombre) > datoUsuarioTableClass::NOMBRE_LENGTH) {
//                    throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => datoUsuarioTableClass::NOMBRE_LENGTH)), 00001);
//                }
//                if (strlen($apellido) > datoUsuarioTableClass::APELLIDO_LENGTH) {
//                    throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => datoUsuarioTableClass::APELLIDO_LENGTH)), 00001);
//                }
//
//
//                $data = array(
//                    datoUsuarioTableClass::CEDULA => $cedula,
//                    datoUsuarioTableClass::NOMBRE => $nombre,
//                    datoUsuarioTableClass::APELLIDO => $apellido,
//                    datoUsuarioTableClass::USUARIO_ID => $usuario_id
//                );
//                datoUsuarioTableClass::insert($data);
//                routing::getInstance()->redirect('datoUsuario', 'index');
//            } else {
//                routing::getInstance()->redirect('datoUsuario', 'index');
//            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
