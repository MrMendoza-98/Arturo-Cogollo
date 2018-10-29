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

}
