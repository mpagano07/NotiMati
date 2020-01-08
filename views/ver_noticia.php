<?php require_once 'includes/conection.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php
$entrada_actual = conseguirEntrada($db, $_GET['id']);
if (!isset($entrada_actual['id'])) {
	header("Location: index.php");
}
?>
<h1 class="card-title"><?= $entrada_actual['titulo'] ?></h1>

<a href="index.php?categoria=ver_categoria&id=<?= $entrada_actual['categoria_id'] ?>">
	<h2 class="badge badge-primary"><?= $entrada_actual['categoria'] ?></h2>
</a>
<h4><?= $entrada_actual['fecha'] ?> | <a href="index.php?categoria=ver_perfil&id=<?= $entrada_actual['usuario_id'] ?>"><?= $entrada_actual['usuario'] ?></h4> </a>
<hr />
<p>
	<?= $entrada_actual['descripcion'] ?>
</p>

<?php if (isset($_SESSION["usuario"]) && ($_SESSION['usuario']['rol'] == 'admin' || $_SESSION["usuario"]['id'] == $entrada_actual['usuario_id'])) : ?>
	<br />
	<br />
	<a href="index.php?categoria=editar_noticia&id=<?= $entrada_actual['id'] ?>" class="btn btn-warning">Editar noticia</a>
	<a href="actions/eliminar_noticia.php?id=<?= $entrada_actual['id'] ?>" class="btn btn-danger">Eliminar noticia</a>
<?php endif; ?>