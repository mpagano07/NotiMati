<?php require_once 'includes/helpers.php'; ?>
<?php require_once 'includes/conection.php'; ?>

<!--barra lateral-->
<div id="sidebar" class="col-xl-3">
	<?php if (isset($_SESSION['usuario'])) : ?>
		<div id="buscador" class="card shadow m-2">
			<div class="card-body">
				<div class="input-group">
					<form class="m-0" action="index.php?categoria=buscar_noticias" method="POST">
						<div class="input-group-append">
							<input class="form-control" type="text" name="busqueda" />
							<button class="btn btn-primary" type="submit"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
									<circle cx="11" cy="11" r="8"></circle>
									<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
								</svg></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php if (isset($_SESSION['usuario'])) : ?>
		<div id="usuario-logueado" class="card shadow m-2">
			<div class="card-body">
				<h3>Bienvenido, <?= $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellido']; ?></h3>
				<h5>Posteos: <?= contarEntradasUsuario($db, $_SESSION['usuario']["id"]) ?></h5>
				<div class="list-group">
				<?php if($_SESSION['usuario']['rol'] === 'admin'){ ?> <a class="btn btn-success w-100 mt-2" href="./index.php?categoria=admin_usuarios">Panel Administrador</a> <?php } ?>
					<a class="btn btn-primary w-100 mt-2" href="index.php?categoria=agregar_noticia">Agregar noticia</a>
					<a class="btn btn-primary w-100 mt-2" href="index.php?categoria=agregar_categoria">Crear categoria</a>
					<a class="btn btn-primary w-100 mt-2" href="index.php?categoria=modificar_datos">Mis Datos</a>
					<a class="btn btn-primary w-100 mt-2" href="./actions/cerrar_sesion.php">Cerrar sesion</a>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php if (!isset($_SESSION['usuario']) && (!isset($_GET['showRegister']))) : ?>
		<div id="login" class="card shadow m-2" style="display:block">
			<div class="card-body">
				<h3 class="card-title text-center">Identificación</h3>

				<?php if (isset($_SESSION['error_login'])) : ?>
					<div class="alert alert-danger">
						<?= $_SESSION['error_login'] ?>
					</div>
				<?php endif; ?>

				<form class="form-group" action="actions/iniciar_sesion.php" method="POST">
					<label for="email">Email</label>
					<input class="form-control" type="email" name="email" autocomplete="email" />

					<label for="password">Contraseña</label>
					<input class="form-control" type="password" name="password" autocomplete="current-password" />

					<input class="btn btn-primary w-100 mt-2" type="submit" value="Entrar" />
				</form>
				<a class="btn btn-outline-primary w-100" href="index.php?showRegister=1">Registrarse</a>
			</div>
		</div>
		<?php endif; ?>

	<?php if (!isset($_SESSION['usuario']) && (isset($_GET['showRegister']))) : ?>
		<div id="register" class="card shadow m-2">
			<div class="card-body">
				<h3 class="card-title text-center">Registro</h3>

				<?php if (isset($_SESSION['completado'])) : ?>
					<div class="alert alert-success">
						<?= $_SESSION['completado'] ?>
					</div>
				<?php elseif (isset($_SESSION['errores']['general'])) : ?>
					<div class="alert alert-danger">
						<?= $_SESSION['errores']['general'] ?>
					</div>
				<?php endif; ?>

				<form class="form-group" action="actions/registrar_usuario.php" method="POST">
					<label for="nombre">Nombre</label>
					<input class="form-control" type="text" name="nombre" autocomplete="given-name" />
					<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

					<label for="apellido">Apellido</label>
					<input class="form-control" type="text" name="apellido" autocomplete="family-name" />
					<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : ''; ?>

					<label for="email">Email</label>
					<input class="form-control" type="email" name="email" autocomplete="email" />
					<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

					<label for="password">Contraseña</label>
					<input class="form-control" type="password" name="password" autocomplete="new-password" />
					<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>

					<input id="registro" name="registrar" class="btn btn-primary w-100 mt-2" type="submit" name="submit" value="Registrar" />
				</form>
				<a class="btn btn-outline-primary w-100" href="index.php">Volver</a>
				<?php borrarError() ?>
			</div>
		</div>
	<?php endif; ?>
</div>