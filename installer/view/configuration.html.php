<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/main.css">
        <title></title>

    </head>
    <body><br><br><br>
        <div class="container container-fluid">
            <div class="page-header  text-center titulo">
                <h1><i class="glyphicon glyphicon-th-list">   Configuracion de la Base de Datos</i><br><small> Paso 2</small></h1>
            </div>
            <form action="index.php?step=4" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input class="form-control" required="" type="number" name="RowGrid" placeholder="Numero de lineas por regilla. Ej: (5) Escriba solo numeros"><br>
                </div>

                <div class="form-group">
                    <input class="form-control"  required="" type="text" name="PathAbsolute" placeholder="Dirección en servidor de la carpeta raíz. Ej: /xampp/htdocs/proyectoSantaHelena o /var/www/html/proyectoSantaHelena"><br>
                </div>

                <div class="form-group">
                    <input class="form-control"  required="" type="text" name="UrlBase" placeholder="Dirección de la web. Ej: localhost/proyectoSantaHelena ó www.santahelena.com"><br>
                </div>

                <div class="form-group">
                    <select name="Scope" class="form-control" required="">
                        <option value="">Seleccione modo de instalación</option>
                        <option value="dev">Desarrollo</option>
                        <option value="prod">Producción</option>
                    </select><br>
                </div>

                <div class="form-group">
                    <select name="idioma" class="form-control" required="">
                        <option value="">Seleccione idioma</option>
                        <option value="es">Español</option>
                        <option value="en">English</option>
                    </select><br>
                </div>

                <div class="form-group">
                    <input class="form-control"  required="" type="text" name="cookiePath" placeholder="Ruta de la cookie. Ej: www.santahelena.com o proyectoSantaHelena"><br>
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" name="FormatTimestamp" value="Y-m-d H:i:s" placeholder="Formato de fecha y hora"><br>
                </div>
                <div class="form-group">
                    <input type="file" name="file">
                </div>

                <div class="form-group">
                    <a class="btn btn-warning btn-xs" href="index.html.php?step=2">Volver</a>
                    <input  class="btn btn-success btn-xs" type="submit" value="Instalar">
                </div>

            </form>
        </div>
    </body>
</html>
