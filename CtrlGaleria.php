<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cbb2933fde.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="../Vista/recursos/css/Stylees.css">
    <title>The Food-ders</title>
</head>
<body class=galeria>
<header class="index">
        <div class="logo">
            <img src="../Vista/recursos/img/Marmeg.png" alt="Logo de la marca">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="../Vista/Iniciarsesion.php">Iniciar sesión</a></li>
                <li><a href="#">Nosotros</a></li>
                <li><a href="../Vista/carrito.php">Carrito</a></li>
                <li><a href="#contacto">Contacto</a></li>
                <li><a href="../Vista/Principal.PHP">Inicio</a></li>
            </ul>
        </nav> 
        <div class="search-box">
            <input type="text" placeholder="Buscar...">
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <div class="menu-sandwich">
            <img src="../Vista/recursos/img/hamburguesa.svg" alt="" class="sandwich">
                <nav class="navegacion">
                    <a href="../Vista/Iniciarsesion.php">Iniciar Sesión
                    </a>
                    <a href="#Nosotros">¿Quiénes somos?
                    </a>
                    <a href="../Ctrl/CtrlGaleria.php?opcion=1">Lácteos
                    </a>
                    <a href="../Ctrl/CtrlGaleria.php?opcion=2">Embutidos
                    </a>
                    <a href="../Ctrl/CtrlGaleria.php?opcion=3">Enlatados
                    </a>
                    <a href="#contacto">Contacto
                    </a>
                </nav>
                <script src="../Vista/recursos/js/menu.js"></script>
            </div>
    </header>
    <main>
            <?php include '../Modelo/MdlGaleria.php';
            $producto = new productos();
            switch($_REQUEST['opcion']){
                case 1:
                    echo '<h2 class="h1-galeria">Catálogo de Lacteo</h2>
                    <div class="product-grid">';
                $producto->ListarLacteo();
                echo '</div>';
                break;
                case 2:
                    echo '<h2 class="h1-galeria">Catálogo de Enbutidos</h2>
                    <div class="product-grid">';
                $producto->ListarEmbutido();
                echo '</div>';
                break;
                case 3:
                    echo '<h2 class="h1-galeria">Catálogo de Enlatados</h2>
                    <div class="product-grid">';
                $producto->ListarEnlatado();
                echo '</div>';
                break;
            }
            ?>
    </main>
    <?php include "../Vista/modulos/PiePagina.php" ?>
</body>
</html>