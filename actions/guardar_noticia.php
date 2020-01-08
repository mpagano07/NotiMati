<?php
if (isset($_POST)) {
    require_once '../includes/conection.php';
    $titulo      = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    $categoria   = isset($_POST['categoria']) ? (int) $_POST['categoria'] : false;
    $usuario     = $_SESSION['usuario']['id'];

    // Array de errores
    $errores = array();

    //valida los datos antes de guardarlos
    if (empty($titulo)) {
        $errores['titulo'] = "El titulo no es valido";
    }

    if (empty($descripcion)) {
        $errores['descripcion'] = "La descripcion no es valida";
    }

    if (empty($categoria) && !is_numeric($categoria)) {
        $errores['categoria'] = "La categoria no es valida";
    }

    if (count($errores) == 0) {

        if (isset($_GET['editar'])) {
            $entrada_id = $_GET['editar'];
            $usuario_id = $_SESSION['usuario']['id'];

            $sql = " UPDATE entradas SET titulo='$titulo', descripcion='$descripcion', categoria_id=$categoria
                     WHERE id = $entrada_id AND usuario_id = $usuario_id ";
        } else {

            $sql = " INSERT INTO entradas  VALUES(null, $usuario, $categoria, '$titulo', '$descripcion', CURDATE());";
        }

        $guardar = mysqli_query($db, $sql);
        if(!isset($_GET['editar']) && $guardar){
            $result = mysqli_query($db, "SELECT LAST_INSERT_ID();");
            $result_array = mysqli_fetch_assoc($result);
            $id = $result_array["LAST_INSERT_ID()"];
            header("Location: ../index.php?categoria=ver_noticia&id=$id"); 
        }
        if(isset($_GET['editar']) && $guardar){
            header("Location: ../index.php?categoria=ver_noticia&id=" . $_GET['editar']);
        }

    } else {
        //aca no llega nunca
        $_SESSION["errores_noticias"] = $errores;
    }
}
