<?php
require_once("../model/usuario.php");
session_start();
if(isset($_POST)){
    logarUser();
}
// class Logar {
//     private $usuario;
    
//     public function __construct(){
//         $this->usuario = new Usuario();
//         $this->usuario->setLogin($_POST['login']);
//         var_dump($_POST);

//         $this->usuario->setSenha($_POST['senha']);
//         $this->acessar();
//     }

//     private function acessar(){
//         $resultado=$this->usuario->login();
//         $login=$this->usuario->getLogin();
//         if($resultado){
//             $_SESSION['login']=$login;
//             header("location:../AdotaPet/index.php");
//         } else{
//             session_destroy();
//             echo "<h1>Usuário ou senha incorretos.</h1>";
//         }
//     }
// }
function logarUser(){
    // var_dump($_POST);
    $user = new Usuario();
    $user->setLogin($_POST['login']);
    $user->setSenha($_POST['senha']);
    $resultado=$user->login();
    $login=$user->getLogin();
            if($resultado){
                $_SESSION['login']=$login;
                header("location:../index.php");
            } else{
                session_destroy();
                // echo "<h1>Usuário ou senha incorretos.</h1>";
                header("Location: ../login.php?errolog='ok'");
            }
}
// password_hash($_POST['senha']), PASSWORD_DEFAULT;