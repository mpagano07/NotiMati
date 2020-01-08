<?php
require_once '../includes/conection.php';

if (isset($_GET['id'])) {
    $usuario_id = $_GET['id'];

    $sql        = " DELETE FROM usuarios WHERE id = $usuario_id ";
    $eliminar   = mysqli_query($db, $sql);
}
header("Location: ../index.php?categoria=admin_usuarios");
