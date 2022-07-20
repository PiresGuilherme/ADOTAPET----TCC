<?php

require_once("../model/usuario.php");

if (isset($_POST)) {
    if (isset($_POST['CPF'])) {
        cadastrarusuarioCpf();
    }
    if (isset($_POST['CNPJ'])) {
        cadastrarUsuarioCnpj();
    }
}
function cadastrarusuarioCpf()
{
    var_dump($_POST);
    $user = new Usuario();
    $user->setNome($_POST['nome_usuario']);
    $user->setTelefone($_POST['telefone']);
    $user->setCPF($_POST['CPF']);
    $user->setNascimento($_POST['nascimento']);
    $user->setEndereco($_POST['endereco']);
    $user->setEmail($_POST['email']);
    $user->setLogin($_POST['email']);
    $user->setSenha($_POST['senha']);
     
    if (isset($_POST['sexo']))
        $_POST['masc'] = (isset($_POST['fem'])) ? $_POST['outro'] : null;
    $user->setSexo($_POST['sexo']);

    $user->setNivel_Acesso(1);
    $resultado = $user->incluir();

    if ($resultado >= 1) {
        header("Location: ../cadastro1.php?sucesso='ok'");
    } else {
        // echo "<script>alert('Erro ao registrar usuário!');history.back()</script>";
        header("Location: ../cadastro1.php?errocad='ok'");
    }
}
function cadastrarUsuarioCnpj()
{
    // var_dump($_POST);
    $user = new Usuario();
    $user->setNome($_POST['nome_usuario']);
    $user->setTelefone($_POST['telefone']);
    $user->setCNPJ($_POST['CNPJ']);
    $user->setEndereco($_POST['endereco']);
    $user->setBanco($_POST['contabancaria']);
    $user->setEmail($_POST['email']);
    $user->setLogin($_POST['email']);
    $user->setSenha($_POST['senha']);
    $user->setNivel_Acesso(2);
    $resultado = $user->incluir();





    if ($resultado >= 1) {
        header("Location: ../cadastro1.php?sucesso='ok'");
    } else {
        // echo "<script>alert('Erro ao registrar usuário!');history.back()</script>";
        header("Location: ../cadastro1.php?errocad='ok'");
    }
}
?>