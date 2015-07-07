<?php

use mvc\model\modelClass  as model;
use mvc\config\configClass as config;

/**
 * Description of tipoInsumoTableClass
 * 
 * @author Cristian Ramirez <critianRamirezXD@outlook.es>
 * @author yefri alexander <yefri-1994@hotmail.com>
 */
class tipoInsumoTableClass extends tipoInsumoBaseTableClass {
    
    public static function getTotalPages($lines, $where){
        try{
            $sql = 'SELECT count('. tipoInsumoTableClass::ID.')As cantidad '.
                    'FROM '.  tipoInsumoTableClass::getNameTable();
            
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