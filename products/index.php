<?php
    include '../database/config.php';
    include '../include/core-functions.php';

    $search = @$_GET['search'];

    /*
    * SELECCIONA de la tabla (tabla_productos_almacen . propiedad stock), coma (tabla_productos. dame todas las propiedades) de la tabla ti_products y esa le pondras un alias llamado tabla_productos
    * busca relación de la tabla ti_products_warehouses con el alias tabla_productos_almacen mientras tabla_productos_almacen.product_id = tabla_productos.id
    */
    $query  = "SELECT tabla_productos_almacen.stock, tabla_productos.*  FROM ti_products AS tabla_productos
                LEFT JOIN ti_products_warehouses AS tabla_productos_almacen 
                ON tabla_productos_almacen.product_id = tabla_productos.id";

    // ? Mientras que tabla_productos.active = 1
    $where = "WHERE tabla_productos.active = 1";

    if(!empty($search)):
        // ? suplantar lo que tiene la variable where por este valor
        $where = "WHERE tabla_productos.active = 1 AND 
        name LIKE '%".$search."%' OR
        description LIKE  '%".$search."%' OR 
        barcode LIKE '%".$search."%'";
    endif;

    $query = $query.' '.$where;

    $title    = 'Products';
    $products = fecthAllfromQuery($query);
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
                            Lista de Productos
                        </p>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <a href="/products/create" class="btn btn--style">Agregar Producto</a>
                    </div>
                </div>
            </div>

            <div class="tt-portlet-body">

                <div class="row">
                    <div class="col-md-12">
                        <form action="/products/" method="get">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-10 form-group">
                                    <label for="search">Buscar</label>
                                    <input type="text" name="search" id="search" class="form-control" value="<?= $search ?>">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn--style">Buscar</button>
                                    <a href="/products/" class="btn btn--style">Limpiar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <br>

                <table class="table tt-table" id="tableProducts">
                    <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                SKU
                            </th>
                            <th>
                                Nombre del producto
                            </th>

                            <th>
                                Descripción
                            </th>
                            <th>
                                Precio
                            </th>
                            <th>
                                Stock
                            </th>
                            <th class="text-center">
                                ....
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($products as $key => $item): ?>
                            <tr>
                                <td><?= $item['id'] ?></td>
                                <td><?= $item['barcode'] ?></td>
                                <td><?= $item['name'] ?></td>
                                <td><?= $item['description'] ?></td>
                                <td>$ <?= number_format($item['sale_price'], 2, '.', ',') ?></td>
                                <td><?= ($item['stock']) ? number_format($item['stock'], 0, '.', ',') : 0  ?></td>
                                <td class="text-center">
                                    <a href="/products/update?id=<?= $item['id'] ?>" class="btn" id="UpdatedProduct" title="Editar">
                                        ✏
                                    </a>
                                    <button type="button" class="btn" id="RemoveProduct" title="Eliminar" onclick="deleteProduct(<?= $item['id'] ?>)">
                                        💩
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>


                </table>
            </div>
        </div>
    </div>

    <?php include '../include/scripts.php' ?>
    <script src="./js/products.js"></script>
</body>
</html>