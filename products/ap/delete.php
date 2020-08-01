<?php
    include '../../database/config.php';
    include '../../include/core-functions.php';

    $error = true;
    $msg   = 'Hubo un error';

    $product_id = $_GET['product_id'];

    if(empty($product_id)):
        echo json_encode([
            'error' => true,
            'msg'   => 'El idenfiticador no esta definido'
        ]);
        die();
    endif;

    $query = "UPDATE ti_products SET active = 0 WHERE id = $product_id";

    $deleteProduct = exeQuery($query);

    if($deleteProduct):
        $error = false;
        $msg   = 'Se elimino correctamente el producto';
    else:
        $msg   = 'Hubo un error al realizar la eliminación del producto con el id '.$product_id.' ¡Intentalo más tarde!';
    endif;

    $_answer = [
        'error' => $error,
        'msg'   => $msg
    ];

    echo json_encode($_answer);