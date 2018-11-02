<?php

session_start();

if(!$_SESSION["validar"]){

  header("location:login");

  exit();

}


  $slide = new GestorSlide();

?>
	<!-- INCLUIR EL MENU SUPERIOR -->
	<?php include 'views/modules/topMenu.php'; ?>
    <div class="app-body">
      
      <!-- INCLUIR EL MENU IZQUIERDO -->
      <?php include 'views/modules/leftMenu.php'; ?>

      <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <h4 class="breadcrumb-item">Slide</h4> 
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
                      <i class="fa fa-align-justify"></i> Slide
                      <div class="card-header-actions">
                          
                        </div>
                    </div>
                    <!-- CUERPO DE LA CARD -->
                    <div class="card-body">
                      <form method="POST" class="text-center mb-2">
                        <select class="js-example-basic-multiple" name="proyectsSlice[]" multiple="multiple">
                          <?php 
                            $slide -> listarProyectos();
                          ?>
                        </select>
                        <input type="submit" name="enviar" class="btn btn-primary" value="Cargar">
                      </form>
                        
                        <table id="myTable" class="table table-striped table-bordered dt-responsive table-hover nowrap">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Imagen</th>
                                    <th>Quitar</th>
                                </tr>
                            </thead>

                            <tbody>
                              <?php  

                                  $slide -> guardarSlice();
                                  $slide -> listarSlides();
                                  
                              ?>
                            </tbody>

                        </table>
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