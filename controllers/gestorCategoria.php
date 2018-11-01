<?php 

class GestorCategoria{

	#MOSTRAR EL MENU LATERAL
	#---------------------------------------
	public function menu(){

		$respuesta = GestorCategoriaModel::mostrarCategoriasModel("categories");

		foreach ($respuesta as $key => $item) {
			echo '<li><a class="subtitle" href="index.php?action=proyects&id='.$item["idCategory"].'">'.$item["name"].'</a></li>';
		}

	}

	#MOSTRAR EL TITULO DE UNA CATEGORIA ESPECIFICA
	#------------------------------------------------
	public function tituloCategoria($id){

		$respuesta = GestorCategoriaModel::buscarCategoriaModel($id, "categories");

		echo $respuesta["name"].' Category';
	}


	#MOSTRAR LAS CATEGORIAS EN EL PAGINA DE CATEGORIAS
	#-----------------------------------------------------
	public function mostrarCategorias(){

		$respuesta = GestorCategoriaModel::mostrarCategoriasModel("categories");

		foreach ($respuesta as $key => $item) {

			echo '<div class="col-lg-4 col-md-6 col-xs-12">
	                    <a href="index.php?action=proyects&id='.$item["idCategory"].'" class="d-block mb-0 h-100">
	                        <div class="img-contenedor">
	                            <img style="width:400px; height:300px;" class="img-fluid img" src="backend/'.$item["image"].'" alt="">
	                        </div>
	                        <h3 class="mt-2 mb-3 text-light name-project" style="">'.$item["name"].'</h3>
	                    </a>
	                </div>';
        }
	}



}