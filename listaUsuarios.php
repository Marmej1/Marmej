<?php
class Usuario{
    public function conectarBD(){
        $con=mysqli_connect("localhost","root","","marmej1")
            or die("No se pudo hacer la conexión");
        return $con;
    }
    public function listarUusuario(){
        $registros=mysqli_query($this->conectarBD(), "SELECT * FROM usuarios")or 
        die("No se pudo hacer la conexión a la base de datos");
        echo '<form action="../Ctrl/ctrlListarUsuario.php" method="post" class="buscar-usuarios">
        <input type="number" name="clave" placeholder="Busca la clave del usuario"> 
        <input type="hidden" name="opcion" value="3"> <input type="submit" value="buscar">
        </form>';
        echo '<table class="tabla-usuarios">';
        echo '<tr><th>Clave</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Correo</th><th>Contraseña</th><th colspan="2"></th></tr>';
        while ($reg=mysqli_fetch_array($registros)){
            echo '<tr><td>'.$reg[0]. '</td>';
            echo '<td>'.$reg[1].'</td>';
            echo '<td>'.$reg[2]. '</td>';
            echo '<td>'.$reg[3]. '</td>';
            echo '<td>'.$reg[4]. '</td>';
            echo '<td>'.$reg[5]. '</td>';
            echo '<td><a href="../Ctrl/ctrlListarUsuario.php?clave='.$reg[0]. '&opcion=2"><button class=btn-delete>Eliminar</button></a></td>';
            echo '<td><a href="../Ctrl/ctrlListarUsuario.php?clave='.$reg[0]. '&opcion=4"><button class=btn-edit>Editar</button></a></td></tr>';
            echo '<input type="hidden" name="opcion" value="1">';
        }
        echo '</table>';
    }
    public function borrarUsuario($clave){
        $registro=mysqli_query($this->conectarBD(), "SELECT * FROM usuarios WHERE clave= $clave")or 
        die($this->conectarBD());
        if($reg=mysqli_fetch_array($registro)){
            mysqli_query($this->conectarBD(), "DELETE FROM usuarios WHERE clave= $clave")or
            die(mysqli_error($this->conectarBD()));
            echo '<div class="not-user">
             El usuario a sido borrado:'.$reg[1]. '
             </div>';
            echo '<table class="tabla-usuarios">';
            echo '<tr><th>Clave</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Correo</th></tr>';
            echo '<tr><td> '.$reg[0].'</td>';
            echo '<td> '.$reg[1].'</td>';
            echo '<td> '.$reg[2].'</td>';
            echo '<td> '. $reg[3].'</td>';
            echo '<td> '.$reg[4]. '</td></tr>';
            echo '</table>';
            echo   '<form action="../Ctrl/ctrlUsuario.php" method="post" class="form-regresar">
            <input type="hidden" name="opcion" value="1">
                  <input type="submit" value="Regresar">
        </form>';     
        }
    }
    public function buscarUsuario($clave){
        $registro=mysqli_query($this->conectarBD(), "SELECT * FROM usuarios WHERE clave= $clave")or 
        die(mysqli_error($this->conectarBD()));
        if($reg=mysqli_fetch_array($registro)){
            echo '<table class="tabla-usuarios">';
            echo '<tr><th>Clave</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Correo</th><th>Contraseña</th><th></th><th></th></tr>';
                echo '<tr><td>'.$reg[0]. '</td>';
                echo '<td>'.$reg[1].'</td>';
                echo '<td>'.$reg[2]. '</td>';
                echo '<td>'.$reg[3]. '</td>';
                echo '<td>'.$reg[4]. '</td>';
                echo '<td>'.$reg[5]. '</td>';
                echo '<td><a href="../Ctrl/ctrlListarUsuario.php?clave='.$reg[0]. '&opcion=2"><button class=btn-delete>Eliminar</button></a></td>';
                echo '<td><a href="../Ctrl/ctrlListarUsuario.php?clave='.$reg[0]. '&opcion=4"><button class=btn-edit>Editar</button></a></td></tr>';
            echo '</table>';
            echo '<form action="../Ctrl/ctrlListarUsuario.php" method="post" class="form-regresar">
            <input type="hidden" name="opcion" value="1">
            <input type="submit" value="Regresar">
            </from>';
        }else{
            echo '<div class="not-user">
                Este usuario no existe
                </div>
                <form action="../Ctrl/ctrlListarUsuario.php" method="post" class="form-regresar">
                <input type="hidden" name="opcion" value="1">
                <input type="submit" value="Regresar">
                </from>';
        }
    }
    public function modificarUsuario($clave){
        $registro=mysqli_query($this->conectarBD(), "SELECT * FROM usuarios WHERE clave= $clave")or 
        die(mysqli_error($this->conectarBD()));
        if($reg=mysqli_fetch_array($registro)){
            echo '<div class="tabla-formulario">
            <center><h2>Actualizar Usuario</h2></center>';
            echo "<form action='ctrlListarUsuario.php' method='post' class='formulario'>
                    <label>Clave</label> <br>
                      <input type='number' name='clave' value='".$reg[0]."' readonly>
                      <label>Nombre</lanel> <br>
                      <input type='text' name='nombre' placeholder='Nombre' value='".$reg[1]."'> <br>
                      <label>Apellidos</lanel> <br>
                      <input type='text' name='apellidos' placeholder='Apellido' value='".$reg[2]."'> <br>
                      <label>Telefono</lanel> <br>
                      <input type='tel' name='telefono' placeholder='Telefono' value='".$reg[3]."'> <br>
                      <label>Correo</lanel> <br>
                      <input type='email' name='correoNuevo' placeholder='Correo' value='".$reg[4]."'> <br>
                      <input type='hidden' name='correoViejo' value='".$reg[4]."'>
                      <input type='hidden' name='opcion' value='5'>
                      <input type='submit' value='Actualizar' class='Registrar'></center>
                    </form>";
                    echo '</div>';
        }
    }
    public function actualizarUsuario($clave, $nombre, $apellidos, $telefono, $correoNuevo, $correoViejo ){
        if($correoNuevo!=$correoViejo){
            $registros=mysqli_query($this->conectarBD(), "SELECT * FROM usuarios WHERE correo=$correoNuevo")or 
            die(mysqli_error($this->conectarBD()));
            if($reg=mysqli_fetch_array($registros)){
                echo '<table class="tabla-usuarios">';
                echo "<tr><th>Clave</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Correo</th></tr>";
                echo "<tr><td>".$reg[0]."</td>";
                echo "<tr><td>".$reg[1]."</td>";
                echo "<tr><td>".$reg[2]."</td>";
                echo "<tr><td>".$reg[3]."</td>";
                echo "<tr><td>".$reg[4]."</td></tr>";
                echo "</table>";
                echo '<form action="../Ctrl/ctrlListarUsuario.php" method="post">
                <input type="hidden" name="opcion" value="1">
                <input type="submit" value="Regresar">
                </from>';
            }
        }else{
            $registros=mysqli_query($this->conectarBD(), "UPDATE usuarios SET clave= $clave, nombre= '$nombre', apellidos='$apellidos', telefono='$telefono', correo= '$correoNuevo' WHERE correo= '$correoViejo'")or die("Problemas al editar");
            echo '<div class="tabla-productos">';
                echo "<center><h3>Usuario modificado exitosamente</h3>";
                echo '<form action="ctrlListarUsuario.php" method="post"><input type="hidden" name="opcion" value="1">
                <input type="submit" value="Regresar" class="regresar"></form></center>';
                echo '</div>';
            
        }
    }
    public function cerrarBD(){
        mysqli_close($this->conectarBD());
    }
}
?>
     <link rel="stylesheet" href="../Vista/recursos/css/administrador.css">