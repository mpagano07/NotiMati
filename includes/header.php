<?php require_once 'conection.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Altas noticias</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>
    <!--CABECERA-->
    <header id="header" class="w-100">
        <!--LOGO-->
        <div id="logo">
            <a href="index.php">
                <h1>Noticias</h1>
            </a>
        </div>

        <!--MENU-->
        <nav id="nav" class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <?php
                $categorias = conseguirCategorias($db);
                if (!empty($categorias)) :
                    while ($categoria = mysqli_fetch_assoc($categorias)) :
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="categoria.php?id=<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></a>
                        </li>
                <?php
                    endwhile;
                endif;
                ?>
            </ul>
        </nav>
    </header>