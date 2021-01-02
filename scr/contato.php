<?php
$nome = isset($_POST['nome']) ? $_POST['nome'] : 'Não informado';
$email = isset($_POST['mail']) ? $_POST['mail'] : 'Não informado';
$mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : 'Não informado';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$mail = new PHPMailer();
try {
    // Configurações do servidor
    $mail->isSMTP();        //Devine o uso de SMTP no envio
    $mail->SMTPAuth = true; //Habilita a autenticação SMTP
    $mail->Username   = 'brunobenetolo1@hotmail.com';
    $mail->Password   = 'Bruno_2404';
    // Criptografia do envio SSL também é aceito
    $mail->SMTPSecure = 'tls';
    // Informações específicadas pelo Google
    $mail->Host = 'smtp.live.com';
    $mail->Port = 465;
    // Define o remetente
    $mail->setFrom('ksklad@hotmail.com', 'ninguem');
    // Define o destinatário
    $mail->addAddress('brunobenetolo@hotmail.com', 'Destinatário');
    // Conteúdo da mensagem
    $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
    $mail->Subject = 'Assunto';
    $mail->Body    = 'Este é o corpo da mensagem <b>Olá em negrito!</b>';
    $mail->AltBody = 'Este é o cortpo da mensagem para clientes de e-mail que não reconhecem HTML';
    // Enviar
    if($mail->send()){

        echo 'A mensagem foi enviada!';
    }else{
        echo 'erro';
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}




























$dsn  = 'mysql:host=localhost;dbname=db_contato';
$user = 'root';
$pass = '';
$sql  = 'INSERT INTO mensagens(nome,email,mensagem) VALUES (?,?,?)';

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo "Erro:" . $e->getMessage();
} catch (Exception $e) {
    echo "Erro:" . $e->getMessage();
}

$stmt = $pdo->prepare($sql);
$stmt->bindValue(1, $nome);
$stmt->bindValue(2, $email);
$stmt->bindValue(3, $mensagem);

if ($stmt->execute()) {
    echo 'Salvo com sucesso!';
} else {
    echo 'erro ao salvar';
}

