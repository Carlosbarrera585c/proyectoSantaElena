<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of ingresoCanaTableClass
 *
 * @author Cristian Ramirez <ccristianramirezc@gmail.com>
 */
class cachazaTableClass extends cachazaBaseTableClass {
 /**
     * Funcion para contar la cantidad de lineas 
     * en la implementacion de paginacion.
     */
    public static function getTotalPages($lines){
        try{
            $sql = 'SELECT count('. cachazaTableClass::ID.')As cantidad '.'FROM '. 
                    cachazaTableClass::getNameTable();
            $answer = model::getInstance()->prepare($sql);
            $answer->execute();
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return  ceil($answer[0]->cantidad/$lines);
        }  catch (PDOException $exc){
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
