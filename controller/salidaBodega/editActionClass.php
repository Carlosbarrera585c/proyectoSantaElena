
<?php use mvc\interfaces\controllerActionInterface;
 use mvc\controller\controllerClass;
 use mvc\config\configClass as config;
 use mvc\request\requestClass as request; 
 use mvc\routing\routingClass as routing;
 use mvc\session\sessionClass as session; 
 use mvc\i18n\i18nClass as i18n;
/**
 * Description of ejemploClass
 *
 * @author Cristian Ramirez <ccristianramirezc@gmail.com>
 */
class editActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->hasRequest(salidaBodegaTableClass::ID)) {
                $fields = array(
                    salidaBodegaTableClass::ID,
                    salidaBodegaTableClass::FECHA,
                    salidaBodegaTableClass::PROVEEDOR_ID,
                    salidaBodegaTableClass::EMPLEADO_ID
                    
                );
                $where = array(
                    salidaBodegaTableClass::ID => request::getInstance()->getRequest(salidaBodegaTableClass::ID)
                );

                
                $fieldsP = array(
                   proveedorTableClass::ID,
                   proveedorTableClass::RAZON_SOCIAL
                );
                
                $this->objProveedor = proveedorTableClass::getAll($fieldsP,false);
                
                $fieldsEm = array(
                   empleadoTableClass::ID,
                   empleadoTableClass::NOM_EMPLEADO
                );
                
                $this->objEmpleado = empleadoTableClass::getAll($fieldsEm,false);
                
                $this->objSalidaBodega = salidaBodegaTableClass::getAll($fields, NULL, NULL, NULL, NULL, NULL, $where);
                $this->defineView('edit', 'salidaBodega', session::getInstance()->getFormatOutput());
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
