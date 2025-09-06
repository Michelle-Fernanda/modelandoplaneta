<?php

// Obtém a URL requisitada
$request_uri = $_SERVER['REQUEST_URI'];

// Exibe o valor final de $path
echo "Path tratado: " . $path . "<br>";

// Remove a barra inicial e o qualquer parâmetro da query string
$path = trim(parse_url($request_uri, PHP_URL_PATH), '/');

// Exemplo de roteamento manual
switch ($path) {
    case '': // Rota para a página inicial
        require 'view/home.php';
        break;
    case 'agua':
        require 'view/agua.php';
        break;
    case 'arborizacao':
        require 'view/arborizacao.php';
        break;
    case 'lixo':
        require 'view/lixo.php';
        break;
    case 'petroleo.php':
        require 'view/petroleo.php';
        break;
    case 'sobre': // Rota para a página "Sobre Nós"
        require 'view/sobre.php';
        break;
    case 'contato': // Rota para a página de contato
        require 'view/contato.php';
        break;
    default: // Se a rota não for encontrada
        http_response_code(404);
        require 'view/404.php';
        break;
}

?>