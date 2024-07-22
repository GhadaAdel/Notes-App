<?php

//namespace Core;

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($page)
{
    return $_SERVER['REQUEST_URI'] === $page;
}

function authorize($condition, $statusCode = Response::FORBIDDEN)
{
    if (! $condition){
        abort($statusCode);
    }
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}

?>