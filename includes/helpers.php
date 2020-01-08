<?php
require_once 'conection.php';

function mostrarError($errores, $campo)
{
    $alerta = '';
    if (isset($errores[$campo]) && !empty($campo)) {
        $alerta = "<div class='alert alert-danger p-0'>" . $errores[$campo] . '</div>';
    }

    return $alerta;
}

function borrarError()
{
    $borrado = false;

    if (isset($_SESSION['errores'])) {
        $_SESSION['errores'] = null;
        $borrado = true;
    }

    if (isset($_SESSION['errores_noticias'])) {
        $_SESSION['errores_noticias'] = null;
        $borrado = true;
    }

    if (isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;
        $borrado = true;
    }

    return $borrado;
}

function conseguirCategorias($conection)
{
    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $categorias = mysqli_query($conection, $sql);
    $result = array();

    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $result = $categorias;
    }
    return $result;
}

function contarEntradasUsuario($conection, $id)
{  
    $sql = "SELECT COUNT(*) FROM entradas 
            INNER JOIN usuarios ON entradas.usuario_id = usuarios.id 
            GROUP BY entradas.usuario_id "; // Que id es? no le pasas el usuario.

    $new_sql = "SELECT COUNT(1) FROM entradas where entradas.usuario_id = {$id}";

    $sumEntradas = mysqli_query($conection, $new_sql);
    return (mysqli_fetch_array($sumEntradas)[0]);
}

function conseguirCategoria($conection, $id)
{
    $sql = "SELECT * FROM categorias WHERE id = $id;";
    $categorias = mysqli_query($conection, $sql);
    $result = array();

    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $result = mysqli_fetch_assoc($categorias);
    }
    return $result;
}

function conseguirEntrada($conection, $id)
{
    $sql = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellido) AS usuario FROM entradas e 
            INNER JOIN categorias c ON e.categoria_id = c.id 
            INNER JOIN usuarios u ON e.usuario_id = u.id 
            WHERE e.id = $id ";
    $entrada = mysqli_query($conection, $sql);
    $result = array();

    if ($entrada && mysqli_num_rows($entrada) >= 1) {
        $result = mysqli_fetch_assoc($entrada);
    }
    return $result;
}

function conseguirUsuario($conection, $id)
{
    $sql = "SELECT * FROM usuarios WHERE id = $id ";
    $entrada = mysqli_query($conection, $sql);
    $result = array();

    if ($entrada && mysqli_num_rows($entrada) >= 1) {
        $result = mysqli_fetch_assoc($entrada);
    }
    return $result;
}

function conseguirEntradas($conection, $limit = null, $categoria = null, $busqueda = null)
{
    $sql = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellido) AS usuario FROM entradas e
        INNER JOIN categorias c ON e.categoria_id = c.id
        INNER JOIN usuarios u ON e.usuario_id = u.id ";

    if (!empty($categoria)) {
        $sql .= " WHERE e.categoria_id = $categoria ";
    }

    if (!empty($busqueda)) {
        $sql .= " WHERE e.titulo LIKE '%$busqueda%' ";
    }

    $sql .= " ORDER BY e.id DESC ";

    if ($limit) {
        $sql .= " LIMIT 5 ";
    }
    $entradas = mysqli_query($conection, $sql);

    $result = array();
    if ($entradas && mysqli_num_rows($entradas) >= 1) {
        $result = $entradas;
    }
    return $entradas;
}

function conseguirEntradasUsuario($conection, $usuario_id)
{
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id WHERE usuario_id = $usuario_id"; // me falta traer el usuario tambien aca
    $entradas = mysqli_query($conection, $sql);

    $result = array();
    if ($entradas && mysqli_num_rows($entradas) >= 1) {
        $result = $entradas;
    }
    return $entradas;
}

function conseguirUsuarios($conection)
{
    $sql = "SELECT * FROM usuarios";

    $sql .= " ORDER BY id DESC ";

    $usuarios = mysqli_query($conection, $sql);

    if ($usuarios && mysqli_num_rows($usuarios) >= 1) {
        $result = $usuarios;
    }

    return $usuarios;
}