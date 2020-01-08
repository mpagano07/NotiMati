<?php

require_once '../includes/conection.php';
// datos del formulario
if (isset($_POST)) {

    // borra sesion anterior
    if (isset($_SESSION['error_login'])) {
        session_unset($_SESSION['error_login']);
    }

    $email = trim($_POST['email']);
    $password = $_POST['password'];


    //consulta para comprobar las credenciales del usuario
    $sql   = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $sql);

    if ($login && mysqli_num_rows($login) == 1) {
        $usuario = mysqli_fetch_assoc($login);

        //comprobar la contraseña 
        $verify = password_verify($password, $usuario['password']);

        if ($verify) {
            //Utiliar una sesion para guardar los datos del usuario logueado 
            $_SESSION['usuario'] = $usuario;
        } else {
            //si algo falla enviar una sesion con el fallo 
            $_SESSION['error_login'] = "Login incorrecto";
        }
    } else {
        //mensaje de error 
        $_SESSION['error_login'] = "Login incorrecto";
    }
}

//Redirigir al index
header('Location: ../index.php');
