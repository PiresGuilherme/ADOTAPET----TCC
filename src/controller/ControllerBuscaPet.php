<?php
session_start();
require_once("../init.php");
    // session_start();
    // $id_pet=2;
    // require_once("../model/banco.php");
    // $busca = new Banco();
    // $listarPet = $busca->getPet();
    // $count = 0;
    // $total = count($listarPet);
    // $count=$total-1;
    // while ($total> 0){
    //     $total--;

    //     if($listarPet[$count]['foto' == NULL]){
    //         $foto="--";

    //     }   else{
    //         $foto="Com referência";
    //     }
    // }
    // $id_pet = $count;
    // echo"<form action='../../registraPet.php' name='form' method='post'>";
    // echo "<input class='ocultar name='editarPet' value='".($id_pet). "'>";

    // echo "</form>"


 

    // $query_pet = "SELECT * FROM pet ORDER BY id_pet DESC";
    // $result_pet = $conn->prepare($query_pet);
    // $result_pet->execute();

    // while ($row_pet = $result_pet->fetch(PDO::FETCH_ASSOC)) {
    //     // var_dump($row_pet);
    //     extract(($row_pet));
    //     if((!empty($foto)) and (file_exists("imagens/$id_pet/"))){
    //     echo "<a target='_blank' href='imagens/$id_pet/profile'>";
    //     echo "<img class='fotos' src='imagens/$id_pet/profile' alt='Cinque Terre' width='600' height='400'>";
    //     echo "</a>";
    //     }
    // }





    $_result_msg_count = "SELECT * from pet ORDER BY id_pet ASC ";

    $_result_msg_count = $conn->prepare($_result_msg_count);
    $_result_msg_count->execute();

    while($row_msg_count = $_result_msg_count->fetch(PDO::FETCH_ASSOC))
        echo "id:".$row_msg_count['id_pet']."<br";
        echo "nome_pet:".$row_msg_count['nome_pet']."<br";
        echo "cor:".$row_msg_count['cor']."<br";
        echo "id:".$row_msg_count['id_pet']."<br";

?>