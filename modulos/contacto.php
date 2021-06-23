    <main class="contenedor section contenido-centrado">
        <h2 class="fw-300 centrar-texto">
            Llena el formulario de contacto
        </h2>
        <form action="">
            <fieldset>
                <legend>Contacto</legend>
                <label for="nombre">Nombre: </label>
                <input class="form-contacto" type="text" id="nombre" placeholder="Tu nombre" class="nombre-contacto" />

                <label for="email">E-mail: </label>
                <input class="form-contacto" type="email" id="email" placeholder="Tu correo" required class="correo-contacto" />
                <label for="telefono">Teléfono: </label>
                <input class="form-contacto" type="tel" id="telefono" placeholder="Tel. celular" class="telefono-contacto" /><br>
                <label for="mensaje">Mensaje:</label>
                <textarea class="form-contacto" id="mensaje"></textarea>
            </fieldset>
            <input type="submit" class="boton boton-verde" id="boton-contacto" />
        </form>
    </main>