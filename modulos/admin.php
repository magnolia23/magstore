    <?php
    if ($_SESSION["rol"] != "admin") {
        echo '<script>
        window.location="salir";
        </script>';
    }
    ?>
    <div class="contenedor">
    <?php
    include "carrusel.php";
   
?>
        <h1 class="centrar-texto">Administración de productos</h1>
        <br>
        <br>
        <div class="menu-categorias contenedor">
            <button class="menu-categorias-div" data-toggle="modal" data-target="#modalNuevoProducto">
                <p class="menu-categorias-p">Nuevo Producto</p>
            </button>
            <button class="menu-categorias-div" data-toggle="modal" data-target="#modalEditarProducto">
                <p class="menu-categorias-p">Editar producto</p>
            </button>
            <button class="menu-categorias-div" data-toggle="modal" data-target="#modalEliminarProducto">
                <p class="menu-categorias-p">Eliminar Producto</p>
            </button>
        </div>
        <br>
        <div class="box-body">
            <!-- <table class="table table-bordered table-striped tablas"> -->
            <table class="table table-bordered table-condensed  table-hover dt-responsive tabla-plugin">
                <thead>
                    <tr>
                        <th style="width: 10px;">ID</th>
                        <th>Nombre</th>
                        <th style="width: 600px;">Descripción</th>
                        <th>Foto</th>
                        <th style="width: 80px;">Inventario</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $productos = ControladorProductos::ctrMostrarProductosTabla();
                    foreach ($productos as $key => $value) {
                        echo '
                        <tr>
                            <td>' . $value["producto_id"] . '</td>
                            <td>' . $value["producto_nombre"] . '</td>
                            <td>' . $value["producto_descripcion"] . '</td>';
                        if ($value["producto_foto"] != "") {
                            echo '<td><img src="' . $value["producto_foto"] . '" alt="foto" 
                                    width="20px"></td>';
                        } else {
                            echo '<td><img src="vistas/img/productos/default/anonymous.png" alt="foto" 
                                    width="30px"></td>';
                        }
                        echo '
                        <td>' . $value["inventario"] . '</td>
                        <td>$ ' . $value["precio"] . '</td>
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <br>
    <br>
    <!--
    /*=============================================
    Formulario Crear producto
    =============================================*/ -->
    <div id="modalNuevoProducto" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form role="form" method="post" enctype="multipart/form-data">
                    <div class="modal-header" style="background:#d89d6a; color:white">
                        <button type=" button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title centrar-texto">Nuevo Producto</h4>
                    </div>
                    <div class="modal-body back-grey">
                        <div class="box-body">
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
    <!--
    /*=============================================
    Formulario Editar producto
    =============================================*/ -->
    <div id="modalEditarProducto" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form role="form" method="post" enctype="multipart/form-data">
                    <div class="modal-header" style="background:#d89d6a; color:white">
                        <button type=" button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title centrar-texto">Editar Producto</h4>
                    </div>
                    <div class="modal-body back-grey">
                        <div class="box-body">
                            <br>

                            <!-- Input para Id del producto -->
                            <div class="form-group">
                                <div class="input-group col-xs-12 col-md-8 margin-auto">
                                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                    <input type="number" class="form-control input-lg quitar-color" name="editarId" id="editarId" placeholder="Id del producto" required>
                                </div>
                            </div><!-- Input para Id del producto-->

                            <!-- Input para Nombre del producto --
                            <div class="form-group">
                                <div class="input-group col-xs-12 col-md-8 margin-auto">
                                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                    <input type="text" class="form-control input-lg quitar-color" name="editarProducto" id="editarProducto" placeholder="Nombre del producto" required>
                                </div>
                            </div><!-- Input para Nombre del producto-->

                            <!-- Input para el precio -->
                            <div class="form-group">
                                <div class="input-group col-xs-12 col-md-8 margin-auto">
                                    <span class="input-group-addon"><i class="fas fa-dollar-sign"></i></span>
                                    <input type="number" class="form-control input-lg quitar-color" name="editarPrecio" id="editarPrecio" placeholder="Precio" required>
                                </div><!-- Input para el precio -->

                            </div><!-- Input para el Inventario-->
                            <div class="form-group">
                                <div class="input-group col-xs-12 col-md-8 margin-auto">
                                    <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                    <input type="number" class="form-control input-lg quitar-color" name="editarInventario" id="editarInventario" placeholder="Inventario" required>
                                </div>
                            </div><!-- Input para el Inventario-->

                            <div class="form-group ">
                                <div class="input-group col-xs-12 col-md-8 margin-auto">
                                    <button type="submit" class="boton-verde boton-verde-login col-xs-12 ">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $editarProducto = new ControladorProductos();
                    $editarProducto->ctrEditarProducto();
                    ?>
                </form>
            </div>
        </div>
    </div>
    <!--
    /*=============================================
    Formulario Eliminar producto
    =============================================*/ -->
    <div id="modalEliminarProducto" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form role="form" method="post" enctype="multipart/form-data">
                    <div class="modal-header" style="background:#d89d6a; color:white">
                        <button type=" button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title centrar-texto">Eliminar Producto</h4>
                    </div>
                    <div class="modal-body back-grey">
                        <div class="box-body">
                            <br>

                            <!-- Input para el producto -->
                            <div class="form-group search-combo">
                                <div class="input-group search-combo">
                                    <span class="input-group-addon search-combo"><i class="fa fa-product-hunt"></i></span>
                                    <select class="form-control combo-search input-lg search-combo texto-combo" style="width: 100%" name="eliminarId" id="eliminarId">
                                        <option class="texto-combo" value="">Selecciona El Producto</option>
                                        <?php
                                        $item = null;
                                        $valor = null;
                                        $productos = ControladorProductos::ctrMostrarProductosTabla();
                                        foreach ($productos as $key => $value) {

                                            echo '<option value="' . $value["producto_id"] . '">' . $value["producto_nombre"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div><!-- Input para el producto -->

                            <div class="form-group ">
                                <div class="input-group col-xs-12 col-md-8 margin-auto">
                                    <button type="submit" class="boton-verde boton-verde-login col-xs-12 ">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $eliminarProducto = new ControladorProductos();
                    $eliminarProducto->ctrEliminarProducto();
                    ?>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDITAR PRODUCTO -->
    <div id="modalEditarProducto" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form role="form" method="post" enctype="multipart/form-data">
                    <div class="modal-header" style="background:#007700; color:white">
                        <button type=" button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title centrar-texto">Editar Producto</h4>
                    </div>
                    <div class="modal-body back-grey">
                        <div class="box-body">
                            <br>
                            <!-- Input para Nombre del producto -->
                            <div class="form-group">
                                <div class="input-group col-xs-12 col-md-8 margin-auto">
                                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                    <input type="number" class="form-control input-lg quitar-color" name="editarID" id="editarID" placeholder="ID" required>
                                </div>
                            </div><!-- Input para Nombre del producto-->
                            <!-- Input para Nombre del producto -->
                            <div class="form-group">
                                <div class="input-group col-xs-12 col-md-8 margin-auto">
                                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                    <input type="text" class="form-control input-lg quitar-color" name="editarProducto" id="editarProducto" placeholder="Nombre del producto" required>
                                </div>
                            </div><!-- Input para Nombre del producto-->
                            <!-- Input para Nombre del precio -->
                            <div class="form-group">
                                <div class="input-group col-xs-12 col-md-8 margin-auto">
                                    <span class="input-group-addon"><i class="fas fa-dollar-sign"></i></span>
                                    <input type="number" class="form-control input-lg quitar-color" name="editarPrecio" id="editarPrecio" placeholder="Precio" required>
                                </div>
                            </div><!-- Input para Nombre del Inventario-->

                            <div class="form-group">
                                <div class="input-group col-xs-12 col-md-8 margin-auto">
                                    <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                    <input type="number" class="form-control input-lg quitar-color" name="editarInventario" id="editarInventario" placeholder="Inventario" required>
                                </div>
                            </div><!-- Input para Nombre del Inventario-->

                            <!-- Input para el descripción -->
                            <div class="form-group">
                                <div class="input-group col-xs-12 col-md-8 margin-auto">
                                    <span class="input-group-addon"><i class="fas fa-file-alt"></i></span>
                                    <textarea class="form-control input-lg" name="logPassword" placeholder="Descripción" required></textarea>
                                </div>
                            </div><!-- Input para el descripción -->
                            <!-- Input para el tipo -->
                            <div class="form-group">
                                <div class="input-group col-xs-12 col-md-8 margin-auto ">
                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                    <select class="form-control input-lg no-line-height" name="nuevoTipo">
                                        <option value="">Categoria</option>
                                        <option value="Celulares">Celulares</option>
                                        <option value="Computacion">Computacion</option>
                                        <option value="Audio">Audio</option>
                                        <option value="Televisores">Televisores</option>
                                        <option value="Gadgets">Gadgets</option>
                                    </select>
                                </div>
                            </div><!-- Input para el rol -->
                            <div class="form-group">
                                <div class="panel panel-imagen centrar-texto">SUBIR IMAGEN</div>
                                <div class="margin-auto padding-5rem"><input type="file" class="nuevaImagen margin-0" name="nuevaImagen"></div>
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
                    $ingresoUsuario = new ControladorUsuarios();
                    $ingresoUsuario->ctrIngresoUsuario();
                    ?>
                </form>
            </div>

        </div>
    </div>