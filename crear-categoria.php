<?php require_once 'includes/redirect.php'; ?>
<div class="container">
<div class="row">
<?php require_once 'includes/header.php'; ?>
</div>
<div class="row">
<div id="principal" class="col-xl-9 mt-2">
	<div class="card shadow-sm overflow-auto">
	<div class="card-body">
    <h1 class="card-title text-center">Crear Categoria</h1>
    <p class="text-muted">
        Agrega nuevas categorias al blog 
    </p>
    <br>
    <form class="form-group" action="guardar-categoria.php" method="POST">
        <label for="nombre">Nombre de la categoria:</label>
        <input class="form-control" type="text" name="nombre" />

        <input class="btn btn-primary w-100 mt-3"type="submit" value="Guardar" />
    </form>

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