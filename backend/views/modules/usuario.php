<?php

session_start();
error_reporting(0);

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
          <h4 class="breadcrumb-item">Usuarios</h4>
          <!-- <li class="breadcrumb-item">
            <a href="#">Admin</a>
          </li>
          <li class="breadcrumb-item active">Dashboard</li> -->

          <!-- Breadcrumb Menu-->
          <!-- <li class="breadcrumb-menu d-md-down-none">
            <div class="btn-group" role="group" aria-label="Button group">
              <a class="btn" href="#">
                <i class="icon-speech"></i>
              </a>
              <a class="btn" href="./">
                <i class="icon-graph"></i>  Dashboard</a>
              <a class="btn" href="#">
                <i class="icon-settings"></i>  Settings</a>
            </div>
          </li> -->
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
                        <i class="fa fa-align-justify"></i> Usuarios
                        <div class="card-header-actions">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newUser">Nuevo Usuario</button>
                        </div>
                      </div>
                      <!-- CUERPO DE LA CARD -->
                      <div class="card-body">
                        <table id="myTable" class="table table-striped table-bordered dt-responsive table-hover nowrap">
                            <thead>
                                <tr>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Tel / cel</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>

                            <tbody>
                              <?php 

                                $verUser = new GestorUsuario();
                                $verUser -> listarUsuarios();
                                $verUser -> editarUsuario();
                                $verUser -> eliminarUsuario();
                                $verUser -> EliminarUsuarioFinal();
                              ?>
                            </tbody>

                        </table>
                      </div>
                    </div>
                    <!-- FIN DE LA CARD -->

                    <!-- CODIGO DEL MODAL -->
                    <div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
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
                                        <form action="" method="post">
                                          <!-- GRUPO DE INPUTS -->
                                          <!-- INPUT NOMBRE -->
                                          <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">Nombres</span>
                                              </div>
                                              <input class="form-control" id="nameUser" type="text" name="nameUser" required>
                                              <div class="input-group-append">
                                                <span class="input-group-text">
                                                  <i class="fa fa-user"></i>
                                                </span>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- INPUT APELLIDO -->
                                          <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">Apellidos</span>
                                              </div>
                                              <input class="form-control" id="lastnameUser" type="text" name="lastnameUser" required>
                                              <div class="input-group-append">
                                                <span class="input-group-text">
                                                  <i class="fa fa-user"></i>
                                                </span>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- INPUT TELEFONO -->
                                          <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">Celular / Telefono</span>
                                              </div>
                                              <input class="form-control" id="phoneUser" type="number" name="phoneUser" required>
                                              <div class="input-group-append">
                                                <span class="input-group-text">
                                                  <i class="fa fa-phone"></i>
                                                </span>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- INPUT EMAIL -->
                                          <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">Email</span>
                                              </div>
                                              <input class="form-control" id="emailUser" type="email" name="emailUser" required>
                                              <div class="input-group-append">
                                                <span class="input-group-text">
                                                  <i class="fa fa-envelope"></i>
                                                </span>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- INPUT CONTRASEÑA -->
                                          <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">Password</span>
                                              </div>
                                              <input class="form-control" id="passwordUser" type="password" name="passwordUser" required>
                                              <div class="input-group-append">
                                                <span class="input-group-text">
                                                  <i class="fa fa-asterisk"></i>
                                                </span>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- INPUT ROL -->
                                          <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <label class="input-group-text" for="selectRol">Rol</label>
                                            </div>
                                            <select class="custom-select" id="rolUser" name="rolUser">
                                              <option value="1">Administrador</option>
                                              <option value="2">Editor</option>
                                            </select>
                                          </div>
                                          <!-- LOS BOTONES DE ACCION -->
                                          <div class="form-group form-actions">
                                            <button class="btn btn-primary" type="submit">Guardar Usuario</button>
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
                      <!-- FIN DEL MODAL -->

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

    <?php 

    $saveUser = new GestorUsuario();
    $saveUser -> guardarUsuario();

    ?>