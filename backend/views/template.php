<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Panel de Control</title>
	<!-- Icons-->
    <link href="views/css/coreui-icons.min.css" rel="stylesheet">
    <link href="views/css/flag-icon.min.css" rel="stylesheet">
    <!-- <link href="views/css/font-awesome.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <link href="views/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="views/css/style.min.css" rel="stylesheet">
    <link href="views/css/pace.min.css" rel="stylesheet">

    <!-- Librery Datatables -->
    <!-- <link href="views/css/dataTables.bootstrap.min.css" rel="stylesheet"> -->
    <link href="views/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <!-- DROPZONE -->
    <link rel="stylesheet" type="text/css" href="views/css/dropzone.css">

    <!-- SELECT2 -->
    <link rel="stylesheet" type="text/css" href="views/css/select2.min.css">
    
    <link rel="stylesheet" type="text/css" href="views/css/app.css">
    
	<!-- CoreUI and necessary plugins-->
    <script src="views/js/jquery.min.js"></script>
    <script src="views/js/popper.min.js"></script>
    <script src="views/js/bootstrap.min.js"></script>
    <script src="views/js/pace.min.js"></script>
    <script src="views/js/perfect-scrollbar.min.js"></script>
    <script src="views/js/coreui.min.js"></script>
    <script src="views/js/sweetalert2.min.js"></script>
    <script src="views/js/jquery.dataTables.min.js"></script>
    <script src="views/js/dropzone.js"></script>
    <script src="views/js/select2.min.js"></script>

    
</head>
<body <?php if(!isset($_GET["action"]) || $_GET["action"]=="login"){ echo 'class="app flex-row align-items-center"';}else{echo 'class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show"';} ?> >
	<?php 

        $modulos = new Enlaces();
        $modulos -> enlacesController();

    ?>
    <script src="views/js/app.js"></script>
    <script src="views/js/gestorUsuario.js"></script>
    <script src="views/js/gestorCategoria.js"></script>
    <script src="views/js/gestorProyecto.js"></script>
    <script src="views/js/gestorImages.js"></script>
</body>
</html>