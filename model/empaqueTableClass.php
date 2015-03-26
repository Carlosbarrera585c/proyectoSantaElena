<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of Empaque
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class empaqueTableClass extends empaqueBaseTableClass {
    
    public static function getNameId($id){
    try {
      $sql = 'SELECT ' . empaqueTableClass::ID.  ' As id  '
             . '  FROM ' . empaqueTableClass::getNameTable() . '  '
             . '  WHERE ' . empaqueTableClass::ID . ' = :id';
      $params = array(
          ':id' => $id
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->id;
      
    } catch (Exception $exc) {
      throw $exc;
    }
    
  }  
 public static function getEmpaque($id){
    try {
      $sql = 'SELECT ' . empaqueTableClass::FECHA .  ' As fecha  '
             . '  FROM ' . empaqueTableClass::getNameTable() . '  '
             . '  WHERE ' . empaqueTableClass::ID . ' = :id';
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