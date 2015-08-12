<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/main.css">
    </head>
    <body><br><br><br>
        <div class="container container-fluid">
            <div class="page-header  text-center titulo">
                <h1><i class="glyphicon glyphicon-th-list">Configuración de la Base de Datos</i><br><small> Paso 1</small></h1>
            </div>
            <?php if (isset($_GET['error']) and $_GET['error'] === true): ?>
                Ocurrio un error
            <?php endif ?>
            <form action="index.php?step=3" method="POST">

                <div class="form-group">
                    <input class="form-control" value="<?php echo (isset($_POST['host'])) ? $_POST['host'] : '' ?>" type="text" name="host" placeholder="Inserte el host de la base de datos  (localhost /127.0.0.1)"  required=""><br>
                </div>

                <div class="form-group">
                    <select name="driver"  class="form-control" required="">
                        <option value="">Seleccione un controlador de Base de Datos</option>
                        <option value="pgsql" <?php echo (isset($_POST['driver']) and $_POST['driver'] === 'pgsql') ? 'selected' : '' ?>>PostgreSQL</option>
                        <option value="mysql" <?php echo (isset($_POST['driver']) and $_POST['driver'] === 'mysql') ? 'selected' : '' ?>>MySQL</option>
                    </select><br>
                </div>

                <div class="form-group">
                    <input class="form-control" required="" type="number" name="port" placeholder="Digite el puerto  ( Postgres: 5432 / Mysql: 3306)" ><br>
                </div>

                <div class="form-group">
                    <input class="form-control" required="" type="text" name="dbName" placeholder="Nombre de la base de datos" ><br>
                </div>

                <div class="form-group">
                    <input class="form-control" required="" type="text" name="dbUser" placeholder="Usuario de la base de datos" ><br>
                </div>

                <div class="form-group">
                    <input class="form-control" type="password" required="" name="dbPass" placeholder="Contraseña de la base de datos" ><br>
                </div>

                <div class="form-group">
                    <a href="index.html.php" class="btn btn-warning btn-xs">Volver</a>
                    <input  type="submit" value="Continuar" class="btn btn-success btn-xs">
                </div>

            </form>
            <?php if (isset($_GET['error']) and $_GET['error'] === true): ?>
                <?php echo $_GET['error_message'] ?>
            <?php endif ?>
        </div>
    </body>
</html>