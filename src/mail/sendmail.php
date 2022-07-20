<?php
//  session_start();
include_once("../init.php");
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    $query_pet = "SELECT * FROM pet WHERE id_pet = $id LIMIT 1";
    $result_pet = $conn->prepare($query_pet);
    // $result_pet->bindParam(':id', $id);:
    $result_pet->execute();
    $row_pet = $result_pet->fetch(PDO::FETCH_ASSOC);
    extract($row_pet);
	// var_dump($row_pet);
	
	$query_main ="SELECT email FROM usuario WHERE id_usuario = $id_usuario LIMIT 1";
    $result_main  = $conn->prepare($query_main);
    // $result_pet->bindParam(':id', $id);:
    $result_main->execute();
    $row_main = $result_main->fetch(PDO::FETCH_ASSOC);
	extract($row_main);
	// var_dump($row_main);
	$MailMain = $email;
	// var_dump($MailMain);
} else {
    $_SESSION['msg'] = "<p> é necessário selecionar um pet.</p>";
    // header(("Location: index.php"));
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);


$emailuser = $_COOKIE['email']; 
// var_dump($emailuser);
$query_user = "SELECT * FROM usuario WHERE email = '$emailuser'";
$result_user = $conn->prepare($query_user);
$result_user->execute();
$column_user = $result_user -> fetch(PDO::FETCH_ASSOC);
extract($column_user);
// var_dump($result_user);
// var_dump($column_user);
// echo $_POST['submit'];

// $sendMail = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING);
// var_dump($sendMail);
// if ($sendMail) {
// 	$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);


try {
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = '4544709422@estudante.sed.sc.gov.br';
	$mail->Password = '02042003';
	$mail->Port = 587;

	$mail->setFrom('4544709422@estudante.sed.sc.gov.br');
	// $mail->addAddress($row_pet['id_usuario']);
	$mail->addAddress('vianaguilhermepv@gmail.com');

	$mail->isHTML(true);
	$mail->Subject = 'O usuario '. $column_user['nome_usuario'].' demonstrou interesse em adotar o pet : '.$nome_pet;
	$mail->Body = $_POST['mensagem'].'<br>
	<br>
	dados para contato deste novo pai/mãe de PET: <br>
	Nome: '.$column_user['nome_usuario'].'<br>
	Email: '.$column_user['email'].'<br>
	Telefone: '.$column_user['telefone'].'<br>
	Sexo: '.$column_user['sexo'].'<br>
	';
	$mail->AltBody = 'Chegou o email teste do Canal TI'.$_POST['mensagem'];

	if($mail->send()) {
		// echo 'Email enviado com sucesso';
		// $_SESSION['msg'] = "<p style=color:green;> sucesso ao salvar os dados</p>";
		// echo '<script> window.location.replace("http://localhost/ADOTAPET/contact.php?id='.$id.'")</script>';
		echo "<script>alert('Email enviado com sucesso!');history.go(-1)</script>"; 
        // header('Location: http://localhost/ADOTAPET/contact.php?id='.$id);
		//header("location : 
		// var_dump($id_pet);
	} else {
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}
// } else{
// 	echo 'haha lixo';
// };
?>