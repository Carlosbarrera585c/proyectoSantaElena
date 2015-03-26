<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of usuarioTableClass
 * 
 * @author yefri alexander <yefri-1994@hotmail.com>
 */
class insumoTableClass extends insumoBaseTableClass  {
    
     public static function getNameInsumo($id){
    try {
      $sql = 'SELECT ' .insumoTableClass::ID.  ' As nombre  '
             . '  FROM ' . insumoTableClass::getNameTable() . '  '
             . '  WHERE ' . insumoTableClass::ID . ' = :id';
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
 public static function getNameDInsumo($id){
    try {
      $sql = 'SELECT ' . insumoTableClass::DESC_INSUMO .  ' As nombre  '
             . '  FROM ' . insumoTableClass::getNameTable() . '  '
             . '  WHERE ' . insumoTableClass::ID . ' = :id';
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
   public static function getTotalPages($lines, $where){
        try{
            $sql = 'SELECT count('. insumoTableClass::ID.')As cantidad '.
                    'FROM '.insumoTableClass::getNameTable();
            
            $answer = model::getInstance()->prepare($sql);
            $answer->execute();
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return  ceil($answer[0]->cantidad/$lines);
        }  catch (PDOException $exc){
            throw $exc;
        }
        
    }
  
  
}


?>
