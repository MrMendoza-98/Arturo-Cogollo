<?php

class GestorProyecto{

	#LISTAR AS CATEGORIAS PARA EL SELECT 
	#----------------------------------------------------
	public function listarCategorias(){

		$categories = GestorProyectoModel::mostrarCategoriasModel("categories");

		foreach ($categories as $key => $item) {
			echo '<option value="'.$item["idCategory"].'">'.$item["name"].'</option>';
		}
		
	}

	#CREAR EL PROYECTO EN LA TABLA PROJECTS
	public function crearProyecto(){
		if(isset($_POST["name"])){

			$name = $_POST["name"];
			$descrip = $_POST["descrip"];
			$categoria = $_POST["categoria"];
			$idUser = $_SESSION["idUser"];

			//SE VALIDA LA IMAGEN
			$imagenType = $_FILES['imagenProyect']['type'];

			if($imagenType == 'image/jpeg' || $imagenType == 'image/png'){

				setlocale(LC_ALL,"es_CO");
				$imagenName = date("d").date("m").date("Y").date("s");

				$route = "views/images/proyects/".$imagenName;

				$route = $route.basename($_FILES['imagenProyect']['name']);
				
				move_uploaded_file($_FILES['imagenProyect']['tmp_name'], $route);

				$datosController = array("name" => $name, "description" => $descrip, "image" => $route, "category" => $categoria, "user" => $idUser);

				$respuesta = GestorProyectoModel::crearProyectoModel($datosController, "projects");

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  title: "¡OK!",
							  text: "¡El Proyecto ha sido creado correctamente!",
							  type: "success",
							  confirmButtonText: "Asignar Imagenes al Proyecto"	  
						}).then(function(){
						    window.location = "imagenProyecto";
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


	#LISTAR LOS PROYECTOS
	#----------------------------------------------------
	public function listarProyectos(){

		$respuesta = GestorProyectoModel::mostrarProyectosModel("projects");

		foreach ($respuesta as $key => $item) {
			echo '<tr>
					<td>'.$item["name"].'</td>
					<td>'.$item["description"].'</td>
					<td><a href="index.php?action=proyectos&idMod='.$item["idProyect"].'">
							<img src="'.$item["imagen"].'" class="rounded text-center" height="auto" width="120"/>
						</a>
					</td>
					<td>'.$item["nameCategory"].'</td>
					<td>
						<a class="btn btn-primary mr-2 mb-2" href="index.php?action=imagenes&idVer='.$item["idProyect"].'">
								<i class="fas fa-eye"></i>
	                  	</a>

						<a class="btn btn-dark mr-2 mb-2" href="index.php?action=proyectos&idAdd='.$item["idProyect"].'">
								<i class="fas fa-plus"></i>
	                  	</a>
						<br>
						<a class="btn btn-warning mr-2" href="index.php?action=proyectos&idEdit='.$item["idProyect"].'">
								<i class="fas fa-edit"></i>
	                  	</a>

	                  	<a class="btn btn-danger" href="index.php?action=proyectos&idDel='.$item["idProyect"].'">
	                  		<i class="fas fa-trash-alt"></i>
	                  	</a>
					</td>
				<tr>';
		}

		
	}



	#EDITAR DATOS DEL PROYECTO
	#---------------------------------------------------
	public function editarProyecto(){
		if (isset($_GET["idEdit"])) {
			$idEdit = $_GET["idEdit"];
			$option = '';

			$categories = GestorProyectoModel::mostrarCategoriasModel("categories");

			foreach ($categories as $key => $item) {
				$option .= '<option value="'.$item["idCategory"].'">'.$item["name"].'</option>';
			}


			$buscar = GestorProyectoModel::buscarProyectoModel($idEdit, "projects");

			foreach ($categories as $key => $item2) {
				if($buscar["idCategory"] == $item2["idCategory"]){
					$categoriaName = $item2["name"];
				}
			}

			// var_dump($buscar);

			// PARA LLAMAR EL MODAL AL DARLE CLICK
			
			echo '<script>
				   $(document).ready(function()
				   {
				      $("#editProyect").modal("show");
				   });
				</script>';

			echo '<div class="modal fade" id="editProyect" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		          <div class="modal-dialog" role="document">
		            <div class="modal-content">
		              <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Editar Proyecto</h5>
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

		                              <!-- INPUT CATEGORIA -->
								 	  <div class="form-group">
									    <label for="categoriaEdit">Example select</label>
									    <select class="form-control" id="categoriaEdit" name="categoryEdit">
									      <option value="'.$buscar["idCategory"].'">'.$categoriaName.'</option>
									      '.$option.'
									    </select>
									  </div>

		                              <!-- INPUT IMAGEN -->
		                              <div class="form-group">
		                                <label for="imagen">Imagen Portada</label>
		                                <input type="file" class="form-control-file" name="imagenEdit" id="imagenEdit" required>
		                                <br>
		                                <div id="preview"></div>
		                              </div>

		                              <!-- LOS BOTONES DE ACCION -->
		                              <div class="form-group form-actions">
		                                <button class="btn btn-primary" type="submit">Editar Proyecto</button>
		                                <a href="proyectos" class="btn btn-danger">Cancelar</a>
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
		    	$idCategory = $_POST["categoryEdit"];
				$imagenType = $_FILES['imagenEdit']['type'];

				$rutaAntigua = $buscar["image"];

				if($imagenType == 'image/jpeg' || $imagenType == 'image/png'){

					setlocale(LC_ALL,"es_CO");
					$imagenName = date("d").date("m").date("Y").date("s");

					$route = "views/images/proyects/".$imagenName;

					$route = $route.basename($_FILES['imagenEdit']['name']);
					
					move_uploaded_file($_FILES['imagenEdit']['tmp_name'], $route);

					$datosController = array("idProject"=> $idEdit, "name" => $nameEdit, "description" => $descripEdit, "image" => $route, "idCategory" => $idCategory, "idUser" => $_SESSION["idUser"]);

					$respuesta = GestorProyectoModel::editarProyectoModel($datosController, "projects");

					if($respuesta == "ok"){
						unlink($rutaAntigua);

						echo'<script>

							swal({
								  title: "¡OK!",
								  text: "¡El proyecto ha sido Actualizado correctamente!",
								  type: "success",
								  confirmButtonText: "Actualizado"	  
							}).then(function(){
							    window.location = "proyectos";
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




	#PREGUNTAR SI DESEA ELIMINAR PROYECTO
	#--------------------------------------------------
	public function eliminarProyecto(){
		if(isset($_GET["idDel"])){
			$idDel = $_GET["idDel"];

			$buscar = GestorProyectoModel::buscarProyectoModel($idDel, "projects");
			// var_dump($buscar);

			echo '<script>
				swal({
				  title: "Esta seguro de Borrar el Proyecto '.$buscar["name"].'",
				  type: "warning",
				  showCancelButton: true,
				  confirmButtonColor: "#3085d6",
				  cancelButtonColor: "#d33",
				  confirmButtonText: "Si, Estoy Seguro!"
				}).then((result) => {
				  if (result.value) {
				    window.location.href="?action=proyectos&idBor='.$buscar["idProject"].'"
				  }else{
				  	 window.location = "proyectos";
				  }
				})
				</script>';
		}

		if(isset($_GET["idBor"])){
			
			$idBorrar = $_GET["idBor"];

			$buscar =  GestorProyectoModel::buscarProyectoModel($idBorrar, "projects");

			$imagenes = GestorProyectoModel::buscarImagenesModel($idBorrar, "images");

			$eliminar = GestorProyectoModel::borrarProyectoModel($idBorrar, "projects");
			// var_dump($eliminar);
			unlink($buscar["image"]);

			foreach ($imagenes as $key => $item) {
				if(substr($item["ruta"], 0, 3) == '../'){
					$rutaImg = iconv_substr($item["ruta"], 3);
				}else{
					$rutaImg = $item["ruta"];
				}

				// BORRAMOS LA IMAGEN
				unlink($rutaImg);
			}


			// var_dump($respuesta);

			echo 	'<script>
						swal({
						  title: "El proyecto '.$buscar["name"].'",
						  text: "Fue Borrado!",
						  type: "success",
						  confirmButtonText: "Eliminado"
						}).then(function(){
						    window.location = "proyectos";
						});
					</script>';

		}
	}


	#VER LA IMAGEN EN FORMA DE MODAL
	#---------------------------------------------
	public function verImagen(){

		if(isset($_GET["idMod"])){
			// echo 'Modal Imagen';
			$idMod = $_GET["idMod"];

			$buscar = GestorProyectoModel::buscarProyectoModel($idMod, "projects");

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
				        <a type="button" class="close btn btn-outline-danger" href="proyectos">
				        
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


	#VER LA IMAGEN EN FORMA DE MODAL  DE LAS IMAGENES DE LA PAGINA IMAGEN
	#-------------------------------------------------------------------------
	public function verImagenGrande(){

		if(isset($_GET["idImg"])){
			// echo 'Modal Imagen';
			$idImg = $_GET["idImg"];

			$buscar = GestorProyectoModel::buscarImagenModel($idImg, "images");

			if(substr($buscar["ruta"], 0, 3) == '../'){
				$rutaImg = iconv_substr($buscar["ruta"], 3);
			}else{
				$rutaImg = $buscar["ruta"];
			}

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
				        
				        <a type="button" class="close btn btn-outline-danger" href="index.php?action=imagenes&idVer='.$buscar["idProject"].'">
				        
				          <span aria-hidden="true">&times;</span>
				        </a>
				      </div>
				      <div class="modal-body">
				       	<img width="100%" height="auto" src="'.$rutaImg.'" />
				      </div>
				      
				    </div>
				  </div>
				</div>';
		}

	}


	#VER IMAGENES DEL PROYECTO
	#-----------------------------------------------
	public function verImagenes(){
		if (isset($_GET["idVer"])) {
			$idVer = $_GET["idVer"];

			$img = GestorProyectoModel::buscarImagenesModel($idVer, "images");

			// var_dump($buscar);

			// IMPRIMIMOS LAS IMAGENES EN PANTALLA
			foreach ($img as $key => $item) {
				if(substr($item["ruta"], 0, 3) == '../'){
					$rutaImg = iconv_substr($item["ruta"], 3);
				}else{
					$rutaImg = $item["ruta"];
				}

				if($item["estado"] == 0){
					$boton = 'btn-danger" href="index.php?action=imagenes&idVer='.$item["idProject"].'&idDes='.$item["idImage"].'">Deshabilitar';
				}else{
					$boton = 'btn-warning" href="index.php?action=imagenes&idVer='.$item["idProject"].'&idHab='.$item["idImage"].'">Habilitar';
				}
				echo '<div class="col-lg-4 col-md-6 col-xs-12 mb-3">
	                    <a href="index.php?action=imagenes&idVer='.$item["idProject"].'&idImg='.$item["idImage"].'" class="d-block mb-0">
	                        <div class="img-contenedor">
	                            <img style="width:300px; height:200px;" class="img-fluid img mb-1" src="'.$rutaImg.'" alt="">
	                        </div>
	                        <a class="name-project btn btn-primary" href="index.php?action=imagenes&idVer='.$item["idProject"].'&idDele='.$item["idImage"].'">Eliminar
	                        </a>
	                        <a class="name-project btn  
	                        	'.$boton.'
	                        </a>
	                    </a>
	                </div>';
			}
			
			

			
		}
	}


	#AÑADIR IMAGENES AL PROYECTO
	#----------------------------------------------
	public function addImagen(){
		if (isset($_GET["idAdd"])) {
			$idAdd = $_GET["idAdd"];

			// $buscar = GestorProyectoModel::buscarImagenesModel($idAdd, "images");

			// var_dump($buscar);

			// PARA LLAMAR EL MODAL AL DARLE CLICK
			
			echo '<script>
				   $(document).ready(function()
				   {
				      $("#addImg").modal("show");
				   });
				</script>';

			echo '<div class="modal fade" id="addImg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Agregar Imagenes</h5>
				        <a type="button" class="close btn btn-outline-danger" href="proyectos">
				        
				          <span aria-hidden="true">&times;</span>
				        </a>
				      </div>
				      <div class="modal-body">
				       	<form action="" method="post" enctype="multipart/form-data">
							 <!-- INPUT IMAGEN -->
                              <div class="form-group">
                              	<div id="preview"></div>
                                <label for="imagen">Imagen</label>
                                <input type="file" class="form-control-file" name="imagenAdd" id="imagenEdit" required>
                                <br>
                                
                              </div>
                            <!-- LOS BOTONES DE ACCION -->
	                          <div class="form-group form-actions">
	                            <button class="btn btn-primary" type="submit">Agregar Imagen</button>
	                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	                          </div>
				       	</form>
				      </div>
				      
				    </div>
				  </div>
				</div>';


			// RECOGER LOS DATOS DEL INPUT


		    if(isset($_FILES["imagenAdd"])){

				$imagenType = $_FILES['imagenAdd']['type'];

				if($imagenType == 'image/jpeg' || $imagenType == 'image/png'){

					setlocale(LC_ALL,"es_CO");
					$imagenName = date("d").date("m").date("Y").date("s");

					$route = "views/images/proyects/".$imagenName;

					$route = $route.basename($_FILES['imagenAdd']['name']);
					
					move_uploaded_file($_FILES['imagenAdd']['tmp_name'], $route);

					$datosController = array("id"=> $idAdd, "ruta" => $route);

					$respuesta = GestorProyectoModel::addImagenModel($datosController, "images");

					if($respuesta == "ok"){

						echo'<script>

							swal({
								  title: "¡OK!",
								  text: "¡La imagen ha sido agregada correctamente!",
								  type: "success",
								  confirmButtonText: "Creado"	  
							}).then(function(){
							    window.location = "proyectos";
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


	#VER EL TITULO DEL PROYECTO EN LA PAGINA DE IMAGENES
	#---------------------------------------------------
	public function verTituloProyect($id){
		
		$buscar = GestorProyectoModel::buscarProyectoModel($id, "projects");
		echo $buscar["name"];
	}


	#PREGUNTAR SI CAMBIAR EL ESTADO DE LA IMAGEN
	#--------------------------------------------------
	public function preguntarEstado(){
		if(isset($_GET["idDes"])){

			$idDes = $_GET["idDes"];

			$buscar = GestorProyectoModel::buscarImagenModel($idDes, "images");
			// var_dump($buscar);

			echo '<script>
				swal({
				  title: "Esta seguro de Deshabilitar esta imagen?",
				  type: "warning",
				  showCancelButton: true,
				  confirmButtonColor: "#3085d6",
				  cancelButtonColor: "#d33",
				  confirmButtonText: "Si, Estoy Seguro!"
				}).then((result) => {
				  if (result.value) {
				    window.location.href="?action=imagenes&idVer='.$buscar["idProject"].'&idDes1='.$buscar["idImage"].'"
				  }else{
				  	 window.location = "index.php?action=imagenes&idVer='.$buscar["idProject"].'";
				  }
				})
				</script>';
			

		}
	

	
		if(isset($_GET["idHab"])){

			$idHab = $_GET["idHab"];

			$buscar = GestorProyectoModel::buscarImagenModel($idHab, "images");
			// var_dump($buscar);

			echo '<script>
				swal({
				  title: "Esta seguro de Habilitar esta imagen?",
				  type: "warning",
				  showCancelButton: true,
				  confirmButtonColor: "#3085d6",
				  cancelButtonColor: "#d33",
				  confirmButtonText: "Si, Estoy Seguro!"
				}).then((result) => {
				  if (result.value) {
				    window.location.href="?action=imagenes&idVer='.$buscar["idProject"].'&idHab1='.$buscar["idImage"].'"
				  }else{
				  	 window.location = "index.php?action=imagenes&idVer='.$buscar["idProject"].'";
				  }
				})
				</script>';
			

		}

	}


	#DESICIO DEL ESTADO DE LA IMAGEN
	#--------------------------------------------------
	public function desicionEstado(){

		if(isset($_GET["idDes1"])){

			$idDes1 = $_GET["idDes1"];

			$datosController = array("idImage" => $idDes1, "estado" => 1);

			$buscar = GestorProyectoModel::buscarImagenModel($idDes1, "images");

			$estado = GestorProyectoModel::estadoImagen($datosController, "images");
			// var_dump($buscar);

			echo '<script>
				swal({
						  title: "La imagen fue deshabilitada",
						  type: "success",
						  confirmButtonText: "Deshabilitar"
						}).then(function(){
						    window.location = "index.php?action=imagenes&idVer='.$buscar["idProject"].'";
						});
				</script>';
			

		}
	

	
		if(isset($_GET["idHab1"])){

			$idHab1 = $_GET["idHab1"];

			$datosController = array("idImage" => $idHab1, "estado" => 0);

			$buscar = GestorProyectoModel::buscarImagenModel($idHab1, "images");

			$estado = GestorProyectoModel::estadoImagen($datosController, "images");
			// var_dump($buscar);

			echo '<script>
				swal({
						  title: "La Imagen ha sido Habilitada",
						  type: "success",
						  confirmButtonText: "Habilitar"
						}).then(function(){
						    window.location = "index.php?action=imagenes&idVer='.$buscar["idProject"].'";
						});
				</script>';
			

		}

	}


	#ELIMINAR IMAGEN
	#-------------------------------------------------
	public function deleteImg(){
		if(isset($_GET["idDele"])){
			$idDele = $_GET["idDele"];

			$buscar = GestorProyectoModel::buscarImagenModel($idDele, "images");
			// var_dump($buscar);

			echo '<script>
				swal({
				  title: "Esta seguro de Eliminar esta imagen?",
				  type: "warning",
				  showCancelButton: true,
				  confirmButtonColor: "#3085d6",
				  cancelButtonColor: "#d33",
				  confirmButtonText: "Si, Estoy Seguro!"
				}).then((result) => {
				  if (result.value) {
				    window.location.href="?action=imagenes&idVer='.$buscar["idProject"].'&idDele1='.$buscar["idImage"].'"
				  }else{
				  	 window.location = "index.php?action=imagenes&idVer='.$buscar["idProject"].'";
				  }
				})
				</script>';

		}


		if(isset($_GET["idDele1"])){
			$idDele1 = $_GET["idDele1"];

			$buscar = GestorProyectoModel::buscarImagenModel($idDele1, "images");

			$estado = GestorProyectoModel::borrarImagenModel($idDele1, "images");
			// var_dump($buscar);
			if(substr($buscar["ruta"], 0, 3) == '../'){
				$rutaImg = iconv_substr($buscar["ruta"], 3);
			}else{
				$rutaImg = $buscar["ruta"];
			}

			unlink($rutaImg);

			echo '<script>
				swal({
						  title: "La Imagen ha sido Borrada",
						  text: "Fue Borrado!",
						  type: "success",
						  confirmButtonText: "Eliminado"
						}).then(function(){
						    window.location = "index.php?action=imagenes&idVer='.$buscar["idProject"].'";
						});
				</script>';
		}
	}



}
