<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of detalleEntradaTableClass
 * 
 * @author Cristian Ramirez <ccritianramirezc@gmail.com>
 */
class detalleSalidaTableClass extends detalleSalidaBaseTableClass {
    
        public static function getTotalPages($lines){
        try{
            $sql = 'SELECT count('. detalleSalidaTableClass::ID.')As cantidad '.'FROM '. 
            detalleSalidaTableClass::getNameTable();
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