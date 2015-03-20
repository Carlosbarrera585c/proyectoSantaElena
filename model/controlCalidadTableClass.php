<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of controlCalidadTableClass
 *
 * @author Bayron Esteban Henao <bairon_henao_1995@hotmail.com>
 */
class controlCalidadTableClass extends controlCalidadBaseTableClass {
    /**
     * Funcion para contar la cantidad de lineas 
     * en la implementacion de paginacion.
     */
    public static function getTotalPages($lines){
        try{
            $sql = 'SELECT count('.controlCalidadTableClass::ID.')As cantidad '.'FROM '. 
                    controlCalidadTableClass::getNameTable();
            $answer = model::getInstance()->prepare($sql);
            $answer->execute();
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return  ceil($answer[0]->cantidad/$lines);
        }  catch (PDOException $exc){
            throw $exc;
        }
        
    }

//  public static function getNameDepto($id) {
//    try {
//      $sql = 'SELECT ' . deptoTableClass::NOM_DEPTO . ' As nom_depto  '
//              . ' FROM ' . deptoTableClass::getNameTable() . '  '
//              . ' WHERE ' . deptoTableClass::ID . ' = :id';
//      $params = array(
//              ':id' => $id
//              );
//      $answer = model::getInstance()->prepare($sql);
//      $answer->execute($params);
//      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
//      return $answer[0]->nom_depto;
//      
//    } catch (PDOException $exc) {
//      throw $exc;
//    }
//  }

}


