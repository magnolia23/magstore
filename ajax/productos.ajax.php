<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";



class AjaxProductos
{
    public $validarProducto;
    public $validarProductoID;
    public function ajaxValidarProducto()
    {
        $nombre = $this->validarProducto;
        $respuesta = ControladorProductos::ctrValidarProducto($nombre);
        echo json_encode($respuesta);
    }
    public function ajaxValidarProductoID()
    {
        $id = $this->validarProductoID;
        $respuesta = ControladorProductos::ctrValidarProductoID($id);
        echo json_encode($respuesta);
    }
}
if (isset($_POST["validarProducto"])) {
    $valProducto = new AjaxProductos();
    $valProducto->validarProducto = $_POST["validarProducto"];
    $valProducto->ajaxValidarProducto();
}
if (isset($_POST["validarProductoID"])) {
    $valProductoID = new AjaxProductos();
    $valProductoID->validarProductoID = $_POST["validarProductoID"];
    $valProductoID->ajaxValidarProductoID();
}
