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
          <h4 class="breadcrumb-item">Proyectos</h4> 
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
                      <i class="fa fa-align-justify"></i> Proyectos
                      <div class="card-header-actions">
                          
                          <a href="nuevoProyecto" class="btn btn-primary">Nuevo Proyecto</a>
                        </div>
                    </div>
                    <!-- CUERPO DE LA CARD -->
                    <div class="card-body">
                        <table id="miTabla" class="table table-bordered dt-responsive table-hover nowrap">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Imagen</th>
                                    <th>Categoria</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>

                            <tbody>
                              <?php 

                                $verProyects = new GestorProyecto();
                                $verProyects -> listarProyectos();
                                $verProyects -> verImagen();
                                $verProyects -> verImagenes();
                                $verProyects -> addImagen();
                                $verProyects -> editarProyecto();
                                $verProyects -> eliminarProyecto();
                                $verProyects -> preguntarEstadoProyecto();
                                $verProyects -> desicionEstadoProyecto();
                                
                                
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