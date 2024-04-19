<?php
 class Producto{
    private $nombre;
    private $descripcion;
    private $precio;
    private $cantidad;
    private $tipo;
    private $imagen;

    public function Iniciarlizar($nombre,$descripcion,$precio,$cantidad,$tipo,$imagen){
        $this->nombre=$nombre;
        $this->descripcion=$descripcion;
        $this->precio=$precio;
        $this->cantidad=$cantidad;
        $this->tipo=$tipo;
        $this->imagen=$imagen;
    }
    public function ConectarBd(){
        $con=mysqli_connect("localhost","root","","marmej1")or die("Problemas con la conexión a la base de datos");
        return $con;
    }
    public function ListarProducto(){
            $registros=mysqli_query($this->ConectarBD(),"SELECT * FROM proveedor INNER JOIN productos ON proveedor.codigo=productos.c_proveedor ")or die(mysqli_error($this->ConectarBD()));
            echo '<div class="tabla-productos">';
            echo '<div class="barra-supp">';
       echo '<form action="CtrlProducto.php" method="post">
       <input class="Buscador" type="text" placeholder="Buscar nombre del producto...." name="nombre">
       <input type="hidden" name="opcion" value="5">
       <input type="submit" class="Buscar" value="Buscar">
       </form>';
            echo '<form action="CtrlProducto.php" method="post" class="new-product-form">
            <input class="nuevo" type="submit"  value="Nuevo+">
            <input type="hidden" name="opcion" value="2">
            </form>';
       echo '</div>';
            echo'<table class="tablalistado">';
            echo '<tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Tipo</th>
                <th>Imagen</th>
                <th>Proveedor</th>
                <th colspan="2">Operaciones</th>
                </tr>';
            while($reg=mysqli_fetch_array($registros)){
                echo '<tr><td>'.$reg[6].'</td>';
                echo '<td>'.$reg['nombreproducto'].'</td>';
                echo '<td>'.$reg['descripcion'].'</td>';
                echo '<td>'.$reg['precio'].'</td>';
                echo '<td>'.$reg['cantidad'].'</td>';
                echo '<td>'.$reg['tipo'].'</td>';
                echo '<td>'.'<img height="85px" src="data:image/jpg;base64,'; echo base64_encode($reg['imagen']).'"/></td>';
                echo '<td>'.$reg['nombre'].'</td>';
                echo '<td><a href="CtrlProducto.php?codigo='.$reg[6].'&opcion=6"> <i>Editar</i></a></td>';
                echo '<td><a href="CtrlProducto.php?codigo='.$reg[6].'&opcion=4"> <i>Borrar</i></a></td></tr>';
            }
            echo '</table></div>';
            
        }
        public function MostrarFormulario(){
            $registros=mysqli_query($this->ConectarBD(),"SELECT * FROM proveedor ")or die(mysqli_error($this->ConectarBD()));
           echo 
            '<div class="tabla-formulario">
            <center><h2>Nuevo Producto</h2></center>
            <form action="CtrlProducto.php" method="post" enctype="multipart/form-data" >
            Ingrese el nombre del producto: <br>
            <input type="text" name="nombre" required> <br>
            Ingrese la descripcion del producto: <br>
            <input type="text" name="descripcion" required> <br>
            Ingrese el precio del producto: <br>
            <input type="number" name="precio" required> <br>
            Ingrese el Cantidad del producto: <br>
            <input type="number" name="cantidad" required> <br>
            Ingrese el Tipo del producto: <br>
            <Select name="tipo" required>
                <option value="Lacteo">Lacteo</option> 
                <option value="Embutido">Embutido</option>
                <option value="Enlatado">Enlatado</option>
            </Select> <br>
            Ingrese la imagen del producto: <br>
            <label class="bttn-img">Cargar Archivo...
            <input type="file" name="imagen" required></label><br>
            Seleccione el proveedor: <br>
            <select name="c_proveedor">'
            ;
            while($reg=mysqli_fetch_array($registros)){
                echo "<option value='".$reg[0]."'>".$reg['nombre']."</option>";
            }
            echo '</select><br>
            <input type="hidden" name="opcion" value="3">
            <br><br>
            <center>
            <input type="submit" value="Registrar" class="Registrar">
            <input type="reset" value="Cancelar" class="Cancelar">
            </form>
            </center></div>';
        }
    public function IngresarProducto($nombre,$descripcion,$precio,$cantidad,$tipo,$imagen,$c_proveedor){
        $registros=mysqli_query($this->ConectarBD(),"SELECT * FROM productos WHERE nombreproducto='$nombre' ")or die(mysqli_error($this->ConectarBD()));
        if($registros = mysqli_fetch_array($registros)){
            echo '<div class="tabla-productos">';
            echo "<center><h3>Producto registrado Anteriormente</h3>";
            echo '<form action="CtrlProducto.php" method="post"><input type="hidden" name="opcion" value="1">
                <input type="submit" value="Regresar" class="regresar"></center>';
                echo '</div>';    
        }else{
        mysqli_query($this->ConectarBD(),"INSERT INTO productos (nombreproducto,descripcion,precio,cantidad,tipo,imagen,c_proveedor)values
        ('$nombre','$descripcion',$precio,$cantidad,'$tipo','$imagen','$c_proveedor')")
        or die("Problemas en el insert".mysqli_error($this->ConectarBD()));
        echo '<div class="tabla-productos">';
        echo "<center><h3>El Producto se almaceno</h3>";
        echo '<form action="CtrlProducto.php" method="post"><input type="hidden" name="opcion" value="1">
                <input type="submit" value="Regresar" class="regresar"></center>';
                echo '</div>';  
        }
    }
    public function BorrarProducto($codigo){
        $registro=mysqli_query($this->conectarBd(),"SELECT * FROM proveedor INNER JOIN productos ON proveedor.codigo=productos.c_proveedor where productos.codigo='$codigo'")or
        die("Error al conectar con la base de datos");
        if($reg=mysqli_fetch_array($registro)){
        mysqli_query($this->conectarBd(),"DELETE from productos where codigo='$codigo'")or
        die(mysqli_error($this->conectarBd()));
        echo '<div class="tabla-productos">';
        echo '<div class="tabla-proveedor">';
        echo '<form action="CtrlProducto.php" method="post">';
        echo '<div class ="barra-supp">';
        echo '<br> <h4>Se efectuó el borrado del producto...'.$reg['nombreproducto'];
        echo '</h4>';
        echo '<input type="hidden" name="opcion" value="1">
              <input type="submit" value="Regresar" class="regresar"></div>';
        echo '<table class="tablalistado">';
        echo '<tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Tipo</th>
                <th>Imagen</th>
                <th>Proveedor</th>
                </tr>';
                echo '<tr><td>'.$reg[6].'</td>';
                echo '<td>'.$reg['nombreproducto'].'</td>';
                echo '<td>'.$reg['descripcion'].'</td>';
                echo '<td>'.$reg['precio'].'</td>';
                echo '<td>'.$reg['cantidad'].'</td>';
                echo '<td>'.$reg['tipo'].'</td>';
                echo '<td>'.'<img height="85px" src="data:image/jpg;base64,'; echo base64_encode($reg['imagen']).'"/></td>';
                echo '<td>'.$reg['nombre'].'</td>';
            echo '</table></div>';
        }else{
            echo '<div class="tabla-productos">';
            echo "<center><h3>No existe un producto con dicho nombre</h3>";
            echo '<form action="CtrlProducto.php" method="post"><input type="hidden" name="opcion" value="1">
                <input type="submit" value="Regresar" class="regresar"></center>';
                echo '</div>'; 
        }
    }

    public function BuscarProducto($nombre){
        $registros=mysqli_query($this->ConectarBD(),"SELECT * FROM proveedor INNER JOIN productos ON proveedor.codigo=productos.c_proveedor WHERE productos.nombreproducto LIKE'$nombre%'")or die(mysqli_error($this->ConectarBD()));
        echo '<div class="tabla-productos">';
        echo '<div class="barra-supp">';
   echo '<form action="CtrlProducto.php" method="post">
   <input class="Buscador" type="text" placeholder="Buscar nombre del producto...." name="nombre">
   <input type="hidden" name="opcion" value="5">
   <input type="submit" class="Buscar" value="Buscar">
   </form>';
        echo '<form action="CtrlProducto.php" method="post" class="new-product-form">
        <input class="nuevo" type="submit"  value="Nuevo+">
        <input type="hidden" name="opcion" value="2">
        </form>';
   echo '</div>';
        echo'<table class="tablalistado">';
        echo '<tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Tipo</th>
            <th>Imagen</th>
            <th>Proveedor</th>
            <th colspan="2">Operaciones</th>
            </tr>';
        while($reg=mysqli_fetch_array($registros)){
            echo '<tr><td>'.$reg[6].'</td>';
            echo '<td>'.$reg['nombreproducto'].'</td>';
            echo '<td>'.$reg['descripcion'].'</td>';
            echo '<td>'.$reg['precio'].'</td>';
            echo '<td>'.$reg['cantidad'].'</td>';
            echo '<td>'.$reg['tipo'].'</td>';
            echo '<td>'.'<img height="85px" src="data:image/jpg;base64,'; echo base64_encode($reg['imagen']).'"/></td>';
            echo '<td>'.$reg['nombre'].'</td>';
            echo '<td><a href="CtrlProducto.php?codigo='.$reg[6].'&opcion=6"> <i>Editar</i></a></td>';
            echo '<td><a href="CtrlProducto.php?codigo='.$reg[6].'&opcion=4"> <i>Borrar</i></a></td></tr>';
        }
        echo '</table></div>';

        }  
        public function EditarProducto($codigo){
            $registros=mysqli_query($this->ConectarBD(),"SELECT * FROM proveedor INNER JOIN productos ON proveedor.codigo=productos.c_proveedor WHERE productos.codigo='$codigo'")or die(mysqli_error($this->ConectarBD()));
            $registros2=mysqli_query($this->ConectarBD(),"SELECT * FROM proveedor")or die(mysqli_error($this->ConectarBD()));
            if($reg = mysqli_fetch_array($registros)){
                echo '<div class="tabla-formulario">
                <center><h2>Actualizar Producto</h2></center>';
                echo "<form action='CtrlProducto.php' method='post' class='formulario' enctype='multipart/form-data'>
                  <div>
                      <label>Código: </label>
                      <input type='number' name='codigo' value='".$reg[6]."' readonly>
                      <label>Nuevo nombre: </label>
                      <input type='text' name='nombreNuevo' placeholder='Nombre' value='".$reg['nombreproducto']."'>
                      <input type='hidden' name='nombreViejo' value='".$reg['nombreproducto']."'>";
                      echo "<label>Nueva Descripcion: </label>
                    <input type='text' name='descripcion' placeholder='descripcion' value='".$reg['descripcion']."'>
                      <label>Nuevo Precio: </label>
                      <input type='number' name='precio' placeholder='precio' value='".$reg['precio']."'>
                      <label>Nueva Cantidad: </label>
                      <input type='number' name='cantidad' placeholder='cantidad' value='".$reg['cantidad']."'>
                      <label>Nuevo tipo: </label>
                      <Select name='tipo'>";
                       echo "<option>".$reg['tipo']."</option>;
                        <option value='Lacteo'>Lacteo</option>
                        <option value='Embutido'>Embutido</option>
                        <option value='Enlatado'>Enlatado</option>
                     </Select>";
                     echo 'Nueva Imagen:<br>
                        <label class="bttn-img">Cargar Archivo...
                        <input type="file" name="imagenNueva" required></label><br>';
                        echo '<img height="85px" src="data:image/jpg;base64,'; echo base64_encode($reg['imagen']).'"/><br>';
                        echo '<label>Nuevo Proveedor: </label>';
                       echo  "<select name='c_proveedor'>";
                       echo "<option value='".$reg[0]."'>".$reg['nombre']."</option>";     
                         while($reg=mysqli_fetch_array($registros2)){
                        echo "<option value='".$reg[0]."'>".$reg['nombre']."</option>";
                                     }
                         echo '</select><br>';
                    echo "</div> <center>
                  <input type='hidden' name='opcion' value='7' >
                  <input type='submit' value='Actualizar' class='Registrar'></center>
              </form>";     
              echo '</div>';
            }
        }
        public function ActualizarProducto($nombreNuevo,$nombreViejo,$descripcion,$precio,$cantidad,$tipo,$imagenNueva,$c_proveedor){
            if($nombreNuevo!=$nombreViejo){
                $registros = mysqli_query($this->ConectarBd(), "SELECT * FROM proveedor INNER JOIN productos ON proveedor.codigo=productos.c_proveedor
                 WHERE  productos.codigo= '$nombreNuevo'") or die(mysqli_error($this->conectarBd()));
                if($reg=mysqli_fetch_array($registros)){
                    echo '<div class="tabla-formulario">';
                    echo "<center><h3>Producto ya existente</h3></center>";
                    echo '<div class="text">';
                    echo "Codigo:".$reg[6]."<br>";
                    echo "Nombre:".$reg['nombreproducto']."<br>";
                    echo "Descripcion:".$reg['descripcion']."<br>";
                    echo "Precio:".$reg['precio']."<br>";
                    echo "Cantidad:".$reg['cantidad']."<br>";
                    echo "Tipo:".$reg['tipo']."<br>";
                    echo "Imagen:"."<br>"; 
                    echo '<img height="85px" src="data:image/jpg;base64,'; echo base64_encode($reg['imagen']).'"/><br>';
                    echo "Proveedor:".$reg['c_proveedor']."<br>";
                    echo "</div>";
                    echo '<form action="CtrlProducto.php" method="post"><input type="hidden" name="opcion" value="1">
                    <center><input type="submit" value="Regresar" class="regresar"></center>';
                echo '</div>';
                }else{
                    echo '<div class="tabla-productos">';
                echo "<center><h3>El Producto ya fue registrado Anteriormente</h3>";
                echo '<form action="CtrlProducto.php" method="post"><input type="hidden" name="opcion" value="1">
                <input type="submit" value="Regresar" class="regresar"></form></center>';
                echo '</div>';
                }
            }else{
            $registros=mysqli_query($this->ConectarBd(), "UPDATE productos SET nombreproducto='$nombreNuevo', descripcion='$descripcion', precio='$precio', 
            cantidad='$cantidad',tipo='$tipo',imagen='$imagenNueva' , c_proveedor='$c_proveedor' WHERE productos.nombreproducto='$nombreViejo'") or 
            die("Error al ingresar el UPDATE");
            echo '<div class="tabla-productos">';
                echo "<center><h3>Producto modificado correctamente</h3>";
                echo '<form action="CtrlProducto.php" method="post"><input type="hidden" name="opcion" value="1">
                <input type="submit" value="Regresar" class="regresar"></form></center>';
                echo '</div>';
            }
        }
    public function CerrarBD(){
        mysqli_close($this->ConectarBD());
    }
 }
?>