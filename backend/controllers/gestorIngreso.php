<?php

class Ingreso{

	public function login(){
		if (isset($_POST['emailIngreso'])) {
				$emailIngreso = $_POST["emailIngreso"];
				$passwordIngreso = $_POST["passwordIngreso"];

				//LE MANDAMOS EL CORREO PARA QUE NOS BUSQUE EL USUARIO
				$respuesta = IngresoModels::loginModel($emailIngreso, "users");
				$intentos = $respuesta['attempts'];
				$usuarioActual = $respuesta['name'];
				$maximoIntentos = 2;

				if($intentos <= $maximoIntentos){

					if($respuesta['email'] == $_POST['emailIngreso']){
						// echo "si email";
						// echo "db ".$respuesta["password"]." pass ".$_POST["passwordIngreso"];
						if(password_verify($passwordIngreso, $respuesta["password"])){


						// if(!empty($datosController['usuario'])) {
						// 	$intentos = 0;

						// 	$datosActualizar = array('usuarioActual' => $usuarioActual, "actualizarIntentos" => $intentos);

						// 	$respuestaActualizar = IngresoModels::intentosModel($datosActualizar, "usuarios");

						// 	session_start();

						// 	$_SESSION["validar"] = true;
						// 	$_SESSION["usuario"] = $usuarioActual;

						// 	header("Location:inicio");
						// }
							echo "exito";
							header("Location:inicio");
						}else{
							print "<h5 class='alert alert-danger mt-3'>Usuario o Contraseña Incorrecta 2</h5>";
						}
						
					}else{
						// $intentos = $intentos + 1;

						// $datosActualizar = array('usuarioActual' => $usuarioActual, "actualizarIntentos" => $intentos);

						// $respuestaActualizar = IngresoModels::intentosModel($datosActualizar, "usuarios");

						print "<h5 class='alert alert-danger mt-3'>Usuario o Contraseña Incorrecta</h5>";
					}

				}else{

					$intentos = 0;

					$datosActualizar = array('usuarioActual' => $usuarioActual, "actualizarIntentos" => $intentos);

					$respuestaActualizar = IngresoModels::intentosModel($datosActualizar, "usuarios");

					print "<h3 class='alert alert-danger'>Ha fallado 3 Veces, Denuestre que no es un Robot</h3>";
				}
				

			
		}
	}
}