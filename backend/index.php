<?php 
require_once 'models/enlaces.php';
require_once 'models/gestorUsuarios.php';

require_once 'controllers/template.php';
require_once 'controllers/enlaces.php';
require_once 'controllers/gestorUsuarios.php';

$template = new TemplateController();
$template->template();