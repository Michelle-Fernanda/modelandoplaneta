<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Autoload do Composer

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitização dos dados
    $tipoLixo = htmlspecialchars($_POST['tipoLixo'] ?? '', ENT_QUOTES, 'UTF-8');
    $quantidade = htmlspecialchars($_POST['quantidade'] ?? '', ENT_QUOTES, 'UTF-8');
    $data = htmlspecialchars($_POST['data'] ?? '', ENT_QUOTES, 'UTF-8');

    if (empty($tipoLixo) || empty($quantidade) || empty($data)) {
        exit('❌ Preencha todos os campos obrigatórios.');
    }

    // Criação da tabela
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

    try {
        // Configuração SMTP (exemplo com Gmail)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kodelandooplaneta@gmail.com';
        $mail->Password = "uocg czem ylgk dnqf"; // use variável de ambiente
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Remetente e destinatário
        $mail->setFrom('kodelandooplaneta@gmail.com', 'Coleta de Lixo');
        $mail->addAddress('arisleycds@gmail.com', 'Admin');

        // Anexo (opcional)
        if (!empty($_FILES['anexo']['tmp_name'])) {
            $mail->addAttachment($_FILES['anexo']['tmp_name'], $_FILES['anexo']['name']);
        }

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Novo envio de coleta de lixo';
        $mail->Body    = "<h3>Dados enviados pelo formulário:</h3>" . $tabela;
        $mail->AltBody = "Tipo: $tipoLixo | Quantidade: $quantidade | Data: $data";

        // Desabilita verificação SSL (caso servidor não tenha CA configurado)
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
        echo "❌ Erro ao enviar: {$mail->ErrorInfo}";
    }
}
?>
