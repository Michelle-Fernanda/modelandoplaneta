<?php
header('Content-Type: application/json; charset=utf-8');

require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

// ── Carrega .env ──────────────────────────────────────────────────────────────
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$dotenv->required(['SMTP_HOST', 'SMTP_PORT', 'SMTP_USER', 'SMTP_PASS', 'SMTP_FROM', 'SMTP_FROM_NAME']);

// ── Só aceita POST ────────────────────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Método inválido.']);
    exit;
}

// ── Receber dados ─────────────────────────────────────────────────────────────
$emailProfessor = filter_input(INPUT_POST, 'gmail', FILTER_VALIDATE_EMAIL);
$titulo         = htmlspecialchars($_POST['titulo'] ?? 'Relatório');
$resultados     = json_decode($_POST['resultados'] ?? '[]', true);

if (!$emailProfessor) {
    echo json_encode(['success' => false, 'message' => 'E-mail inválido.']);
    exit;
}

if (!is_array($resultados)) $resultados = [];

// ── Montar corpo do e-mail ────────────────────────────────────────────────────
$linhas = '';
foreach ($resultados as $r) {
    $tipo       = htmlspecialchars($r['tipo']       ?? '');
    $quantidade = htmlspecialchars($r['quantidade'] ?? '');
    $data       = htmlspecialchars($r['data']       ?? '');
    $linhas    .= "<tr><td>$tipo</td><td>$quantidade</td><td>$data</td></tr>";
}

$corpo = "
    <p>Olá professor(a),</p>
    <p>Segue o relatório de coleta de lixo da escola:</p>
    <h2>$titulo</h2>
    <table border='1' cellpadding='8' cellspacing='0' style='border-collapse:collapse'>
        <tr><th>Tipo</th><th>Quantidade (kg)</th><th>Data</th></tr>
        $linhas
    </table>
    <br>
    <p>Atenciosamente,<br>Projeto Educacional</p>
";

// ── Enviar e-mail ─────────────────────────────────────────────────────────────
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = $_ENV['SMTP_HOST'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $_ENV['SMTP_USER'];
    $mail->Password   = $_ENV['SMTP_PASS'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = (int) $_ENV['SMTP_PORT'];
    $mail->CharSet    = 'UTF-8';

    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer'       => false,
            'verify_peer_name'  => false,
            'allow_self_signed' => true,
        ],
    ];

    $mail->setFrom($_ENV['SMTP_FROM'], $_ENV['SMTP_FROM_NAME']);
    $mail->addAddress($emailProfessor);
    $mail->isHTML(true);
    $mail->Subject = $titulo;
    $mail->Body    = $corpo;

    // ── Anexos ────────────────────────────────────────────────────────────────
    // CORREÇÃO: verifica cada arquivo individualmente e retorna erro específico
    // caso haja falha de upload (ex: arquivo maior que upload_max_filesize).
    if (!empty($_FILES['anexo']['name'][0])) {
        $tamanhoMaximo = 5 * 1024 * 1024; // 5 MB por arquivo

        foreach ($_FILES['anexo']['name'] as $i => $nome) {
            $erro   = $_FILES['anexo']['error'][$i];
            $tamanho = $_FILES['anexo']['size'][$i];

            // Ignora entradas vazias (sem arquivo selecionado)
            if ($erro === UPLOAD_ERR_NO_FILE) {
                continue;
            }

            // CORREÇÃO: retorna mensagem de erro clara para o cliente
            // em vez de ignorar silenciosamente o problema.
            if ($erro !== UPLOAD_ERR_OK) {
                $mensagensErro = [
                    UPLOAD_ERR_INI_SIZE   => "O arquivo '$nome' excede o limite permitido pelo servidor.",
                    UPLOAD_ERR_FORM_SIZE  => "O arquivo '$nome' excede o limite definido no formulário.",
                    UPLOAD_ERR_PARTIAL    => "O arquivo '$nome' foi enviado apenas parcialmente. Tente novamente.",
                    UPLOAD_ERR_NO_TMP_DIR => "Erro interno: pasta temporária não encontrada.",
                    UPLOAD_ERR_CANT_WRITE => "Erro interno: não foi possível salvar o arquivo temporariamente.",
                    UPLOAD_ERR_EXTENSION  => "O arquivo '$nome' foi bloqueado por uma extensão do servidor.",
                ];
                $msg = $mensagensErro[$erro] ?? "Erro desconhecido ao receber o arquivo '$nome' (código $erro).";
                echo json_encode(['success' => false, 'message' => $msg]);
                exit;
            }

            // Valida tamanho máximo por arquivo
            if ($tamanho > $tamanhoMaximo) {
                echo json_encode([
                    'success' => false,
                    'message' => "O arquivo '$nome' é muito grande. O limite é 5 MB por arquivo."
                ]);
                exit;
            }

            $mail->addAttachment($_FILES['anexo']['tmp_name'][$i], basename($nome));
        }
    }

    $mail->send();
    echo json_encode(['success' => true, 'message' => 'E-mail enviado com sucesso!']);

} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Erro ao enviar: ' . $mail->ErrorInfo]);
}