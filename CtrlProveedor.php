<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Vista/recursos/css/administrador.css">
    <title>Proveedores</title>
</head>
<body class="cuerpo-tabla">
<header class="index-prin">
<div class="logo-prin">
            <a href="../Vista/indexAdmin.php">
            <img src="../Vista/recursos/img/Marmeg.png" alt="Logo de la marca">
            </a>
        </div>
        <div class="titulo-prin">
          <h2>Tabla-Nuevos Proveedores</h2>
        </div>
    </header>
    <div class="tabla-proveedore">
        <?php
        include "../Modelo/proveedor.php";
        $us= new Proveedor();
        switch($_REQUEST['opcion']){
            case 1:
                    $us->ListarProveedor();
            break;
            case 2:
                    $us->MostrarFormulario();
                
            break;
            case 3:
                    $us->Inicializar($_REQUEST['nombre'],$_REQUEST['contraseña'],$_REQUEST['telefono'],$_REQUEST['correo'],$_REQUEST['direccion']);
                    $us->IngresarProveedor();
            break;
            case 4:
                    $us->borrarProveedor($_REQUEST['nombre']);
            break;
            case 5: $us->buscarProveedor($_REQUEST['nombre']);
            break;
            case 6: $us->modificarProveedor($_REQUEST['nombre']);
            break;
            case 7:
                $us->actualizarProveedor($_REQUEST['codigo'], $_REQUEST['nombreNuevo'], $_REQUEST['contraseña'], $_REQUEST['telefonoNuevo'], $_REQUEST['correoNuevo'], $_REQUEST['correoViejo'],$_REQUEST['direccionNuevo']);
                break;
        }
        $us->cerrarBD();    
        ?>
    </div>
</body>
</html>