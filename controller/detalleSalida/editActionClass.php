
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
* @author Cristian Ramirez <ccritianramirezc@gmail.com>
 */
class editActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->hasRequest(detalleSalidaTableClass::ID)) {
                $fields = array(
                    detalleSalidaTableClass::ID,
                    detalleSalidaTableClass::CANTIDAD,
                    detalleSalidaTableClass::VALOR,
                    detalleSalidaTableClass::FECHA_FABRICACION,
                    detalleSalidaTableClass::FECHA_VENCIMIENTO,
                    detalleSalidaTableClass::ID_DOC,
                    detalleSalidaTableClass::SALIDA_BODEGA_ID,
                    detalleSalidaTableClass::INSUMO_ID,
                );
                $where = array(
                    detalleSalidaTableClass::ID => request::getInstance()->getRequest(detalleSalidaTableClass::ID)
                );
                
            $fieldsDoc = array(
                tipoDocTableClass::ID,
                tipoDocTableClass::DESC_TIPO_DOC
            );
            
            $fieldsSalida = array(
                salidaBodegaTableClass::ID,
                salidaBodegaTableClass::FECHA
            );
            
            $fieldsInsumo = array(
                insumoTableClass::ID,
                insumoTableClass::DESC_INSUMO
            );

            $this->objTipoDoc = tipoDocTableClass::getAll($fieldsDoc,false);
            $this->objSalidaBodega = salidaBodegaTableClass::getAll($fieldsSalida);
            $this->objInsu = insumoTableClass::getAll($fieldsInsumo);

                $this->objDetalleSalida = detalleSalidaTableClass::getAll($fields, NULL, NULL, NULL, NULL, NULL, $where);
                $this->defineView('edit', 'detalleSalida', session::getInstance()->getFormatOutput());
            } else {
                routing::getInstance()->redirect('salidaBodega', 'index');
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
