<!--/*=============================================
Formulario sing up
=============================================*/ -->
<div id="modalCrearUsuario" >
    <div class="">
        <!-- Modal content-->
        <div class="">
            <form role="form" method="post">
                <div class="">
                    <div class="">
                        <br>
                        <!-- Input para el correo -->
                        <div class="form-group">
                            <div class="input-group col-xs-12 col-md-8 margin-auto">
                                <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                <input type="email" class="form-control input-lg" name="nuevoEmail" id="nuevoEmail" placeholder="Correo electrónico" required>
                            </div>
                        </div><!-- Input para el correo-->

                        <!-- Input para el nombre -->
                        <div class="form-group">
                            <div class="input-group col-xs-12 col-md-8 margin-auto">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoNombre" id="nuevoNombre" placeholder="Nombre Completo" required>
                            </div>
                        </div><!-- Input para el nombre-->

                        <!-- Input para el password -->
                        <div class="form-group">
                            <div class="input-group col-xs-12 col-md-8 margin-auto">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Contraseña" required>
                            </div>
                        </div><!-- Input para el password -->

                        <div class="form-group ">
                            <div class="input-group col-xs-12 col-md-8 margin-auto">
                                <button type="submit" class="boton-verde boton-verde-login col-xs-12 ">Crear Cuenta</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $crearUsuario = new ControladorUsuarios();
                $crearUsuario->ctrCrearUsuario();
                ?>
            </form>
        </div>
    </div>
</div>