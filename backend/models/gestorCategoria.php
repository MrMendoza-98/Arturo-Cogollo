<?php 

require_once 'conexion.php';

class GestorCategoriaModel{

	#CONSULTAR TODAS LAS CATEGORIAS
	#------------------------------------
	public function mostrarCategoriasModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT idCategory, name, description, image FROM $tabla ORDER BY idCategory");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}


	#CREA CATEGORIA 
	#------------------------------------------
	public function crearCategoriaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (name, description, image) VALUES (:name, :description, :image)");

		$stmt -> bindParam(":name", $datosModel["name"], PDO::PARAM_STR);
		$stmt -> bindParam(":description", $datosModel["description"], PDO::PARAM_STR);
		$stmt -> bindParam(":image", $datosModel["image"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}


	#BUSCAR UNA CATEGORIA ESPECIFICA
	#-----------------------------------------------
	public function buscarCategoriaModel($id, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT idCategory, name, description, image FROM $tabla WHERE idCategory = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

	}


	#ACTUALIZAR CATEGORIAS
	#---------------------------------------------------
	public function editarCategoriaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET name = :name, description = :description, image = :image WHERE idCategory = :idCategory");	

		$stmt -> bindParam(":name", $datosModel["name"], PDO::PARAM_STR);
		$stmt -> bindParam(":description", $datosModel["description"], PDO::PARAM_STR);
		$stmt -> bindParam(":image", $datosModel["image"], PDO::PARAM_STR);
		$stmt -> bindParam(":idCategory", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#BORRAR CATEGORIA
	#-----------------------------------------------------
	public function borrarCategoriaModel($id, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idCategory = :id");

		$stmt->bindParam(":id", $id, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


}