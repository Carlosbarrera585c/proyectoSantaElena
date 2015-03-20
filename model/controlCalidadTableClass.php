<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of controlCalidadTableClass
 *
 * @author Bayro Esteban Henao <bairon_henao_1995@hotmail.com>
 */
class controlCalidadTableClass extends controlCalidadBaseTableClass {

//  public static function getNameDepto($id) {
//    try {
//      $sql = 'SELECT ' . deptoTableClass::NOM_DEPTO . ' As nom_depto  '
//              . ' FROM ' . deptoTableClass::getNameTable() . '  '
//              . ' WHERE ' . deptoTableClass::ID . ' = :id';
//      $params = array(
//              ':id' => $id
//              );
//      $answer = model::getInstance()->prepare($sql);
//      $answer->execute($params);
//      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
//      return $answer[0]->nom_depto;
//      
//    } catch (PDOException $exc) {
//      throw $exc;
//    }
//  }

}


