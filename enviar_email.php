<?php
header('Content-Type: application/json; charset=utf-8');

require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$dotenv->required(['SMTP_HOST', 'SMTP_PORT', 'SMTP_USER', 'SMTP_PASS', 'SMTP_FROM', 'SMTP_FROM_NAME']);


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Método inválido.']);
    exit;
}

// ── Receber dados ─────────────────────────────────────────────────────────────
$emailProfessor = filter_input(INPUT_POST, 'gmail', FILTER_VALIDATE_EMAIL);
$titulo         = htmlspecialchars($_POST['titulo'] ?? 'Relatório');


$rawResultados  = $_POST['resultados'] ?? $_POST['dados'] ?? '[]';
$resultados     = json_decode($rawResultados, true);

if (!$emailProfessor) {
    echo json_encode(['success' => false, 'message' => 'E-mail inválido.']);
    exit;
}

if (!is_array($resultados)) $resultados = [];


$linhas    = '';

if (!empty($resultados)) {
    $colunas = array_keys($resultados[0]);

    foreach ($colunas as $col) {
        $cabecalho .= '<th>' . htmlspecialchars(ucfirst($col)) . '</th>';
    }

    foreach ($resultados as $r) {
        $linhas .= '<tr>';
        foreach ($colunas as $col) {
            $linhas .= '<td>' . htmlspecialchars($r[$col] ?? '') . '</td>';
        }
        $linhas .= '</tr>';
    }
}

$tabelaHtml = $cabecalho
    ? "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse:collapse'>
           <thead><tr>$cabecalho</tr></thead>
           <tbody>$linhas</tbody>
       </table>"
    : '<p><em>Nenhum dado foi registrado.</em></p>';

$corpo = "
    <p>Olá professor(a),</p>
    <p>Segue o relatório: <strong>$titulo</strong></p>
    $tabelaHtml
    <br>
    <p>Atenciosamente,<br>Projeto Educacional</p>
";


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

    $mail->setFrom($_ENV['SMTP_FROM'], $_ENV['SMTP_FROM_NAME']);
    $mail->addAddress($emailProfessor);
    $mail->isHTML(true);
    $mail->Subject = $titulo;
    $mail->Body    = $corpo;

    if (!empty($_FILES['anexo']['name'][0])) {
        $tamanhoMaximo = 5 * 1024 * 1024; // 5 MB por arquivo

        foreach ($_FILES['anexo']['name'] as $i => $nome) {
            $erro    = $_FILES['anexo']['error'][$i];
            $tamanho = $_FILES['anexo']['size'][$i];

            if ($erro === UPLOAD_ERR_NO_FILE) continue;

            if ($erro !== UPLOAD_ERR_OK) {
                $mensagensErro = [
                    UPLOAD_ERR_INI_SIZE   => "O arquivo '$nome' excede o limite permitido pelo servidor.",
                    UPLOAD_ERR_FORM_SIZE  => "O arquivo '$nome' excede o limite definido no formulário.",
                    UPLOAD_ERR_PARTIAL    => "O arquivo '$nome' foi enviado parcialmente. Tente novamente.",
                    UPLOAD_ERR_NO_TMP_DIR => "Erro interno: pasta temporária não encontrada.",
                    UPLOAD_ERR_CANT_WRITE => "Erro interno: não foi possível salvar o arquivo temporariamente.",
                    UPLOAD_ERR_EXTENSION  => "O arquivo '$nome' foi bloqueado por uma extensão do servidor.",
                ];
                echo json_encode([
                    'success' => false,
                    'message' => $mensagensErro[$erro] ?? "Erro ao receber '$nome' (código $erro)."
                ]);
                exit;
            }

            if ($tamanho > $tamanhoMaximo) {
                echo json_encode([
                    'success' => false,
                    'message' => "O arquivo '$nome' é muito grande. Limite: 5 MB por arquivo."
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
