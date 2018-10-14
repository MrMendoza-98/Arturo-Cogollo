<?php

class GestorUsuario{
	
	#METODO GUARDAR USUARIO
	public function guardarUsuario(){
		
		if(isset($_POST["nameUser"]) && isset($_POST["passwordUser"]) && isset($_POST["rolUser"])){

			//tomamos los datos

			$nameUser = $_POST["nameUser"];
			$lastnameUser = $_POST["lastnameUser"];
			$phoneUser = $_POST["phoneUser"];
			$emailUser = $_POST["emailUser"];
			$passwordUser = $_POST["passwordUser"];
			$rolUser = $_POST["rolUser"];

			//INICIO DE LAS VALIDACIONES
			if(!empty($nameUser) && !empty($lastnameUser) && !empty($phoneUser) && !empty($emailUser) && !empty($passwordUser) && !empty($rolUser)){

				$passUser = crypt($passwordUser);
				// error_reporting(0);
				$datos = array('name' => $nameUser, "lastname" => $lastnameUser, "phone" => $phoneUser, "email" => $emailUser, "password" => $passUser, "rol" => $rolUser, "attempts" => 0);

				$respuesta = GestorUsuariosModel::guardarUsuarioModel($datos, "users");

				#SE DA UNA RESPUESTA

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  title: "¡OK!",
							  text: "¡El usuario ha sido creado correctamente!",
							  type: "success",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
						},

						function(isConfirm){
								 if (isConfirm) {	   
								    window.location = "usuario";
								  } 
						});


					</script>';

				}

				else{

					echo $respuesta;

				}
				#FIN DE LA RESPUESTA

			}

			#FIN DE LAS VALIDACIONES Y LA INSERCION A LA DB
		}

	}

	#FIN DEL METODO GUARDAR USUARIO


	#LISTAR LOS USUARIOS
	public function listarUsuarios(){
		echo '<h4>Listado</h4>';
	}
}