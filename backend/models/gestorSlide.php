<?php

require_once 'conexion.php';

class GestorSlideModel{

	#LISTAR LOS PROYECTOS 
	#-----------------------------------
	public function mostrarProyectos($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT idProject, name, image FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}

	#SE GUARDA EL PROJECT EN EL SLIDE
	public function guardarSliceModel($id, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (idProject) VALUES (:idProject)");

		$stmt -> bindParam(":idProject", $id, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();
	}


	#LISTAR LOS PROYECTOS QUE ESTAN EN EL SLICE
	#-------------------------------------------
	public function listarSlideModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT s.idProject, p.name, p.image FROM $tabla as s, projects as p WHERE s.idProject = p.idProject");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}
}