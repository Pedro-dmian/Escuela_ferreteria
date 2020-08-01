<?php
    include '../database/config.php';
    include '../include/core-functions.php';

    $title    = 'Products';
    $products = fecthAllfromQuery("SELECT * FROM ti_products WHERE active = 1");
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