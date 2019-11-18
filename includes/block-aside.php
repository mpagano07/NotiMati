<?php require_once 'includes/helpers.php'; ?>
<?php require_once 'includes/conection.php'; ?>

<!--barra lateral-->
<div id="sidebar" class="col-xl-3">

	<div id="buscador" class="card shadow m-2">
		<div class="card-body">
			<form class="form-group" action="buscar.php" method="POST">
				<input class="form-control" type="text" name="busqueda" />
				<input class="btn btn-primary w-100 mt-2" type="submit" value="Buscar" />
			</form>
		</div>
	</div>

	<?php if (isset($_SESSION['usuario'])) : ?>
		<div id="usuario-logueado" class="card shadow m-2">
			<div class="card-body">
				<h3>Bienvenido, <?= $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellido']; ?></h3>
				<h5>Posteos: <?= contarEntradasUsuario($db, $_SESSION['usuario']["id"]) ?></h5>
				<div class="list-group">
					<a class="list-group-item list-group-item-action" href="noticias.php">Agregar noticia</a>
					<a class="list-group-item list-group-item-action" href="crear-categoria.php">Crear categoria</a>
					<a class="list-group-item list-group-item-action" href="datos.php">Mis Datos</a>
					<a class="list-group-item list-group-item-action" href="close.php">Cerrar sesion</a>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php if (!isset($_SESSION['usuario'])) : ?>
		<div id="login" class="card shadow m-2">
			<div class="card-body">
				<h3 class="card-title text-center">Identificación</h3>

				<?php if (isset($_SESSION['error_login'])) : ?>
					<div class="alert alert-danger">
						<?= $_SESSION['error_login'] ?>
					</div>
				<?php endif; ?>

				<form class="form-group" action="login.php" method="POST">
					<label for="email">Email</label>
					<input class="form-control" type="email" name="email" autocomplete="email" />

					<label for="password">Contraseña</label>
					<input class="form-control" type="password" name="password" autocomplete="current-password" />

					<input class="btn btn-primary w-100 mt-2" type="submit" value="Entrar" />
				</form>
			</div>
		</div>

		<div id="register" class="card shadow m-2">
			<div class="card-body">
				<h3 class="card-title text-center">Registro</h3>

				<?php if (isset($_SESSION['completado'])) : ?>
					<div class="alert alert-success">
						<?= $_SESSION['completado'] ?>
					</div>
				<?php elseif (isset($_SESSION['errores']['general'])) : ?>
					<div class="alert alert-success">
						<?= $_SESSION['errores']['general'] ?>
					</div>
				<?php endif; ?>

				<form class="form-group" action="register.php" method="POST">
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

					<input class="btn btn-primary w-100 mt-2" type="submit" name="submit" value="Registrar" />
				</form>
				<?php borrarError() ?>
			</div>
		</div>
	<?php endif; ?>
</div>