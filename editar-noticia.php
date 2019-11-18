<?php
require_once 'includes/redirect.php';
require_once 'includes/conection.php';
require_once 'includes/helpers.php';


$entrada_actual = conseguirEntrada($db, $_GET['id']);
if (!isset($entrada_actual['id'])) {
    header("Location: index.php");
}
?>
<div class="container">
<div class="row">
<?php require_once 'includes/header.php'; ?>
</div>
<div class="row">
<div id="principal" class="col-xl-9 mt-2">
	<div class="card shadow-sm overflow-auto vh-custom">
	<div class="card-body">
    <h1 class="card-title text-center">Editar Noticia</h1>
    <p>
        Edita tu entrada: <?=$entrada_actual['titulo']?>
    </p>
    <br>
    <form class="form-group" action="guardar-noticia.php?editar=<?=$entrada_actual['id']?>" method="POST">
        <label for="titulo">Titulo:</label>
        <input class="form-control" type="text" name="titulo" value="<?=$entrada_actual['titulo']?>"/>
        <?php echo isset($_SESSION['errores_noticias']) ? mostrarError($_SESSION['errores_noticias'], 'titulo') : ''; ?>
        
        <label for="descripcion">Descripción:</label>
        <textarea class="form-control" name="descripcion"><?=$entrada_actual['descripcion']?></textarea>
        <?php echo isset($_SESSION['errores_noticias']) ? mostrarError($_SESSION['errores_noticias'], 'descripcion') : ''; ?>
        
        <label for="categoria">Categoria</label>
        <select class="form-control" name="categoria">
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

        <input class="btn btn-primary w-100 mt-3" type="submit" value="Guardar" />
    </form>
    <?php borrarError();?>
	<div id=ver-todas>
		<a href="">Ver todas las noticias</a>
	</div>

</div>
</div>
</div>
<?php require_once 'includes/block-aside.php'; ?>
</div>
<div class="row">
<!--pie de pagina-->
<?php require_once 'includes/footer.php'; ?>
</div>
</div>