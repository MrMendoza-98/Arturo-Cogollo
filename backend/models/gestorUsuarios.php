<?php

require_once "conexion.php";

class GestorUsuariosModel{

	#GUARDAR ARTICULO
	#------------------------------------------------------------

	public function guardarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (name, lastName, phone, email, password, rol, attempts) VALUES (:name, :lastName, :phone, :email, :password, :rol, :attempts)");

		$stmt -> bindParam(":name", $datosModel["name"], PDO::PARAM_STR);
		$stmt -> bindParam(":lastName", $datosModel["lastname"], PDO::PARAM_STR);
		$stmt -> bindParam(":phone", $datosModel["phone"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":rol", $datosModel["rol"], PDO::PARAM_STR);
		$stmt -> bindParam(":attempts", $datosModel["attempts"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#MOSTRAR ARTÍCULOS
	#------------------------------------------------------
	public function mostrarUsuariosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT idUser, name, lastName, phone, email, rol FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#MOSTRAR USUARIO ESPECIFICO
	#------------------------------------------------------
	public function buscarUsuarioModel($id, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT idUser, name, lastName, phone, email, rol FROM $tabla WHERE idUser = :id");
		$stmt -> bindParam(":id", $id, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

	}

	#BORRAR USUARIO
	#-----------------------------------------------------
	public function borrarUsuarioModel($id, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idUser = :id");

		$stmt->bindParam(":id", $id, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#ACTUALIZAR ARTICULOS
	#---------------------------------------------------
	public function actualizarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET name = :name, lastName = :lastName, phone = :phone, email = :email, password = :password, rol = :rol, attempts = :attempts WHERE idUser = :idUser");	

		$stmt -> bindParam(":name", $datosModel["name"], PDO::PARAM_STR);
		$stmt -> bindParam(":lastName", $datosModel["lastname"], PDO::PARAM_STR);
		$stmt -> bindParam(":phone", $datosModel["phone"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":rol", $datosModel["rol"], PDO::PARAM_STR);
		$stmt -> bindParam(":attempts", $datosModel["attempts"], PDO::PARAM_STR);
		$stmt -> bindParam(":idUser", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	

}