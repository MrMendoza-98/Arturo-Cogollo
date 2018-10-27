    <?php 
      if(!isset($_GET["id"])){
        header("location: categories");
        exit();
      }

      $id = $_GET["id"];

      $categoria = new GestorCategoria();
    ?>
    <div style="margin-top: 05%;"></div>
    <!-- Page Content -->
    <section class="mb-3">
        <div class="container">
            <div class="content">
              <!-- Titulo-->
                <h2 class="text-center text-white my-3 h2"><?php $categoria->tituloCategoria($id); ?></h2>
        <div class="container">
          <div class="row text-center text-lg-left">
          <!-- Primera linea -->
          <div class="col-lg-4 col-md-6 col-xs-12">
            <a href="detail.php" class="d-block mb-3 h-100">
              <div class="img-contenedor">
                <img style="width:352px; height:300px;" class="img-fluid img" src="http://arturocogollo.com/img/img_ini_1.jpg" alt="">
              </div>
              <h3 class="mt-2 mb-3 text-light name-project">Casa Rivera</h3>
            </a>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
            <a href="detail.php" class="d-block mb-3 h-100">
              <div class="img-contenedor">
                <img style="width:352px; height:300px;" class="img-fluid img" src="http://arturocogollo.com/img/img_ini_2.jpg" alt="">
              </div>
              <h3 class="mt-2 mb-3 text-light name-project" style="">Casa Escalante</h3>
            </a>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
            <a href="detail.php" class="d-block mb-3 h-100">
              <div class="img-contenedor">
                <img style="width:352px; height:300px;" class="img-fluid img" src="http://arturocogollo.com/img/img_ini_3.jpg" alt="">
              </div>
              <h3 class="mt-2 mb-3 text-light name-project" style="">Casa Garcia</h3>
            </a>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
            <a href="detail.php" class="d-block mb-3 h-100">
              <div class="img-contenedor">
                <img style="width:400px; height:300px;" class="img-fluid img" src="http://arturocogollo.com/img/img_ini_4.jpg" alt="">
              </div>
              <h3 class="mt-2 mb-3 text-light name-project" style="">Teatro Zulima</h3>
            </a>
          </div>
          <!-- Segunda Linea -->
          <div class="col-lg-4 col-md-6 col-xs-12">
            <a href="detail.php" class="d-block mb-3 h-100">
              <div class="img-contenedor">
                <img style="width:400px; height:300px;" class="img-fluid img" src="http://arturocogollo.com/img/img_ini_7.jpg" alt="">
              </div>
              <h3 class="mt-2 mb-3 text-light name-project" style="">Casa Leiva</h3>
            </a>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
            <a href="detail.php" class="d-block mb-3 h-100">
              <div class="img-contenedor">
                <img style="width:400px; height:300px;" class="img-fluid img" src="http://arturocogollo.com/img/img_ini_8.jpg" alt="">
              </div>
              <h3 class="mt-2 mb-3 text-light name-project" style="">Villa Aratat Riaño</h3>
            </a>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
            <a href="detail.php" class="d-block mb-3 h-100">
              <div class="img-contenedor">
                <img style="width:400px; height:300px;" class="img-fluid img" src="http://arturocogollo.com/img/img_ini_10.jpg" alt="">
              </div>
              <h3 class="mt-2 mb-3 text-light name-project" style="">Casa Escalante</h3>
            </a>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
            <a href="detail.php" class="d-block mb-3 h-100">
              <div class="img-contenedor">
                <img style="width:400px; height:300px;" class="img-fluid img" src="http://arturocogollo.com/img/img_ini_12.jpg" alt="">
              </div>
              <h3 class="mt-2 mb-3 text-light name-project" style="">Casa Garcia</h3>
            </a>
          </div>
          <!-- Tercera linea -->
          <div class="col-lg-4 col-md-6 col-xs-12">
            <a href="detail.php" class="d-block mb-0 h-100">
              <div class="img-contenedor">
                <img style="width:400px; height:300px;" class="img-fluid img" src="http://arturocogollo.com/img/img_ini_11.jpg" alt="">
              </div>
              <h3 class="mt-2 mb-3 text-light name-project" style="">Villa Aratat Riaño</h3>
            </a>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
            <a href="detail.php" class="d-block mb-0 h-100">
              <div class="img-contenedor">
                <img style="width:400px; height:300px;" class="img-fluid img" src="http://arturocogollo.com/img/img_ini_13.jpg" alt="">
              </div>
              <h3 class="mt-2 mb-3 text-light name-project" style="">Palonegro Airport</h3>
            </a>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
            <a href="detail.php" class="d-block mb-0 h-100">
              <div class="img-contenedor">
                <img style="width:400px; height:300px;" class="img-fluid img" src="http://planosdecasasdedosplantas.com/wp-content/uploads/2016/06/modelos-de-casa-de-un-solo-piso-modernas-400x300.jpg" alt="">
              </div>
              <h3 class="mt-2 mb-3 text-light name-project" style="">Casa Campestre</h3>
            </a>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
            <a href="detail.php" class="d-block mb-0 h-100">
              <div class="img-contenedor">
                <img style="width:400px; height:300px;" class="img-fluid img" src="http://fachadasdecasasdeunpiso.com/wp-content/uploads/2016/03/dise%C3%B1o-de-fachadas-de-casas-sencillo-400x300.jpg" alt="">
              </div>
              <h3 class="mt-2 mb-3 text-light name-project" style="">Casa Flower</h3>
            </a>
          </div>
          </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-2 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Website under construction</p>
      </div>
    </footer>
