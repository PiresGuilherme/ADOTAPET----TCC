<?php require_once("header.login.inc.php");
?>

<body>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <div class="col-cad1">
    <div class="row">
      <div class="col-cad1A">
      <img class="image-cad1A" src="assets\images\gato.jpeg">
                <img class="image-cad1B" src="assets\images\dois.jpeg">
      </div>
      <div class="col-cad1B">
      <div id="corpo-form" class="login-box-body">
          <div class="h1-cad1">
            <h1>Cadastre-se</h1>
          </div class="h1-cad1">

          <form method="post" action="http://localhost/ADOTAPET/controller/ControllerRegistraUsuario" id="form_cadastro">

            <input type="text" placeholder="Nome Completo" name="nome_usuario" required>
            <input type="text" placeholder="Telefone" name="telefone" required>
            <input type="text" placeholder="CPF" name="CPF" required>
            <input type="date" class="data" placeholder="Data de Nascimento" name="nascimento" required>
            <input type="text" placeholder="Endereço" name="endereco" required>

            <div class="bot-radio">
              <p>Sexo:</p>
              <input type="radio" name="sexo" value="Masc"> Masculino</input>
              <input type="radio" name="sexo" value="Fem">Feminino</input>
              <input type="radio" name="sexo" value="Outro">Outro</input>
            </div class="bot-radio">

            <input type="email" placeholder="Email" name="email" required>

            <input type="password" id="campo_senha" placeholder="Senha" name="senha" required>
            <input type="password" id="campo_senha_confirmar" placeholder="Confirmar Senha" name="confirmarsenha" required>


            <input type="submit" id="confirmar" class="btnSubmit" value="Confirmar Cadastro">
            <a href="login.php" class="text-center"><strong>Já possui uma conta? Entre agora mesmo!</strong></a>
            <a href="cadastro2.php" class="text-center"><strong>Deseja ser um doador? Clique aqui!</strong></a>
        </div>
        </form>
      </div>
      <div class="col-cad1C">
      <img class="image-cad1C" src="assets\images\rute.jpeg">
      <img class="image-cad1D" src="assets\images\gat.jpeg">
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
                document.location='login.php'
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
                document.location='login.php'
            }
           
          })
          </script>";
  } ?>
  <script>
    $(document).ready(function() {
      $("#confirmar").click(function(e) {
        //para o evento de submit
        e.preventDefault();
        //.text()
        // .attr("valor")
        let senha_confirma = $("#campo_senha_confirmar").val();
        let senha = $("#campo_senha").val();

        if (senha_confirma == senha) {
          console.log("iguais");
          //aciona o evento de submit (envia o formulario)
          $("#form_cadastro").submit();
        } else {
          Swal.fire('Senhas não Conferem!')
        }
      })
    });
  </script>
</body>

<?php

function validaCPF($CPF)
{

  $CPF = preg_replace('/[^0-9]/is', '', $CPF);

  if (strlen($CPF) != 11) {
    return false;
  }

  if (preg_match('/(\d)\1{10}/', $CPF)) {
    return false;
  }

  for ($t = 9; $t < 11; $t++) {
    for ($d = 0, $c = 0; $c < $t; $c++) {
      $d += $CPF[$c] * (($t + 1) - $c);
    }
    $d = ((10 * $d) % 11) % 10;
    if ($CPF[$c] != $d) {
      return false;
    }
  }
  return true;
}

?>