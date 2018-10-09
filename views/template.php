<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Arturo Cogollo</title>

    <!-- Link para el favicon -->
    <link rel="shortcut icon" href="views/img/favicon-arturo1.png" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link href="views/css/bootstrap.min.css" rel="stylesheet">
    <script src="views/js/jquery.min.js"></script>
    <!-- Add this css File in head tag-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
    <!-- Custom styles for this template -->
    
    <link href="views/css/full-slider.css" rel="stylesheet">

    <!-- CSS-->
    <!-- <link rel="stylesheet" href="views/css/Gallery_Style.css"> -->
    <link rel="stylesheet" href="views/css/main.css">

    <!-- Fancy box -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.4/jquery.fancybox.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.4/jquery.fancybox.js"></script>
  </head>

  <body>

    <!-- Navigation -->
    <?php
        include 'views/modules/navigation.php';
    ?>
    
    <?php 

        $modulos = new Enlaces();
        $modulos -> enlacesController();

    ?>

    <!-- Bootstrap core JavaScript -->
    <?php
        include 'views/modules/library-js.php';
    ?>
    <script>
    
    $('.carousel').carousel({
      pause: "false",
      interval: 4000,
    })
    </script>
  </body>

</html>