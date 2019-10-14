<?php

if (isset($_POST)){

    require_once 'includes/conection.php';

    //valores del formulario 
    $nombre   = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($db, $_POST['apellido']) : false;
    $email    = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;

    // Array de errores
    $errores = array();

    //valida los datos antes de guardarlos
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
       $nombre_valido = true;
    }else{
        $nombre_valido = false;
        $errores['nombre'] = "El nombre no es valido";
    }

    if(!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)){
        $apellido_valido = true;
     }else{
        $apellido_valido = false;
        $errores['apellido'] = "El apellido no es valido";
    }

    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_valido = true;
     }else{
        $email_valido = false;
        $errores['email'] = "El email no es valido";
    }

    $guardar_usuario = false;
    if (count($errores) == 0) {
        $guardar_usuario = true;
        
        //Actualizar usuario en la base de datos
        $usuario = $_SESSION['usuario'];
        $sql = "UPDATE usuarios SET".
                "nombre = '$nombre', ".
                "apellido = '$apellido', ".
                "email = '$email', ".
                "WHERE id = ".$usuario['id'];
        $guardar = mysqli_query($db, $sql);

        if ($guardar) {
            $_SESSION['usuario']['nombre'] = $nombre;
            $_SESSION['usuario']['apellido'] = $apellido;
            $_SESSION['usuario']['email'] = $email;
            
            $_SESSION['completado'] = "Los datos se actualizaron con exito";
        }else{
            $_SESSION['errores']['general'] = "Fallo a guardar actualizar los datos";
        }

    }else{
        $_SESSION['errores'] = $errores;
    }
}

header('Location: datos.php');