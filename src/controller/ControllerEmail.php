<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
		$mensagem = $_POST['mensagem']; 
		
        require '../../AdotaPet/vendor/vendor/autoload.php';

        $from = new SendGrid\Email(null, "cesar@celke.com.br");
        $subject = "Mensagem de contato";
        $to = new SendGrid\Email(null, "celkeadm@gmail.com");
        $content = new SendGrid\Content("text/html", "Olá Cesar, <br><br>Nova mensagem de contato<br><br>Nome: $nome<br>Email: $email <br>Mensagem: $mensagem");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = 'SENDGRID_API_KEY';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo "Mensagem enviada com sucesso";
		
        ?>
    </body>
</html>
