<?php 
require_once 'models/enlaces.php';
require_once 'models/gestorCategoria.php';

require_once 'controllers/template.php';
require_once 'controllers/enlaces.php';
require_once 'controllers/gestorCategoria.php';

$template = new TemplateController();
$template->template();