<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Vista/recursos/css/administrador.css">
    <title>Usuarios</title>
</head>
<body class="cuerpo-tabla">
<header class="index-prin">
        <div class="logo-prin">
            <a href="../Vista/indexAdmin.php">
            <img src="../Vista/recursos/img/Marmeg.png" alt="Logo de la marca">
            </a>
        </div>
        <div class="titulo-prin">
          <h2>Tabla-Nuevos Usuarios</h2>
        </div>
    </header>
    <div class="tabla-usuarios">
        <?php
        include "../Modelo/listaUsuarios.php";
        $us= new Usuario();
            $opcion=$_REQUEST['opcion'];
        switch($opcion){
            case 1:
                    $us->listarUusuario();
            break;
            case 2:
                    $us->borrarUsuario($_REQUEST['clave']);
                
            break;
            case 3:
                    $us->buscarUsuario($_REQUEST['clave']);
            break;
            case 4:
                    $us->modificarUsuario($_REQUEST['clave']);
            break;
            case 5:
                $us->actualizarUsuario($_REQUEST['clave'], $_REQUEST['nombre'], $_REQUEST['apellidos'], $_REQUEST['telefono'],$_REQUEST['correoNuevo'],$_REQUEST['correoViejo']);
        }
        $us->cerrarBD();    
        ?>
    </div>
</body>
</html>
