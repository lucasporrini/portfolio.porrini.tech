<?php
// Routes de l'application

// Route pour afficher les pages du site
//$router->method('url', [$MainController, 'method_name'], $requireAuth=false, $composedUrl = false);
$router->get('/', [$MainController, 'render_home']);
$router->get('/api/token', [$MainController, 'get_token']);

// Gestion de la 404
$router->get('/404', [$MainController, 'render_error']);

$router->run();