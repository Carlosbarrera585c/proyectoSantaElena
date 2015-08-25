<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of Pago Trabajadores
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class pagoTrabajadoresTableClass extends pagoTrabajadoresBaseTableClass {

    /**
     * Funcion para contar la cantidad de lineas 
     * en la implementacion de paginacion.
     */
    public static function getTotalPages($lines) {
        try {
            $sql = 'SELECT count(' . pagoTrabajadoresTableClass::ID . ')As cantidad ' . 'FROM ' .
                    pagoTrabajadoresTableClass::getNameTable();
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
            $sql = 'SELECT ' . empleadoTableClass::NOM_EMPLEADO . ' AS nom_empleado  '
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
        public static function getNameTipoPago($id) {
        try {
            $sql = 'SELECT ' . tipoPagoTableClass::DESC_TIPO_PAGO . ' As desc_tipo_pago  '
                    . ' FROM ' . tipoPagoTableClass::getNameTable() . '  '
                    . ' WHERE ' . tipoPagoTableClass::ID . ' = :id';
            $params = array(
                ':id' => $id
            );
            $answer = model::getInstance()->prepare($sql);
            $answer->execute($params);
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return $answer[0]->desc_tipo_pago;
        } catch (PDOException $exc) {
            throw $exc;
        }
    }
        public static function getNameNumeroIdEmpleado($id) {
        try {
            $sql = 'SELECT ' . empleadoTableClass::NUMERO_IDENTIFICACION . ' As numero_identificacion  '
                    . ' FROM ' . empleadoTableClass::getNameTable() . '  '
                    . ' WHERE ' . empleadoTableClass::ID . ' = :id';
            $params = array(
                ':id' => $id
            );
            $answer = model::getInstance()->prepare($sql);
            $answer->execute($params);
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return $answer[0]->numero_identificacion;
        } catch (PDOException $exc) {
            throw $exc;
        }
    }
}
