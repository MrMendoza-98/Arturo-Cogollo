<?php
require_once 'conexion.php';

class IngresoModels{

	public function loginModel($email, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT idUser, name, email, password, rol, attempts FROM $tabla WHERE email = :email");
		$stmt->bindParam(":email", $email, PDO::PARAM_STR);

		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}

}