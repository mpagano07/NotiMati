<?php
session_start();

if(!isset($_SESSION)){
    session_start();
}

if (!isset($_SESSION['usuarios'])) {
    header("Location: index.php");
}