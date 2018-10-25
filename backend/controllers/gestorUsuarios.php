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
							  confirmButtonText: "Creado"
							  //closeOnConfirm: false	  
						}).then(function(){
						    window.location = "usuario";
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
		$respuesta = GestorUsuariosModel::mostrarUsuariosModel("users");
		// var_dump($respuesta);

		foreach ($respuesta as $key => $item) {
			if($item["rol"] == 1){
				$rol = 'Administrador';
			}elseif ($item["rol"] == 2) {
				$rol = ' Editor';
			}
			echo '<tr>
                  <td>'.$item["name"].'</td>
                  <td>'.$item["lastName"].'</td>
                  <td>'.$item["phone"].'</td>
                  <td>'.$item["email"].'</td>
                  <td>'.$rol.'</td>
                  <td class="text-center">
                  	<a class="btn btn-warning mr-2 editUsuario" href="index.php?action=usuario&idEdit='.$item["idUser"].'">
							<i class="fas fa-edit"></i>
                  	</a>

                  	<a class="btn btn-danger deleteUsuario" href="index.php?action=usuario&idDel='.$item["idUser"].'">
                  		<i class="fas fa-trash-alt"></i>
                  	</a>
                  </td>
              </tr>';
		}
		
		
	}

	#EDITAR LOS USUARIOS 
	#-----------------------------------------------------------
	public function editarUsuario(){
		if(isset($_GET["idEdit"])){
			$idUserEdit = $_GET["idEdit"];

			$respuesta = GestorUsuariosModel::buscarUsuarioModel($idUserEdit, "users");

			// PARA LLAMAR EL MODAL AL DARLE CLICK
			
			echo '<script>
				   $(document).ready(function()
				   {
				      $("#editUser").modal("show");
				   });
				</script>';

			// MODAL CON LOS DATOS DE EDIT

			echo '<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Editar Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <!-- INICIO DEL FORMULARIO -->
                                  <div class="col-lg-12">
                                    <div class="">
                                      <div class="card-body">
                                        <!-- INICIO DEL FORMULARIO -->
                                        <form action="" method="post">
                                          <!-- GRUPO DE INPUTS -->
                                          <!-- INPUT NOMBRE -->
                                          <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">Nombres</span>
                                              </div>
                                              <input class="form-control" id="nameUserEdit" type="text" name="nameUserEdit" value="'.$respuesta["name"].'" required>
                                              <div class="input-group-append">
                                                <span class="input-group-text">
                                                  <i class="fa fa-user"></i>
                                                </span>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- INPUT APELLIDO -->
                                          <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">Apellidos</span>
                                              </div>
                                              <input class="form-control" id="lastnameUserEdit" type="text" name="lastnameUserEdit" value="'.$respuesta["lastName"].'" required>
                                              <div class="input-group-append">
                                                <span class="input-group-text">
                                                  <i class="fa fa-user"></i>
                                                </span>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- INPUT TELEFONO -->
                                          <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">Celular / Telefono</span>
                                              </div>
                                              <input class="form-control" id="phoneUserEdit" type="number" name="phoneUserEdit" value="'.$respuesta["phone"].'" required>
                                              <div class="input-group-append">
                                                <span class="input-group-text">
                                                  <i class="fa fa-phone"></i>
                                                </span>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- INPUT EMAIL -->
                                          <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">Email</span>
                                              </div>
                                              <input class="form-control" id="emailUserEdit" type="email" name="emailUserEdit" value="'.$respuesta["email"].'" required>
                                              <div class="input-group-append">
                                                <span class="input-group-text">
                                                  <i class="fa fa-envelope"></i>
                                                </span>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- INPUT CONTRASEÑA -->
                                          <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">Password</span>
                                              </div>
                                              <input class="form-control" id="passwordUserEdit" type="password" name="passwordUserEdit" required>
                                              <div class="input-group-append">
                                                <span class="input-group-text">
                                                  <i class="fa fa-asterisk"></i>
                                                </span>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- INPUT ROL -->
                                          <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <label class="input-group-text" for="selectRol">Rol</label>
                                            </div>
                                            <select class="custom-select" id="rolUserEdit" name="rolUserEdit" required>
                                              
                                              <option value="1">Administrador</option>
                                              <option value="2">Editor</option>
                                            </select>
                                          </div>
                                          <!-- LOS BOTONES DE ACCION -->
                                          <div class="form-group form-actions">
                                            <button class="btn btn-primary" type="submit">Guardar Usuario</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                          </div>
                                        </form>
                                        <!-- FIN DEL FORMULAIO -->
                                      </div>
                                    </div>
                                  </div>
                              <!-- FIN DEL FORMULARIO -->

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>';



             // SSE TOMAN LOS DATOS DE LOS INPUTS
            $nameEdit = $_POST["nameUserEdit"];
            $lastnameEdit = $_POST["lastnameUserEdit"];
            $phoneEdit = $_POST["phoneUserEdit"];
            $emailEdit = $_POST["emailUserEdit"];
            $rolEdit = $_POST["rolUserEdit"];
            $passwordEdit = $_POST["passwordUserEdit"];

            //INICIO DE LAS VALIDACIONES
			if(!empty($nameEdit) && !empty($lastnameEdit) && !empty($phoneEdit) && !empty($emailEdit) && !empty($passwordEdit) && !empty($rolEdit)){

				$passEdit = crypt($passwordEdit);
				// error_reporting(0);
				$datos = array('id' => $respuesta["idUser"], 'name' => $nameEdit, "lastname" => $lastnameEdit, "phone" => $phoneEdit, "email" => $emailEdit, "password" => $passEdit, "rol" => $rolEdit, "attempts" => 0);

				$actualizar = GestorUsuariosModel::actualizarUsuarioModel($datos, "users");


				#SE DA UNA RESPUESTA

				if($actualizar == "ok"){

					echo'<script>

						swal({
							  title: "¡OK!",
							  text: "¡El usuario ha sido actualizado correctamente!",
							  type: "success",
							  confirmButtonText: "Creado"
							  //closeOnConfirm: false	  
						}).then(function(){
						    window.location = "usuario";
						});
						
					</script>';

				}

				else{

					echo $actualizar;

				}
				#FIN DE LA RESPUESTA

			}
		}
	}


	#ELIMINAR LOS USUARIOS 
	#-----------------------------------------------------------
	public function eliminarUsuario(){
		if(isset($_GET["idDel"])){
			$idUserDelete = $_GET["idDel"];

			$user = GestorUsuariosModel::buscarUsuarioModel($idUserDelete, "users");

			$eliminar = GestorUsuariosModel::borrarUsuarioModel($idUserDelete, "users");
			
			
			// var_dump($respuesta);

			echo 	'<script>
						swal({
						  title: "El Usuario '.$user["name"].' '.$user["lastName"].'",
						  text: "Fue Borrado!",
						  type: "success",
						  confirmButtonText: "Eliminado"
						}).then(function(){
						    window.location = "usuario";
						});
					</script>';

			// header("Location: usuario");


		}
	}
}