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
  
  public static function getTotalPages($lines){
        try{
            $sql = 'SELECT count('.  empaqueTableClass::ID.')As cantidad '.'FROM '. 
                    empaqueTableClass::getNameTable();
            $answer = model::getInstance()->prepare($sql);
            $answer->execute();
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return  ceil($answer[0]->cantidad/$lines);
        }  catch (PDOException $exc){
            throw $exc;
        }
        
    }
    
    public static function getNameEmpleado($id) {
    try {
      $sql = 'SELECT ' . empleadoTableClass::NOM_EMPLEADO . ' As nombre  '
              . ' FROM ' . empleadoTableClass::getNameTable() . '  '
              . ' WHERE ' . empleadoTableClass::ID . ' = :id';
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
    
    public static function getNameTipoEmpaque($id) {
    try {
      $sql = 'SELECT ' . tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE . ' As empaque  '
              . ' FROM ' . tipoEmpaqueTableClass::getNameTable() . '  '
              . ' WHERE ' . tipoEmpaqueTableClass::ID . ' = :id';
      $params = array(
              ':id' => $id
              );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->empaque;
      
    } catch (PDOException $exc) {
      throw $exc;
    }
   }
   public static function getNameInsumo($id) {
    try {
      $sql = 'SELECT ' . insumoTableClass::DESC_INSUMO . ' As descripcion  '
              . ' FROM ' . insumoTableClass::getNameTable() . '  '
              . ' WHERE ' . insumoTableClass::ID . ' = :id';
      $params = array(
              ':id' => $id
              );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->descripcion;
      
    } catch (PDOException $exc) {
      throw $exc;
    }
   }
}


?>