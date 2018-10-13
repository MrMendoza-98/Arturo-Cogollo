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

	<!-- CoreUI and necessary plugins-->
    <script src="views/js/jquery.min.js"></script>
    <script src="views/js/popper.min.js"></script>
    <script src="views/js/bootstrap.min.js"></script>
    <script src="views/js/pace.min.js"></script>
    <script src="views/js/perfect-scrollbar.min.js"></script>
    <script src="views/js/coreui.min.js"></script>
    <script src="views/js/sweetalert2.min.js"></script>
    
</head>
<body <?php if(!isset($_GET["action"]) || $_GET["action"]=="login"){ echo 'class="app flex-row align-items-center"';}else{echo 'class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show"';} ?> >
	<?php 

        $modulos = new Enlaces();
        $modulos -> enlacesController();

    ?>
</body>
</html>