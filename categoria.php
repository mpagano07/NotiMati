<?php
require_once 'includes/conection.php';
require_once 'includes/helpers.php';

$categoria_actual = conseguirCategoria($db, $_GET['id']);
if (!isset($categoria_actual['id'])) {
	header("Location: index.php");
}
?>
<div class="container">
	<div class="row">
		<?php require_once 'includes/header.php'; ?>
	</div>
	<div class="row">
		<div id="principal" class="col-xl-9 mt-2">
			<div class="card shadow-sm overflow-auto vh-custom">
				<div class="card-body">

					<h1 class="card-title text-center">Noticias de <?= $categoria_actual['nombre'] ?></h1>

					<?php
					$entradas = conseguirEntradas($db, null, $_GET['id']);
					if (!empty($entradas) && mysqli_num_rows($entradas) >= 1) :
						while ($entrada = mysqli_fetch_assoc($entradas)) :
							?>
							<article class="card p-3 m-3">
								<a href="entrada.php?id=<?= $entrada['id'] ?>">
									<h2 class="card-title"><?= $entrada['titulo'] ?></h2>
								</a>
								<span class="card-subtitle text-muted"><?= $entrada['categoria'] . ' | ' . $entrada['fecha'] ?></span>
								<p>
									<?= substr($entrada['descripcion'], 0, 200) . "..." ?>
								</p>
								<p class="text-muted">Escrita por <a href="perfil.php?id=<?= $entrada['usuario_id'] ?>"><?= $entrada['usuario'] ?></a>
							</article>
						<?php
							endwhile;
						else :
							?>
						<div class="alerta">No hay noticias en esta categoria</div>
					<?php endif; ?>

				</div>
				<?php require_once 'includes/footer.php'; ?>
			</div>
		</div>
		<?php require_once 'includes/block-aside.php'; ?>
	</div>
</div>