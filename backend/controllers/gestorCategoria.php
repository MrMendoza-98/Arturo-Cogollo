<?php

class GestorCategoria{

	#LISTAR CATEGORIAS
	#---------------------------------
	public function listarCategorias(){

		$respuesta = GestorCategoriaModel::mostrarCategoriasModel("categories");
		

		foreach ($respuesta as $key => $item) {
			echo '<tr>
					<td>'.$item["name"].'</td>
					<td>'.$item["description"].'</td>
					<td class="">
						<a href="index.php?action=categoria&idMod='.$item["idCategory"].'">
							<img src="'.$item["image"].'" class="rounded imagenGrande" title="'.$item["name"].'" height="auto" width="100">
						</a>
					</td>
					<td class="text-center">	
	                  	<a class="btn btn-warning mr-2" href="index.php?action=categoria&idEdit='.$item["idCategory"].'">
								<i class="fas fa-edit"></i>
	                  	</a>

	                  	<a class="btn btn-danger" href="index.php?action=categoria&idDel='.$item["idCategory"].'">
	                  		<i class="fas fa-trash-alt"></i>
	                  	</a>
	                </td>
				</tr>';
		}
		
	}


	#GUARDAR CATEGORIAS 
	#---------------------------------------------------
	public function crearCategoria(){
		if(isset($_POST["name"])){

			$name = $_POST["name"];
			$descrip = $_POST["description"];
			echo $imagenType = $_FILES['imagen']['type'];

			if($imagenType == 'image/jpeg' || $imagenType == 'image/png'){

				setlocale(LC_ALL,"es_CO");
				$imagenName = date("d").date("m").date("Y").date("s");

				$route = "views/images/categories/".$imagenName;

				$route = $route.basename($_FILES['imagen']['name']);
				
				move_uploaded_file($_FILES['imagen']['tmp_name'], $route);

				$datosController = array("name" => $name, "description" => $descrip, "image" => $route);

				$respuesta = GestorCategoriaModel::crearCategoriaModel($datosController, "categories");

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  title: "¡OK!",
							  text: "¡La categoria ha sido creado correctamente!",
							  type: "success",
							  confirmButtonText: "Creado"	  
						}).then(function(){
						    window.location = "categoria";
						});
						
					</script>';

				}

