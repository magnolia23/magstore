<?php

require_once "conexion.php";

class ModeloProductos
{
    static public function mdlMostrarProductos($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
    static public function mdlMostrarCarrito($tabla, $email)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuario_correo = :usuario_correo");
        $stmt->bindParam(":usuario_correo", $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
    static public function mdlMostrarProductosTabla($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY producto_nombre DESC");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
    static public function mdlMostrarProducto($tabla, $id)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE producto_id = :producto_id");
        $stmt->bindParam(":producto_id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
        $stmt = null;
    }
    static public function mdlValidarProducto($tabla, $nombre)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE producto_nombre = :producto_nombre");
        $stmt->bindParam(":producto_nombre", $nombre, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt = null;
    }
    static public function mdlEditarProducto($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla
        SET
        inventario=:inventario,
        precio=:precio
        WHERE producto_id=:producto_id");
        $stmt->bindParam(":producto_id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":inventario", $datos["inventario"], PDO::PARAM_INT);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            //var_dump($stmt->execute());
            return "error";
        }
        //$stmt->close();
        $stmt = null;
    }
    static public function mdlEliminarProducto($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla
        WHERE producto_id=:producto_id");
        $stmt->bindParam(":producto_id", $datos, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            //var_dump($stmt->execute());
            return "error";
        }
        //$stmt->close();
        $stmt = null;
    }
    static public function mdlFotoProducto($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("SELECT producto_foto FROM $tabla WHERE producto_id = :producto_id");
        $stmt->bindParam(":producto_id", $datos, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt = null;
    }
    static public function mdlNombreProducto($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("SELECT producto_nombre FROM $tabla WHERE producto_id = :producto_id");
        $stmt->bindParam(":producto_id", $datos, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt = null;
    }
    static public function mdlNuevoProducto($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (producto_nombre,
                                producto_descripcion,
                                producto_foto,
                                inventario,
                                precio) 
        VALUES (:producto_nombre,
                :producto_descripcion,
                :producto_foto,
                :inventario,
                :precio)");

        $stmt->bindParam(":producto_nombre", $datos["producto"], PDO::PARAM_STR);
        $stmt->bindParam(":producto_descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":producto_foto", $datos["foto"], PDO::PARAM_STR);
        $stmt->bindParam(":inventario", $datos["inventario"], PDO::PARAM_INT);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            //var_dump($stmt->execute());
            return "error";
        }
        //$stmt->close();
        $stmt = null;
    }
    static function mdlAgregarCarrito($tabla, $correoUsuario, $producto, $precio)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario_correo,
                                                                producto_nombre,
                                                                producto_precio)
            VALUES( :usuario_correo,
                    :producto_nombre,
                    :producto_precio)");
        $stmt->bindParam(":usuario_correo", $correoUsuario, PDO::PARAM_STR);
        $stmt->bindParam(":producto_nombre", $producto, PDO::PARAM_STR);
        $stmt->bindParam(":producto_precio", $precio, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt = null;
    }
    static function mdlNuevaVenta($tabla, $correoUsuario, $ventaFecha, $ventaTotal)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario_correo,venta_fecha,venta_total)
                                                VALUES (:usuario_correo,
                                                :venta_fecha,
                                                :venta_total)");
        $stmt->bindParam(":usuario_correo", $correoUsuario, PDO::PARAM_STR);
        $stmt->bindParam(":venta_fecha", $ventaFecha, PDO::PARAM_STR);
        $stmt->bindParam(":venta_total", $ventaTotal, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt = null;
    }
    static function mdlVaciarCarrito($tabla, $correoUsuario)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE usuario_correo=:usuario_correo");
        $stmt->bindParam(":usuario_correo", $correoUsuario, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt = null;
    }
}
