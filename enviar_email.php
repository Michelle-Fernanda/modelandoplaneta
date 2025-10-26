<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Caminho do arquivo JSON
$jsonFile = __DIR__ . '/view/lixo/lixo.json'; // Certifique-se que o caminho está correto

// Função para ler os dados do arquivo JSON
function lerUsuarios($jsonFile) {
    if (!file_exists($jsonFile)) {
        return [];
    }
    $json = file_get_contents($jsonFile);
    return json_decode($json, true) ?: [];
}

// Função para salvar os dados no arquivo JSON
function salvarUsuarios($jsonFile, $usuarios) {
    file_put_contents($jsonFile, json_encode($usuarios, JSON_PRETTY_PRINT));
}

require __DIR__ . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitização dos dados
    $destino = htmlspecialchars($_POST['gmail'] ?? '', ENT_QUOTES, 'UTF-8');
    $tipoLixo = htmlspecialchars($_POST['tipoLixo'] ?? '', ENT_QUOTES, 'UTF-8');
    $quantidade = htmlspecialchars($_POST['quantidade'] ?? '', ENT_QUOTES, 'UTF-8');
    $data = htmlspecialchars($_POST['data'] ?? '', ENT_QUOTES, 'UTF-8');

    if (empty($tipoLixo) || empty($quantidade) || empty($data)) {
        // Usa http_response_code para indicar erro
        http_response_code(400); 
        exit('❌ Preencha todos os campos obrigatórios.');
    }

    // ===================================
    // 1. SALVAR NO JSON (Novo passo)
    // ===================================
    try {
        $usuarios = lerUsuarios($jsonFile);
        $usuarios[] = [
            'tipoLixo' => $tipoLixo,
            'quantidade' => $quantidade,
            'data' => $data
        ];
        salvarUsuarios($jsonFile, $usuarios);
        $salvamento_status = 'Salvo no JSON. ';
    } catch (Exception $e) {
      $salvamento_status = 'Erro ao salvar no JSON. ';
    }


    // Criação da tabela para o e-mail
    $tabela = "
      <table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse; font-family: Arial;'>
        <thead>
          <tr style='background-color:#f2f2f2'>
            <th>Tipo de Lixo</th>
            <th>Quantidade</th>
            <th>Data</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{$tipoLixo}</td>
            <td>{$quantidade}</td>
            <td>{$data}</td>
          </tr>
        </tbody>
      </table>
    ";

    $mail = new PHPMailer(true);

    // ===================================
    // 2. ENVIAR E-MAIL
    // ===================================
    try {
        // ... (Configurações do PHPMailer: Host, Auth, Username, Password, etc.) ...
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kodelandooplaneta@gmail.com';
        $mail->Password = "uocg czem ylgk dnqf"; // Recomenda-se usar variáveis de ambiente
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Remetente e destinatário
        $mail->setFrom('kodelandooplaneta@gmail.com', 'Coleta de Lixo');
        $mail->addAddress($destino, 'Admin');

        // Verifica se há arquivos anexados no array
        if (isset($_FILES['anexo']) && is_array($_FILES['anexo'])) {
            
            // O array de uploads de PHP para múltiplos arquivos é formatado de forma diferente.
            // O ideal é reformatar para ser mais fácil de iterar:
            
            // Função para reformatar o array de $_FILES (copie e cole isso fora de funções se necessário)
            function reArrayFiles(&$file_post) {
                $file_ary = array();
                $file_count = count($file_post['name']);
                $file_keys = array_keys($file_post);

                for ($i = 0; $i < $file_count; $i++) {
                    foreach ($file_keys as $key) {
                        $file_ary[$i][$key] = $file_post[$key][$i];
                    }
                }
                return $file_ary;
            }

            // Chama a função para reformatar o array de uploads
            $arquivos = reArrayFiles($_FILES['anexo']);

            // Agora iteramos sobre CADA arquivo individualmente
            foreach ($arquivos as $arquivo) {
                // Verifica se o arquivo foi carregado sem erros
                if ($arquivo['error'] === UPLOAD_ERR_OK) {
                    
                    // Adiciona o anexo:
                    // O caminho temporário é uma string (agora está correto)
                    $mail->addAttachment(
                        $arquivo['tmp_name'], 
                        $arquivo['name']
                    );
                }
            }
        }

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Novo envio de coleta de lixo';
        $mail->Body    = "<h3>Dados enviados pelo formulário:</h3>" . $tabela;
        $mail->AltBody = "Tipo: $tipoLixo | Quantidade: $quantidade | Data: $data";

        // Desabilita verificação SSL (manter, se necessário)
        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ],
        ];

        $mail->send();
        echo '✅ E-mail enviado com sucesso!';
    } catch (Exception $e) {
        // Se o e-mail falhar, ainda informamos o status do JSON
        http_response_code(500);
        echo $salvamento_status . "❌ Erro ao enviar e-mail: {$mail->ErrorInfo}";
    }
}