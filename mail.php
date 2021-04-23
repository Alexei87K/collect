<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';


// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.proiectmd.com';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'send@proiectmd.com'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'proiectmd111'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('send@proiectmd.com'); // от кого будет уходить письмо?
$mail->addAddress('teamitsystem@gmail.com');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с тестового сайта';
// $mail->Body    = '' .$name . ' оставил заявку, его телефон ' .$phone. '<br>Почта этого пользователя: ' .$email;
$numele = !empty($_POST["numele"]) ? 'его имя:  ' . $_POST["numele"] : '';
$prenumele = !empty($_POST["contact"]) ? 'его фамилия:  ' . $_POST["contact"] : '';
$contact = !empty($_POST["mesaj"]) ? 'его контакт:  ' . $_POST["mesaj"] : '';

$mail->msgHTML("<div>
    <div> {$numele}</div>
    <div> {$contact}</div>
    <div> {$mesaj}</div>
   
</div>");


// $mail->addAttachment($file);
// $mail->AddAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']); 
// $mail->AltBody = '';

if(!$mail->send()) {
    echo 'Ошибка при отправке';
    // $mail->SMTPDebug = 3;   
// } else {
//     header('location: thank-you.html');
// }
?>