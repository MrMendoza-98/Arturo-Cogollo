<?php  

	class EnlacesModels{
		public function enlacesModel($enlaces){
			if(	$enlaces == "inicio" ||
				$enlaces == "categories" ||
				$enlaces == "ingreso" ||
				$enlaces == "contact" ||
				$enlaces == "all" ||
				$enlaces == "apartments" ||
				$enlaces == "commercial" ||
				$enlaces == "cultural" ||
				$enlaces == "detail" ||
				$enlaces == "houses" ||
				$enlaces == "landscaping" ||
				$enlaces == "plastic" ||
				$enlaces == "public" ||
				$enlaces == "unbuilt" ){

				$module = "views/modules/".$enlaces.".php";
			}

			elseif($enlaces == "login"){
				$module = "views/modules/ingreso.php";
			}

			else{
				$module = "views/modules/inicio.php";
			}

			 return $module; 
		}
	}