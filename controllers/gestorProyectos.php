<?php

class GestorProyecto{

	#MOSTRAR LOS PROYECTOS
	#---------------------------------------
	public function mostrarProyectos($id){

		$buscar = GestorProyectoModel::listarProyectos($id, "projects");
		// var_dump($buscar);

		foreach ($buscar as $key => $item) {

			echo '<div class="col-lg-4 col-md-6 col-xs-12">
	            <a href="index.php?action=detail&idProy='.$item["idProject"].'" class="d-block mb-3 h-100">
	              <div class="img-contenedor">
	                <img style="width:352px; height:300px;" class="img-fluid img" src="backend/'.$item["image"].'" alt="">
	              </div>
	              <h3 class="mt-2 mb-3 text-light name-project">'.$item["name"].'</h3>
	            </a>
	          </div>';

        }
	}


	#VER LA GALERIA
	#----------------------------------------
	public function verGaleria($id){

			$galeria = GestorProyectoModel::listarImagenes($id, "images");

			foreach ($galeria as $key => $item) {
				
				if(substr($item["ruta"], 0, 3) == '../'){
					$rutaImg = iconv_substr($item["ruta"], 3);
				}else{
					$rutaImg = $item["ruta"];
				}

				echo '<div class="item active">
	                    <a data-trigger="preview2" href="javascript:;" style=" cursor: zoom-in;">
	                      <!-- <i class=" fa fa-expand "></i> -->
	                    <img src="backend/'.$rutaImg.'" style="width: 100%;"  class=" imagefield">
	                    </a> 
	                  </div>';
            }
	}


	#LISTAR TODOS LOS PROYECTOS SIN IMPORTAR SU CATEGORIA
	#-----------------------------------------------------
	public function listarTodosProyectos(){

		$all = GestorProyectoModel::listarAll("projects");

		foreach ($all as $key => $item) {
			
			echo '<div class="col-lg-4 col-md-6 col-xs-12">
	            <a href="index.php?action=detail&idProy='.$item["idProject"].'" class="d-block mb-3 h-100">
	              <div class="img-contenedor">
	                <img style="width:352px; height:300px;" class="img-fluid img" src="backend/'.$item["image"].'" alt="">
	              </div>
	              <h3 class="mt-2 mb-3 text-light name-project">'.$item["name"].'</h3>
	            </a>
	          </div>';

        }
	}

}