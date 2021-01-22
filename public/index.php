<?php
error_reporting(E_ALL);
require_once(dirname(__FILE__, 2) . '/src/config/config.php');
//require_once(CONTROLLER_PATH . '/login.php');

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));  // Pegando url válida
if($uri === '/inout/public/' || $uri === ''){
    $uri = '/login.php';
}

// chamando a página
require_once(CONTROLLER_PATH . "/{$uri}");
