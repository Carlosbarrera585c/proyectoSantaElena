<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of Tipo Pago
 *
 * @author Carlos Barrera <cabarrera22@misena.edu.co>
 */
class tipoPagoTableClass extends tipoPagoBaseTableClass {

    public static function getTotalPages($lines) {
        try {
            $sql = 'SELECT count(' . tipoPagoTableClass::ID . ')As cantidad ' . 'FROM ' .
                    tipoPagoTableClass::getNameTable();
            $answer = model::getInstance()->prepare($sql);
            $answer->execute();
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return ceil($answer[0]->cantidad / $lines);
        } catch (PDOException $exc) {
            throw $exc;
        }
    }

}
