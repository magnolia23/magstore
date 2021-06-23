<!--
    /*=============================================
    Formulario Crear producto
    =============================================*/ -->
<div id="modalNuevoProducto" >
    <div >
        <!-- Modal content-->
        <div >
            <form role="form" method="post">
                
                <div>
                    <div>
                        <br>
                        <!-- Input para Nombre del producto -->
                        <div class="form-group">
                            <div class="input-group col-xs-12 col-md-8 margin-auto">
                                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                <input type="text" class="form-control input-lg quitar-color" name="nuevoProducto" id="nuevoProducto" placeholder="Nombre del producto" autocomplete="off" required>
                            </div>
                        </div><!-- Input para Nombre del producto-->
                        <!-- Input para Nombre del precio -->
                        <div class="form-group">
                            <div class="input-group col-xs-12 col-md-8 margin-auto">
                                <span class="input-group-addon"><i class="fas fa-dollar-sign"></i></span>
                                <input type="number" class="form-control input-lg quitar-color" name="nuevoPrecio" id="nuevoPrecio" placeholder="Precio" required>
                            </div>
                        </div><!-- Input para Nombre del Inventario-->

                        <div class="form-group">
                            <div class="input-group col-xs-12 col-md-8 margin-auto">
                                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                <input type="number" class="form-control input-lg quitar-color" name="nuevoInventario" id="nuevoInventario" placeholder="Inventario" required>
                            </div>
                        </div><!-- Input para Nombre del Inventario-->

                        <!-- Input para el descripción -->
                        <div class="form-group">
                            <div class="input-group col-xs-12 col-md-8 margin-auto">
                                <span class="input-group-addon"><i class="fas fa-file-alt"></i></span>
                                <textarea class="form-control input-lg" name="nuevaDescripcion" placeholder="Descripción" required></textarea>
                            </div>
                        </div><!-- Input para el descripción -->
                        <!-- Input para el tipo -->
                        <div class="form-group">
                            <div class="panel panel-imagen centrar-texto">SUBIR IMAGEN</div>
                            <div class="margin-auto padding-5rem"><input type="file" class="nuevaFoto margin-0" name="nuevaFoto"></div>
                            <p class="help-block centrar-texto">Peso máximo de la imagen 2MB</p>
                            <div class="centrar-texto"><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px"></div>
                            <br>
                        </div>

                        <div class="form-group ">
                            <div class="input-group col-xs-12 col-md-8 margin-auto">
                                <button type="submit" class="boton-verde boton-verde-login col-xs-12 ">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $nuevoProducto = new ControladorProductos();
                $nuevoProducto->ctrNuevoProducto();
                ?>
            </form>
        </div>
    </div>
</div>