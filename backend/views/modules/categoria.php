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
          <h4 class="breadcrumb-item">Categorias</h4> 
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
                      <i class="fa fa-align-justify"></i> Categorias
                      <div class="card-header-actions">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newCategory">Nueva Categoria</button>
                        </div>
                    </div>
                    <!-- CUERPO DE LA CARD -->
                    <div class="card-body">
                        <table id="myTable" class="table table-striped table-bordered dt-responsive table-hover nowrap">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Imagen</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>

                            <tbody>
                              <?php 

                                $verCategoria = new GestorCategoria();
                                $verCategoria -> listarCategorias();
                                // $verCategoria -> editarUsuario();
                                // $verCategoria -> eliminarUsuario();
                              ?>
                            </tbody>

                        </table>
                    </div>
                  <!-- FIN DE LA CARD -->
                </div>
              </div>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="newCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
    
                <div class="row">
                  <!-- INICIO DEL FORMULARIO -->
                      <div class="col-lg-12">
                        <div class="">
                          <div class="card-body">
                            <!-- INICIO DEL FORMULARIO -->
                            <form action="" method="post" enctype="multipart/form-data">
                              <!-- GRUPO DE INPUTS -->
                              <!-- INPUT NOMBRE -->
                              <div class="form-group">
                              
                                <label for="name">Nombre Categoria</label>
                                <input class="form-control" id="name" type="text" name="name" required>
                                
                              
                              </div>
                              <!-- INPUT DESCRIPCION -->
                              <div class="form-group">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                              </div>

                              <!-- INPUT IMAGEN -->
                              <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input type="file" class="form-control-file" name="imagen" id="imagen" required>
                                <br>
                                <div id="preview"></div>
                              </div>

                              <!-- LOS BOTONES DE ACCION -->
                              <div class="form-group form-actions">
                                <button class="btn btn-primary" type="submit">Crear Categoria</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                              </div>
                            </form>
                            <!-- FIN DEL FORMULAIO -->
                          </div>
                        </div>
                      </div>
                  <!-- FIN DEL FORMULARIO -->

                </div>

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