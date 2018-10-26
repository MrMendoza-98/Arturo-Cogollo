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
						<img src="'.$item["image"].'" class="rounded">
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

}