<?php
    require '../index.php';
    // Obteniendo datos del usuario 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        //Definiendo las variables del usuario
        $user_name = htmlspecialchars($_POST["nombre"]);
        $user_mail = htmlspecialchars($_POST["email"]);
        $user_region = htmlspecialchars($_POST["region"]);
        $user_coment = htmlspecialchars($_POST["coments"]);

    }

?>