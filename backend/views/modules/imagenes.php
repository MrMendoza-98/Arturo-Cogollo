<?php

session_start();

if(!$_SESSION["validar"]){

  header("location:login");

  exit();

}

  $verImagenes = new GestorProyecto();
  if(isset($_GET["idVer"])){
    $idProyect = $_GET["idVer"];
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
          <h4 class="breadcrumb-item"><?php $verImagenes -> verTituloProyect($idProyect); ?></h4> 
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
                      <i class="fa fa-align-justify"></i>Lista de imagenes
                      <div class="card-header-actions">
                          <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newCategory">Nueva Categoria</button> -->
                          <a href="proyectos" class="btn btn-primary">Volver a los Proyectos</a>
                        </div>
                    </div>
                    <!-- CUERPO DE LA CARD -->
                    <div class="card-body">
                      <div class="container-fluid">
                        <div class="row text-center text-lg-left">
                           <?php 
                            $verImagenes -> verImagenes();
                            $verImagenes -> verImagenGrande();
                            $verImagenes -> preguntarEstado();
                            $verImagenes -> desicionEstado();
                            $verImagenes -> deleteImg();

                          ?>
                        </div>
                      </div>
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