<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdotaPet</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" type="imagem/png" href="assets\images\logoicon.png">

  <link rel="stylesheet" href="assets/css/login.css">
  <link rel="stylesheet" href="assets/css/nav.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">

  <header class="nav-all" id="#top">

    <nav class="main-navigation navbar navbar-expand-lg navbar-light">
      <div class="container-nav">
        <a class="navbar-brand" href="index.php"><img src="assets/images/testelogo8_transparent.png" alt=""></a>
        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <ul class="nav-item">
              <a class="nav-link" id="active_index" href="index.php">Feed</a>
            </ul>
            <ul class="nav-item">
              <a class="nav-link" id="active_explore" href="explore.php">Lembranças</a>
            </ul>

            <ul class="nav-item">
              <a class="nav-link" id="active_trending" href="trending.php">Loja</a>
            </ul>
            <ul class="nav-item">
              <a class="nav-link" id="active_contact" href="doacao.php">Doação</a>
            </ul>
            <ul class="nav-item">
              <?php
              if (isset($_COOKIE['email'])) {
                echo  '<a class="nav-link" id="active_login" href="perfil.php">Perfil</a>';
              } else {
                echo '<a class="nav-link" id="active_login" href="Login.php">Login</a>';
              }
              ?>
            </ul>
          </ul>
        </div>
      </div>
    </nav>


  </header>