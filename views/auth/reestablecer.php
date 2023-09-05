<div class="contenedor login">
<?php include_once __DIR__ .'/../templates/nombre-sitio.php'; ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Coloca tu Nuevo Password</p>
        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

        <?php if($mostrar) { ?>
            <form method="POST" class="formulario">
                <div class="campo">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Tu Password">
                </div>
                <input type="submit" value="Guardar Password" class="boton">
            </form>
        <?php } ?>
        <div class="acciones">
            <a href="/crear">¿Aun no tienes una cuenta? Crea una</a>
            <a href="/olvide">¿Olvidaste tu contraseña?</a>
        </div>
    </div>
</div>