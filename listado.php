<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <h1>Listado de Productos</h1>
    <div class="img"><img src="img/logo_codo.png" alt="codoacodo" width="100px"></div>
    <h3>Codo a Codo 2023</h3>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th align="right">Precio</th>
            </tr>
        </thead>
        <tbody id="tablaProductos">
        </tbody>
    </table>

    <div class="contenedor-centrado">
        <a href="index.html">Menu principal</a>
    </div>

    <script>
        //const URL = "http://127.0.0.1:5000/"
        const URL = "https://MISITIO.pythonanywhere.com/"

        // Realizamos la solicitud GET al servidor para obtener todos los productos
        fetch(URL + 'productos')
            .then(function (response) {
                if (response.ok) {
                    return response.json(); // Parseamos la respuesta JSON
                } else {
                    // Si hubo un error, lanzar explícitamente una excepción
                    // para ser "catcheada" más adelante
                    throw new Error('Error al obtener los productos.');
                }
            })
            .then(function (data) {
                var tablaProductos = document.getElementById('tablaProductos');

                // Iteramos sobre los productos y agregamos filas a la tabla
                data.forEach(function (producto) {
                    var fila = document.createElement('tr');
                    fila.innerHTML = '<td>' + producto.codigo + '</td>' +
                        '<td>' + producto.descripcion + '</td>' +
                        '<td align="right">' + producto.cantidad + '</td>' +
                        '<td align="right">&nbsp; &nbsp;&nbsp; &nbsp;' + producto.precio + '</td>';
                    tablaProductos.appendChild(fila);
                });
            })
            .catch(function (error) {
                // Código para manejar errores
                alert('Error al obtener los productos.');
            });
    </script>
</body>
</html>