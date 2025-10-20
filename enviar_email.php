<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Autoload do Composer

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipoLixo = $_POST['tipoLixo'] ?? '';
    $quantidade = $_POST['quantidade'] ?? '';
    $data = $_POST['data'] ?? '';

    // Cria a tabela com os dados enviados
    $tabela = "
      <table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse;'>
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

    try {
        // Configuração SMTP (exemplo com Gmail)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'seuemail@gmail.com';
        $mail->Password = 'sua_senha_ou_app_password'; // use senha de app
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Remetente e destinatário
        $mail->setFrom('seuemail@gmail.com', 'Coleta de Lixo');
        $mail->addAddress('destinatario@exemplo.com', 'Admin');

        // Anexo (se existir)
        if (!empty($_FILES['anexo']['tmp_name'])) {
            $mail->addAttachment($_FILES['anexo']['tmp_name'], $_FILES['anexo']['name']);
        }

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Novo envio de coleta de lixo';
        $mail->Body    = "<h3>Dados enviados pelo formulário:</h3>" . $tabela;
        $mail->AltBody = "Tipo: $tipoLixo | Quantidade: $quantidade | Data: $data";

        $mail->send();
        echo '✅ E-mail enviado com sucesso!';
    } catch (Exception $e) {
        echo "❌ Erro ao enviar: {$mail->ErrorInfo}";
    }
}
?>
