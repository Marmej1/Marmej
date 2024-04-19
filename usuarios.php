<?php
class Usuario{
    private $nombre;
    private $apellidos;
    private $telefono;
    private $correo;
    private $contrasena;

    public function inicializar($nombre, $apellidos, $telefono, $correo, $contrasena){
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->telefono=$telefono;
        $this->correo=$correo;
        $this->contrasena=$contrasena;
    }
    public function conectarBD(){
        $con=mysqli_connect("localhost","root","","marmej1")
            or die("No se pudo hacer la conexión");
        return $con;
    }
    public function registrarUsuario(){
        $registro=mysqli_query($this->conectarBD(), "SELECT * FROM usuarios WHERE correo= '$this->correo'")or 
        die(mysqli_errno($this->conectarBD()));

        if($registro=mysqli_fetch_array($registro)){
            echo '<body class="cuerpo-den">
            <div class="denegado">
             <p>Este usuario ya esta registrado</p>
             <form action="ctrlvalidarUsuario.php" method="post">
             <input type="hidden" name="opcion" value="3">
                <input type="submit" value="regresar">
                </form>
             </div>
             </body>';
        }else{
            mysqli_query($this->conectarBD(), "INSERT INTO usuarios (nombre, apellidos, telefono, correo, contraseña) values ('$this->nombre', '$this->apellidos', '$this->telefono', '$this->correo', '$this->contrasena')")
            or die("Problemas en el insert".mysqli_error($this->conectarBD()));
            header("Location: iniciarsesion.php");
        }
    }
    public function validarUsuario($correo, $contrasena){
        $consulta = mysqli_query($this->conectarBD(), "SELECT * FROM usuarios WHERE correo= '$correo' AND contraseña='$contrasena'")
            or die(mysqli_errno($this->conectarBD()));
        
        if(mysqli_num_rows($consulta) > 0) {
            header("Location: ../vista/Usuarios.php");
        } else {
            echo '<body class="cuerpo-den">
            <div class="denegado">
             <p>No estas registrado, por favor registrate</p>
             <form action="ctrlvalidarUsuario.php" method="post">
             <input type="hidden" name="opcion" value="3">
                <input type="submit" value="registrarse">
                </form>
             </div>
             </body>';
        }
    }
    public function mostrarFormulario(){
        echo '<body class="body-sesion">
        <?php include "modulos/barraSub.php" ?>
            <section class="tabcontent">
                <div class="formulario">
                   <center> <h2>Crear cuenta</h2> </center>
                    <form action="ctrlvalidarUsuario.php" method="post">
                        <div class="username">
                            <input type="text" name="nombre" required id="nombre">
                            <label for="nombre">Nombre</label>
                        </div>
                        <div class="username">
                            <input type="text" name="apellidos" required id="apellidos">
                            <label for="apellidos">Apellidos</label>
                        </div>
                        <div class="username">
                            <input type="tel" name="telefono" required id="telefono">
                            <label for="telefono">Número de Teléfono</label>
                        </div>
                        <div class="username">
                            <input type="email" name="correo" required id="correo">
                            <label for="email">Correo Electrónico</label>
                        </div>
                        <div class="username">
                            <input type="password" name="contrasena" required id="contrasena">
                            <label for="contrasena">Contraseña</label>
                        </div>
                        <input type="submit" name="crear_cuenta" value="Crear cuenta" id="crear_cuenta">
                        <input type="hidden" name="opcion" value="1">
                    </form>
                </div>
            </section>';
    }
    public function cerrarBD(){
        mysqli_close($this->conectarBD());
    }
}
?>
