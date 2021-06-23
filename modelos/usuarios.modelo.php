<?php

require_once "conexion.php";

class ModeloUsuarios
{
    static public function MdlMostrarUsuarios($tabla, $item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
            $stmt = null;
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt = null;
        }
    }
    static public function mdlCrearUsuario($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla(usuario_correo, usuario_nombre, usuario_password) 
            VALUES (:usuario_correo, :usuario_nombre, :usuario_password)"
        );

        $stmt->bindParam(":usuario_correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario_nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario_password", $datos["password"], PDO::PARAM_STR);
        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }


        $stmt = null;
    }
}
