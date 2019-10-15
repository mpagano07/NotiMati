<?php require_once 'includes/redirect.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/block-aside.php'; ?>

<!--caja principal-->
<div id="principal">
    <h1>Crear Categoria</h1>
    <p>
        Agrega nuevas categorias al blog 
    </p>
    <br>
    <form action="guardar-categoria.php" method="POST">
        <label for="nombre">Nombre de la categoria:</label>
        <input type="text" name="nombre" />

        <input type="submit" value="Guardar" />
    </form>

</div>

<!--pie de pagina-->
<?php require_once 'includes/footer.php'; ?>