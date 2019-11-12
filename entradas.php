<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/block-aside.php'; ?>
<?php require_once 'includes/conection.php'; ?>

<div id="principal">
	<h1>Todas las Noticias</h1>

	<?php
	$entradas = conseguirEntradas($db);
	if (!empty($entradas)):
		while ($entrada = mysqli_fetch_assoc($entradas)):
	?>
			<article class="entrada">
               <a href="entrada.php?id=<?=$entrada['id']?>">
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