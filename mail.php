<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';


// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = '';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = ''; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = ''; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom(''); // от кого будет уходить письмо?
$mail->addAddress('');     // Кому будет уходить письмо 

$mail->isHTML(true);                                  

$mail->Subject = 'Заявка';
// $mail->Body    = '' .$name . ' оставил заявку, его телефон ' .$phone. '<br>Почта этого пользователя: ' .$email;
$numele = !empty($_POST["numele"]) ? 'его имя:  ' . $_POST["numele"] : '';
$prenumele = !empty($_POST["telefon"]) ? 'его фамилия:  ' . $_POST["telefon"] : '';
$contact = !empty($_POST["comentariu"]) ? 'его контакт:  ' . $_POST["comentariu"] : '';

$mail->msgHTML("<div>
    <div> {$numele}</div>
    <div> {$telefon}</div>
    <div> {$comentariu}</div>
   
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