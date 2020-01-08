<h1 class="card-title text-center">Mis datos</h1>
<?php if (isset($_SESSION['completado'])) : ?>
    <div class="alert alert-success">
        <?= $_SESSION['completado'] ?>
    </div>
<?php elseif (isset($_SESSION['errores']['general'])) : ?>
    <div class="alert alert-danger">
        <?= $_SESSION['errores']['general'] ?>
    </div>
<?php endif; ?>
<form class="form-group" action="actions/actualizar_usuario.php" method="POST">
    <label for="nombre">Nombre</label>
    <input class="form-control" type="text" name="nombre" value="<?= $_SESSION['usuario']['nombre']; ?>" />
    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
    <label for="apellido">Apellido</label>
    <input class="form-control" type="text" name="apellido" value="<?= $_SESSION['usuario']['apellido']; ?>" />
    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : ''; ?>
    <label for="email">Email</label>
    <input class="form-control" type="email" name="email" value="<?= $_SESSION['usuario']['email']; ?>" />
    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>
    <input class="btn btn-primary mt-3 w-100" type="submit" name="submit" value="Actualizar" />
</form>
<?php borrarError() ?>