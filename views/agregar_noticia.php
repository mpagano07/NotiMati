<h1 class="card-title text-center">Crear Noticia</h1>
<p class="text-muted">
    Agregar nuevas noticias al blog
</p>
<br>
<form class="form-group" action="./actions/guardar_noticia.php" method="POST">
    <label for="titulo">Titulo:</label>
    <input class="form-control" type="text" name="titulo" />
    <?php echo isset($_SESSION['errores_noticias']) ? mostrarError($_SESSION['errores_noticias'], 'titulo') : ''; ?>
    <label for="descripcion">Descripción:</label>
    <textarea class="form-control" name="descripcion"></textarea>
    <?php echo isset($_SESSION['errores_noticias']) ? mostrarError($_SESSION['errores_noticias'], 'descripcion') : ''; ?>
    <label for="categoria">Categoria</label>
    <select class="form-control" name="categoria">
        <?php echo isset($_SESSION['errores_noticias']) ? mostrarError($_SESSION['errores_noticias'], 'categoria') : ''; ?>
        <?php
        $categorias = conseguirCategorias($db);
        if (!empty($categorias)) :
            while ($categoria = mysqli_fetch_assoc($categorias)) :
                ?>
                <option value="<?= $categoria['id'] ?>">
                    <?= $categoria['nombre'] ?>
                </option>
        <?php
            endwhile;
        endif;
        ?>
    </select>
    <?php echo isset($_SESSION['errores_noticias']) ? mostrarError($_SESSION['errores_noticias'], 'categorias') : ''; ?>
    <?php if (@count($categorias) === 0) { ?> <a class="btn btn-outline-danger w-100 mt-2" href="index.php?categoria=agregar_categoria"> Crea un categoria primero </a> <?php } ?>
    <input class="btn btn-primary w-100 mt-3" type="submit" value="Guardar" <?php if (count($categorias) === 0) { ?> disabled <?php } ?>/>
</form>
<?php borrarError(); ?>