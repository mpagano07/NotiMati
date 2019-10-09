
<!--barra lateral-->
<aside id="sidebar">
	<div id="login" class="block-aside">
		<h3>indentificate</h3>
		<form action="login.php" method="POST">
			<label for="email">Email</label>
			<input type="text" name="email" />

			<label for="password">Contraseña</label>
			<input type="password" name="password" />

			<input type="submit" value="Entrar" />
		</form>
	</div>

	<div id="register" class="block-aside">
		<h3>Registro</h3>
		<form action="register.php" method="POST">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" />

			<label for="apellido">Apellido</label>
			<input type="text" name="apellido" />

			<label for="email">Email</label>
			<input type="text" name="email" />

			<label for="password">Contraseña</label>
			<input type="password" name="password" />

			<input type="submit" value="Registrar" />
		</form>
	</div>
</aside>