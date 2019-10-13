<!--barra lateral-->
<aside id="sidebar">
	<?php if (isset($_SESSION['usuarios'])) : ?>
		<div id="usuario-logueado" class="block-aside">
			<h3>Bienvenido, <?= $_SESSION['usuarios']['nombre']. ' '.$_SESSION['usuarios']['apellido']; ?></h3>
			<a href="close.php" class="boton">Agregar noticia</a>
			<a href="categoria.php" class="boton">Crear categoria</a>
			<a href="close.php" class="boton">Mis Datos</a>
			<a href="close.php" class="boton">Cerrar sesion</a>
		</div>
	<?php endif; ?>

	<?php if (!isset($_SESSION['usuarios'])) : ?>
		<div id="login" class="block-aside">
			<h3>Identificate</h3>

			<?php if (isset($_SESSION['error_login'])) : ?>
				<div class="alerta alerta-error">
					<?= $_SESSION['error_login'] ?>
				</div>
			<?php endif; ?>

			<form action="login.php" method="POST">
				<label for="email">Email</label>
				<input type="email" name="email" />

				<label for="password">Contraseña</label>
				<input type="password" name="password" />

				<input type="submit" value="Entrar" />
			</form>
		</div>

		<div id="register" class="block-aside">
			<h3>Registro</h3>

			<?php if (isset($_SESSION['completado'])) : ?>
				<div class="alerta alerta-exito">
					<?= $_SESSION['completado'] ?>
				</div>
			<?php elseif (isset($_SESSION['errores']['general'])) : ?>
				<div class="alerta alerta-exito">
					<?= $_SESSION['errores']['general'] ?>
				</div>
			<?php endif; ?>

			<form action="register.php" method="POST">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" />
				<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

				<label for="apellido">Apellido</label>
				<input type="text" name="apellido" />
				<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : ''; ?>

				<label for="email">Email</label>
				<input type="email" name="email" />
				<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

				<label for="password">Contraseña</label>
				<input type="password" name="password" />
				<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>

				<input type="submit" name="submit" value="Registrar" />
			</form>
			<?php borrarError() ?>
		</div>
	<?php endif; ?>
</aside>