				else{

					echo $respuesta;

				}
				#FIN DE LA RESPUESTA

			}else{

				echo 	'<div class="alert alert-danger text-center" role="alert">
						 	<h4>Solo se permiten IMAGENES tipo JPG o PNG.</h4>
						</div>';
			}

		}

	}


	#ACTUALIZAR CATEGORIA 
	#------------------------------------------------------

	public function editarCategoria(){
		if(isset($_GET["idEdit"])){

			$idCategoryEdit = $_GET["idEdit"];

			$buscar = GestorCategoriaModel::buscarCategoriaModel($idCategoryEdit, "categories");

			// var_dump($buscar);

			// PARA LLAMAR EL MODAL AL DARLE CLICK
			
			echo '<script>
				   $(document).ready(function()
				   {
				      $("#editCategory").modal("show");
				   });
				</script>';

			echo '<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		          <div class="modal-dialog" role="document">
		            <div class="modal-content">
		              <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
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
		                            <form action="" method="post" enctype="multipart/form-data">
		                              <!-- GRUPO DE INPUTS -->
		                              <!-- INPUT NOMBRE -->
		                              <div class="form-group">
		                              
		                                <label for="name">Nombre Categoria</label>
		                                <input class="form-control" id="nameEdit" type="text" name="nameEdit" required value="'.$buscar["name"].'">
		                                
		                              
		                              </div>
		                              <!-- INPUT DESCRIPCION -->
		                              <div class="form-group">
		                                <label for="description">Descripción</label>
		                                <textarea class="form-control" name="descriptionEdit" id="descriptionEdit">'.$buscar["description"].'</textarea>
		                              </div>

		                              <!-- INPUT IMAGEN -->
		                              <div class="form-group">
		                                <label for="imagen">Imagen</label>
		                                <input type="file" class="form-control-file" name="imagenEdit" id="imagenEdit" required>
		                                <br>
		                                <div id="preview"></div>
		                              </div>

		                              <!-- LOS BOTONES DE ACCION -->
		                              <div class="form-group form-actions">
		                                <button class="btn btn-primary" type="submit">Editar Categoria</button>
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


		    // RECOGER LOS DATOS DEL INPUT


		    if(isset($_POST["nameEdit"])){

				$nameEdit = $_POST["nameEdit"];
		    	$descripEdit = $_POST["descriptionEdit"];
				$imagenType = $_FILES['imagenEdit']['type'];
				$rutaAntigua = $buscar["image"];

				if($imagenType == 'image/jpeg' || $imagenType == 'image/png'){

					setlocale(LC_ALL,"es_CO");
					$imagenName = date("d").date("m").date("Y").date("s");

					$route = "views/images/categories/".$imagenName;

					$route = $route.basename($_FILES['imagenEdit']['name']);
					
					move_uploaded_file($_FILES['imagenEdit']['tmp_name'], $route);

					$datosController = array("id"=> $idCategoryEdit, "name" => $nameEdit, "description" => $descripEdit, "image" => $route);

					$respuesta = GestorCategoriaModel::editarCategoriaModel($datosController, "categories");

					if($respuesta == "ok"){
						unlink($rutaAntigua);

						echo'<script>

							swal({
								  title: "¡OK!",
								  text: "¡La categoria ha sido Actualizada correctamente!",
								  type: "success",
								  confirmButtonText: "Creado"	  
							}).then(function(){
							    window.location = "categoria";
							});
							
						</script>';

					}

					else{

						echo $respuesta;

					}
					#FIN DE LA RESPUESTA

				}else{

					echo 	'<div class="alert alert-danger text-center" role="alert">
							 	<h4>Solo se permiten IMAGENES tipo JPG o PNG.</h4>
							</div>';
				}

			}


		}
	}


	#PREGUNTAR SI ELIMINAR CATEGORIA
	#--------------------------------------------------
	public function eliminarCategoria(){
		if(isset($_GET["idDel"])){

			$idCategoryDel = $_GET["idDel"];

			$buscar = GestorCategoriaModel::buscarCategoriaModel($idCategoryDel, "categories");
			// var_dump($buscar);

			echo '<script>
				swal({
				  title: "Esta seguro de Borrar la Categoria '.$buscar["name"].'",
				  type: "warning",
				  showCancelButton: true,
				  confirmButtonColor: "#3085d6",
				  cancelButtonColor: "#d33",
				  confirmButtonText: "Si, Estoy Seguro!"
				}).then((result) => {
				  if (result.value) {
				    window.location.href="?action=categoria&idBor='.$buscar["idCategory"].'"
				  }else{
				  	 window.location = "categoria";
				  }
				})
				</script>';
			

		}
	}


	#BORRAR CATEGORIA
	#----------------------
	public function EliminarCategoriaFinal(){

		if (isset($_GET["idBor"])) {
			
			$idCategoryBorrar = $_GET["idBor"];

			$buscar = GestorCategoriaModel::buscarCategoriaModel($idCategoryBorrar, "categories");

			$eliminar = GestorCategoriaModel::borrarCategoriaModel($idCategoryBorrar, "categories");
			// var_dump($eliminar);
			unlink($buscar["image"]);
			// var_dump($respuesta);

			echo 	'<script>
						swal({
						  title: "La Categoria '.$buscar["name"].'",
						  text: "Fue Borrado!",
						  type: "success",
						  confirmButtonText: "Eliminado"
						}).then(function(){
						    window.location = "categoria";
						});
					</script>';


		}


	}


	#VER IMAGEN DE LA CATEGORIA GRANDE
	#-------------------------------------------------
	public function verImagen(){

		if (isset($_GET["idMod"])) {
			
			$idMod = $_GET["idMod"];

			$buscar = GestorCategoriaModel::buscarCategoriaModel($idMod, "categories");

			// var_dump($buscar);

			// PARA LLAMAR EL MODAL AL DARLE CLICK
			
			echo '<script>
				   $(document).ready(function()
				   {
				      $("#viewImg").modal("show");
				   });
				</script>';

			echo '<div class="modal fade" id="viewImg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">'.$buscar["name"].'</h5>
				        <a type="button" class="close btn btn-outline-danger" href="categoria">
				        
				          <span aria-hidden="true">&times;</span>
				        </a>
				      </div>
				      <div class="modal-body">
				       	<img width="100%" height="auto" src="'.$buscar["image"].'" />
				      </div>
				      
				    </div>
				  </div>
				</div>';
		}
	}
}