<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/block-aside.php'; ?>
<?php require_once 'includes/conection.php'; ?>

<!--caja principal-->
<div id="principal">
	<h1>Ultimas Noticias</h1>

	<?php
		$entradas = ultimasEntradas($db);
		if(!empty($entradas)):
			// while($entradas = mysql_fetch_assoc($entrada)) :
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
			// endwhile;
		endif;
	?>

	<div id=ver-todas>
		<a href="">Ver todas las entradas</a>
	</div>

</div>

<!--pie de pagina-->
<?php require_once 'includes/footer.php'; ?>