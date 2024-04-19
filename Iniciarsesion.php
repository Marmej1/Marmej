<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Vista/recursos/css/Stylees.css">
    <title>Iniciar Sesion</title>
    <script src="https://kit.fontawesome.com/cbb2933fde.js" crossorigin="anonymous"></script>
    <title>The Food-ders</title>
</head>
<body class="body-sesion">
    <?php include "modulos/barraSub.php" ?>
    <div class="formulario">
        <center><h2>Iniciar Sesión</h2></center>
        <form method="post" action="../Ctrl/ctrlvalidarUsuario.php">
            <div class="username">
                <input type="email" name="nombre" required>
                <label>Correo electronico</label>
            </div>
            <div class="username">
                <input type="password" name="contrasena" required>
                <label>Contraseña</label>
            </div>
            <div class="recordar">Olvido su constraseña?</div>
            <input type="submit" value="Iniciar">
            <input type="hidden" name="opcion" value="2">
        </form>
        <form action="../Ctrl/ctrlvalidarUsuario.php" method="post">
            <div class="registrarse">
            <input type="submit" value="Registrarse">
            <input type="hidden" name="opcion" value="3">
            </form>
            </div>
    </div>
</body>
</html>