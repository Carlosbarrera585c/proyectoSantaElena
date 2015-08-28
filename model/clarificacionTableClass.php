<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of Clarificacion
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class clarificacionTableClass extends clarificacionBaseTableClass {

    /**
     * Funcion para contar la cantidad de lineas 
     * en la implementacion de paginacion.
     */
    public static function getTotalPages($lines) {
        try {
            $sql = 'SELECT count(' . clarificacionTableClass::ID. ')As cantidad ' . 'FROM ' .
                    clarificacionTableClass::getNameTable();
            $answer = model::getInstance()->prepare($sql);
            $answer->execute();
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return ceil($answer[0]->cantidad / $lines);
        } catch (PDOException $exc) {
            throw $exc;
        }
    }

    public static function getNameEmpleado($id) {
        try {
            $sql = 'SELECT ' . empleadoTableClass::NOM_EMPLEADO . ' As nom_empleado  '
                    . ' FROM ' . empleadoTableClass::getNameTable() . '  '
                    . ' WHERE ' .  empleadoTableClass::ID . ' = :id';
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
        public static function getApellEmpleado($id) {
        try {
            $sql = 'SELECT ' . empleadoTableClass::APELL_EMPLEADO . ' As apell_empleado  '
                    . ' FROM ' . empleadoTableClass::getNameTable() . '  '
                    . ' WHERE ' .  empleadoTableClass::ID . ' = :id';
            $params = array(
                ':id' => $id
            );
            $answer = model::getInstance()->prepare($sql);
            $answer->execute($params);
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return $answer[0]->apell_empleado;
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

?>