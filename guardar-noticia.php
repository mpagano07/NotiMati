<?php

if(isset($_POST)){

    require_once 'includes/conection.php';

    $titulo      = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    $categoria   = isset($_POST['categorias']) ? (int)$_POST['categorias'] : false;
    $usuario     = $_SESSION['usuario']['id'];

    // Array de errores
    $errores = array();

    //valida los datos antes de guardarlos
    if(empty($titulo)){
        $errores['titulo'] = "El titulo no es valido";
    }

    if(empty($descripcion)){
        $errores['descripcion'] = "La descripcion no es valida";
    }

    if(empty($categoria) && !is_numeric($categoria)){
        $errores['categoria'] = "La categoria no es valida";
    }

    if (count($errores) == 0)  {
        $sql     = "INSERT INTO entradas  VALUES(null, $usuario, $categoria, '$titulo', '$descripcion', CURDATE());";
        $guardar = mysqli_query($db, $sql);

        header ("Location: index.php");
    }else{
        $_SESSION["errores_noticias"] = $errores;

        header ("Location: noticias.php");
    }
}
