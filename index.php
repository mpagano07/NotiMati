<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/block-aside.php'; ?>
<?php require_once 'includes/conection.php'; ?>

<div id="principal">
	<h1>Ultimas Noticias</h1>

	<?php
	$entradas = conseguirEntradas($db, true);
	if (!empty($entradas)):
		while ($entrada = mysqli_fetch_assoc($entradas)):
			?>
			<article class="entrada">
				<a href="">
					<h2><?=$entrada['titulo']?></h2>
					<span class="date"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
					<p>
						<?=substr($entrada['descripcion'], 0, 200)."..."?>
					</p>
				</a>
			</article>
	<?php
		endwhile;
	endif;
	?>

	<div id=ver-todas>
		<a href="entradas.php">Ver todas las entradas</a>
	</div>

</div>

<!--pie de pagina-->
<?php require_once 'includes/footer.php'; ?>