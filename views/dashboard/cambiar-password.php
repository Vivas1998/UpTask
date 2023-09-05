<?php include_once __DIR__ . '/header-dashboard.php'; ?>

<div class="contenedor-sm">
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

    <a href="/perfil" class="enlace">Volver</a>
    <form method="post" class="formulario" action="/cambiar-password">
        <div class="campo">
            <label for="password_actual">Password Actual</label>
            <input type="password" name="password_actual" placeholder="Tu password actual">
        </div>
        <div class="campo">
            <label for="password_nuevo">Password Nuevo</label>
            <input type="password" name="password_nuevo" placeholder="Tu password nuevo">
        </div>
        <input type="submit" value="Guardar cambios">
    </form>
</div>

<?php include_once __DIR__ . '/footer-dashboard.php'; ?>