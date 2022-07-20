<?php
session_start();
ob_start();
require_once("init.php");
include "header.php";
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    $query_pet = "SELECT * FROM pet WHERE id_pet = $id LIMIT 1";
    $result_pet = $conn->prepare($query_pet);
    $result_pet->execute();
    $row_pet = $result_pet->fetch(PDO::FETCH_ASSOC);
    extract($row_pet);
    $idU = $id_usuario;
} else {
    $_SESSION['msg'] = "<p> é necessário selecionar um usuário.</p>";
    header(("Location: index.php"));
}
?>

<!-- <link rel="stylesheet" href="assets/css/feed.css"> -->

<div class="page-banner change-name">
    <div class="container">
        <div class=" col-12 row d-flex justify-content-center align-items-center">
            <div class="col-6">
                <div class=" header-text">
                    <h2><em>Publicar pet </em></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container d-flex align-items-center justify-content-center">
    <div class="row">
        <div class="col whites">
            <div class=" d-flex align-items-center justify-content-center widhth:100%">
                <?php
                // if (isset($_SESSION['msg'])) {
                //     echo $_SESSION['msg'];
                //     unset($_SESSION['msg]']);
                // }
                ?>
                <div class="corpo-cad ">

                    <?php echo '<form method="post" action="http://localhost/ADOTAPET/controller/ControllerPublicacao?id=' . $id_pet . ' enctype="multipart/form-data" id="form_cadastro">'
                    ?>
                    <label>Legenda da publicacão</label> <br>
                    <textarea type="text" placeholder="legenda" name="legenda_publicacao" required class="legendado"> </textarea>
                    <br><br>
                    <input name="sendImage" type="submit" id="confirmar" class="btnSubmit btn btn-outline-primary justify-content-center" value="Confirmar Cadastro">
                </div>
            </div>
        </div>
    </div>
</div>


<?php if (isset($_GET['sucesso'])) {
    echo "<script>
         Swal.fire({
             icon: 'success',
             title: 'Cadastro Realizado com Sucesso',
             text: 'Faça login para Acessar o Feed'
           }).then((result) => {
            if (result.isConfirmed) {
                document.location='registraPet.php'
            }
           
          })
          </script>";
} ?>
<?php if (isset($_GET['errocad'])) {
    echo "<script>
         Swal.fire({
            icon: 'error',
            title: 'Algo de errado aconteceu!',
            text: 'Falha ao registrar Usuário!!',
           }).then((result) => {
            if (result.isConfirmed) {
                document.location='registraPet.php'
            }
           
          })
          </script>";
} ?>
<?php
include "footer.php"
?>
<script>
    setTimeout(function() {
        $('.loader').fadeToggle();
    }, 2000);
    $("a[href='#top']").click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, "slow");
        return false;
    });
</script>

<script>
    $(document).ready(function() {
        $('#active_index').removeClass("active");
        $("#active_login").addClass("active");
        $("#active_explore").removeClass("active");
        $("#active_contact").removeClass("active");
    })
</script>

<script>
    $(document.title).ready(function() {
        document.title = 'AdotaPet | Adote'
    })
</script>