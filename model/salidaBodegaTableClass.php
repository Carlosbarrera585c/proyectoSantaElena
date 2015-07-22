<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of salidaBodegaTableClass
 * 
 * @author Cristian Ramirez <ccristianramirezc@gmail.com>
 */
class salidaBodegaTableClass extends salidaBodegaBaseTableClass {
    
    /**
     * Funcion para contar la cantidad de lineas 
     * en la implementacion de paginacion.
     */
    public static function getTotalPages($lines){
        try{
            $sql = 'SELECT count('.  salidaBodegaTableClass::ID.')As cantidad '.'FROM '. 
            salidaBodegaTableClass::getNameTable();
            $answer = model::getInstance()->prepare($sql);
            $answer->execute();
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return  ceil($answer[0]->cantidad/$lines);
        }  catch (PDOException $exc){
            throw $exc;
        }
        
    }
     public static function getNameEntrada($id){
    try {
      $sql = 'SELECT ' . salidaBodegaTableClass::ID.  ' As nombre  '
             . '  FROM ' . salidaBodegaTableClass::getNameTable() . '  '
             . '  WHERE ' . salidaBodegaTableClass::ID . ' = :id';
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
      $sql = 'SELECT ' . salidaBodegaTableClass::FECHA .  ' As fecha  '
             . '  FROM ' . salidaBodegaTableClass::getNameTable() . '  '
             . '  WHERE ' . salidaBodegaTableClass::ID . ' = :id';
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
  
  
    public static function getNameProveedor($id) {
    try {
      $sql = 'SELECT ' . proveedorTableClass::RAZON_SOCIAL . ' As nombre  '
              . ' FROM ' . proveedorTableClass::getNameTable() . '  '
              . ' WHERE ' . proveedorTableClass::ID . ' = :id';
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
  
}

?>