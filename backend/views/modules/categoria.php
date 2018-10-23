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
          <li class="breadcrumb-item">Categorias</li>
          <li class="breadcrumb-item">
            <a href="#">Admin</a>
          </li>
          <li class="breadcrumb-item active">Dashboard</li>
          <!-- Breadcrumb Menu-->
          <li class="breadcrumb-menu d-md-down-none">
            <div class="btn-group" role="group" aria-label="Button group">
              <a class="btn" href="#">
                <i class="icon-speech"></i>
              </a>
              <a class="btn" href="./">
                <i class="icon-graph"></i>  Dashboard</a>
              <a class="btn" href="#">
                <i class="icon-settings"></i>  Settings</a>
            </div>
          </li>
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
                      <i class="fa fa-align-justify"></i> Bootstrap Breadcrumb
                      <div class="card-header-actions">
                        <a class="card-header-action" href="http://coreui.io/docs/components/bootstrap-breadcrumb/" target="_blank">
                          <small class="text-muted">docs</small>
                        </a>
                      </div>
                    </div>
                    <!-- CUERPO DE LA CARD -->
                    <div class="card-body">
                      <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item active" aria-current="page">Home</li>
                        </ol>
                      </nav>
                      <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item">
                            <a href="#">Home</a>
                          </li>
                          <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                      </nav>
                      <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item">
                            <a href="#">Home</a>
                          </li>
                          <li class="breadcrumb-item">
                            <a href="#">Library</a>
                          </li>
                          <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ol>
                      </nav>
                      <nav class="breadcrumb">
                        <a class="breadcrumb-item" href="#">Home</a>
                        <a class="breadcrumb-item" href="#">Library</a>
                        <a class="breadcrumb-item" href="#">Data</a>
                        <span class="breadcrumb-item active">Bootstrap</span>
                      </nav>
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