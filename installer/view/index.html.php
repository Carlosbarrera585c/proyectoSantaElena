<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/main.css">
    </head>
    <body><br><br><br><br>
        <div class="container container-fluid">
            <div class="row">
                <div class="page-header  text-center titulo">
                    <h1><i class="glyphicon glyphicon-th-list"> Instalador del Sistema</i><br><br><small> Requisitos</small></h1>
                </div>
                <table class="table tables table-responsive table-bordered table-striped table-hover"> 
                    <tr class="info">
                        <th>Extensiones Del Sistema</th>
                        <th>Extension En El Sistema</th>
                        <th>Si</th>
                        <th>No</th>
                    </tr>
                    <tr>
                        <td>PHP 5.4 o Superior</td>
                        <td><?php echo PHP_VERSION ?></td>
                        <td><?php echo ((PHP_VERSION > 5.4) ? '<i class="glyphicon glyphicon-thumbs-up"></i>' : '') ?></td>
                        <td><?php echo ((PHP_VERSION > 5.4) ? '' : '<i class="glyphicon glyphicon-thumbs-down"></i>') ?></i></td>

                    </tr>
                    <tr>
                        <td>JSON</td>
                        <td><?php echo get_loaded_extensions()[array_search('json', get_loaded_extensions())] ?></td>
                        <?php if (get_loaded_extensions()[array_search('json', get_loaded_extensions())] === 'json') : ?>
                            <td><i class="glyphicon glyphicon-thumbs-up"></i></td>
                            <td></td>
                        <?php else : ?>
                            <td></td>
                            <td><i class="glyphicon glyphicon-thumbs-down"></i></td>
                        <?php endif; ?>

                    </tr>
                    <tr>
                        <td>PDO</td>
                        <td><?php echo get_loaded_extensions()[array_search('PDO', get_loaded_extensions())] ?></td>
                        <?php if (get_loaded_extensions()[array_search('PDO', get_loaded_extensions())] === 'PDO') : ?>
                            <td><i class="glyphicon glyphicon-thumbs-up"></i></td>
                            <td></td>
                        <?php else : ?>
                            <td></td>
                            <td><i class="glyphicon glyphicon-thumbs-down"></i></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td>PDO_PGSQL</td>
                        <td><?php echo get_loaded_extensions()[array_search('pdo_pgsql', get_loaded_extensions())] ?></td>
                        <?php if (get_loaded_extensions()[array_search('pdo_pgsql', get_loaded_extensions())] === 'pdo_pgsql') : ?>
                            <td><i class="glyphicon glyphicon-thumbs-up"></i></td>
                            <td></td>
                        <?php else : ?>
                            <td></td>
                            <td><i class="glyphicon glyphicon-thumbs-down"></i></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td>PDO_MYSQL</td>
                        <td><?php echo get_loaded_extensions()[array_search('pdo_mysql', get_loaded_extensions())] ?></td>
                        <?php if (get_loaded_extensions()[array_search('pdo_mysql', get_loaded_extensions())] === 'pdo_mysql') : ?>
                            <td><i class="glyphicon glyphicon-thumbs-up"></i></td>
                            <td></td>
                        <?php else : ?>
                            <td></td>
                            <td><i class="glyphicon glyphicon-thumbs-down"></i></td>
                        <?php endif; ?>
                    </tr>
                </table>

                <a  href="index.php?step=2" class="btn btn-success btn-xs">Siguiente</a>
            </div>
        </div>
    </body>
</html>
