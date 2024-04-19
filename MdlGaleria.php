<?php 
 class productos{

    public function ConectarBd(){
    $con=mysqli_connect("localhost","root","","marmej1")or die("Problemas con la conexión a la base de datos");
    return $con;
    }
    public function ListarLacteo(){
        $registros=mysqli_query($this->ConectarBD(),"SELECT * FROM proveedor INNER JOIN productos ON proveedor.codigo=productos.c_proveedor WHERE tipo='Lacteo' ")or die(mysqli_error($this->ConectarBD()));
        while($reg=mysqli_fetch_array($registros)){
        echo '
        <div class="product">
        <div class="item">
        <div class="contenedor-foto">
        <img height="200px" src="data:image/jpg;base64,'; echo base64_encode($reg['imagen']).'"/>
        </div>
        <h2>'.$reg['nombreproducto'].'</h2>
        <p class="descripcion">'.$reg['descripcion'].'</p>
        <p class="descripcion">'.$reg['nombre'].'</p>
        <span class="precio">$'.$reg['precio'].'.00</span><br>
        <button class="buton">Agregar al carrito</button>
        </div>
        </div>';
        }
    }
    public function ListarEmbutido(){
        $registros=mysqli_query($this->ConectarBD(),"SELECT * FROM proveedor INNER JOIN productos ON proveedor.codigo=productos.c_proveedor WHERE tipo='Embutido' ")or die(mysqli_error($this->ConectarBD()));
        while($reg=mysqli_fetch_array($registros)){
        echo '
        <div class="product">
        <div class="item">
        <div class="contenedor-foto">
        <img height="200px" src="data:image/jpg;base64,'; echo base64_encode($reg['imagen']).'"/>
        </div>
        <h2>'.$reg['nombreproducto'].'</h2>
        <p class="descripcion">'.$reg['descripcion'].'</p>
        <p class="descripcion">'.$reg['nombre'].'</p>
        <span class="precio">$'.$reg['precio'].'.00</span><br>
        <button class="buton">Agregar al carrito</button>
        </div>
        </div>';
        }
    }
    public function ListarEnlatado(){
        $registros=mysqli_query($this->ConectarBD(),"SELECT * FROM proveedor INNER JOIN productos ON proveedor.codigo=productos.c_proveedor WHERE tipo='Enlatado' ")or die(mysqli_error($this->ConectarBD()));
        while($reg=mysqli_fetch_array($registros)){
        echo '
        <div class="product">
        <div class="item">
        <div class="contenedor-foto">
        <img height="200px" src="data:image/jpg;base64,'; echo base64_encode($reg['imagen']).'"/>
        </div>
        <h2>'.$reg['nombreproducto'].'</h2>
        <p class="descripcion">'.$reg['descripcion'].'</p>
        <p class="descripcion">'.$reg['nombre'].'</p>
        <span class="precio">$'.$reg['precio'].'.00</span><br>
        <button class="buton">Agregar al carrito</button>
        </div>
        </div>';
        }
    }
    


    public function CerrarBD(){
        mysqli_close($this->ConectarBD());
    }
 }


?>