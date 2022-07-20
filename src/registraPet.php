
<?php require_once("header.login.inc.php");
?>
session_start();
<body>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <?php
  if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg]'];
    unset($_SESSION['msg]']);
  }
  ?>

  <div class="col-pet">
    <div class="row">
   
      <div class="col-pet1">
      <div class="h1-pet">
          <h1>Registre seu Pet</h1>
        </div>
       
        <form method="post" action="http://localhost/ADOTAPET/controller/ControllerRegistraPet" enctype="multipart/form-data" id="form_cadastro">

          <input class="campospet" type="text" placeholder="Nome do Pet" name="nome_pet" required>
          <input class="campospet" type="text" placeholder="Espécie" name="especie" required>
          <input class="campospet" type="text" placeholder="Raça" name="raca" required>
          <input class="campospet" type="text" placeholder="Cor" name="cor" required>
          <input class="campospet" type="text" placeholder="Peso" name="peso" required>
          <input class="campospet" type="text" placeholder="Idade" name="idade" required>

          <div class="radio-pet">
            <p>Sexo do Pet:</p>
            <input type="radio" name="sexo" value="Macho">Macho</input>
            <input type="radio" name="sexo" value="Femea">Fêmea</input>
          </div>

          <input class="campospet" type="text" placeholder="Saúde" name="saude" required>
          <input class="campospet" type="text" placeholder="História" name="historia" required>
      </div>
      <div class="col-pet2">
        <input class="campospet2" type="file" placeholder="Foto de perfil" name="foto_perfil" required>
        <input class="campospet2" type="file" placeholder="Foto do feed 1" name="foto1" required>
        <input class="campospet2" type="file" placeholder="Foto do feed 2" name="foto2" required>
        <input class="campospet2" type="file" placeholder="Foto do feed 3" name="foto3" required>
        <input class="campospet2" type="file" placeholder="Foto do feed 4" name="foto4" required>


        <input name="sendImage" type="submit" id="apet" class="apet" value="Confirmar">
        <a class="apet" href="perfil.php" class="text-center"><strong>Veja seus pets Cadastrados!</strong></a>
        <a class="apet"href="index.php" class="text-center"><strong>Voltar para o Feed</strong></a>
      </div>
    </div>
  </div>
  </div>
  </form>









  <?php
  if (isset($_GET['sucesso'])) {
    echo "<script>
         Swal.fire({
             icon: 'success',
             title: 'Pet cadastrado com sucesso',
             text: 'Vá até seu perfil para compartilhar'
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
            text: 'Falha ao cadastrar Pet!!',
           }).then((result) => {
            if (result.isConfirmed) {
                document.location='registraPet.php'
            }
           
          })
          </script>";
  } ?>

  <script>
    $(document.title).ready(function() {
      document.title = 'AdotaPet | Registro do Pet'
    })
  </script>
</body>