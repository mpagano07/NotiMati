<?php require_once './includes/conection.php'; ?>
<?php require_once './includes/helpers.php'; ?>
<h1 class="card-title text-center">Administración Usuarios</h1>
<table class="table table-responsive table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col w-25">Editar</th>
            <th scope="col w-25">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $usuarios = conseguirUsuarios($db);
        if (!empty($usuarios)) :
            while ($usuario = mysqli_fetch_assoc($usuarios)) :
                ?>
                <h1></h1>
                <tr>
                    <th scope="row"><?= $usuario['id'] ?></th>
                    <td><?= $usuario['nombre'] ?></td>
                    <td><?= $usuario['apellido'] ?></td>
                    <td>
                        <a href="index.php?categoria=admin_modificar_usuario&id=<?=$usuario['id']?>" class="">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                        </a>
                    </td>
                    <td>
                        <a href="./actions/eliminar_usuario.php?id=<?=$usuario['id']?>" class="">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg>
                        </a>
                    </td>
                </tr>
        <?php
            endwhile;
        endif;
        ?>
    </tbody>
</table>