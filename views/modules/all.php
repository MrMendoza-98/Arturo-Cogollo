  <?php 
      $proyecto = new GestorProyecto();
  ?>
    <div style="margin-top: 05%;"></div>
    <!-- Page Content -->
    <section class="mb-3">
        <div class="container">
            <div class="content">
              <!-- Titulo-->
                <h2 class="text-center text-white my-3 h2">All Proyects</h2>
        <div class="container">
          <div class="row text-center text-lg-left">
          <?php 
              $proyecto -> listarTodosProyectos();
          ?>
          
        </div>
    </section>

    <!-- Footer -->
    <!-- <footer class="py-2 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Website under construction</p>
      </div> -->
    </footer>
