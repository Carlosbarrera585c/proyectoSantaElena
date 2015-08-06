<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of detalleEntradaTableClass
 * 
 * @author Cristian Ramirez <critianRamirezXD@outlook.es>
 */
class detalleEntradaTableClass extends detalleEntradaBaseTableClass {

    public static function getTotalPages($lines) {
        try {
            $sql = 'SELECT count(' . entradaBodegaTableClass::getNameField(entradaBodegaTableClass::ID). ')As cantidad ' . 'FROM ' . entradaBodegaTableClass::getNameTable() . ' LEFT JOIN ' . detalleEntradaTableClass::getNameTable() . ' '
                    . 'ON ' . entradaBodegaTableClass::getNameField(entradaBodegaTableClass::ID) . ' = ' . detalleEntradaTableClass::getNameField(detalleEntradaTableClass::ENTRADA_BODEGA_ID) . '  '
                    . ' WHERE ' . entradaBodegaTableClass::getNameField(entradaBodegaTableClass::ID) . ' = ' . detalleEntradaTableClass::getNameField(detalleEntradaTableClass::ENTRADA_BODEGA_ID);
            
 
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