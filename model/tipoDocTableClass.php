<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of tipoDocTableClass
 *
 * @author Cristian Ramirez <critianRamirezXD@outlook.es>
 */
class tipoDocTableClass extends tipoDocBaseTableClass {
    
    
        public static function getTotalPages($lines){
        try{
            $sql = 'SELECT count('. tipoDocTableClass::ID.')As cantidad '.'FROM '. 
            tipoDocTableClass::getNameTable();
            $answer = model::getInstance()->prepare($sql);
            $answer->execute();
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return  ceil($answer[0]->cantidad/$lines);
        }  catch (PDOException $exc){
            throw $exc;
        }
        
    }
    
  public static function getNameTipoDoc($id){
    try {
      $sql = 'SELECT ' . tipoDocTableClass::ID.  ' As nombre  '
             . '  FROM ' . tipoDocTableClass::getNameTable() . '  '
             . '  WHERE ' . tipoDocTableClass::ID . ' = :id';
      $params = array(
          ':id' => $id
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->nombre;
      
    } catch (Exception $exc) {
      throw $exc;
    }
    
  }  
 public static function getNameTipoDes($id){
    try {
      $sql = 'SELECT ' . tipoDocTableClass::DESC_TIPO_DOC .  ' As nombre  '
             . '  FROM ' . tipoDocTableClass::getNameTable() . '  '
             . '  WHERE ' . tipoDocTableClass::ID . ' = :id';
      $params = array(
          ':id' => $id
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->nombre;
      
    } catch (Exception $exc) {
      throw $exc;
    }
    
  }   
}

