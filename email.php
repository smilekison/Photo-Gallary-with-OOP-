<?php
function sendmail($name, $email, $subject, $message){
    require_once('phpmail/PHPMailerAutoload.php')      ;
    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port=465;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure = 'ssl';
    $mail->Username='smilekishan.smk@gmail.com';
    $mail->Password='I@#loveu12';

    $mail->setFrom($email, $name);
    $mail->AddAddress('smilekishan.sk@gmail.com');
    $mail->addReplyTo($email, $name);

    $mail->isHTML(true);
    $mail->Subject='Contact Form: '.$subject;
    $mail->Body='<h1 align=center>Name: '.$name.'<br>EMail: '.$email.'<br> Subject: '.$subject.'<br>Message: '.$message.'</h1>';

    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        return true;
     }  
    // return true;
}
?>