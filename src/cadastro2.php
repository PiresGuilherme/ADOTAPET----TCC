<?php require_once "header.login.inc.php";
?>

<body>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <div class="col-cad2">
    <div class="row">
      <div class="col-cad2A">
      <img class="image-cad2A" src="assets\images\te.png">
      <img class="image-cad2B" src="assets\images\pet.jpeg">
      </div>
      <div class="col-cad2B">
        <div class="corpo-cad2">
          <div class="h1-cad2">
            <h1>Cadastre-se</h1>
          </div class="h1-cad2">
          <div class="input-cad2">
          <form method="post" action="http://localhost/ADOTAPET/controller/ControllerRegistraUsuario" id="form_cadastro">

            <input type="text" placeholder="Razão Social" name="nome_usuario" required>
            <input type="text" placeholder="Telefone" name="telefone" required>
            <input type="text" placeholder="CNPJ" name="CNPJ" required>
            <input type="text" placeholder="Endereço" name="endereco" required>
            <input type="text" placeholder="Conta Bancária" name="contabancaria">
            <input type="email" placeholder="Email" name="email" required>

            <input type="password" id="campo_senha" placeholder="Senha" name="senha" required>
            <input type="password" id="campo_senha_confirmar" placeholder="Confirmar Senha" name="confirmarsenha" required>

            <input type="submit" id="confirmar" class="btnSubmit" value="Confirmar Cadastro">
            <a href="login.php" class="a-cad2"><strong>Voltar para a tela de login </strong></a>
            <a href="cadastro1.php" class="a-cad2"><strong>Cadastrar-se Como Adotante </strong></a>
            </div>
          </form>
        </div>

      </div>
      <div class="col-cad2C">
      <img class="image-cad2C" src="assets\images\we.jpeg">
                <img class="image-cad2D" src="assets\images\gatt.jpg">
      </div>
    </div>
  </div>

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

<!-- <?php

      $cnpj = preg_replace('/[^0-9]/is', '', $cnpj);
      for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
        $soma += (int)$cnpj[$i] * $j;
        $j = ($j == 2) ? 9 : $j - 1;
      }

      $resto = $soma % 11;

      if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
        return false;

      for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
        $soma += (int)$cnpj[$i] * $j;
        $j = ($j == 2) ? 9 : $j - 1;
      }

      $resto = $soma % 11;

      return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);

      ?> -->