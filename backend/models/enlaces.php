<?php  

	class EnlacesModels{
		public function enlacesModel($enlaces){
			if(	$enlaces == "inicio" ||
				$enlaces == "categoria" ||
				$enlaces == "ingreso" ||
				$enlaces == "usuario" ||
				$enlaces == "slide" ||
				$enlaces == "proyectos" ||
				$enlaces == "nuevoProyecto" ||
				$enlaces == "imagenProyecto" ||	
				$enlaces == "imagenes" ||		
				$enlaces == "salir" ){

				$module = "views/modules/".$enlaces.".php";
			}

			elseif($enlaces == "login"){
				$module = "views/modules/ingreso.php";
			}

			else{
				$module = "views/modules/ingreso.php";
			}

			 return $module; 
		}
	}