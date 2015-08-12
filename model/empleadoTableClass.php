<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of Empleado
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

    public static function getNameTipoId($id) {
        try {
            $sql = 'SELECT ' . tipoIdTableClass::DESC_TIPO_ID . ' As desc_tipo_id  '
                    . ' FROM ' . tipoIdTableClass::getNameTable() . '  '
                    . ' WHERE ' . tipoIdTableClass::ID . ' = :id';
            $params = array(
                ':id' => $id
            );
            $answer = model::getInstance()->prepare($sql);
            $answer->execute($params);
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return $answer[0]->desc_tipo_id;
        } catch (PDOException $exc) {
            throw $exc;
        }
    }

    public static function getNameCredencial($id) {
        try {
            $sql = 'SELECT ' . credencialTableClass::NOMBRE . ' As nombre  '
                    . ' FROM ' . credencialTableClass::getNameTable() . '  '
                    . ' WHERE ' . credencialTableClass::ID . ' = :id';
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