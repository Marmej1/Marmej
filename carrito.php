<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cbb2933fde.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Vista/recursos/css/Stylees.css">
    <title>The Food-ders</title>
</head>
<body class="body-carrito">
    <?php include "modulos/barraSub.php" ?>
    <div class="container-carrito">
        <h2></h2>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="cart-items">
                <tr>
                    <td>
                        <img src="../Vista/recursos/img/chiles.png" alt="Producto 1" class="carrito-img">
                        Chiles "LA COSTEÑA"
                    </td>
                    <td>$20.00</td>
                    <td>1</td>
                    <td>$20.00</td>
                    <td><button class="btn btn-delete">Eliminar</button></td>
                    <td><button class="btn btn-edit">Editar</button></td>
                </tr>
                <tr>
                    <td>
                        <img src="../Vista/recursos/img/peperoni.png" alt="Producto 1" class="carrito-img">
                        Peperoni "KYR"
                    </td>
                    <td>$60.00</td>
                    <td>1</td>
                    <td>$60.00</td>
                    <td><button class="btn btn-delete">Eliminar</button></td>
                    <td><button class="btn btn-edit">Editar</button></td>
                    </td>
                </tr>
                <tr>
                    <td><img src="../Vista/recursos/img/crema.png" alt="Producto 1" class="carrito-img">
                        Crema "LALA"
                    </td>
                    <td>$18.00</td>
                    <td>1</td>
                    <td>$18.00</td>
                    <td><button class="btn btn-delete">Eliminar</button></td>
                    <td><button class="btn btn-edit">Editar</button></td>
                </td>
                </tr>
                <!-- Aquí puedes agregar más filas con otros productos -->
            </tbody>

        </table>
        <div class="summary-container">
            <div class="summary-item">
                <span>Productos:</span>
                <span>3</span>
            </div>
            <div class="summary-item">
                <span>Envío:</span>
                <span>$5.00</span>
            </div>
    
            <div class="summary-item">
                <span>Total:</span>
                <span>$103.00</span>
            </div>
        </div>
        <form action="pedido.php" method="post">
        <button class="btn" id="continue-btn">Realizar pedido</button>
        </form>
    </div>
    <?php include "modulos/PiePagina.php" ?>
    
    <script>
        // Aquí iría el código JavaScript para manejar la funcionalidad del carrito, como agregar, eliminar elementos, calcular subtotal, etc.
    </script>
</body>
</html>
