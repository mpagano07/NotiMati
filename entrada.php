<?php require_once 'includes/conection.php'; ?>
<?php require_once 'includes/helpers.php'; ?>


<?php
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
					<h1 class="card-title"><?= $entrada_actual['titulo'] ?></h1>

					<a href="categoria.php?id=<?= $entrada_actual['categoria_id'] ?>">
						<h2 class="badge badge-primary"><?= $entrada_actual['categoria'] ?></h2>
					</a>
					<h4><?= $entrada_actual['fecha'] ?> | <?= $entrada_actual['usuario'] ?></h4>
					<p>
						<?= $entrada_actual['descripcion'] ?>
					</p>

					<?php if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]['id'] == $entrada_actual['usuario_id']) : ?>

						<br />
						<br />
						<a href="editar-noticia.php?id=<?= $entrada_actual['id'] ?>" class="btn btn-warning">Editar noticia</a>
						<a href="eliminar-noticia.php?id=<?= $entrada_actual['id'] ?>" class="btn btn-danger">Eliminar noticia</a>

					<?php endif; ?>

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