<?php



function home()
{
    require '../app/views/index.view.php';

    if (isset($_POST["submit"])) {
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP();
        $mail->Host = $_ENV['MAIL_HOST'];                     //Adresse IP ou DNS du serveur SMTP
        $mail->Port = $_ENV['MAIL_PORT'];                                  //Port TCP du serveur SMTP
        $mail->SMTPAuth = 1;                                //Utiliser l'identification
        $mail->CharSet = 'UTF-8';

        if ($mail->SMTPAuth) {
            $mail->SMTPSecure = 'ssl';                      //Protocole de sécurisation des échanges avec le SMTP
            $mail->Username   =  $_ENV['MAIL_SENDER']; //Adresse email à utiliser
            $mail->Password   =  $_ENV['MAIL_MDP'];             //Mot de passe de l'adresse email à utiliser
        }

        $mail->From       = $_POST["email"];          //L'email à afficher pour l'envoi
        $mail->FromName   = trim($_POST["name"]);           //L'alias de l'email de l'emetteur

        $mail->AddAddress("gabriel.bouak@gmail.com");

        $mail->Subject    =  $_POST["subject"];             //Le sujet du mail
        $mail->WordWrap   = 50;                             //Nombre de caracteres pour le retour a la ligne automatique
        $mail->Body =    $_POST["message"] . "<br>" .  $_POST["email"];
        $mail->AltBody = $_POST["message"];                 //Texte brut
        $mail->IsHTML(false);                               //Préciser qu'il faut utiliser le texte brut

        if (!$mail->send()) {
            echo $mail->ErrorInfo;
        }
?>
        <script type="text/javascript">
            alert("Message bien envoyé, votre demande sera traitée dans les meilleurs délais.");
        </script>
<?php
    }
}

function error404()
{
    require '../app/views/404.view.php';
}
