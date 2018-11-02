<?php 

class GestorSlide{

	#LISTAR LOS PROYECTOS PARA EL SELECT
	#-------------------------------------------------
	public function listarProyectos(){

		$proyects = GestorSlideModel::mostrarProyectos("projects");

		foreach ($proyects as $key => $item) {
			echo '<option value="'.$item["idProject"].'">'.$item["name"].'</option>';
		}

		
	}


	#GUARDAR LOS PROYECTOS EN LA TABLA SLICE
	#---------------------------------------------
	public function guardarSlice(){
		if(isset($_POST["proyectsSlice"])){

			$proyects = $_POST["proyectsSlice"];
			// print_r($proyects);


			for ($i=0; $i<count($proyects); $i++){     
				// echo "<br> Proyecto " . $i . ": " . $proyects[$i];
				$idProject = $proyects[$i];
				$guardar = GestorSlideModel::guardarSliceModel($idProject, "slice");

			}

				if($guardar == "ok"){

					echo'<script>

						swal({
							  title: "¡OK!",
							  text: "¡El Slice ha sido actuaizado correctamente!",
							  type: "success",
							  confirmButtonText: "Ok"	  
						}).then(function(){
						    window.location = "slide";
						});
						
					</script>';

				}

				else{

					echo $respuesta;

				}

		}
	}


	#LISTAR LOS PROYECTOS GUARDADOS EN LA TABLA SLIDE
	#----------------------------------------------------
	public function listarSlides(){

		echo'<tr>
				<td>Name</td>
				<td>
					<img src="" />
				</td>
				<td>Eliminar</td>
			</tr>';
	}

}