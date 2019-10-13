<?php

function mostrarError($errores, $campo)
{
    $alerta = '';
    if (isset($errores[$campo]) && !empty($campo)) {
        $alerta = "<div class='alerta alerta-error'>" . $errores[$campo] . '</div>';
    }

    return $alerta;
}

function borrarError()
{
    $borrado = false;

    if (isset($_SESSION['errores'])) {
        $_SESSION['errores'] = null;
        $borrado = session_unset($_SESSION['errores']);
    }

    if (isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;
        session_unset($_SESSION['completado']);
    }

    return $borrado;
}

function conseguirCategorias($conection)
{ 
    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $categorias = mysqli_query($conection, $sql);
    $result = array();

    if($categorias && mysqli_num_rows($categorias) >= 1){
        $result = $categorias;
    }
    return $result;
}

function ultimasEntradas($conection)
{
    $sql="SELECT e.*, c.nombre FROM entradas e".
        "INNER JOIN categorias c ON e.categoria_id = c.id".
        "ORDER BY e.id DESC LIMIT 5";
    $entradas = mysqli_query($conection, $sql);

    $result = array();
    if ($entradas && mysqli_num_rows($entradas) >= 1) {
        $result = $entradas;
    }
    return $entradas;
}