<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Vista/recursos/css/administrador.css">
    <link rel="stylesheet" href="../Vista/recursos/css/Stylees.css">
    <title>Iniciar Sesion</title>
    <script src="https://kit.fontawesome.com/cbb2933fde.js" crossorigin="anonymous"></script>
    <title>The Food-ders</title>
</head>
<body class="body-sesion">
<header class="index-prin">
<div class="logo-prin">
            <a href="../Vista/indexAdmin.php">
            <img src="../Vista/recursos/img/Marmeg.png" alt="Logo de la marca">
            </a>
        </div>
        <div class="titulo-prin">
          <h2>Perfil de Administrador</h2>
        </div>
    </header>
    <?php include '../Modelo/sesion.php';
    $administrador = new Administrador();
    switch($_REQUEST['opcion']){
        case 1:
            $administrador->MostrarFormulario();
        break;
        case 2:
            $administrador->validarUsuario($_REQUEST['correo'], $_REQUEST['contrasena']);
        break;
    }
    ?>
</body>
</html>