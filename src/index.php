<?php
include "header.php";



ob_start();
require_once("init.php");
// 
?>

<!-- <div>
<div class="filtros">
    teste
    </div>   -->
<?php

if (isset($_POST['especie'])) {
    if (isset($_POST['sexo'])) {
        extract($_POST);
        $query_pub = "SELECT * 
        FROM publicacao pub
        INNER JOIN pet AS pt ON pt.id_pet = pub.id_pet
        WHERE estado='pendente' 
        AND especie= '$especie'
        AND sexo_pet= '$sexo'
        ORDER BY id_publicacao DESC";
        $result_pub = $conn->prepare($query_pub);
        $result_pub->execute();
        // var_dump($query_pub);
        ;
      } else {
    extract($_POST);
    $query_pub = "SELECT * 
    FROM publicacao pub
    INNER JOIN pet AS pt ON pt.id_pet = pub.id_pet
    WHERE estado='pendente' 
    AND especie= '$especie'

    ORDER BY id_publicacao DESC";
    $result_pub = $conn->prepare($query_pub);
    $result_pub->execute();
    // var_dump($query_pub);
    ;
  }
} else {
$query_pub = "SELECT * 
FROM publicacao pub
WHERE estado='pendente' 
ORDER BY id_publicacao DESC";
$result_pub = $conn->prepare($query_pub);
$result_pub->execute();
// var_dump($query_pub);
  }

while ($row_pub = $result_pub->fetch(PDO::FETCH_ASSOC)) {
    extract($row_pub);
    // var_dump($row_pub);
    include "dash.php";
    // }
};
?>

<div class="filtros">
    <form method="POST" action="http://localhost/ADOTAPET/" enctype="form-data" id="filtro">
        <div class="">
            <p>
            <h2>Filtros</h2>
            <p>
            <div class="bot-radio especie">
                <p>
                <h4>Especie: </h4>
                </p>
                <input type="radio" name="especie" value="cachorro"> Cachorro </input>
                <input type="radio" name="especie" value="gato">Gato </input>
                <input type="radio" name="especie" value="Femea">Outro </input>
            </div>
            <div class="bot-radio idade">
                <p>
                <h4>Idade: </h4>
                </p>
                <input type="radio" name="idade" value="Macho"> menos de 5 </input>
                <input type="radio" name="idade" value="Femea">mais de 5</input>
            </div>
            <div class="bot-radio tamanho">
                <p>
                <h4>Tamanho: </h4>
                </p>
                <input type="radio" name="tamanho" value="Macho"> Pequeno</input>
                <input type="radio" name="tamanho" value="Femea">Médio </input>
                <input type="radio" name="tamanho" value="Femea">Grande </input>
            </div>

            <div class="bot-radio sexo">
                <p>
                <h4> Sexo do Pet:</h4>
                </p>
                <input type="radio" name="sexo" value="Macho"> Macho</input>
                <input type="radio" name="sexo" value="Femea">Fêmea</input>
            </div>
            <br>
        </div>
        <input name="buscar" type="submit" id="buscar" class="btn btn-outline-primary d-flex align-items-center" value="Buscar">
    </form>
</div>
<?php
// $query_pet = "SELECT * FROM pet ORDER BY id_pet DESC";
// $result_pet = $conn->prepare($query_pet);
// $result_pet->execute();



// while ($row_pet = $result_pet->fetch(PDO::FETCH_ASSOC)) {
//     extract(($row_pet));
//     include "dash.php";
//     if ((!empty($foto)) and (file_exists("imagens/$id_pet"))) {


//     }
// }
?>
<!-- </div>   -->


<!-- <script type="text/javascript" src="ajaxFEED.js"></script> -->
<!-- You can easily copy and paste your own map point from Google Maps -> Share -> Embed a map -->
<?php
include "footer.php"
?>

<script>
    setTimeout(function() {
        $('.loader').fadeToggle();
    }, 1500);

    $("a[href='#top']").click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, "slow");
        return false;
    });
</script>

<!-- <script> -->
<!-- // $("#like").click(function(){
        

    // }) -->

<!-- </script> -->
<script>
    $(document).ready(function() {
        $("#active_index").addClass("active");
        $("#active_login").removeClass('active');
        $("#active_trending").removeClass("active");
        $("#active_explore").removeClass("active");
        $("#active_contact").removeClass("active")
    });
</script>



</html>