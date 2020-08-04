<?php
    include '../database/config.php';
    include '../include/core-functions.php';

    $title    = 'Crear Producto';

    $warehouses = fecthAllfromQuery("SELECT * FROM ti_cat_warehouses WHERE active = 1");
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
                            Agregar Producto
                        </p>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <a href="/products/" class="btn btn--style mr-2">Regresar</a>
                        <button type="submit" form="FormProduct" class="btn btn--style">Guardar</button>
                    </div>
                </div>
            </div>

            <div class="tt-portlet-body">
                <form action="" method="post" id="FormProduct">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Nombre del Product</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="barcode">Sku</label>
                                <input type="text" name="barcode" id="barcode" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="sales_price">Precio de venta</label>
                                <input type="number" name="sales_price" id="sales_price" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="purchase_price">Precio de compra</label>
                                <input type="number" name="purchase_price" id="purchase_price" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="stock">Almcenes</label>
                            <select name="cat_warehouse_id" id="cat_warehouse_id" class="form-control">
                                <option value="0" selected>Selecciona una opción</option>
                                
                                <?php foreach($warehouses as $item): ?>
                                    <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="number" name="stock" id="stock" class="form-control" value="0">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <textarea name="description" id="description" class="form-control" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="observations">Observaciones</label>
                                <textarea name="observations" id="observations" class="form-control" rows="10"></textarea>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <?php include '../include/scripts.php' ?>
    <script src="./js/products.js"></script>
</body>
</html>

