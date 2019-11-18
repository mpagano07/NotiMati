<?php

$server   = "localhost";
$username = "root";
$password = "root";
$database = "blog_noticias2";
$db = mysqli_connect($server, $username, $password);

mysqli_query($db, "SET NAMES 'uft8'");

if (!$db) {
    die('Could not connect: ');
}

// Make my_db the current database
$db_selected = mysqli_select_db($db, 'blog_noticias2');

if (!$db_selected) {
  // If we couldn't, then it either doesn't exist, or we can't see it.
  $sql = 'CREATE DATABASE blog_noticias2';

  if (mysqli_query($db, $sql)) {
      echo "Database blog_noticias2 created successfully\n";
  } else {
      echo 'Error creating database ' . "\n";
  }
}

mysqli_close($db);

// inicia la sesion
if(!isset($_SESSION)){
    session_start();
}

?>
