<?php 

// Incluimos los archivos necesarios
include 'src/routes/routes.php';

// Recoge la URI de la petición
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// Comprueba si la URI existe en el array de rutas
// Si existe, carga el controlador correspondiente
// Si no existe, carga la vista de error
function routeToController(string $uri, array $routes) {
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

// Carga la vista de error
// Por defecto, carga la vista 404
function abort(int $code = 404): void
{
    http_response_code($code);
    require "src/views/{$code}.php";
    die();
}

// Carga el controlador correspondiente
routeToController($uri, $routes);
