<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cbb2933fde.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="../Vista/recursos/css/Stylees.css">
    <title>The Food-ders</title>
</head>
<body class="body-pedido">
    <?php include "../Vista/modulos/barraSub.php"?>
    <h1>PEDIDO</h1>
    <table class="tabla-pedido">
        <section class="contenedor-direccion">
            <div class="titulo-direccion">
                <h2>Dirección</h2>
            </div>
            <div class="descripcion-direccion">
                <p>CALLE PALMA 40 B, SAN FRANCISCO INFONAVIT , METEPEC , MEX , C.P.52176</p>
            </div>
        </section>
        <hr>
        <section class="contenedor-pago">
            <div class="titulo-pago">
                <h2>Método de Pago</h2>
            </div>
            <div class="tarjeta">
                <div class="tarjeta-dec">
                    Pagar con Visa 5465 <br>
                    <strong>Dirección de la tarjeta: </strong> La misma que la dirección de envío
                </div>
            </div>
        </section>
        <hr>
        <h2>Articulos</h2>
        <section class="contenedor-productos">
            <div class="chiles">
                <img src="../Vista/recursos/img/chiles.png" alt="">
                <p>chiles jalapeños "La costeña"  <br> 220g</p>
                <h3>$20.00</h3>
            </div>
            <div class="peperoni">
                <img src="../Vista/recursos/img/peperoni.png" alt="">
                <p>Peperoni "Kyr" 70g</p>
                <h3>$60.00</h3>
            </div>
            <div class="crema">
                <img src="../Vista/recursos/img/crema.png" alt="">
                <p>Crema "Lala" 2.5L</p>
                <h3>$18.00</h3>
            </div>
        </section>
    </table>
    <hr>
    <section class="metodo-pago">
        <table>
            <h2>Confirmación de pedido</h2><br>
            Subtotal de productos:    $103.00 <br>
            Envío:                 $0.00
            <hr>
            <h2>TOTAL</h2>
            <h3>$103.00 MXN</h3>
        </table>
        <hr>
        <button>Realiza tu pedido y paga</button>
    </section>
    <?php include "../Vista/modulos/PiePagina.php"?>
</body>
</html>
