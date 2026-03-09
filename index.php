<?php

$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

$routes = [
    ''           => 'view/home.php',
    'agua'       => 'view/agua.php',
    'arborizacao'=> 'view/arborizacao.php',
    'lixo'       => 'view/lixo/lixo.php',
    'petroleo'   => 'view/petroleo.php',
    'sobre'      => 'view/sobre.php',
    'contato'    => 'view/contato.php',
    'teste'      => 'view/teste.php',
];

if (array_key_exists($path, $routes)) {
    require $routes[$path];
} else {
    http_response_code(404);
    require 'view/404.php';
}