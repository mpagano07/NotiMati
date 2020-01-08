<?php require_once 'includes/conection.php'; ?>
<h1 class="card-title text-center">Todas las Noticias</h1>
<?php
$entradas = conseguirEntradas($db);
if (!empty($entradas)) :
	while ($entrada = mysqli_fetch_assoc($entradas)) :
		?>
		<article class="card p-3 m-3">
			<a href="index.php?categoria=ver_noticia&id=<?= $entrada['id'] ?>">
				<h2 class="card-title"><?= $entrada['titulo'] ?></h2>
			</a>
			<span class="card-subtitle text-muted"><?= $entrada['categoria'] . ' | ' . $entrada['fecha'] ?></span>
			<p>
				<?= substr($entrada['descripcion'], 0, 200) . "..." ?>
			</p>
			<p class="text-muted">Escrita por <a href="index.php?categoria=ver_perfil&id=<?= $entrada['usuario_id'] ?>"><?= $entrada['usuario'] ?></a>
		</article>
<?php
	endwhile;
endif;
?>