<?php
$server   = "localhost";
$username = "root";
$password = "Entrar";
$database = "noti_mati";
$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'uft8'");

// inicia la sesion
session_start();