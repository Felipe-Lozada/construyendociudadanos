<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Execption;

    require 'index.view.php';
    require 'libs/Exception.php';
    require 'libs/PHPMailer.php';
    require 'libs/SMTP.php';
    // Obteniendo datos del usuario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        //Definiendo las variables del usuario
        $user_name = htmlspecialchars($_POST["nombre"]);
        $user_mail = htmlspecialchars($_POST["email"]);
        $user_region = htmlspecialchars($_POST["region"]);
        $user_coment = htmlspecialchars($_POST["coments"]);

        //ajustando los datos
        $user_name = filter_var($user_name, FILTER_SANITIZE_STRING);
        $user_mail = filter_var($user_mail, FILTER_SANITIZE_EMAIL);
        $user_coment = filter_var($user_coment, FILTER_SANITIZE_STRING);

        //enviando el email
        $contact = 'contacto@construyendociudadanos.org';
        $mail = new PHPMailer(true);
        $mail->Mailer="smtp";
        try
        {
            //Server settings
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.ionos.mx';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'contacto@construyendociudadanos.org';                     // SMTP username
            $mail->Password   = 'Construyendo.1234';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to
            
            //Recipients
            $mail->setFrom($user_mail, $user_name);
            $mail->addAddress($contact, "Construyenco Ciudadanos");

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Informes sobre Construyendo Ciudadanos';
            $mail->Body    = '<h2> Persona Interesada </h2> </br> Nombre:'.$user_name .'<br> Correo: ' .$user_mail .'<br> Localidad: ' .$user_region .'<br> Comentarios: ' .$user_coment;
            $mail->AltBody ="";
            $mail->send();
            echo '<div class="alert alert-success alert-dismissible fade show text-center" role="alert" style = "display:inline-block"; margin:0 auto;>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                Tu mensaje se ha enviado con exito
                </div>';
        }
        catch (Exception $e) 
        {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>
