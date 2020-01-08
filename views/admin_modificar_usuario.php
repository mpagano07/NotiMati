<?php require_once './includes/conection.php';
 require_once './includes/helpers.php';
 parse_str($_SERVER['QUERY_STRING'], $array);
						$id = 0;
						if (isset($array['id'])) {
							$id = $array['id'];
						}
$usuario = conseguirUsuario($db,$id);
 if(isset($usuario['nombre'])){
 ?>
 <h1 class="card-title text-center">Modificar Datos</h1>
<form class="form-group" action="actions/admin_actualizar_usuario.php" method="POST">
    <label for="id">ID</label>
    <input class="form-control" type="number" name="id" value="<?= $usuario['id']; ?>" readonly/>
    <label for="nombre">Nombre</label>
    <input class="form-control" type="text" name="nombre" value="<?= $usuario['nombre']; ?>" />
    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
    <label for="apellido">Apellido</label>
    <input class="form-control" type="text" name="apellido" value="<?= $usuario['apellido']; ?>" />
    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : ''; ?>
    <label for="email">Email</label>
    <input class="form-control" type="email" name="email" value="<?= $usuario['email']; ?>" />
    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>
    <input class="btn btn-primary mt-3 w-100" type="submit" name="submit" value="Actualizar" />
    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'query') : ''; ?>
</form>
<?php 
 }else{
?>
<div class="alert alert-danger">
        <h3>Usuario no encontrado...</h3>
    </div>
<?php     
 }
borrarError() ?>