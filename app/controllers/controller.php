<?php



function home()
{
    require '../app/views/default.layout.view.php';
    require '../app/views/index.view.php';

    if (isset($_POST["submit"])) {
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';                     //Adresse IP ou DNS du serveur SMTP
        $mail->Port = 465;                                  //Port TCP du serveur SMTP
        $mail->SMTPAuth = 1;                                //Utiliser l'identification
        $mail->CharSet = 'UTF-8';

        if ($mail->SMTPAuth) {
            $mail->SMTPSecure = 'ssl';                      //Protocole de sécurisation des échanges avec le SMTP
            $mail->Username   =  'gabriel.bouak@gmail.com'; //Adresse email à utiliser
            $mail->Password   =  'LEBIGboss34';             //Mot de passe de l'adresse email à utiliser
        }

        $mail->From       = $_POST["email"];          //L'email à afficher pour l'envoi
        $mail->FromName   = trim($_POST["name"]);           //L'alias de l'email de l'emetteur

        $mail->AddAddress("gabriel.bouak@gmail.com");

        $mail->Subject    =  $_POST["subject"];             //Le sujet du mail
        $mail->WordWrap   = 50;                             //Nombre de caracteres pour le retour a la ligne automatique
        $mail->Body =    $_POST["message"];
        $mail->AltBody = $_POST["message"];                 //Texte brut
        $mail->IsHTML(false);                               //Préciser qu'il faut utiliser le texte brut

        if (!$mail->send()) {
            echo $mail->ErrorInfo;
        } else {
            echo 'Message bien envoyé';
        }
    }
}

function error404()
{
    require '../app/views/404.view.php';
}
