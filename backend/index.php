<?php 
require_once 'models/enlaces.php';
require_once 'models/gestorUsuarios.php';
require_once 'models/gestorIngreso.php';
require_once 'models/gestorCategoria.php';
require_once 'models/gestorProyecto.php';

require_once 'controllers/template.php';
require_once 'controllers/enlaces.php';
require_once 'controllers/gestorUsuarios.php';
require_once 'controllers/gestorIngreso.php';
require_once 'controllers/gestorCategoria.php';
require_once 'controllers/gestorProyecto.php';

$template = new TemplateController();
$template->template();