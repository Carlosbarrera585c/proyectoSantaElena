<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of ciudadTableClass
 *
 * @author Cristian Ramirez <critianRamirezXD@outlook.es>
 */
class ciudadTableClass extends ciudadBaseTableClass {
    
        public static function getNameCiudad($id){
        try {
            $sql = 'SELECT' . ciudadTableClass::NOM_CIUDAD . 'AS nombre'
                    . 'FROM' . ciudadTableClass::getNameTable() . ' '
                    . 'WHERE' . ciudadTableClass::ID . '= :id';
            $params = array(
                ':id' => $id
            );
            $answer = model::getInstance()->prepare($sql);
            $answer->execute($params);
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return $answer[0]->nombre;
                 
        } catch (PDOException $exc) {
            throw $exc;
        }
        }
  
}

