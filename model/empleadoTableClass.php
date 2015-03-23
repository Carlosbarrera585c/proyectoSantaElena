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
  public static function getTotalPages($lines, $where) {
    try {
      $sql = 'SELECT count(' . empleadoTableClass::ID . ') As cantidad ' .
              'FROM ' . empleadoTableClass::getNameTable();

      if (is_array($where) === true) {
        foreach ($where as $field => $value) {
          if (is_array($value)) {
            $sql = $sql . ' WHERE ' . $field . ' BETWEEN ' . ((is_numeric($value[0])) ? $value[0] : "'$value[0]'") . ' AND ' . ((is_numeric($value[1])) ? $value[1] : "'$value[1]'") . ' ';
          } else {
            $sql = $sql . ' WHERE ' . $field . ' = ' . ((is_numeric($value)) ? $value : "'$value'") . ' ';
          }
        }
      }
//      print_r($sql);
//      exit();
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