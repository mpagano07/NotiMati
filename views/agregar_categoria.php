<h1 class="card-title text-center">Crear Categoria</h1>
<p class="text-muted">
    Agrega nuevas categorias al blog
</p>
<br>
<form class="form-group" action="actions/guardar_categoria.php" method="POST">
    <label for="nombre">Nombre de la categoria:</label>
    <input class="form-control" type="text" name="nombre" />
    <?php if (isset($_SESSION['errores']['nombre_categoria'])) : ?>
        <div class="alert alert-danger mt-2">
            <?= $_SESSION['errores']['nombre_categoria'] ?>
        </div>
    <?php endif; ?>
    <input class="btn btn-primary w-100 mt-3" type="submit" value="Guardar" />
</form>