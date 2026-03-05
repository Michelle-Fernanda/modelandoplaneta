<?php
header('Content-Type: application/json; charset=utf-8');

// Ajuste caso necessário
require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Só aceita POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'success' => false,
        'message' => 'Método inválido.'
    ]);
    exit;
}

// ---------------------------
// RECEBER DADOS
// ---------------------------
$emailProfessor = filter_input(INPUT_POST, 'gmail', FILTER_VALIDATE_EMAIL);
$titulo = htmlspecialchars($_POST['titulo'] ?? 'Relatório');
$resultadosJson = $_POST['resultados'] ?? '[]';

if (!$emailProfessor) {
    echo json_encode([
        'success' => false,
        'message' => 'E-mail inválido.'
    ]);
    exit;
}

$resultados = json_decode($resultadosJson, true);
if (!is_array($resultados)) {
    $resultados = [];
}

// ---------------------------
// MONTAR CORPO DO EMAIL
// ---------------------------
$htmlTabela = "<h2>$titulo</h2>";
$htmlTabela .= "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse:collapse'>";
$htmlTabela .= "<tr>
                    <th>Tipo</th>
                    <th>Quantidade (kg)</th>
                    <th>Data</th>
                </tr>";

foreach ($resultados as $r) {
    $tipo = htmlspecialchars($r['tipo'] ?? '');
    $quantidade = htmlspecialchars($r['quantidade'] ?? '');
    $data = htmlspecialchars($r['data'] ?? '');

    $htmlTabela .= "<tr>
                        <td>$tipo</td>
                        <td>$quantidade</td>
                        <td>$data</td>
                    </tr>";
}

$htmlTabela .= "</table>";

$htmlMensagem = "
    <p>Olá professor(a),</p>
    <p>Segue o relatório de coleta de lixo da escola:</p>
    $htmlTabela
    <br>
    <p>Atenciosamente,<br>Projeto Educacional</p>
";

// ---------------------------
// CONFIGURAR EMAIL
// ---------------------------
$mail = new PHPMailer(true);

try {

    // CONFIGURE AQUI SEU SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'kodelandooplaneta@gmail.com'; // ALTERE AQUI
    $mail->Password = 'uocg czem ylgk dnqf';   // ALTERE AQUI (senha de app Gmail)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('kodelandooplaneta@gmail.com', 'Coleta de Lixo');
    $mail->addAddress($emailProfessor);

    $mail->isHTML(true);
    $mail->Subject = $titulo;
    $mail->Body    = $htmlMensagem;

    // ---------------------------
    // ANEXOS
    // ---------------------------
    if (!empty($_FILES['anexo']['name'][0])) {

        for ($i = 0; $i < count($_FILES['anexo']['name']); $i++) {

            if ($_FILES['anexo']['error'][$i] === UPLOAD_ERR_OK) {

                $tmpName = $_FILES['anexo']['tmp_name'][$i];
                $originalName = basename($_FILES['anexo']['name'][$i]);

                // Limite de 5MB por arquivo
                if ($_FILES['anexo']['size'][$i] <= 5 * 1024 * 1024) {
                    $mail->addAttachment($tmpName, $originalName);
                }
            }
        }
    }

    // Desabilita verificação SSL (manter, se necessário)
    $mail->SMTPOptions = [
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true,
    ],
        ];

    $mail->send();

    echo json_encode([
        'success' => true,
        'message' => 'E-mail enviado com sucesso!'
    ]);

} catch (Exception $e) {

    echo json_encode([
        'success' => false,
        'message' => 'Erro ao enviar: ' . $mail->ErrorInfo
    ]);
}