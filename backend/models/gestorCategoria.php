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


}