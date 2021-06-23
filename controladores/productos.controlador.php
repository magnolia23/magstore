<?php
class ControladorProductos
{
    /* static public function ctrPlantilla()
    {
        include "vistas/plantilla.php";
    } */
    static public function ctrMostrarProductos()
    {
        $tabla = "productos";
        $respuesta = ModeloProductos::MdlMostrarProductos($tabla);
        return $respuesta;
    }
    static public function ctrMostrarCarrito($email)
    {
        $tabla = "carrito";
        $respuesta = ModeloProductos::MdlMostrarCarrito($tabla, $email);
        return $respuesta;
    }
    static public function ctrMostrarProductosTabla()
    {
        $tabla = "productos";
        $respuesta = ModeloProductos::MdlMostrarProductosTabla($tabla);
        return $respuesta;
    }
    static public function ctrEditarProducto()
    {
        if (isset($_POST["editarId"])) {
            $tabla = "productos";
            $datos = array(
                "id" => $_POST["editarId"],
                "precio" => $_POST["editarPrecio"],
                "inventario" => $_POST["editarInventario"],
            );
            $respuesta = ModeloProductos::mdlEditarProducto($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    swal.fire({
                        icon:"success",
                        title: "Producto modificado con éxito",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false 
                    }).then((result)=>{
                        if(result.value){
                            window.location="admin";
                        }
                    });
                    </script>';
            } else {
                echo '<script>
                    swal.fire({
                        icon:"error",
                        title: "Producto no modificado con éxito",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false 
                    }).then((result)=>{
                        if(result.value){
                            window.location="admin";
                        }
                    });
                    </script>';
            }
        }
    }
    static public function ctrValidarProducto($nombre)
    {
        $tabla = "productos";
        $respuesta = ModeloProductos::mdlValidarProducto($tabla, $nombre);
        return $respuesta;
    }
    static public function ctrValidarProductoID($id)
    {
        $tabla = "productos";
        $respuesta = ModeloProductos::mdlMostrarProducto($tabla, $id);
        return $respuesta;
    }
    static public function ctrEliminarProducto()
    {
        if (isset($_POST["eliminarId"])) {
            $tabla = "productos";
            $datos = $_POST["eliminarId"];
            $foto = ModeloProductos::mdlFotoProducto($tabla, $datos);
            $nombre = ModeloProductos::mdlNombreProducto($tabla, $datos);
            $respuesta = ModeloProductos::mdlEliminarProducto($tabla, $datos);
            if ($respuesta == "ok") {
                unlink($foto["producto_foto"]);
                rmdir('vistas/img/productos/' . $nombre["producto_nombre"]);

                echo '<script>
                    swal.fire({
                        icon:"success",
                        title: "Producto eliminado con éxito",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false 
                    }).then((result)=>{
                        if(result.value){
                            window.location="admin";
                        }
                    });
                    </script>';
            } else {
                echo '<script>
                    swal.fire({
                        icon:"error",
                        title: "Producto no eliminado con éxito",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false 
                    }).then((result)=>{
                        if(result.value){
                            window.location="admin";
                        }
                    });
                    </script>';
            }
        }
    }
    static public function ctrNuevoProducto()
    {
        if (isset($_POST["nuevoProducto"])) {
            $ruta = "";
            if (isset($_FILES["nuevaFoto"]["tmp_name"])) {
                list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
                $nuevoAncho = 184;
                $nuevoAlto = 220;
                $directorio = "vistas/img/productos/" . $_POST["nuevoProducto"];
                mkdir($directorio, 0755);
                /* De acuerdo al tipo de imagen, se hace algo diferente */

                if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {
                    $aleatorio = mt_rand(100, 999);
                    $ruta = "vistas/img/productos/" . $_POST["nuevoProducto"] . "/" . $aleatorio . ".jpg";
                    $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                    imagejpeg($destino, $ruta);
                } else if ($_FILES["nuevaFoto"]["type"] == "image/png") {
                    $aleatorio = mt_rand(100, 999);
                    $ruta = "vistas/img/productos/" . $_POST["nuevoProducto"] . "/" . $aleatorio . ".png";
                    $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                    imagepng($destino, $ruta);
                }else{
                    $aleatorio = mt_rand(100, 999);
                    $ruta = "vistas/img/productos/default/anonymous.png";
                }
            }
            $tabla = "productos";
            $datos = array(
                "producto" => $_POST["nuevoProducto"],
                "precio" => $_POST["nuevoPrecio"],
                "inventario" => $_POST["nuevoInventario"],
                "descripcion" => $_POST["nuevaDescripcion"],
                "foto" => $ruta
            );
            //var_dump($datos);
            $respuesta = ModeloProductos::mdlNuevoProducto($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    swal.fire({
                        icon:"success",
                        title: "Producto registrado con éxito",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false 
                    }).then((result)=>{
                        if(result.value){
                            window.location="admin";
                        }
                    });
                    </script>';
            } else {
                echo '<script>
                    swal.fire({
                        icon:"error",
                        title: "Producto no registrado con éxito",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false 
                    }).then((result)=>{
                        if(result.value){
                            window.location="admin";
                        }
                    });
                    </script>';
            }
        }
    }
}
