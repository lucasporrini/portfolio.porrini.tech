<?php
//Configuration du site
define('SITE_NAME',                     "lucas.porrini");
define('SITE_URL_NAME',                 "lucas.porrini.tech");
define('SITE_URL',                      "https://www." . SITE_URL_NAME . "/");
define('DEV_MAIL',                      "2608lucas@gmail.com");
define('SITE_LOGO',                     "logo.png");
define('SITE_HEBERGEUR',                "ovh.fr");
define('SITE_DEBUG',                    true); // Mettre à "false" en production

// Configuration des relatives paths
define('DS',                            DIRECTORY_SEPARATOR);
define('BASE_URL',                      dirname(__DIR__) . DS);
define('RELATIVE_PATH_PUBLIC',          BASE_URL . 'public' . DS);
define('RELATIVE_PATH_APP',             BASE_URL . 'app' . DS);
define('RELATIVE_PATH_LIB',             BASE_URL . DS . 'lib' . DS);

// Configuration des relatives paths "app"
define('RELATIVE_PATH_VIEWS',           RELATIVE_PATH_APP . 'views' . DS);
define('RELATIVE_PATH_MODELS',          RELATIVE_PATH_APP . 'models' . DS);
define('RELATIVE_PATH_CONTROLLERS',     RELATIVE_PATH_APP . 'controllers' . DS);
define('RELATIVE_PATH_ROUTER',          RELATIVE_PATH_APP . 'router' . DS);
define('RELATIVE_PATH_TEMPLATE',        RELATIVE_PATH_APP . 'template' . DS);

// Configuration des relatives paths "assets"
define('RELATIVE_PATH_ASSETS',          RELATIVE_PATH_PUBLIC . 'assets' . DS);
define('RELATIVE_PATH_CSS',             RELATIVE_PATH_ASSETS . 'css' . DS);
define('RELATIVE_PATH_JS',              RELATIVE_PATH_ASSETS . 'js' . DS);
define('RELATIVE_PATH_IMG',             RELATIVE_PATH_ASSETS . 'img' . DS);
define('RELATIVE_PATH_ICONS',           RELATIVE_PATH_ASSETS . 'icons' . DS);
define('RELATIVE_PATH_FONTS',           RELATIVE_PATH_ASSETS . 'fonts' . DS);
define('RELATIVE_PATH_UPLOADS',         RELATIVE_PATH_ASSETS . 'uploads' . DS);

// Configuration des relatives paths "partials"
define('RELATIVE_PATH_PARTIALS',        RELATIVE_PATH_PUBLIC . 'partials' . DS);

// Configuration des relatives paths "functions"
define('RELATIVE_PATH_FUNCTIONS',       RELATIVE_PATH_PUBLIC . 'functions' . DS);

// Lancement de la SESSION
session_start();

// Importer valeurs du .env
if(!file_exists('.env')) {
    return;
}

$lines = file('.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($lines as $line) {
    if(strpos(trim($line), '#') === 0) {
        continue;
    }

    list($name, $value) = explode('=', $line, 2);
    $name = trim($name);
    $value = trim($value);

    if(!array_key_exists($name, $_ENV)) {
        putenv(sprintf('%s=%s', $name, $value));
        $_ENV[$name] = $value;
        $_SERVER[$name] = $value;
    }
};

// Ecrire en session le token de l'API
if(!isset($_SESSION['token'])) {
    print_r($_ENV['TOKEN']);
    $_SESSION['token'] = $_ENV['TOKEN'];
}