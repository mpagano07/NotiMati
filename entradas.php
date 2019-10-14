<!--header-->
<?php require_once 'includes/header.php'; ?>

<!--barra lateral-->
<?php include 'includes/block-aside.php'; ?>
<?php include 'includes/conection.php'; ?>
<!--caja principal-->
<div id="principal">
	<h1>Todas Noticias</h1>

	<?php
	$entradas = conseguirEntradas($db);
	if (!empty($entradas)):
		while ($entradas = mysql_fetch_assoc($entradas)):
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

</div>

<!--pie de pagina-->
<?php require_once 'includes/footer.php'; ?>