<?php
include "header.php";
require_once("init.php");
// session_start();


 $email = $_COOKIE['email']; 
 $query_user = "SELECT * FROM usuario WHERE email = '$email'";
 $result_user = $conn->prepare($query_user);
 $result_user->execute();
 $column_user = $result_user -> fetch(PDO::FETCH_ASSOC);
 extract($column_user);
 var_dump($column_user);
if($nivel_acesso=1){

} 
if ($nivel_acesso=2){
    header("location:../index.php?id_usuario=".$id_usuario);
    
};
// include_once('../ADOTAPET/controller/ControllerBuscaPet.php');
?>
