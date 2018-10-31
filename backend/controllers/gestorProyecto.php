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


	#EDITAR DATOS DEL PROYECTO
	#---------------------------------------------------
	public function editarProyecto(){
		if (isset($_GET["idEdit"])) {
			echo 'Editar registro';
		}
	}

	#PREGUNTAR SI DESEA ELIMINAR PROYECTO
	#--------------------------------------------------
	public function eliminarProyecto(){
		if(isset($_GET["idDel"])){
			echo 'Eliminar Registro';
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

				if($item["estado"]){
					$boton = 'btn-danger" href="index.php?action=imagenes&idVer='.$item["idProject"].'&idDel=5">Deshabilitar';
				}else{
					$boton = 'btn-warning" href="index.php?action=imagenes&idVer='.$item["idProject"].'&idDel=5">Habilitar';
				}
				echo '<div class="col-lg-4 col-md-6 col-xs-12">
	                    <a href="index.php?action=imagenes&idVer='.$item["idProject"].'&idImg='.$item["idImage"].'" class="d-block mb-0">
	                        <div class="img-contenedor">
	                            <img style="width:300px; height:200px;" class="img-fluid img mb-1" src="'.$rutaImg.'" alt="">
	                        </div>
	                        <a class="name-project btn btn-primary" href="index.php?action=imagenes&idVer='.$item["idProject"].'&idDel=5">Eliminar
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

	

}
