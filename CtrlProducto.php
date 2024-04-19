<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Vista/recursos/css/administrador.css">
    <title>Productos</title>
</head>
<body class="cuerpo-tabla">
<header class="index-prin">
<div class="logo-prin">
            <a href="../Vista/indexAdmin.php">
            <img src="../Vista/recursos/img/Marmeg.png" alt="Logo de la marca">
            </a>
        </div>
        <div class="titulo-prin">
          <h2>Tabla-Nuevos Productos</h2>
        </div>
    </header>
    <?php
    include "../Modelo/MdlProducto.php";
    $producto=new Producto();
    switch($_REQUEST['opcion']){
       case 1:
        $producto->ListarProducto();
        break;
      case 2:
        $producto->MostrarFormulario();
        break;
      case 3:
        if (isset($_FILES['imagen']['tmp_name'])) {
          $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
      } else {
          $imagen = null; // O cualquier valor predeterminado o manejo de error que desees implementar
      }
        $producto->IngresarProducto($_REQUEST['nombre'],$_REQUEST['descripcion'],$_REQUEST['precio'],$_REQUEST['cantidad'],$_REQUEST['tipo'],$imagen,$_REQUEST['c_proveedor']);
        break;
      case 4:
          $producto->BorrarProducto($_REQUEST['codigo']);
        break;
        case 5:
          $producto->BuscarProducto($_REQUEST['nombre']);
        break;
        case 6:
          $producto->EditarProducto($_REQUEST['codigo']);
        break;
        case 7:
          if (isset($_FILES['imagenNueva']['tmp_name'])) {
            $imagenNueva = addslashes(file_get_contents($_FILES['imagenNueva']['tmp_name']));
        } else {
            $imagenNueva = null; // O cualquier valor predeterminado o manejo de error que desees implementar
        }
          $producto->ActualizarProducto($_REQUEST['codigo'],$_REQUEST['nombreNuevo'],$_REQUEST['nombreViejo'],$_REQUEST['descripcion'],$_REQUEST['precio'],$_REQUEST['cantidad'],$_REQUEST['tipo'],$imagenNueva);
        break;
    }
    ?>
</body>
</html>