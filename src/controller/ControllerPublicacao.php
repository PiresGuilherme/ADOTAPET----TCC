<?php
session_start();
require_once("../init.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
// var_dump($id);
if (!empty($id)) {
    $query_pet = "SELECT * FROM pet WHERE id_pet = $id LIMIT 1";
    $result_pub = $conn->prepare($query_pet);
    // $result_pub->bindParam(':id', $id);:
    $result_pub->execute();
    $row_pet = $result_pub->fetch(PDO::FETCH_ASSOC);
    extract($row_pet);
}
// var_dump($row_pet);

$idPet = $id_pet;
$idUsuario = $id_usuario;



$sendImage = filter_input(INPUT_POST, 'sendImage', FILTER_SANITIZE_STRING);
// var_dump($sendImage);
if ($sendImage) {

    $idPet = filter_input(INPUT_POST, 'id_pet', FILTER_SANITIZE_STRING);
    $idUsuario = filter_input(INPUT_POST, 'id_usuario', FILTER_SANITIZE_STRING);
    $legenda_publicacao = filter_input(INPUT_POST, 'legenda_publicacao', FILTER_SANITIZE_STRING);
    $estado = 'pendente';

    // $nome_foto= $_FILES['foto']['name'];
    // var_dump($_FILES['foto']);

    //inserir no banco
    $result_pub = "INSERT INTO publicacao (id_pet, id_usuario, legenda_publicacao, estado)
    VALUES (:idPet, :idUsuario, :legenda_publicacao, :estado)";


    $insert_msg = $conn->prepare($result_pub);
    $insert_msg->bindparam(':idPet', $id_pet);
    $insert_msg->bindparam(':idUsuario', $id_usuario);
    $insert_msg->bindparam(':legenda_publicacao', $legenda_publicacao);
    $insert_msg->bindparam(':estado', $estado);

    // $insert_msg->bindparam(':foto',$$);
    // $insert_msg->execute();
    // var_dump($insert_msg);
    // var_dump($id_pet);
    // var_dump($id_usuario);
    // var_dump($legenda_publicacao);
    // var_dump($estado);




    // die();
    // Verificar se os cados foram inseridos com sucesso
    if ($insert_msg->execute()) {
        // header('Location: ../perfil.php?id='.$id_pet.'sucesso="ok"');
        echo "<script>alert('Pet Publicado!');history.back()</script>";
        // $_SESSION['msg'] = "<p style=color:green;> sucesso ao salvar os dados</p>";

    } else {
        $_SESSION['msg'] = "<p style=color:red;> Erro ao salvar os dados</p>";
        // header("Location: ../registraPet.php");
        echo "<script>alert('Erro ao registrar usuário!');history.back()</script>";
        // header("Location: ../registraPet.php?errocad='ok'");.
    }
}
