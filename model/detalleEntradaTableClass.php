<?php

use mvc\model\modelClass;
use mvc\config\configClass;

/**
 * Description of detalleEntradaTableClass
 * 
 * @author Cristian Ramirez <critianRamirezXD@outlook.es>
 */
class detalleEntradaTableClass extends detalleEntradaBaseTableClass {
    
        public static function getTotalPages($lines){
        try{
            $sql = 'SELECT count('. detalleEntradaTableClass::ID.')As cantidad '.'FROM '. 
            detalleEntradaTableClass::getNameTable();
            $answer = model::getInstance()->prepare($sql);
            $answer->execute();
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return  ceil($answer[0]->cantidad/$lines);
        }  catch (PDOException $exc){
            throw $exc;
        }
        
    }
}

?>