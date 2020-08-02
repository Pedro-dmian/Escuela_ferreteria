<?php
    include '../../database/config.php';
    include '../../include/core-functions.php';

    $error = true;
    $msg   = 'Hubo un error';

    // ? Almacen
    $cat_warehouse_id = $_POST['cat_warehouse_id'];
    $stock            = $_POST['stock'];

    // ? Producto
    $name           = $_POST['name'];
    $barcode        = $_POST['barcode'];
    $sales_price    = $_POST['sales_price'];
    $purchase_price = $_POST['purchase_price'];
    $description    = $_POST['description'];
    $observations   = $_POST['observations'];
    $created_at     = date('Y-m-d H:i:s');
    $updated_at     = date('Y-m-d H:i:s');

    if(empty($name) || empty($barcode) || empty($sales_price)):
        echo json_encode([
            'error' => true,
            'msg'   => 'Porfavor llena el formulario completamente'
        ]);
        die();
    endif;

    $query = "INSERT INTO ti_products 
                (name, sale_price, description, barcode, purchase_price, status, observations, active, created_at, updated_at)
                VALUES ('$name', $sales_price, '$description', '$barcode', $purchase_price, 1, '$observations', 1, '$created_at', '$updated_at')
            ";

    $createProduct_id = executeQuery($query);

    if($createProduct_id):
        $query_stock = "INSERT INTO ti_products_warehouses (cat_warehouse_id, product_id, stock, active) VALUES ($cat_warehouse_id, $createProduct_id, $stock, 1)";

        $createProductWarehouse_id = executeQuery($query_stock);

        if($createProductWarehouse_id) : 
            $error = false;
            $msg   = 'Se creo correctamente el producto';
        else:
            $msg   = 'Hubo un error al realizar la creación de producto ¡Intentalo más tarde!';
        endif;
    else:
        $msg   = 'Hubo un error al realizar la creación de producto ¡Intentalo más tarde!';
    endif;

    $_answer = [
        'error' => $error,
        'msg'   => $msg
    ];

    echo json_encode($_answer);