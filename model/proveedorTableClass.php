<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;
use mvc\model\table\tableBaseClass;

/**
 * Description of proveedorTableClass
 *
 * @author Cristian Ramirez <critianRamirezXD@outlook.es>
 */
class proveedorTableClass extends proveedorBaseTableClass {
  /**
     * Funcion para contar la cantidad de lineas 
     * en la implementacion de paginacion.
     */
    public static function getTotalPages($lines){
        try{
            $sql = 'SELECT count('.  proveedorTableClass::ID.')As cantidad '.'FROM '. 
                    proveedorTableClass::getNameTable();
            $answer = model::getInstance()->prepare($sql);
            $answer->execute();
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return  ceil($answer[0]->cantidad/$lines);
        }  catch (PDOException $exc){
            throw $exc;
        }
        
    }
 
  
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
         public static function getNameCiudad($id) {
    try {
      $sql = 'SELECT ' . ciudadTableClass::NOM_CIUDAD . ' As nom_ciudad  '
              . ' FROM ' . ciudadTableClass::getNameTable() . '  '
              . ' WHERE ' . ciudadTableClass::ID . ' = :id';
      $params = array(
              ':id' => $id
              );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->nom_ciudad;
      
    } catch (PDOException $exc) {
      throw $exc;
    }
   }
}

