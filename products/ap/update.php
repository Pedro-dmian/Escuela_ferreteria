<?php
    include '../../database/config.php';
    include '../../include/core-functions.php';

    $error = true;
    $msg   = 'Hubo un error';

    $product_id     = $_POST['product_id'];
    $name           = $_POST['name'];
    $barcode        = $_POST['barcode'];
    $sales_price    = $_POST['sales_price'];
    $purchase_price = $_POST['purchase_price'];
    $description    = $_POST['description'];
    $observations   = $_POST['observations'];
    $updated_at     = date('Y-m-d H:i:s');

    if(empty($name) || empty($barcode) || empty($sales_price)):
        echo json_encode([
            'error' => true,
            'msg'   => 'Porfavor llena el formulario completamente'
        ]);
        die();
    endif;

    $query = "UPDATE ti_products SET
                name = '$name', 
                sale_price = $sales_price, 
                description = '$description', 
                barcode = '$barcode', 
                purchase_price = $purchase_price, 
                observations = '$observations', 
                updated_at = '$updated_at'
                WHERE id = $product_id
            ";

    $updateProduct = executeQuery($query);

    $error = false;
    $msg   = 'Se actualizo correctamente el producto';

    $_answer = [
        'error' => $error,
        'msg'   => $msg
    ];

    echo json_encode($_answer);