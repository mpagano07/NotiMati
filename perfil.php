<?php require_once 'includes/redirect.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php require_once 'includes/conection.php'; ?>
<?php
$perfil = conseguirUsuario($db,$_GET['id']);
?>
<div class="container">
<div class="row">
<?php require_once 'includes/header.php'; ?>
</div>
<div class="row">
<div id="principal" class="col-xl-9 mt-2">
	<div class="card shadow-sm">
	<div class="card-body">
    <h1 class="card-title text-center"><?=$perfil['nombre'] . ' ' . $perfil['apellido']?></h1>
    <h5 class="card-subtitle text-center"><?=$perfil['email']?></h3>
    <h5 class="card-subtitle text-center">Noticias: <?=contarEntradasUsuario($db,$_GET['id'])?></h3>
    <?php
	$entradas = conseguirEntradasUsuario($db, $_GET['id']);
	if (!empty($entradas)):
		while ($entrada = mysqli_fetch_assoc($entradas)):
	?>
			<article class="card p-3 m-3">
				<a href="entrada.php?id=<?=$entrada['id']?>">
					<h2 class="card-title"><?=$entrada['titulo']?></h2>
					</a>
					<span class="card-subtitle text-muted"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
					<p>
						<?=substr($entrada['descripcion'], 0, 200)."..."?>
					</p>
					<p class="text-muted">Escrita por <a href="perfil.php?id=<?=$_GET['id']?>"><?=$perfil['nombre'] . ' ' . $perfil['apellido'] ?></a>
			</article>
	<?php
		endwhile;
	endif;
	?>
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