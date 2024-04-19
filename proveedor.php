<?php
class Proveedor{
private $nombre;
private $contraseña;
private $telefono;
private $correo;
private $direccion;


//quitar la contraseña

public function Inicializar ($nombre,$contraseña,$telefono,$correo,$direccion){
$this->nombre=$nombre;
$this->contraseña=$contraseña;
$this->telefono=$telefono;
$this->correo=$correo;
$this->direccion=$direccion;
}
public function ConectarBD(){
    $con=mysqli_connect("localhost","root","","marmej1")
    or die ("Problemas con la conexión a la base de datos");
return $con;
}
public function ListarProveedor(){
    $registros=mysqli_query($this->conectarBD(), "SELECT * FROM proveedor")or 
        die("No se pudo hacer la conexión a la base de datos");
        echo '<div class="tabla-productos">';
        echo '<div class="barra-supp">';
        echo '<form action="CtrlProveedor.php" method="post">
        <input class="Buscador" type="text" placeholder="Buscar nombre del proveedor..." name="nombre">
        <input type ="hidden" name ="opcion" value="5">
        <input type= "submit" class="Buscar" value="Buscar">
        </form>';
        echo '<form action="CtrlProveedor.php" method="post">
        <input class="nuevo" type="submit" value="Nuevo">
        <input type="hidden" name="opcion" value="2"> 
        </form>';
        echo '</div>';
        echo '<table class="tablalistado">';
        echo '<tr><th>Codigo</th><th>Nombre</th><th>Contraseña</th><th>Teléfono</th><th>Correo</th><th>Dirección</th><th colspan="2">operaciones</th></tr>';
        while ($reg=mysqli_fetch_array($registros)){
            echo '<tr><td>'.$reg[0]. '</td>';
            echo '<td>'.$reg[1].'</td>';
            echo '<td>'.$reg[2]. '</td>';
            echo '<td>'.$reg[3]. '</td>';
            echo '<td>'.$reg[4]. '</td>';
            echo '<td>'.$reg[5]. '</td>';
            echo '<td><a href="CtrlProveedor.php?nombre='.$reg[1]. '&opcion=6"><i>Editar</i></a></td>';
            echo '<td><a href="CtrlProveedor.php?nombre='.$reg[1]. '&opcion=4"><i>Borrar</i></a></td></tr>';
        }
        echo '</table></div>';
    }
    public function MostrarFormulario(){
        echo 
        '<div class="tabla-formulario">
        <center><h2>Nuevo Proveedor</h2></center>
        <form action="CtrlProveedor.php" method="post" enctype="multipart/form-data">
        Ingrese el nombre del proveedor: <br>
        <input type="text" name="nombre" required> <br> 
        Ingrese la contraseña: <br>
        <input type="password" name="contraseña" required> <br>
        Ingrese el número telefónico: <br>
        <input type="text" name="telefono" required> <br>
        Ingrese su correo electrónico: <br>
        <input type="mail" name="correo" required> <br>
        Ingrese su la dirección: <br>
        <input type="text" name="direccion" required> <br>
            <br><br>
            <center>
            <input type="submit" value="Registrar" class="Registrar">
            <input type="hidden" name="opcion" value="3">
            <input type="reset" value"Cancelar" class="Cancelar">
        </form></center></div>';
    }
    public function IngresarProveedor(){
        $registro=mysqli_query($this->ConectarBD(),"SELECT * FROM proveedor WHERE nombre='$this->nombre'")
        or die(mysqli_error($this->ConectarBD()));
        if($registro=mysqli_fetch_array($registro)){
            echo '<div class="tabla-proveedor">';
            echo "<center><h3>Proveedor registrado anteriormente</h3>";
            echo '<form action="CtrlProveedor.php" method="post"><input type="hidden" name="opcion" value="1">
            <input type="submit" value="Regresar" class="regresar"> </center>';
            echo '</div>';
        }else{
            mysqli_query($this->ConectarBD(),"INSERT INTO proveedor(nombre,contraseña,telefono,correo,direccion)values
            ('$this->nombre','$this->contraseña','$this->telefono','$this->correo','$this->direccion')")
            or die ("Problemas en el insert".mysqli_error($this->ConectarBD()));
            echo "<center> <h3>El proveedor se almacenó</h3>";
            echo '<form action="CtrlProveedor.php" method="post"><input type="hidden" name="opcion" value="1">
                    <input type="submit" value="Regresar" class="regresar"></center>';
            echo '</div>';
            
        }
    }
    public function borrarProveedor($nombre){
        $registro=mysqli_query($this->conectarBD(), "SELECT * FROM proveedor WHERE nombre= '$nombre'")or 
        die("Error al conectar con la base de datos");
        if($reg=mysqli_fetch_array($registro)){
            mysqli_query($this->conectarBD(), "DELETE FROM proveedor WHERE nombre= '$nombre'")or
            die(mysqli_error($this->conectarBD()));
            echo '<div class="tabla-productos">';
            echo '<div class="tabla-proveedor">';
            echo '<form action="CtrlProveedor.php" method="post">';
            echo '<div class ="barra-supp">';
            echo '<br> <h4>Se efectuó el borrado del producto...'.$reg[1];
            echo '</h4>';
            echo '<input type="hidden" name="opcion" value="1">
                  <input type="submit" value="Regresar" class="regresar"></div>';
            echo '<table class="tablalistado">';
            echo '<tr><th>Código</th><th>Nombre</th><th>Contraseña</th><th>Teléfono</th><th>Correo</th><th>Dirección</th></tr>';
            echo '<tr><td> '.$reg[0].'</td>';
            echo '<td> '.$reg[1].'</td>';
            echo '<td> '.$reg[2].'</td>';
            echo '<td> '. $reg[3].'</td>';
            echo '<td> '. $reg[4].'</td>';
            echo '<td> '. $reg[5].'</td>';
            echo '</form></table></div>';
        }else{
            echo '<div class="tabla-proveedor">';
            echo "<center><h3>no existe el proveedor...</h3>";
            echo   '<form action="CtrlProveedor.php" method="post"><input type="hidden" name="opcion" value="1">
                  <input type="submit" value="Regresar" class="regresar"></center>';
        echo '</div></form>';     
        }
    }
    public function buscarProveedor($nombre){

                      $registro=mysqli_query($this->conectarBD(), "SELECT * FROM proveedor WHERE nombre LIKE '$nombre%'")or die(mysqli_error($this->conectarBD()));
        if($reg=mysqli_fetch_array($registro)){
            echo '<div class ="tabla-productos">';
            echo '<table class="tabla-proveedor">';
        echo '<div class ="barra-supp">';
        echo '<form><input type="hidden" name="opcion" value="1">
              <input type="submit" value="Regresar" class="regresar"></div><br></form>';
            echo '<table class="tablalistado">';
            echo '<tr><th>Codigo</th><th>Nombre</th><th>Contraseña</th><th>Teléfono</th><th>Correo</th><th>Dirección</th><th colspan="2">Operaciones</th></tr>';
                echo '<tr><td>'.$reg[0]. '</td>';
                echo '<td>'.$reg[1].'</td>';
                echo '<td>'.$reg[2]. '</td>';
                echo '<td>'.$reg[3]. '</td>';
                echo '<td>'.$reg[4]. '</td>';
                echo '<td>'.$reg[5]. '</td>';
                echo '<td><a href="CtrlProveedor.php?nombre='.$reg[1].'&opcion=6"><i>Editar</i></a></td>';
                echo '<td><a href="CtrlProveedor.php?nombre='.$reg[1].'&opcion=4"><i>Eliminar</i></a></td></tr>';
                echo '</table></div>';
        }else {
            echo "no se encontro provedor";
        }
    }
    public function modificarProveedor($nombre){
        $registro=mysqli_query($this->conectarBD(), "SELECT * FROM proveedor WHERE nombre = '$nombre'")or 
        die(mysqli_error($this->conectarBD()));
        if($reg=mysqli_fetch_array($registro)){
            echo '<div class="tabla-formulario">
                <center><h2>Actualizar proveedor</h2></center>';
            echo "<form action='CtrlProveedor.php' method='post' class='formulario' enctype='multipart/form.data'>
                 <div>  
                    <label>Codigo</label>
                      <input type='number' name='codigo' value='".$reg[0]."' readonly>
                      <label>Nuevo nombre</label>
                      <input type='text' name='nombreNuevo' placeholder='Nombre' value='".$reg[1]."'>";
                      echo "<label>Contraseña</label>
                      <input type='password' name='contraseña' placeholder='contraseña' value='".$reg[2]."'>
                      <label>Telefono</label>
                      <input type='tel' name='telefonoNuevo' placeholder='Telefono' value='".$reg[3]."'>
                      <label>Correo</label> 
                      <input type='email' name='correoNuevo' placeholder='Correo' value='".$reg[4]."'>
                      <input type='hidden' name='correoViejo' value='".$reg[4]."'>
                      <label>Direccion</label> 
                      <input type='tel' name='direccionNuevo' placeholder='Telefono' value='".$reg[5]."'> <br>";
                    echo "</div> <center>
                    <input type='hidden' name='opcion' value='7'>
                    <input type='submit' value='Registrar' class='Registrar'></center>
                    </form>";
                    echo '</div>';
        }
    }
    public function actualizarProveedor($codigo, $nombreNuevo, $contraseña, $telefonoNuevo, $correoNuevo, $correoViejo,$direccionNuevo){
        if($correoNuevo==$correoViejo){
            $registros=mysqli_query($this->conectarBD(), "UPDATE proveedor SET  nombre= '$nombreNuevo', contraseña='$contraseña', telefono='$telefonoNuevo', correo= '$correoNuevo', direccion='$direccionNuevo' WHERE correo= '$correoViejo'")or die("Problemas al editar");
            echo "Se Modificó correctamente";
            echo '<form action="CtrlProveedor.php" method="post" <input type=hidden" name="opcion" value="1">
            <input type ="submit" value="Regresar">';
        }else{
            $registros=mysqli_query($this->conectarBD(), "SELECT * FROM proveedor WHERE correo='$correoNuevo'")or 
            die(mysqli_error($this->conectarBD()));

            if($reg=mysqli_fetch_array($registros)){
                echo "<center><h3>Ese proveedor ya existe</h3></center>";
                echo "Codigo:".$reg['codigo']."<br>";
                echo "Nombre:".$reg['nombre']."<br>";
                echo "Contraseña:".$reg['contraseña']."<br>";
                echo "Teléfono:".$reg['telefono']."<br>";
                echo "Correo:".$reg['correo']."<br>";
                echo "Dirección:".$reg['direccion']."<br>";
                echo '<form action="CtrlProveedor.php" method="post"> <input type="hidden" name="opcion" value="1">
                <center><input type="submit" value="Regresar"></center>';
                echo '</div>';
            }else{
            $registros=mysqli_query($this->conectarBD(), "UPDATE proveedor SET nombre= '$nombreNuevo', contraseña='$contraseña', telefono='$telefonoNuevo', correo= '$correoNuevo',direccion='$direccionNuevo' WHERE correo= '$correoViejo'")or die("Problemas al editar");
            echo "<center><h3>La información del proveedor a sido modificada exitosamente </h3>";
            echo '<form action="CtrlProveedor.php" method="post">
            <input type="hidden" name="opcion" value="1">
                <input type="submit" value="Regresar">
                </from>';
            
        }
    }

}
public function cerrarBD(){
    mysqli_close($this->conectarBD());
}
}















?>