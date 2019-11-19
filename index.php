<?php require_once 'includes/conection.php'; ?>
<div class="container">
	<div class="row">
		<?php require_once 'includes/header.php'; ?>
	</div>
	<div class="row">
		<div id="principal" class="col-xl-9 mt-2">
			<div class="card shadow-sm overflow-auto vh-custom">
				<div class="card-body">
					<h1 class="card-title text-center">Ultimas Noticias</h1>

					<?php
					$entradas = conseguirEntradas($db, true);
					if (!empty($entradas)) :
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
					endif;
					?>

					<div id=ver-todas class="text-center">
						<a class="btn btn-outline-primary" href="entradas.php">Ver todas las noticias</a>
					</div>
				</div>
				<?php require_once 'includes/footer.php'; ?>
			</div>
		</div>
		<?php require_once 'includes/block-aside.php'; ?>
	</div>
</div>