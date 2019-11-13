<?php
require_once 'includes/redirect.php';
require_once 'includes/conection.php';
require_once 'includes/helpers.php';
require_once 'includes/header.php';
require_once 'includes/block-aside.php';

$entrada_actual = conseguirEntrada($db, $_GET['id']);
if (!isset($entrada_actual['id'])) {
    header("Location: index.php");
}
?>

<!--caja principal-->
<div id="principal">
    <h1>Editar Noticia</h1>
    <p>
        Edita tu entrada: <?=$entrada_actual['titulo']?>
    </p>
    <br>
    <form action="guardar-noticia.php?editar=<?=$entrada_actual['id']?>" method="POST">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" value="<?=$entrada_actual['titulo']?>"/>
        <?php echo isset($_SESSION['errores_noticias']) ? mostrarError($_SESSION['errores_noticias'], 'titulo') : ''; ?>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion"><?=$entrada_actual['descripcion']?></textarea>
        <?php echo isset($_SESSION['errores_noticias']) ? mostrarError($_SESSION['errores_noticias'], 'descripcion') : ''; ?>
        
        <label for="categoria">Categoria</label>
        <select name="categoria">
                <?php echo isset($_SESSION['errores_noticias']) ? mostrarError($_SESSION['errores_noticias'], 'categoria') : ''; ?>
            <?php
                $categorias = conseguirCategorias($db);
                if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):
            ?>
            <option value="<?=$categoria['id']?>" <?=($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected="selected"' : '' ?>>
                <?=$categoria['nombre']?>
            </option>
            <?php
                endwhile;
                endif;
            ?>
        </select>
        <?php echo isset($_SESSION['errores_noticias']) ? mostrarError($_SESSION['errores_noticias'], 'categorias') : ''; ?>

        <input type="submit" value="Guardar" />
    </form>
    <?php borrarError();?>
	<div id=ver-todas>
		<a href="">Ver todas las noticias</a>
	</div>

</div>

<!--pie de pagina-->
<?php require_once 'includes/footer.php'; ?>