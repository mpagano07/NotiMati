<?php require_once 'conection.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Altos noticias</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>
    <!--CABECERA-->
    <header id="header">
        <!--LOGO-->
        <div id="logo">
            <a href="index.pgp">
                <h1>Noticias</h1>
            </a>
        </div>

        <!--MENU-->
        <nav id="nav">
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>
                <?php
                $categorias = conseguirCategorias($db);
                if (!empty($categorias)) :
                    while ($categoria = mysqli_fetch_assoc($categorias)) :
                        ?>
                        <li>
                            <a href="crear-categoria.php?id=<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></a>
                        </li>
                <?php
                    endwhile;
                    endif;
                ?>
            </ul>
        </nav>
    </header>
    <div id="container">