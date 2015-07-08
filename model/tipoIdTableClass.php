<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of Tipo Identificación
 * 
 * @author Carlos Barrera <carlosbarrera585@hotmail.com>
 */
class tipoIdTableClass extends tipoIdBaseTableClass{
 /**
     * Funcion para contar la cantidad de lineas 
     * en la implementacion de paginacion.
     */
    public static function getTotalPages($lines){
        try{
            $sql = 'SELECT count('.  tipoIdTableClass::ID.')As cantidad '.'FROM '. 
                    tipoIdTableClass::getNameTable();
            $answer = model::getInstance()->prepare($sql);
            $answer->execute();
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return  ceil($answer[0]->cantidad/$lines);
        }  catch (PDOException $exc){
            throw $exc;
        }
        
    }
}