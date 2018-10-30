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
					<td><a href="index.php?action=proyectos&idMod=5">
							<img src="'.$item["imagen"].'" class="rounded text-center" height="auto" width="120"/>
						</a>
					</td>
					<td>'.$item["nameCategory"].'</td>
					<td>
						<a class="btn btn-primary mr-2 mb-2" href="index.php?action=proyectos&idVer=5">
								<i class="fas fa-eye"></i>
	                  	</a>

						<a class="btn btn-dark mr-2 mb-2" href="index.php?action=proyectos&idAdd=5">
								<i class="fas fa-plus"></i>
	                  	</a>
						<br>
						<a class="btn btn-warning mr-2" href="index.php?action=proyectos&idEdit=5">
								<i class="fas fa-edit"></i>
	                  	</a>

	                  	<a class="btn btn-danger" href="index.php?action=proyectos&idDel=5">
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
			echo 'Modal Imagen';
		}

	}


	#VER IMAGENES DEL PROYECTO
	#-----------------------------------------------
	public function verImagenes(){
		if (isset($_GET["idVer"])) {
			echo 'Modal para ver la lista de fotos';
		}
	}


	#AÑADIR IMAGENES AL PROYECTO
	#----------------------------------------------
	public function addImagen(){
		if (isset($_GET["idAdd"])) {
			echo 'Añadir Imagen';

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

}
