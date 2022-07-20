<?php
session_start();
require_once("init.php");
?>
<?php
include "header.login.inc.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Instituições Cadastradas</title>
    <meta charset="utf-8">
</head>

<body>
    <?php
    $query_usuario = "SELECT nome_usuario, CNPJ, telefone, email, endereco, banco FROM usuario where nivel_acesso=2"; 
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->execute();

    echo'
    <table class="table1">
    <thead class="tb1">
      <tr class="tr1">
        <th scope="col">Instituição</th>
        <th scope="col">CNPJ</th>
        <th scope="col">Telefone</th>  
        <th scope="col">Email</th>
        <th scope="col">Endereço</th>
        <th scope="col">Banco</th>
      </tr>
    </thead>
    </table>';
  
    // echo "Instituição, Banco, Telefone, Email, Endereço <br><br>"; 
    while ($row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC)) {
        // var_dump($row_usuario);
        extract(($row_usuario));
      
        // echo "$nome_usuario <br>";
        // echo "$telefone <br>";
        // echo "$email <br>";
        // echo "$endereco <br>";
        // echo "$banco <br>";
        // echo "<br>";

        echo'    
        <table class="table table-dark">
       <tbody>
         <tr class "tr2">
         
           <td>'.$nome_usuario.'<br></td>
           <td>'.$CNPJ.'<br></td>
           <td>'.$telefone.'<br></td>
           <td>'.$email.'<br></td>
           <td>'.$endereco.'<br></td>
           <td>'.$banco.'<br></td>
         </tr>
       </tbody>
     </table>
        '; 
    }
    ?>

   
</body>
<script>

        $(document).ready(function() {
            $("#active_login").removeClass('active');
            $("#active_index").removeClass("active");
            $("#active_explore").removeClass("active");
            $("active_contact").addClass("active");
        });
    </script>
</html> 

