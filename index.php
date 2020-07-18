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
    <h1 class="text-center mt-5">Productos</h1>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <table class="table">
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
                        <td>
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


    <script src="./assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script>
</body>
</html>