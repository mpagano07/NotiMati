<?php
$server   = "localhost";
$username = "root";
$password = "Entrar";
$database = "noticias_para_andre";
$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'uft8'");
