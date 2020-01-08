<?php
require_once 'includes/conection.php';
require_once 'includes/helpers.php';

$categoria_actual = conseguirCategoria($db, $_GET['id']);
if (!isset($categoria_actual['id'])) {
	header("Location: index.php");
}
?>
<h1 class="card-title text-center">Noticias de <?= $categoria_actual['nombre'] ?></h1>

<?php
$entradas = conseguirEntradas($db, null, $_GET['id']);
if (!empty($entradas) && mysqli_num_rows($entradas) >= 1) :
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
	else :
		?>
	<div class="alert alert-warning">No hay noticias en esta categoria</div>
	<div class="text-center">
		<a href="index.php?categoria=agregar_noticia" class="btn btn-outline-primary"> Agregar noticia </a>
	</div>
<?php endif; ?>