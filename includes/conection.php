<?php

$server   = "localhost";
$username = "root";
$password = "Entrar";
$database = "blog_noticias";
$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'uft8'");

// inicia la sesion
session_start();

// try
// {
//     #$server="localhost";
//     $server="localhost";
//     #$server="10.11.186.249";
//     $user="sa";
//     $passwd="SysAdmin0112";
//     $db="tp_php";
//   //Opciones de la conexión
//   $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
//   $connPDO = new PDO('mysql:host='.$server.';dbname='.$db.'',$user,$passwd);
// }
// catch(PDOException $e)
// {
//     echo "Falla de conexion: " . $e->getMessage();
// }
// ?>