<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Arturo Cogollo</title>

    <!-- Link para el favicon -->
    <link rel="shortcut icon" href="img/favicon-arturo1.png" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Add this css File in head tag-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
    <!-- Custom styles for this template -->
    <link href="css/full-slider.css" rel="stylesheet">

    <!-- CSS-->
    <link rel="stylesheet" href="css/main.css">
  </head>

  <body>

    <!-- Navigation -->
    <?php
        include 'navigation.php';
    ?>

    <section>
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src=".../800x400?auto=yes&bg=777&fg=555&text=First slide" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src=".../800x400?auto=yes&bg=666&fg=444&text=Second slide" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src=".../800x400?auto=yes&bg=555&fg=333&text=Third slide" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      
    </section>

    <!-- Bootstrap core JavaScript -->
    <?php
        include 'library-js.php';
    ?>
    <script>
    
    $('.carousel').carousel({
      pause: "false",
      interval: 4000,
    })
    </script>
  </body>

</html>
