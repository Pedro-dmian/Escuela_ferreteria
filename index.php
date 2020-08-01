<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/lib/datatable/datatables.min.css">
    <link rel="stylesheet" href="./assets/css/custom.css">

    <title>Productos</title>
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
                        <button type="button" class="btn btn--style">Agregar Producto</button>
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
                        <tr>
                            <td>1</td>
                            <td>Lorem</td>
                            <td>Producto prueba</td>
                            <td>Lorem ipsum dolor</td>
                            <td>$ 300</td>
                            <td class="text-center">
                                <button type="button" class="btn" id="UpdatedProduct" title="Editar">
                                    ✏
                                </button>
                                <button type="button" class="btn" id="RemoveProduct" title="Eliminar">
                                    💩
                                </button>
                            </td>
                        </tr>
                    </tbody>


                </table>
            </div>
        </div>
    </div>

    <script src="./assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script>
</body>
</html>