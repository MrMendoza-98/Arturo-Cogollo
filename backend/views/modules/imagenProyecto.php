<?php

session_start();

if(!$_SESSION["validar"]){

  header("location:login");

  exit();

}

?>

	<!-- INCLUIR EL MENU SUPERIOR -->
	<?php include 'views/modules/topMenu.php'; ?>
    <div class="app-body">
      
      <!-- INCLUIR EL MENU IZQUIERDO -->
      <?php include 'views/modules/leftMenu.php'; ?>

      <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <h4 class="breadcrumb-item">Agregar Imagenes</h4> 
        </ol>

        <!-- CONTENIDO DE LA PAGINA -->
        <div class="container-fluid">
            <div class="animated fadeIn">
              <div class="row">
                <div class="col-lg-12">
                  <!-- INICIO DE LA CARD -->
                  <div class="card">
                    <!-- CABECERA DE LA CARD -->
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> Agregar Imagenes
                      <div class="card-header-actions">
                          <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newCategory">Nueva Categoria</button>
                        </div> -->
                    </div>
                    <!-- CUERPO DE LA CARD -->
                    <div class="card-body">
                        <form class="dropzone" id="myDrop" name="file" action="controllers/upload.php">
                          <!-- <input type="file" name="file" id=""> -->
                        </form>
                      
                        <a href="proyectos" class="btn btn-primary mt-4 text-center">Ver Proyectos</a>
                    </div>
                    
                  <!-- FIN DE LA CARD -->
                </div>
              </div>
            </div>
        </div>
        
        

      </main>
      
      <!-- INCLUYE EL DESPLEGABLE DEL MENU SUPERIOR DERECHO-->
      <?php include 'views/modules/rightMenu.php'; ?>

    </div>
    
    <!-- INCLUIMOS EL FOOTER -->
    <?php include 'views/modules/footer.php'; ?>