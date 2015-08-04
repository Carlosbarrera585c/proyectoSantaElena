<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of ingresoCanaTableClass
 *
 * @author Bayron Henao <baironhenao82@gmail.com>
 */
class ingresoCanaTableClass extends ingresoCanaBaseTableClass {
 /**
     * Funcion para contar la cantidad de lineas 
     * en la implementacion de paginacion.
     */
    public static function getTotalPages($lines){
        try{
            $sql = 'SELECT count('.  ingresoCanaTableClass::ID.')As cantidad '.'FROM '. 
                    ingresoCanaTableClass::getNameTable();
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
      $sql = 'SELECT ' . empleadoTableClass::NOM_EMPLEADO . ' As nom_empleado  '
              . ' FROM ' . empleadoTableClass::getNameTable() . '  '
              . ' WHERE ' . empleadoTableClass::ID . ' = :id';
      $params = array(
              ':id' => $id
              );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->nom_empleado;
      
    } catch (PDOException $exc) {
      throw $exc;
    }
   }
   public static function getNameInsumo($id) {
    try {
      $sql = 'SELECT ' . insumoTableClass::DESC_INSUMO . ' As desc_insumo  '
              . ' FROM ' . insumoTableClass::getNameTable() . '  '
              . ' WHERE ' . insumoTableClass::ID . ' = :id';
      $params = array(
              ':id' => $id
              );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->desc_insumo;
      
    } catch (PDOException $exc) {
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
   
}
