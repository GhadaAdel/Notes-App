<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/Demo/index' => 'controllers/index.php',
    '/Demo/about' => 'controllers/about.php',
    '/Demo/notes' => 'controllers/notes.php',
    '/Demo/note' => 'controllers/note.php',
];

function routeToController($uri, $routes)
{
    if(array_key_exists($uri, $routes)){
        require $routes[$uri]; //Will direct the given uri to its controller [SYNTAX] *require*
    } else {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);

    require "views/{$code}.php";

    die();
}

routeToController($uri, $routes);