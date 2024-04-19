<?php
class Administrador{
    
    public function ConectarBd(){
        $con=mysqli_connect("localhost","root","","marmej1")or die("Problemas con la conexión a la base de datos");
        return $con;
    }
    public function MostrarFormulario(){
        echo ' <div class="formulario">
        <center><h2>Iniciar Sesión</h2></center>
        <form method="post" action="">
            <div class="username">
                <input type="email" name="correo" required>
                <label>Correo electronico</label>
            </div>
            <div class="username">
                <input type="password" name="contrasena" required>

                <label>Contraseña</label>
            </div>
            <input type="submit" value="Iniciar">
            <input type="hidden" name="opcion" value="2">
        </form>

            </div>
    </div>';
    }
    public function validarUsuario($correo, $contrasena){
        $consulta = mysqli_query($this->conectarBD(), "SELECT * FROM administradores WHERE correo= '$correo' AND contraseña='$contrasena'")
            or die(mysqli_errno($this->conectarBD()));
        
        if(mysqli_num_rows($consulta)>0) {
            header("Location: ../Vista/indexAdmin.php");
        } else {
            echo '<body class="cuerpo-den">
            <div class="denegado">
             <p>Tu cuenta no esta registrada</p>
             <form action="#" method="post">
             <input type="hidden" name="opcion" value="1">
                <input type="submit" value="Regresar">
                </form>
             </div>
             </body>';
        }
    }
    public function CerrarBD(){
        mysqli_close($this->ConectarBD());
    }
}
?>