<?php
require './vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
$datos=$_POST['valores'];
$datos=json_decode($datos);
$nombre=$datos[0];
$email=$datos[1];
$telefono=$datos[2];
$mensaje=$datos[3];

$mail = new PHPMailer();
try{            
    //Server settings
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = 'html';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'vps-1765504-x.dattaweb.com';
    $mail->Port = 465;
    $mail->isHTML();
    $mail->Username = 'no-reply@donhierro.com.ar';
    $mail->Password = 'uvnkMc002b';
    //Destinatarios
    $mail->setFrom($email, $nombre);    
    $mail->addAddress('info@donhierro.com.ar');            
    $mail->Subject = "Nuevo contacto desde la web";
    $mail->Body = "Nombre: ".$nombre."<br>"."E-Mail: ".$email."<br>"."Telefono: ".$telefono."<br>"."Mensaje: ".$mensaje;
    $mail->Send(); 
    
        }catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
?>