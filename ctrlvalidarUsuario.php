<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cbb2933fde.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Vista/recursos/css/Stylees.css">
    <title>Document</title>
</head>
<header class="index">
        <div class="logo">
            <img src="../Vista/recursos/img/Marmeg.png" alt="Logo de la marca">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="Iniciarsesion.php">Iniciar sesión</a></li>
                <li><a href="#">Nosotros</a></li>
                <li><a href="carrito.php">Carrito</a></li>
                <li><a href="#contacto">Contacto</a></li>
                <li><a href="./Principal.PHP">Inicio</a></li>
            </ul>
        </nav> 
        <div class="search-box">
            <input type="text" placeholder="Buscar...">
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <div class="menu-sandwich">
            <img src="../Vista/recursos/img/hamburguesa.svg" alt="" class="sandwich">
                <nav class="navegacion">
                    <a href="./Iniciarsesion.php">Iniciar Sesión
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
<body>
<?php
include "../Modelo/usuarios.php";
$us= new Usuario();
$opcion=$_REQUEST['opcion'];
switch($opcion){
    case 1:
         $nombre=$_REQUEST['nombre'];
         $apellidos=$_REQUEST['apellidos'];
         $telefono=$_REQUEST['telefono'];
         $correo=$_REQUEST['correo'];
         $contrasena=$_REQUEST['contrasena'];
         $us->inicializar($nombre, $apellidos, $telefono, $correo, $contrasena);
         $us->registrarUsuario();
    break;
    case 2:
        $us->validarUsuario($_REQUEST['nombre'], $_REQUEST['contrasena']);
    break;
    case 3:
        $us->mostrarFormulario();
    break;
}
$us->cerrarBD();
?>
</body>
</html>
