<?php
    require '../vendor/autoload.php';
    require_once '../config.inc.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    function envia($correo=null){
        $user_data=enlace();
        $mail=new PHPMailer(true);
        try {
            $mail->SMTPDebug    =   SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host         =   'smtp.gmail.com';
            $mail->Port         =   587;
            $mail->SMTPAuth     =   true;
            $mail->SMTPSecure   =   'tls';
            $mail->Username     =   'enriqueaa16@gmail.com';
            $mail->Password     =   '19990515a';

            $mail->setFrom('enriqueaa16@gmail.com', 'Registro cuenta');
            $mail->addAddress(addslashes($correo), 'Usuario');

            $mail->isHTML(true);
            $mail->Subject      =   'su registro';
            $mail->Body         =   '<H1>Bienvenido</H1><p>Su registro ha concluido</p>';
            $mail->AltBody      =   'Su registro ha concluido con exito';
            $mail->send();

            $bandera=1;
        } catch (Exception $e){
            $bandera=0;
        }
        return $bandera;
    }

?>
