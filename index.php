<?php
    require 'index.view.php';
    // Obteniendo datos del usuario
    $errors = '';
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
        $user_coment = filter_var($user_name, FILTER_SANITIZE_STRING);

        //enviando el email
        $contact = 'contacto@construyendociudadanos.org';
    }
?>
