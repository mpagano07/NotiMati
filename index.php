<?php require_once 'includes/conection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Php News</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>
	<div class="container">
		<div class="row">
			<?php require_once 'includes/header.php'; ?>
		</div>
		<div class="row">
			<div id="principal" class="col-xl-9 mt-2">
				<div class="card shadow-sm overflow-auto vh-custom">
					<div class="card-body">
						<?php
						//PHP-news/index.php?categoria=ultimas&id=2
						//array(2) { ["categoria"]=> string(7) "ultimas" ["id"]=> string(1) "2" } $array
						//echo isset($id);
						parse_str($_SERVER['QUERY_STRING'], $array);
						$categoria = array();
						if (isset($array['categoria'])) {
							$categoria = $array['categoria'];
						}

						if (isset($array['id'])) {
							$id = $array['id'];
						}
						switch ($categoria) { //switch statment to get url parameter
							case 'ultimas':
								require_once 'views/ultimas_noticias.php';
								break;
							case 'todas':
								require_once 'views/todas_noticias.php';
								break;
							case 'ver_noticia':
								require_once 'views/ver_noticia.php';
								break;
							case 'agregar_noticia':
								require_once 'views/agregar_noticia.php';
								break;
							case 'editar_noticia':
								require_once 'views/editar_noticia.php';
								break;
							case 'buscar_noticias':
								require_once 'views/buscar_noticias.php';
								break;
							case 'agregar_categoria':
								require_once 'views/agregar_categoria.php';
								break;
							case 'ver_perfil':
								require_once 'views/ver_perfil.php';
								break;
							case 'ver_categoria':
								require_once 'views/ver_categoria.php';
								break;
							case 'modificar_datos':
								require_once 'views/modificar_datos.php';
								break;
							case 'admin_usuarios':
								require_once 'views/admin_usuarios.php';
								break;
							case 'admin_modificar_usuario':
								require_once 'views/admin_modificar_usuario.php';
								break;
							default:
								require_once 'views/ultimas_noticias.php';
								break;
						}
						?>
					</div>
					<?php require_once 'includes/footer.php'; ?>
				</div>
			</div>
			<?php require_once 'includes/block-aside.php'; ?>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>

</html>