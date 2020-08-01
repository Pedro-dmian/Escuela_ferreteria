<?php
    include '../database/config.php';
    include '../include/core-functions.php';

    $product_id = $_GET['id'];

    $ProductData = ReduceArray(fecthAllfromQuery("SELECT * FROM ti_products WHERE id = $product_id AND active = 1"));

    $title    = 'Actualizar Producto ' . $ProductData['name'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include '../include/link.php'; ?>
</head>
<body>


    <?php if($ProductData): ?>
        <div class="container">
            <div class="tt-portlet">
                <div class="tt-portlet-header">
                    <div class="row">
                        <div class="col-md-9">
                            <p class="h6 tt-portlet-title">
                                Editar Producto
                            </p>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end">
                            <a href="/products/" class="btn btn--style mr-2">Regresar</a>
                            <button type="submit" form="FormProductUpdate" class="btn btn--style">Guardar</button>
                        </div>
                    </div>
                </div>

                <div class="tt-portlet-body">
                    <form action="" method="post" id="FormProductUpdate">
                        <input type="hidden" name="product_id" id="product_id" value="<?= $ProductData['id'] ?>">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">Nombre del Product</label>
                                    <input type="text" name="name" id="name" class="form-control" value="<?= $ProductData['name'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="barcode">Sku</label>
                                    <input type="text" name="barcode" id="barcode" value="<?= $ProductData['barcode'] ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="sales_price">Precio de venta</label>
                                    <input type="number" name="sales_price" id="sales_price" value="<?= number_format($ProductData['sale_price'], 2, '.', '') ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="purchase_price">Precio de compra</label>
                                    <input type="number" name="purchase_price" id="purchase_price" value="<?= number_format($ProductData['purchase_price'], 2, '.', '') ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Descripción</label>
                                    <textarea name="description" id="description" class="form-control" rows="10"><?= $ProductData['description'] ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="observations">Observaciones</label>
                                    <textarea name="observations" id="observations" class="form-control" rows="10"><?= $ProductData['observations'] ?></textarea>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    <?php else: ?>
        <div class="container text-center mt-5">
            <h1>Producto no existe</h1>
            <a href="/products">Volver a listado de productos</a>
        </div>
    <?php endif; ?>

    <?php include '../include/scripts.php' ?>
    <script src="./js/products.js"></script>
</body>
</html>