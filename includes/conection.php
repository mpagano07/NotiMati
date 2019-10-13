<?php

$server   = "localhost";
$username = "root";
$password = "Entrar";
$database = "blog_noticias";
$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'uft8'");

// inicia la sesion
if(!isset($_SESSION)){
    session_start();
}
