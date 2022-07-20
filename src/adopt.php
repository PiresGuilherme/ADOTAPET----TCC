<?php
session_start();
ob_start();
require_once("init.php");
require_once("header.login.inc.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    $query_pet = "SELECT estado FROM publicacao WHERE id_pet = $id";
    $result_pet = $conn->prepare($query_pet);
    // $result_pet->bindParam(':id', $id);:
    $result_pet->execute();
    $adotado = $result_pet->fetch(PDO::FETCH_ASSOC);
} else {
    $_SESSION['msg'] = "<p> é necessário selecionar um pet.</p>";
    // header(("Location: index.php"));
}
?>

    <?php
        $estado = 'adotado';
 
        $result_pub = "UPDATE publicacao SET estado = (:estado) WHERE id_pet = $id";
        

        $insert_msg = $conn->prepare($result_pub);
        $insert_msg->bindparam(':estado', $estado);
        if ($insert_msg->execute()) {
            header('Location: contact.php?id='.$id);
            echo "<script>alert('Erro ao registrar usuário!');history.back()</script>";
    
            // $_SESSION['msg'] = "<p style=color:green;> sucesso ao salvar os dados</p>";
    
        } else {
            $_SESSION['msg'] = "<p style=color:red;> Erro ao salvar os dados</p>";
            // header("Location: ../registraPet.php");
            echo "<script>alert('Erro ao registrar usuário!');history.back()</script>";
            // header("Location: ../registraPet.php?errocad='ok'");.
        }
    
    
    ?>
    