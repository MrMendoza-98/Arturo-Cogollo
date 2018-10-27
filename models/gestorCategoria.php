<?php 

require_once 'backend/models/conexion.php';

class GestorCategoriaModel{

	#CONSULTAR TODAS LAS CATEGORIAS
	#------------------------------------
	public function mostrarCategoriasModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT idCategory, name, description, image FROM $tabla ORDER BY idCategory");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}


	#CONSULTAR UNA CATEGORIA ESPECIFICA
	#------------------------------------
	public function buscarCategoriaModel($id, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT idCategory, name, description, image FROM $tabla WHERE idCategory = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();
	}
	
}