<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of proveedorTableClass
 *
 * @author Cristian Ramirez <critianRamirezXD@outlook.es>
 */
class proveedorTableClass extends proveedorBaseTableClass {
  
    public static function getNameProveedor($id){
        try {
            $sql = 'SELECT' . proveedorTableClass::RAZON_SOCIAL . 'AS razon'
                    . 'FROM' . proveedorTableClass::getNameTable() . ' '
                    . 'WHERE' . proveedorTableClass::ID . '= :id';
            $params = array(
                ':id' => $id
            );
            $answer = model::getInstance()->prepare($sql);
            $answer->execute($params);
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return $answer[0]->razon;
                 
        } catch (PDOException $exc) {
            throw $exc;
        }
        }
}

