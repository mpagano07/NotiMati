<?php require_once 'includes/redirect.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/block-aside.php'; ?>

<!--caja principal-->
<div id="principal">
    <h1>Crear Noticia</h1>
    <p>
        Agrega nuevas noticias al blog 
    </p>
    <br>
    <form action="guardar-noticia.php" method="POST">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" />

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion"></textarea>

        <label for="categoria">Categoria</label>
        <select name="categoria">
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

        <input type="submit" value="Guardar" />
    </form>

	<div id=ver-todas>
		<a href="">Ver todas las entradas</a>
	</div>

</div>

<!--pie de pagina-->
<?php require_once 'includes/footer.php'; ?>