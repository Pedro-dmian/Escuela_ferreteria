<?php $title    = 'Dashboard'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include './include/link.php'; ?>
</head>
<body>

    <div class="container">
        <div class="tt-portlet">
            <div class="tt-portlet-body">

                <ul>
                    <li>
                        <a href="/products/">
                            Lista de productos
                        </a>
                    </li>
                    <li>
                        <a href="/products/create">
                            Crear Producto
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>

    <?php include './include/scripts.php' ?>
</body>
</html>