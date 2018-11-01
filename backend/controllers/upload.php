<?php 
	require_once "../models/gestorProyecto.php";
	// require_once "../models/conexion.php";

	setlocale(LC_ALL,"es_CO");
	$imagenName = date("d").date("m").date("Y").date("s");

	$route = "../views/images/proyects/".$imagenName;

	$route = $route.basename($_FILES['file']['name']);

	move_uploaded_file($_FILES['file']['tmp_name'], $route);

	$idProyect = GestorProyectoModel::buscarUltimoCreado("projects");

	$datosController = array("idProyect" => $idProyect[0], "ruta" => $route);

	$respuesta = GestorProyectoModel::imagenesProyectoModel($datosController, "images");


		// $stmt = Conexion::conectar()->prepare("SELECT idProject FROM projects");

		// $stmt -> execute();

		// $datos = $stmt -> fetch();

		// // $stmt -> close();
		// print_r($idProyect);

