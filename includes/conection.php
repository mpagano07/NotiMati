<?php

$server   = "localhost";
$username = "root";
$password = "Entrar";
$db = mysqli_connect($server, $username, $password);

mysqli_query($db, "SET NAMES 'uft8'");

if (!$db) {
  die('Could not connect: Error login to MYSQL ');
}

// Make my_db the current database
$db_selected = mysqli_select_db($db, 'blog_noticias');

if (!$db_selected) {
  session_start();
  unset($_SESSION["usuario"]); 
  session_destroy();
  header("Location: index.php");
  // If we couldn't, then it either doesn't exist, or we can't see it.
  $sql_db = 'CREATE DATABASE blog_noticias';

  if (mysqli_query($db, $sql_db)) {
    // echo "Database blog_noticias created successfully\n";
    $db_selected = mysqli_select_db($db, 'blog_noticias');

    $sql_usuarios = 'CREATE TABLE IF NOT EXISTS `usuarios` (
      `id` int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
      `nombre` varchar(255) COLLATE armscii8_bin NOT NULL,
      `apellido` varchar(255) COLLATE armscii8_bin NOT NULL,
      `email` varchar(255) COLLATE armscii8_bin NOT NULL UNIQUE,
      `password` varchar(255) COLLATE armscii8_bin NOT NULL,
      `fecha` date NOT NULL,
      `rol` varchar(255) COLLATE armscii8_bin
    ) ENGINE=InnoDB;';

    $sql_entradas = 'CREATE TABLE IF NOT EXISTS `entradas` (
      `id` int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      `usuario_id` int(255) NOT NULL,
      `categoria_id` int(255) NOT NULL,
      `titulo` varchar(255) COLLATE armscii8_bin NOT NULL,
      `descripcion` varchar(8000) COLLATE armscii8_bin NOT NULL,
      `fecha` date NOT NULL
    ) ENGINE=InnoDB;';
    $sql_categorias = 'CREATE TABLE IF NOT EXISTS `categorias` (
      `id` int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      `nombre` varchar(255) COLLATE armscii8_bin NOT NULL
    ) ENGINE=InnoDB;';


    if (mysqli_query($db, $sql_usuarios)) { } else {
      echo 'Error creating table usuarios ' . "\n";
    }
    if (mysqli_query($db, $sql_entradas)) { } else {
      echo 'Error creating table entradas ' . "\n";
    }
    if (mysqli_query($db, $sql_categorias)) { } else {
      echo 'Error creating table categorias ' . "\n";
    }
  } else {
    echo 'Error creating database ' . "\n";
  }
}

// inicia la sesion
if (!isset($_SESSION)) {
  session_start();
}
