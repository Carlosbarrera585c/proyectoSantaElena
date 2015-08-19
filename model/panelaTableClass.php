<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of controlCalidadTableClass
 *
 * @author Bayron Esteban Henao <bairon_henao_1995@hotmail.com>
 */
class panelaTableClass extends panelaBaseTableClass {
    /**
     * Funcion para contar la cantidad de lineas 
     * en la implementacion de paginacion.
     */
    public static function getTotalPages($lines){
        try{
            $sql = 'SELECT count('.  panelaTableClass::ID.')As cantidad '.'FROM '. 
                    panelaTableClass::getNameTable();
            $answer = model::getInstance()->prepare($sql);
            $answer->execute();
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return  ceil($answer[0]->cantidad/$lines);
        }  catch (PDOException $exc){
            throw $exc;
        }
        
    }

  public static function getNameProveedor($id) {
    try {
      $sql = 'SELECT ' . proveedorTableClass::RAZON_SOCIAL . ' As razon_social  '
              . ' FROM ' . proveedorTableClass::getNameTable() . '  '
              . ' WHERE ' . proveedorTableClass::ID . ' = :id';
      $params = array(
              ':id' => $id
              );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->razon_social;
      
    } catch (PDOException $exc) {
      throw $exc;
    }
   }
   public static function getNameControl($id) {
    try {
      $sql = 'SELECT ' . controlCalidadTableClass::FECHA . ' As fecha  '
              . ' FROM ' . controlCalidadTableClass::getNameTable() . '  '
              . ' WHERE ' . controlCalidadTableClass::ID . ' = :id';
      $params = array(
              ':id' => $id
              );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->fecha;
      
    } catch (PDOException $exc) {
      throw $exc;
    }
   }

}


