<?php
// Inclure l'autoloader
require_once 'vendor/autoload.php';

// Inclure les fichiers nécessaires
require_once 'lib/preprocess.php';
require_once 'lib/config.php';

// charger le router
require_once 'app/router/Router.php';

// charger les routes
$routes = require 'app/router/Route.php';

// charger les Controllers
require_once 'app/controllers/MainController.php';

// charger les models
$router = new Router($_GET['url']);
$MainController = new MainController();

// Tester le mode debug
if (SITE_DEBUG === true) {
    // On active les erreurs PHP
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

// Importation des routes
require_once 'app/router/routes.php';
?>