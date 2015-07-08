<?php

/**
 * Description of installerClass
 *
 * @author Bayron Henao
 */
class installerClass {

    public function install() {
        if (isset($_GET['step']) !== true) {
            include_once 'view/index.html.php';
        } else {
            switch ($_GET['step']) {
                case 2:
                    include_once 'view/dataBase.html.php';
                   
                    break;
                case 3:
                    try {
                        $dsn = $_POST['driver'] . ':dbname=' . $_POST['dbName'] . ';host=' . $_POST['host'] . ';port=' . $_POST['port'];
                        $usuario = $_POST['dbUser'];
                        $contrasena = $_POST['dbPass'];
                /*
                     * realizar las validaciones
                     */
//             if($_POST['RowGrid'] === '' or $_POST['RowGrid'] === NULL){
//                $error_message = "Ingrese El Numero de Registros que se presentaran en la rejilla";
//                throw new PDOException($error_message);
//            }else if (!ereg("^[a-zA-Z0-9\-_]{3,20}$", $_POST['RowGrid'])){
//                $error_message = "El campo  RowGrid no debe contener caracteres especiales";
//                throw new PDOException($error_message);
//            }else if (!is_numeric($_POST['RowGrid'])){
//                $error_message = "El campo RowGrid debe ser solo numerico";
//                throw new PDOException($error_message);
//            }else if($_POST['driver'] !== 'pgsql' or $_POST['driver'] === 'mysql'){
//                $error_message = "Ingrese el driver Correcto";
//                throw new PDOException($error_message);
//            }else if($_POST['port']!== '' or $_POST['port'] === NULL){
//                $error_message = "El Puerto no debe Estar Vacio";
//                throw new PDOException($error_message);
//            }else if (!ereg("^[a-zA-Z0-9\-_]{3,20}$", $_POST['port'])){
//                $error_message = "El campo puerto no debe contener caracteres especiales";
//                throw new PDOException($error_message); 
//            }else if (!is_numeric($_POST['port'])){
//                $error_message = "El campo debe ser solo numerico";
//                throw new PDOException($error_message); 
//            }else if($_POST['dbName'] === '' or $_POST['dbName'] === NULL){
//              $error_message = "Ingrese El Nombre de la base de Datos";
//              throw new PDOException($error_message); 
//            }else if($_POST['dbUser'] === '' or $_POST['dbUser'] === NULL){
//                $error_message = "Ingrese El Nombre de Usuario";
//                throw new PDOException($error_message);
//            }else if($_POST['dbPass'] === '' or $_POST['dbPass'] === NULL){
//                $error_message = "Ingrese El Password De Usuario";
//                throw new PDOException($error_message);
//            }

                       

                        $gbd = new PDO($dsn, $usuario, $contrasena);

//            $_SESSION['gbd'] = $gbd;
                        $_SESSION['driver'] = $_POST['driver'];
                        $_SESSION['host'] = $_POST['host'];
                        $_SESSION['port'] = $_POST['port'];
                        $_SESSION['dbUser'] = $_POST['dbUser'];
                        $_SESSION['dbPass'] = $_POST['dbPass'];
                        $_SESSION['dbName'] = $_POST['dbName'];

                        include_once 'view/configuration.html.php';
                    } catch (PDOException $exc) {
                        $_GET['error'] = true;
                        $_GET['error_message'] = $exc->getMessage();
                        include_once 'view/dataBase.html.php';
                    }
                    break;
                case 4:
                    $flag = true;

                    /*
                     * realizar las validaciones
                     */
//             if($_POST['RowGrid'] === '' or $_POST['RowGrid'] === NULL){
//                $error_message = "Ingrese El Numero de Registros que se presentaran en la rejilla";
//                throw new PDOException($error_message);
//            }else if (!ereg("^[a-zA-Z0-9\-_]{3,20}$", $_POST['RowGrid'])){
//                $error_message = "El campo  RowGrid no debe contener caracteres especiales";
//                throw new PDOException($error_message);
//            }else if (!is_numeric($_POST['RowGrid'])){
//                $error_message = "El campo RowGrid debe ser solo numerico";
//                throw new PDOException($error_message);
//            }else if($_POST['driver'] !== 'pgsql' or $_POST['driver'] === 'mysql'){
//                $error_message = "Ingrese el driver Correcto";
//                throw new PDOException($error_message);
//            }else if($_POST['port']!== '' or $_POST['port'] === NULL){
//                $error_message = "El Puerto no debe Estar Vacio";
//                throw new PDOException($error_message);
//            }else if (!ereg("^[a-zA-Z0-9\-_]{3,20}$", $_POST['port'])){
//                $error_message = "El campo puerto no debe contener caracteres especiales";
//                throw new PDOException($error_message); 
//            }else if (!is_numeric($_POST['port'])){
//                $error_message = "El campo debe ser solo numerico";
//                throw new PDOException($error_message); 
//            }else if($_POST['dbName'] === '' or $_POST['dbName'] === NULL){
//              $error_message = "Ingrese El Nombre de la base de Datos";
//              throw new PDOException($error_message); 
//            }else if($_POST['dbUser'] === '' or $_POST['dbUser'] === NULL){
//                $error_message = "Ingrese El Nombre de Usuario";
//                throw new PDOException($error_message);
//            }else if($_POST['dbPass'] === '' or $_POST['dbPass'] === NULL){
//                $error_message = "Ingrese El Password De Usuario";
//                throw new PDOException($error_message);
//            }

                    if ($flag === true) {
                        $driver = $_SESSION['driver'];
                        $host = $_SESSION['host'];
                        $port = $_SESSION['port'];
                        $dbUser = $_SESSION['dbUser'];
                        $dbPass = $_SESSION['dbPass'];
                        $dbName = $_SESSION['dbName'];
//            $gbd = $_SESSION['gbd'];
                        $RowGrid = $_POST['RowGrid'];
                        $PathAbsolute = $_POST['PathAbsolute'];
                        $UrlBase = $_POST['UrlBase'];
                        $Scope = $_POST['Scope'];
                        $idioma = $_POST['idioma'];
                        $cookiePath = $_POST['cookiePath'];
                        $FormatTimestamp = $_POST['FormatTimestamp'];
                        $archivo = $_FILES['file']['tmp_name'];

                        include_once 'plantilla.php';
                        $file = fopen('../config/config.php', 'w');
                        fputs($file, $config);
                        fclose($file);
                        $dsn2 = $driver . ':dbname=' . $dbName . ';host=' . $host . ';port=' . $port;
                        $gbd2 = new PDO($dsn2, $dbUser, $dbPass);
                        $sql = file_get_contents($archivo);
                        $gbd2->beginTransaction();
                        $gbd2->exec($sql);
                        $gbd2->commit();
                         include_once 'view/felicidades.html.php';
                        exit();

                       
                    } else {
                        include_once 'view/configuration.html.php';
                    }

                    break;
            }
        }
    }

}
