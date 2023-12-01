<?php

// Config
require_once 'config/app.php';
// Libs
require_once 'vendor/autoload.php';
// Controllers
require_once 'controllers/TemplateController.php';
require_once 'controllers/SubscriberController.php';
// Models
require_once 'models/Connection.php';
require_once 'models/SubscriberModel.php';


$template = new TemplateController();
$template->index();
