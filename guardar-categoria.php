<?php

if (isset($_POST)) {

    require_once 'includes/conection.php';

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;

    // Array de errores
    $errores = array();

    //valida los datos antes de guardarlos
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_valido = true;
    } else {
        $nombre_valido = false;
        $errores['nombre'] = "El nombre no es valido";
    }

    if (count($errores) == 0) {
        $sql     = "INSERT INTO categorias  VALUES(NULL,'$nombre');";
        $guardar = mysqli_query($db, $sql);
    }
}

header("Location: index.php");
