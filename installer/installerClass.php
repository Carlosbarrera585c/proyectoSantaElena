<?php
/**
 * Description of installerClass
 *
 * @author Danny Steven
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
          
          if($flag === true) {
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
            exit();
            
            // aqui falta correr el archivo SQL en la base de datos

//            $fo = fopen($archivo, 'r+');
//            while(!feof($fo)) {
//            $linea = fgets($fo);
//            echo $linea . "<BR />";
//            }
//            fclose($fo);
            include_once '../7';
            
          } else {
            include_once 'view/configuration.html.php';
          }
          
          break;
      }
    }
  }
}
