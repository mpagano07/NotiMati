<?php require_once 'includes/redirect.php'; ?>
<div class="container">
<div class="row">
<?php require_once 'includes/header.php'; ?>
</div>
<div class="row">
<div id="principal" class="col-xl-9 mt-2">
<div class="card shadow-sm overflow-auto">
	<div class="card-body">
    <h1 class="card-title text-center">Crear Noticia</h1>
    <p class="text-muted">
        Agrega nuevas noticias al blog 
    </p>
    <br>
    <form class="form-group"action="guardar-noticia.php" method="POST">
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
                if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):
            ?>
            <option value="<?=$categoria['id']?>">
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