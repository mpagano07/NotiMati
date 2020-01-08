<?php
require_once 'includes/redirect.php';
require_once 'includes/conection.php';
require_once 'includes/helpers.php';
parse_str($_SERVER['QUERY_STRING'], $array);
if (isset($array['id'])) {
    $id = $array['id'];
}
$entrada_actual = conseguirEntrada($db, $id);
?>
<h1 class="card-title text-center">Editar Noticia</h1>
<p>
    Edita tu entrada: <?= $entrada_actual['titulo'] ?>
</p>
<br>
<form class="form-group" action="actions/guardar_noticia.php?editar=<?= $id ?>" method="POST">
    <label for="titulo">Titulo:</label>
    <input class="form-control" type="text" name="titulo" value="<?= $entrada_actual['titulo'] ?>" />
    <?php echo isset($_SESSION['errores_noticias']) ? mostrarError($_SESSION['errores_noticias'], 'titulo') : ''; ?>

    <label for="descripcion">Descripción:</label>
    <textarea class="form-control" name="descripcion"><?= $entrada_actual['descripcion'] ?></textarea>
    <?php echo isset($_SESSION['errores_noticias']) ? mostrarError($_SESSION['errores_noticias'], 'descripcion') : ''; ?>

    <label for="categoria">Categoria</label>
    <select class="form-control" name="categoria">
        <?php echo isset($_SESSION['errores_noticias']) ? mostrarError($_SESSION['errores_noticias'], 'categoria') : ''; ?>
        <?php
        $categorias = conseguirCategorias($db);
        if (!empty($categorias)) :
            while ($categoria = mysqli_fetch_assoc($categorias)) :
                ?>
                <option value="<?= $categoria['id'] ?>" <?= ($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected="selected"' : '' ?>>
                    <?= $categoria['nombre'] ?>
                </option>
        <?php
            endwhile;
        endif;
        ?>
    </select>
    <?php echo isset($_SESSION['errores_noticias']) ? mostrarError($_SESSION['errores_noticias'], 'categorias') : ''; ?>

    <input class="btn btn-primary w-100 mt-3" type="submit" value="Guardar" />
</form>
<?php borrarError(); ?>