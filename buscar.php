<?php require_once 'includes/conection.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<?php
if (!isset($_POST['busqueda'])) {
    header("Location: index.php");
}
?>
<div class="container">
    <div class="row">
        <?php require_once 'includes/header.php'; ?>
    </div>
    <div class="row">
        <div id="principal" class="col-xl-9 mt-2">
            <div class="card shadow-sm overflow-auto">
                <div class="card-body">
                    <h1 class="card-title">Busqueda: <?= $_POST['busqueda'] ?></h1>

                    <?php
                    $entradas = conseguirEntradas($db, null, null, $_POST['busqueda']);

                    if (!empty($entradas) && mysqli_num_rows($entradas) >= 1) :
                        while ($entrada = mysqli_fetch_assoc($entradas)) :
                            ?>
                            <article class="entrada">
                                <a href="entrada.php?id=<?= $entrada['id'] ?>">
                                    <h2><?= $entrada['titulo'] ?></h2>
                                    <span class="date"><?= $entrada['categoria'] . ' | ' . $entrada['fecha'] ?></span>
                                    <p>
                                        <?= substr($entrada['descripcion'], 0, 200) . "..." ?>
                                    </p>
                                </a>
                            </article>
                        <?php
                            endwhile;
                        else :
                            ?>
                        <div class="alerta">No hay noticias en esta categoria</div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <?php require_once 'includes/block-aside.php'; ?>
    </div>
    <div class="row">
        <!--pie de pagina-->
        <?php require_once 'includes/footer.php'; ?>
    </div>
</div>