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



}