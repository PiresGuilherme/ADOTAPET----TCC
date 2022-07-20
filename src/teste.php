<?php
session_start();
require_once("init.php");
?>
<!-- <!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>listar</title>
    <meta charset="utf-8">
</head>

<body>
    <?php
    // $query_pet = "SELECT * FROM pet ORDER BY id_pet DESC";
    // $result_pet = $conn->prepare($query_pet);
    // $result_pet->execute();

    // while($row_pet = $result_pet ->fetch(PDO::FETCH_ASSOC)){
    //     var_dump($row_pet);
    //     extract(($row_pet));
    //     echo"ID: " .$row_pet['id_pet']. "<br>";
    //     echo "ID: $id_pet <br>";

    //     echo"nome_pet: " .$row_pet['nome_pet']. "<br>";
    //     echo "nome do Pet: $nome_pet <br>";

    //     echo"foto: " .$row_pet['foto']. "<br>";
    //     // echo "<img src='imagens/$id_pet/profile' width='200px'>";
    //     // echo "<img src='imagens/$id_pet/$foto' width='200px'>";


    //     if((!empty($foto)) and (file_exists("imagens/$id_pet"))){
    //         echo"<img src='imagens/$id_pet/profile1' width='150'><br><br>";

    //     }   else{
    //         echo "<img src='imagens/falha.png' width='150'>";
    //     }
    //     echo "<a href= 'contact.php?id=$id_pet'>Visualizar</a><br>";

    //     echo "<hr>";
    // }
    ?>
 -->

<?php 
$query_pet = "SELECT * FROM pet ORDER BY id_pet DESC";
$result_pet = $conn->prepare($query_pet);
$result_pet->execute();

while($row_pet = $result_pet ->fetch(PDO::FETCH_ASSOC)){
    extract($row_pet)
;
$_GET =$row_pet;
$nome_pet = addslashes($_GET['nome_pet']);
$idade = addslashes($_GET['idade']);
$especie = addslashes($_GET['especie']);

var_dump($_GET);
if(!is_null($nome_pet) && !is_null($idade) && !is_null($especie)){
    echo "Todos os campos estão enviando valor";
}else{
    echo "Algum campo nao esta correto";
}

$sql = $conn->prepare("SELECT nome_pet, idade, especie FROM pet WHERE nome_pet = :nome AND idade = :idade AND especie = :especie");

$sql->bindParam(':nome_pet', $nome_pet, PDO::PARAM_STR);
$sql->bindParam(':idade', $nome, PDO::PARAM_INT);
$sql->bindParam(':especie', $especie, PDO::PARAM_STR);
$sql->execute();
$linha = $sql->fetch(PDO::FETCH_ASSOC);

print_r($linha);
};
?>


</body>