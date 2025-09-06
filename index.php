<?php

// Obtém a URL requisitada
$request_uri = $_SERVER['REQUEST_URI'];

// Remove a barra inicial e o qualquer parâmetro da query string
$path = trim(parse_url($request_uri, PHP_URL_PATH), '/');

// Exemplo de roteamento manual
switch ($path) {
    case '': // Rota para a página inicial
        require 'views/home.php';
        break;
    case 'sobre-nos': // Rota para a página "Sobre Nós"
        require 'views/sobre.php';
        break;
    case 'contato': // Rota para a página de contato
        require 'views/contato.php';
        break;
    case 'produtos/eletronicos': // Rota mais complexa
        require 'views/produtos-eletronicos.php';
        break;
    default: // Se a rota não for encontrada
        http_response_code(404);
        require 'views/404.php';
        break;
}

?>