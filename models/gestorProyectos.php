<?php 

require_once 'backend/models/conexion.php';

class GestorProyectoModel{

	#LISTAR LOS PROYECTOS SEGUN SU CATEGORIA
	#------------------------------------------
	public function listarProyectos($id, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT idProject, name, description, image, idCategory, estado FROM $tabla WHERE idCategory = :id AND estado = 0");

		$stmt -> bindParam(":id", $id, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}


	#LISTAR LAS IMAGENES SEGUN EL PROYECTO
	#--------------------------------------------------------
	public function listarImagenes($id, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT idProject, ruta, estado FROM $tabla WHERE idProject = :id AND estado = 0");

		$stmt -> bindParam(":id", $id, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}

	#LISTAR TODOS LOS PROYECTOS
	#--------------------------------------------------------
	public function listarAll($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT idProject, name, image, estado FROM $tabla WHERE estado = 0");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}

}