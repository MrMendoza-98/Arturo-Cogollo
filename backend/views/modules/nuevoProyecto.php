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
          <h4 class="breadcrumb-item">Nuevo Proyecto</h4>
          
        </ol> 


        <div class="container-fluid">
            <div class="animated fadeIn">
              <div class="row">
                <div class="col-lg-12">
                  <!-- INICIO DE LA CARD -->
                  <div class="card">
                    <!-- CABECERA DE LA CARD -->
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> Nuevo Proyecto
                      <div class="card-header-actions">
                          <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newCategory">Nueva Categoria</button> -->
                        </div>
                    </div>
                    <!-- CUERPO DE LA CARD -->
                    <div class="card-body">
                        <?php 
                            $verProject = new GestorProyecto();
                            $verProject -> crearProyecto();

                        ?>

                        <form method="POST" enctype="multipart/form-data">
                            <!-- INPUT NOMBRE -->
                            <div class="form-group">
                              <label for="name">Nombre del Proyecto</label>
                              <input type="text" class="form-control" id="name" name="name" placeholder="Nombre Categoria" required>
                            </div>
                  
                            <!-- INPUT DESCRIPCION -->
                            <div class="form-group">
                              <label for="descrip">Descripción del Proyecto</label>
                              <textarea class="form-control" id="descrip" name="descrip" rows="3"></textarea>
                            </div>

                            <!-- SELECT DE LA CATEGORIA -->
                              <div class="form-group">
                                <label for="categoria">Selecione una Categoria</label>
                                <select class="form-control" id="categoria" name="categoria">
                                  <?php $verProject -> listarCategorias(); ?>
                                </select>
                              </div>

                              <!-- INPUT IMAGEN -->
                               <div class="form-group">
                                <div id="preview"></div>
                                <label for="imagenProyect">Imagen de Portada</label>
                                <input type="file" class="form-control-file" id="imagenProyect" name="imagenProyect">
                              </div>

                              <!-- BOTON ENVIAR -->
                              <input type="submit" class="btn btn-primary" value="Crear Proyecto">
                        </form>
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