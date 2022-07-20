<?php
session_start();
require_once("../init.php");
$sendImage = filter_input(INPUT_POST, 'sendImage', FILTER_SANITIZE_STRING);
if ($sendImage) {
    $nome = filter_input(INPUT_POST, 'nome_pet', FILTER_SANITIZE_STRING);
    $especie = filter_input(INPUT_POST, 'especie', FILTER_SANITIZE_STRING);
    $raca = filter_input(INPUT_POST, 'raca', FILTER_SANITIZE_STRING);
    $cor = filter_input(INPUT_POST, 'cor', FILTER_SANITIZE_STRING);
    $peso = filter_input(INPUT_POST, 'peso', FILTER_SANITIZE_STRING);
    $idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_STRING);
    $sexo = filter_has_var(INPUT_POST, 'sexo');
    $valorSexo = $_POST['sexo'];
    $saude = filter_input(INPUT_POST, 'saude', FILTER_SANITIZE_STRING);
    $historia = filter_input(INPUT_POST, 'historia', FILTER_SANITIZE_STRING);
    $nome_foto_perfil = $_FILES['foto_perfil']['name'];
    $nome_foto1 = $_FILES['foto1']['name'];
    $nome_foto2 = $_FILES['foto2']['name'];
    $nome_foto3 = $_FILES['foto3']['name'];
    $nome_foto4 = $_FILES['foto4']['name'];
 
    $email = $_COOKIE['email']; 
    $query_user = "SELECT * FROM usuario WHERE email = '$email'";
    $result_user = $conn->prepare($query_user);
    $result_user->execute();
    $column_user = $result_user -> fetch(PDO::FETCH_ASSOC);
    extract($column_user);

    //inserir no banco
    $result_pet = "INSERT INTO pet (id_usuario,nome_pet, especie, raca, cor,idade, sexo_pet, peso,saude,historia,foto_perfil,foto_pet1,foto_pet2,foto_pet3,foto_pet4)
    VALUES (:id_usuario,:nome_pet,:especie,:raca,:cor,:idade, :sexo_pet, :peso,:saude,:historia,:foto_perfil,:foto_pet1,:foto_pet2,:foto_pet3,:foto_pet4)";
    $insert_msg = $conn->prepare($result_pet);
    $insert_msg->bindparam(':id_usuario', $id_usuario);
    $insert_msg->bindparam(':nome_pet', $nome);
    $insert_msg->bindparam(':especie', $especie);
    $insert_msg->bindparam(':raca', $raca);
    $insert_msg->bindparam(':cor', $cor);
    $insert_msg->bindparam(':idade', $idade);
    $insert_msg->bindparam(':sexo_pet', $valorSexo);
    $insert_msg->bindparam(':peso', $peso);
    $insert_msg->bindparam(':saude', $saude);
    $insert_msg->bindparam(':historia', $historia);
    $insert_msg->bindparam(':foto_perfil', $nome_foto_perfil);
    $insert_msg->bindparam(':foto_pet1', $nome_foto1);
    $insert_msg->bindparam(':foto_pet2', $nome_foto2);
    $insert_msg->bindparam(':foto_pet3', $nome_foto3);
    $insert_msg->bindparam(':foto_pet4', $nome_foto4);

    if ($insert_msg->execute()) {
        $ultimo_id = $conn->lastInsertId();

        $diretorio = '../imagens/' . $ultimo_id . '/';
        var_dump($diretorio);
        mkdir($diretorio, 0755);

        $nome_foto_perfil = $_FILES['foto_perfil']['tmp_name'];
        $nome_foto1 = $_FILES['foto1']['tmp_name'];
        $nome_foto2 = $_FILES['foto2']['tmp_name'];
        $nome_foto3 = $_FILES['foto3']['tmp_name'];
        $nome_foto4 = $_FILES['foto4']['tmp_name'];
        $fotos = [$nome_foto_perfil, $nome_foto1, $nome_foto2, $nome_foto3, $nome_foto4];
        //Verificar se os cados foram inseridos com sucesso
        for ($i = 0; $i < 5; $i++) {
            if (move_uploaded_file($fotos[$i], $diretorio . 'profile' . $i . '.jpg')) {
            } else {
                $_SESSION['msg'] = "<p style=color:green;> sucesso ao salvar os dados porém houve uma falha ao salvar a imagem</p>";
                header("Location: ../registraPet.php?sucesso='ok'");
            }
        }
           if( move_uploaded_file($_FILES['foto_perfil']['tmp_name'],$diretorio.'profile.jpg')){
           } 
        $_SESSION['msg'] = "<p style=color:green;> sucesso ao salvar os dados</p>";
        header("Location: ../registraPet.php?sucesso='ok'");


    } else {
        $_SESSION['msg'] = "<p style=color:red;> Erro ao salvar os dados</p>";
        // header("Location: ../registraPet.php");
        echo "<script>alert('Erro ao registrar usuário!');history.back()</script>";
        header("Location: ../registraPet.php?errocad='ok'");
    }
} 




// require_once("../model/pet.php");
// if (isset($_POST)) {
//     cadastrarPet();
// }
// function cadastrarPet()
// {
//     echo'cheguei1';
//     var_dump($_POST);
//     $user = new Pet();
//     $user->setNome_pet($_POST['nome_pet']);
//     $user->setEspecie($_POST['especie']);
//     $user->setRaca($_POST['raca']);
//     $user->setCor($_POST['cor']);
//     $user->setTamanho($_POST['tamanho']);
//     $user->setPeso($_POST['peso']);
//     $user->setSaude($_POST['saude']);
//     $user->setHistoria($_POST['historia']);
//     $user->setFoto($_POST['foto']);
    
//     $resultado = $user->cadastrar();
//     var_dump($resultado);
//     echo 'cheguei2';
//     var_dump($user);
//     if ($resultado >= 1) {
//         header("Location: ../registraPet.php?sucesso='ok'");
//     } else { 
//         // echo "<script>alert('Erro ao registrar usuário!');history.back()</script>";
//         header("Location: ../registraPet.php?errocad='ok'");
//     }
// }
