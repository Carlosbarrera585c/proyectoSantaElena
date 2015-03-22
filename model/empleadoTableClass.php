<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of Empelado
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class empleadoTableClass extends empleadoBaseTableClass {

  /**
   * Funcion para contar la cantidad de lineas 
   * en la implementacion de paginacion.
   */
  public static function getTotalPages($lines) {
    try {
      $sql = 'SELECT count(' . empleadoTableClass::ID . ')As cantidad ' . 'FROM ' .
              empleadoTableClass::getNameTable();
      $answer = model::getInstance()->prepare($sql);
      $answer->execute();
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return ceil($answer[0]->cantidad / $lines);
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}

?>