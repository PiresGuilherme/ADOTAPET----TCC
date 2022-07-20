<?php
require_once "header.login.inc.php";
// require_once "../AdotaPet/controller/ControllerLogin.php";
?>


<body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="col-login">
        <div class="row">
            <div class="col-login1">
            <img class="image-login1" src="assets\images\p1res.jpeg">
                <img class="image-login2" src="assets\images\dog.jpeg">
            </div>
            <div class="col-login2">
                <div id="corpo-form" class="login-box-body">
                    <div id="corpo-form" class="login-box-body">
                        <h1>Login</h1>
                        <form method="post" action="http://localhost/ADOTAPET/controller/ControllerLogin">

                            <input type="email" placeholder="Email" name="login" required id="email" onChange="saveCookie()">

                            <input type="password" placeholder="Senha" name="senha" required>

                            <input type="submit" value="Entrar">
                            <div class="a-login">
                                <a href="cadastro1.php" class="text-center"><strong>Cadastre-se para adotar agora mesmo!</strong> </a>
                                <a href="cadastro2.php" class="text-center"><strong>Seja um Doador, Clique aqui!</strong></a>
                            </div class="a-login">
                        </form>

                        <label id="el"><strong>Campos obrigatórios faltando!</strong></label>


                    </div>
                </div>
            </div>
            <div class="col-login3">
            <img class="image-login3" src="assets\images\eu.jpeg">
                <img class="image-login4" src="assets\images\gat2.jpg">
            </div>
        </div>
    </div>



    <script>
        function valida() {
            if (form1.senha.value == "" || form1.login.value == "") {
                document.getElementById('el').style.display = 'block';
                alert('Campos obrigatórios faltando');
                event.returnValue = false;
                return false;
            }

        }

        function saveCookie() {
            let emailValue = document.getElementById("email").value;
            document.cookie = `email=${emailValue}`;
        }

    </script>
</body>

<?php if (isset($_GET['errolog'])) {
    echo "<script>
         Swal.fire({
            icon: 'error',
            title: 'Falha no Login!',
            text: 'Usuário ou Senha Inválidos, Verifique!',
           }).then((result) => {
            if (result.isConfirmed) {
                document.location='login.php'
            }
           
          })
          </script>";
} ?>
})