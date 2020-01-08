<?php
if (isset($_POST)) {
    require_once '../includes/conection.php';

    if (!isset($_SESSION)) {
        session_start();
    }

    //valores del formulario 
    $nombre   = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($db, $_POST['apellido']) : false;
    $email    = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

    // Array de errores
    $errores = array();

    //valida los datos antes de guardarlos
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_valido = true;
    } else {
        $nombre_valido = false;
        $errores['nombre'] = "El nombre no es valido";
    }

    if (!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)) {
        $apellido_valido = true;
    } else {
        $apellido_valido = false;
        $errores['apellido'] = "El apellido no es valido";
    }

    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_valido = true;
    } else {
        $email_valido = false;
        $errores['email'] = "El email no es valido";
    }

    if (!empty($password)) {
        $password_valido = true;
    } else {
        $password_valido = false;
        $errores['password'] = "El password esta vacio";
    }

    $guardar_usuario = false;
    if (count($errores) == 0) {
        $guardar_usuario = true;

        // Cifrado de contraseña
        $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

        //inserta el usuario en la base de datos
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellido', '$email', '$hash', CURDATE(), null);";
        $guardar = mysqli_query($db, $sql);

        if ($guardar) {
            $_SESSION['completado'] = "El registro se completo con exito";
        } else {
            $_SESSION['errores']['general'] = "Fallo a guardar el usuario";
        }
        header('Location: ../index.php');
    } else {
        if(count($errores) > 0){
            $_SESSION['errores'] = $errores;
            header('Location: ../index.php?showRegister=1');
        }else{
            header('Location: ../index.php');
        }
    }
}
