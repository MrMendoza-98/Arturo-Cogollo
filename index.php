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
      <div id="carouselExampleIndicators" class="carousel zoom landscape slide" data-ride="carousel">
        <!-- <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol> -->
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <a href="detail.php" class="carousel-item active" style="background-image: url('http://www.arturocogollo.com/images/<?php echo '1.jpg'; ?>')">
            <!-- <a href="detail.php" > -->
              <!-- <img src="img/img1.jpg" class="responsive"> -->
              <div class="carousel-caption d-none d-md-block">
                <!-- <h3>First Slide</h3>
                <p>This is a description for the first slide.</p> -->
              </div>
            <!-- </a> -->
          </a>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <a href="detail.php" class="carousel-item" style="background-image: url('http://www.arturocogollo.com/images/<?php echo '2.jpg'; ?>')">
            <!-- <a href="detail.php" > -->
              <!-- <img src="img/img2.jpg" class="responsive"> -->
              <div class="carousel-caption d-none d-md-block">
                <!-- <h3>Second Slide</h3>
                <p>This is a description for the second slide.</p> -->
              </div>
            <!-- </a> -->
          </a>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <a href="detail.php" class="carousel-item" style="background-image: url('http://www.arturocogollo.com/images/<?php echo '3.jpg'; ?>')">
            <!-- <a href="detail.php" > -->
              <!-- <img src="img/img3.jpg" class="responsive"> -->
              <div class="carousel-caption d-none d-md-block">
                <!-- <h3>Third Slide</h3>
                <p>This is a description for the third slide.</p> -->
              </div>
            <!-- </a> -->
          </a>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <a href="detail.php" class="carousel-item" style="background-image: url('http://www.arturocogollo.com/images/<?php echo '4.jpg'; ?>')">
            <!-- <a href="detail.php" > -->
              <!-- <img src="img/img3.jpg" class="responsive"> -->
              <div class="carousel-caption d-none d-md-block">
                <!-- <h3>Third Slide</h3>
                <p>This is a description for the third slide.</p> -->
              </div>
            <!-- </a> -->
          </a>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <a href="detail.php" class="carousel-item" style="background-image: url('http://www.arturocogollo.com/images/<?php echo '5.jpg'; ?>')">
            <!-- <a href="detail.php" > -->
              <!-- <img src="img/img3.jpg" class="responsive"> -->
              <div class="carousel-caption d-none d-md-block">
                <!-- <h3>Third Slide</h3>
                <p>This is a description for the third slide.</p> -->
              </div>
            <!-- </a> -->
          </a>
          
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <a href="detail.php" class="carousel-item" style="background-image: url('http://www.arturocogollo.com/images/<?php echo '7.jpg'; ?>')">
            <!-- <a href="detail.php" > -->
              <!-- <img src="img/img3.jpg" class="responsive"> -->
              <div class="carousel-caption d-none d-md-block">
                <!-- <h3>Third Slide</h3>
                <p>This is a description for the third slide.</p> -->
              </div>
            <!-- </a> -->
          </a>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <a href="detail.php" class="carousel-item" style="background-image: url('http://www.arturocogollo.com/images/<?php echo '8.jpg'; ?>')">
            <!-- <a href="detail.php" > -->
              <!-- <img src="img/img3.jpg" class="responsive"> -->
              <div class="carousel-caption d-none d-md-block">
                <!-- <h3>Third Slide</h3>
                <p>This is a description for the third slide.</p> -->
              </div>
            <!-- </a> -->
          </a>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <a href="detail.php" class="carousel-item" style="background-image: url('http://www.arturocogollo.com/images/<?php echo '9.jpg'; ?>')">
            <!-- <a href="detail.php" > -->
              <!-- <img src="img/img3.jpg" class="responsive"> -->
              <div class="carousel-caption d-none d-md-block">
                <!-- <h3>Third Slide</h3>
                <p>This is a description for the third slide.</p> -->
              </div>
            <!-- </a> -->
          </a>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="fa fa-angle-left" ></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="fa fa-angle-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </section>

    <!-- Bootstrap core JavaScript -->
    <?php
        include 'library-js.php';
    ?>
    <script type="text/javascript">
    $('.carousel').hover(function () {
      $(this).carousel('cycle')
    });
    $('.carousel').carousel({

    interval: 4000,
    })
    </script>
  </body>

</html>
