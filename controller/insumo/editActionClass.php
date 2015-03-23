
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
 * @author yefri alexander <yefri-1994@hotmail.com>
 */
class editActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->hasRequest(insumoTableClass::ID)) {
                $fields = array(
                    insumoTableClass::ID,
                    insumoTableClass::DESC_INSUMO,
                    insumoTableClass::PRECIO,
                    insumoTableClass::TIPO_INSUMO_ID
                    
                );
                $where = array(
                    insumoTableClass::ID => request::getInstance()->getRequest(insumoTableClass::ID)
                );
                $this->objInsu = insumoTableClass::getAll($fields, NULL, NULL, NULL, NULL, NULL, $where);
                
               $fields = array(
                tipoInsumoTableClass::ID,
                tipoInsumoTableClass::DESC_TIPO_INSUMO
            );
            
               $this->objTipoInsumo = tipoInsumoTableClass::getAll($fields, false);           
                $this->defineView('edit', 'insumo', session::getInstance()->getFormatOutput());
            } else {
                routing::getInstance()->redirect('insumo', 'index');
            }

//            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo $exc->getTraceAsString();
        }
    }

}
