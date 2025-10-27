<?php

// Caminho do arquivo JSON
$jsonFile = __DIR__ . '/view/lixo/lixo.json'; // Certifique-se que o caminho está correto

// Função para ler os dados do arquivo JSON
function lerUsuarios($jsonFile) {
    // Verifica se o arquivo existe. Se não, retorna um array vazio.
    if (!file_exists($jsonFile)) {
        // Tenta criar o diretório se ele não existir
        $dir = dirname($jsonFile);
        if (!is_dir($dir)) {
            // Cria o diretório recursivamente
            mkdir($dir, 0777, true); 
        }
        // Se o arquivo ainda não existe, retorna array vazio e será criado no salvarUsuarios
        return [];
    }
    
    // Tenta ler o conteúdo do arquivo
    $json = file_get_contents($jsonFile);
    
    // Decodifica o JSON. Se falhar na decodificação, retorna um array vazio.
    return json_decode($json, true) ?: [];
}

// Função para salvar os dados no arquivo JSON
function salvarUsuarios($jsonFile, $usuarios) {
    // Usa JSON_PRETTY_PRINT para formatar o JSON de forma legível
    if (file_put_contents($jsonFile, json_encode($usuarios, JSON_PRETTY_PRINT)) === false) {
        // Se houver erro ao escrever o arquivo
        throw new Exception("Falha ao escrever no arquivo JSON.");
    }
}

// Verifica se a requisição é um POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Sanitização dos dados (o campo 'gmail' não será usado, mas foi mantido a sanitização)
    $destino = htmlspecialchars($_POST['gmail'] ?? '', ENT_QUOTES, 'UTF-8');
    $tipoLixo = htmlspecialchars($_POST['tipoLixo'] ?? '', ENT_QUOTES, 'UTF-8');
    $quantidade = htmlspecialchars($_POST['quantidade'] ?? '', ENT_QUOTES, 'UTF-8');
    $data = htmlspecialchars($_POST['data'] ?? '', ENT_QUOTES, 'UTF-8');

    // Validação básica dos campos obrigatórios
    if (empty($tipoLixo) || empty($quantidade) || empty($data)) {
        // Usa http_response_code para indicar erro (Bad Request)
        http_response_code(400); 
        exit('❌ Preencha todos os campos obrigatórios: Tipo de Lixo, Quantidade e Data.');
    }

    // ===================================
    // SALVAR NO JSON
    // ===================================
    try {
        // 1. Ler os usuários existentes
        $usuarios = lerUsuarios($jsonFile);
        
        // 2. Adicionar o novo registro
        $novoRegistro = [
            'tipoLixo' => $tipoLixo,
            'quantidade' => $quantidade,
            'data' => $data,
            // Adiciona um timestamp para rastreamento
            'timestamp' => date('Y-m-d H:i:s') 
        ];
        $usuarios[] = $novoRegistro;
        
        // 3. Salvar o array atualizado no arquivo JSON
        salvarUsuarios($jsonFile, $usuarios);
        
        // Retorno de sucesso (HTTP 200 OK)
        http_response_code(200);
        echo '✅ Dados salvos com sucesso no JSON!';
        
    } catch (Exception $e) {
        // Retorno de erro no salvamento (HTTP 500 Internal Server Error)
        http_response_code(500);
        exit('❌ Erro ao salvar dados no JSON: ' . $e->getMessage());
    }

} else {
    // Se não for POST, informa o método permitido (HTTP 405 Method Not Allowed)
    http_response_code(405);
    header('Allow: POST');
    exit('Método não permitido. Esta página aceita apenas requisições POST.');
}