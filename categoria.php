<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/block-aside.php'; ?>
<?php require_once 'includes/conection.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<?php
$categoria_actual = conseguirCategoria($db, $_GET['id']);
if (!isset($categoria_actual['id'])) {
	header("Location: index.php");
}
?>
<!--caja principal-->
<div id="principal">


	<h1>Entradas de <?= $categoria_actual['nombre'] ?></h1>

	<?php
	$entradas = conseguirEntradas($db, null, $_GET['id']);
	if (!empty($entradas) && mysqli_num_rows($entradas) >= 1) :
		while ($entrada = mysqli_fetch_assoc($entradas)) :
			?>
			<article class="entrada">
				<a href="entrada.php?id=<?=$entrada['id']?>">
					<h2><?= $entrada['titulo'] ?></h2>
					<span class="date"><?= $entrada['categoria'] . ' | ' . $entrada['fecha'] ?></span>
					<p>
						<?= substr($entrada['descripcion'], 0, 200) . "..." ?>
					</p>
				</a>
			</article>
		<?php
			endwhile;
		else :
			?>
		<div class="alerta">No hay noticias en esta categoria</div>
	<?php endif; ?>

</div>

<!--pie de pagina-->
<?php require_once 'includes/footer.php'; ?>