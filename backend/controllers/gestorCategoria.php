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
						<img src="'.$item["image"].'" class="rounded imagenGrande" title="'.$item["name"].'" height="auto" width="100">
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
			$imagenType = $_FILES['imagen']['type'];

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

			
			//echo $image = $_FILES["imagen"]["name"];




		}

	}

}