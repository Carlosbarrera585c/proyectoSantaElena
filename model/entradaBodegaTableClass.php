<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of entradaBodegaTableClass
 * 
 * @author Cristian Ramirez <critianRamirezXD@outlook.es>
 */
class entradaBodegaTableClass extends entradaBodegaBaseTableClass {
     public static function getNameEntrada($id){
    try {
      $sql = 'SELECT ' . entradaBodegaTableClass::ID.  ' As nombre  '
             . '  FROM ' . entradaBodegaTableClass::getNameTable() . '  '
             . '  WHERE ' . entradaBodegaTableClass::ID . ' = :id';
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
 public static function getNameBodega($id){
    try {
      $sql = 'SELECT ' . entradaBodegaTableClass::FECHA .  ' As fecha  '
             . '  FROM ' . entradaBodegaTableClass::getNameTable() . '  '
             . '  WHERE ' . entradaBodegaTableClass::ID . ' = :id';
      $params = array(
          ':id' => $id
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->fecha;
      
    } catch (Exception $exc) {
      throw $exc;
    }
    
  }
}

?>