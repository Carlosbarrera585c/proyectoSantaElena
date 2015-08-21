<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of Mieles
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class mielesTableClass extends mielesBaseTableClass {

    /**
     * Funcion para contar la cantidad de lineas 
     * en la implementacion de paginacion.
     */
    public static function getTotalPages($lines) {
        try {
            $sql = 'SELECT count(' . mielesTableClass::ID . ')As cantidad ' . 'FROM ' .
                    mielesTableClass::getNameTable();
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

}

?>