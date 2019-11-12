<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/block-aside.php'; ?>
<?php require_once 'includes/conection.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<?php
$entrada_actual = conseguirEntrada($db, $_GET['id']);
if (!isset($entrada_actual['id'])) {
	header("Location: index.php");
}
?>
<!--caja principal-->
<div id="principal">

	<h1><?= $entrada_actual['titulo'] ?></h1>

	<a href="categoria.php?id=<?= $entrada_actual['categoria_id'] ?>">
			<h2><?= $entrada_actual['categoria'] ?></h2>
	</a>
	<h4><?= $entrada_actual['fecha']?> | <?=$entrada_actual['usuario'] ?></h4>
	<p>
		<?= $entrada_actual['descripcion'] ?>
	</p>

	<?php if(isset($_SESSION['usuario']['id']) == $entrada_actual['usuario_id']): ?>

		<br/>
		<br/>
	 		<a href="editar-noticia.php?id<?=$entrada_actual['id']?>" class="boton">Editar noticia</a>
			<a href="eliminar-noticia.php?id<?=$entrada_actual['id']?>" class="boton">Eliminar noticia</a>	

	<?php endif; ?>

</div>

<!--pie de pagina-->
<?php require_once 'includes/footer.php'; ?>