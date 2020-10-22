<?php

if (isset($_POST['email_btn'])){
    date_default_timezone_set('Etc/UTC');
    require 'PHPMailerAutoload.php';

    $mail = new PHPMailer;

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'pplwwa2019@gmail.com';                 // SMTP username
$mail->Password = 'PPLWWA2019';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('pplwwa2019@gmail.com', 'WWA -- Admin');
$email = $_POST['email'];
$mail->addAddress($email, $email); 
$mail->isHTML(true);

$link = 'localhost/pbp2/register.php';
$mail->Subject = 'Konfirmasi Pendaftaran Admin WWA';
$mail->Body    = 'Terima kasih telah mendaftar menjadi Admin WWA. Silahkan copy link berikut ke browser Anda : "'.$link.'". Kami sangat mengharapkan bantuan Anda dalam mengembangkan web wisata ini. Mari explor lagi wisata alam yang ada di Jawa Tengah :). Selamat datang dan Selamat bergabung. Salam Sayang, Admin WWA';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
}