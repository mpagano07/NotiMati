<?php

	$conectar=@mysql_connect('localhost','root','Entrar');

	if(!$conectar){
		echo"No Se Pudo Conectar Con El Servidor";
	}else{

		$base=mysql_select_db('noticias_para_andre');
		if(!$base){
			echo"No Se Encontro La Base De Datos";			
		}
	}

	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$correo=$_POST['correo'];
	$noticia=$_POST['noticia'];

	$sql="INSERT INTO datos VALUES('$nombre',
									'$apellido',
								   '$correo',
								   '$noticia')";

	$ejecutar=mysql_query($sql);
	
	if(!$ejecutar){
		echo"Hubo Algun Error";
	}else{
		echo"Datos Guardados Correctamente<br><a href='index.html'>Volver</a>";
	}
?>