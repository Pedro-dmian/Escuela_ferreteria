<?php
    include '../database/config.php';
    include '../include/core-functions.php';

    /*
    * SELECCIONA de la tabla (tabla_productos_almacen . propiedad stock), coma (tabla_productos. dame todas las propiedades) de la tabla ti_products y esa le pondras un alias llamado tabla_productos
    * busca relación de la tabla ti_products_warehouses con el alias tabla_productos_almacen mientras tabla_productos_almacen.product_id = tabla_productos.id
    */
    $query  = "SELECT * FROM ti_cat_warehouses WHERE active = 1";

    $title    = 'Almcenes';
    $warehouses = fecthAllfromQuery($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include '../include/link.php'; ?>
</head>
<body>

    <div class="container">
        <div class="tt-portlet">
            <div class="tt-portlet-header">
                <div class="row">
                    <div class="col-md-9">
                        <p class="h6 tt-portlet-title">
                            Lista de Almacenes
                        </p>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <a href="/cat_warehouses/" class="btn btn--style">Agregar Almacen</a>
                    </div>
                </div>
            </div>

            <div class="tt-portlet-body">

                <table class="table tt-table" id="tableProducts">
                    <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                nombre
                            </th>
                            <th>
                                Descripión
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($warehouses as $key => $item): ?>
                            <tr>
                                <td><?= $item['id'] ?></td>
                                <td><?= $item['name'] ?></td>
                                <td><?= $item['description'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>


                </table>
            </div>
        </div>
    </div>

    <?php include '../include/scripts.php' ?>
    <script src="./js/cat_warehouses.js"></script>
</body>
</html>