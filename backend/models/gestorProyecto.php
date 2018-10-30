<?php 

require_once 'conexion.php';

class GestorProyectoModel{

	#CONSULTAR TODAS LAS CATEGORIAS
	#------------------------------------
	public function mostrarCategoriasModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT idCategory, name, description, image FROM $tabla ORDER BY idCategory");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}


	#CREAR PROYECTO 
	#------------------------------------------
	public function crearProyectoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (name, description, image, idCategory, idUser) VALUES (:name, :description, :image, :category, :user)");

		$stmt -> bindParam(":name", $datosModel["name"], PDO::PARAM_STR);
		$stmt -> bindParam(":description", $datosModel["description"], PDO::PARAM_STR);
		$stmt -> bindParam(":image", $datosModel["image"], PDO::PARAM_STR);
		$stmt -> bindParam(":category", $datosModel["category"], PDO::PARAM_STR);
		$stmt -> bindParam(":user", $datosModel["user"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#BUSCAR EL ULTIMO PROYECTO CREADO
	#-------------------------------------------
	public function buscarUltimoCreado($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT MAX(idProject) FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();
	}

	#GUARDAR LAS IMAGENES DEL PROYECTO
	#--------------------------------------------------------
	public function imagenesProyectoModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (idProject, ruta) VALUES (:idProject, :ruta)");

		$stmt -> bindParam(":idProject", $datosModel["idProyect"], PDO::PARAM_INT);
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();
	}


	#LISTAR TODOS LOS PROYECTOS
	#------------------------------------
	public function mostrarProyectosModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT p.idProject as idProyect, p.name as name, p.description as description, p.image as imagen, p.idCategory as idCategory, p.idUser, c.name as nameCategory FROM $tabla as p, categories as c WHERE p.idCategory = c.idCategory");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}


	#BUSCAR UN PROYECTO ESPECIFICA
	#-----------------------------------------------
	public function buscarProyectoModel($id, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT idProject, name, description, image FROM $tabla WHERE idProject = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

	}

	#LISTAR TODOS LAS IMAGENES DEL PROYECTO PROYECTO ESPECIFICO
	#---------------------------------------------------------------
	public function buscarImagenesModel($id, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT idImage, idProject, ruta FROM $tabla WHERE idProject = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}


	#GUARDAR LAS IMAGENES ADICIONALES DEL PROYECTO
	#--------------------------------------------------------
	public function addImagenModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (idProject, ruta) VALUES (:idProject, :ruta)");

		$stmt -> bindParam(":idProject", $datosModel["id"], PDO::PARAM_INT);
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();
	}
}