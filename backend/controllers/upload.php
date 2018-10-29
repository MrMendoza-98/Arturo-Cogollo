<?php 
// require_once "gestorProyecto.php";

	setlocale(LC_ALL,"es_CO");
	$imagenName = date("d").date("m").date("Y").date("s");

	$route = "views/images/proyects/".$imagenName;

	$route = $route.basename($_FILES['file']['name']);

	move_uploaded_file($_FILES['file']['tmp_name'], $route);

	// $datosController = array("name" => $name, "description" => $descrip, "image" => $route, "category" => $categoria, "user" => $idUser);

	// $respuesta = GestorProyectoModel::crearProyectoModel($datosController, "projects");