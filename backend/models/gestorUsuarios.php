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
	public function mostrarArticulosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, titulo, introduccion, ruta, contenido FROM $tabla ORDER BY orden ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#BORRAR ARTICULOS
	#-----------------------------------------------------
	public function borrarArticuloModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

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
	public function editarArticuloModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, introduccion = :introduccion, ruta = :ruta, contenido = :contenido WHERE id = :id");	

		$stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":introduccion", $datosModel["introduccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
		$stmt -> bindParam(":contenido", $datosModel["contenido"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#ACTUALIZAR ORDEN 
	#---------------------------------------------------
	public function actualizarOrdenModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET orden = :orden WHERE id = :id");

		$stmt -> bindParam(":orden", $datos["ordenItem"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["ordenArticulos"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		}

		else{
			return "error";
		}

		$stmt -> close();

	}

	#SELECCIONAR ORDEN 
	#---------------------------------------------------
	public function seleccionarOrdenModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, titulo, introduccion, ruta, contenido FROM $tabla ORDER BY orden ASC");

		$stmt -> execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

}