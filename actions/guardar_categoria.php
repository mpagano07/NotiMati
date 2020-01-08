<?php

if (isset($_POST)) {

    require_once '../includes/conection.php';
    require_once '../includes/helpers.php';

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;

    // Array de errores
    $errores = array();
    borrarError();

    //valida los datos antes de guardarlos
    if (empty($nombre)) {
        $errores['nombre'] = "El nombre no puede estar vacio";
        $_SESSION['errores']['nombre_categoria'] = "El nombre no puede estar vacio";
        header("Location: ../index.php?categoria=agregar_categoria");
    } else if (is_numeric($nombre)) {
        $errores['nombre'] = "El nombre no puede ser un numero";
        $_SESSION['errores']['nombre_categoria'] = "El nombre no puede ser un numero";
        header("Location: ../index.php?categoria=agregar_categoria");
    } else if (preg_match("/[0-9]/", $nombre)) {
        $errores['nombre'] = "El nombre no puede ser un numero";
        $_SESSION['errores']['nombre_categoria'] = "El nombre no puede ser un numero";
        header("Location: ../index.php?categoria=agregar_categoria");
    } else
        $query = "SELECT COUNT(id) FROM categorias WHERE nombre = '" . $nombre . "'";
    $result = mysqli_query($db, $query);
    $repetido = mysqli_fetch_assoc($result);
    if ($repetido["COUNT(id)"] == 0) {
        header("Location: ../index.php?categoria=agregar_categoria");
    } else {
        $errores['nombre'] = "El nombre ya esta utilizado";
        $_SESSION['errores']['nombre_categoria'] = "El nombre esta repetido";
        header("Location: ../index.php?categoria=agregar_categoria");
    }

    if (count($errores) == 0) {
        $sql     = "INSERT INTO categorias  VALUES(NULL,'$nombre');";
        $guardar = mysqli_query($db, $sql);
        if ($guardar) {
            $result = mysqli_query($db, "SELECT LAST_INSERT_ID();");
            $result_array = mysqli_fetch_assoc($result);
            $id = $result_array["LAST_INSERT_ID()"];
            header("Location: ../index.php?categoria=ver_categoria&id=$id");
        }
    }
}
