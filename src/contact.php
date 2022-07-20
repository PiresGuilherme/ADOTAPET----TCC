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
        $_SESSION['msg'] = "<p> é necessário selecionar um pet.</p>";
        header(("Location: index.php"));
    }
    ?>

    <link rel="stylesheet" href="assets/css/feed.css">
    <!-- <div class="modal" id="modalTeste" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" id="abrirModal" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> -->

    <div class="page-banner perf change-name">
        <div class="container">
            <div class=" col-12 row d-flex justify-content-center align-items-center">
                <img class="image-pet" src="imagens/<?php echo $id_pet ?>/profile0">
                <div class="col-6">
                    <div class=" header-text">
                        <h2><em>Nome: </em><?php echo $nome_pet ?></h2>
                        <?php

                        $email = $_COOKIE['email'];
                        $query_user = "SELECT * FROM usuario WHERE email = '$email'";
                        $result_user = $conn->prepare($query_user);
                        $result_user->execute();
                        $column_user = $result_user->fetch(PDO::FETCH_ASSOC);
                        extract($column_user);
                        if($id_usuario==$idU){
                            echo "<a class='btn btn-primary mr'href='post.php?id=$id_pet'>  Publicar Pet </a>";
                            echo "<a class='btn btn-success mr'href='adopt.php?id=$id_pet'> Pet adotado!</a><br>";
                        }
                         ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col white">
                <div class="informacoes">
                    <table>
                        <tbody>
                            <tr>
                                <td>Raca: </td>
                                <td class="texto"> <?php echo $raca ?></td>
                            </tr>
                            <tr>
                                <td>Cor: </td>
                                <td class="texto"><?php echo $cor ?></td>
                            </tr>
                            <tr>
                                <td>Idade: </td>
                                <td class="texto"><?php echo $idade ?></td>
                            </tr>
                            <tr>
                                <td>Peso: </td>
                                <td class="texto"><?php echo $peso ?></td>
                            </tr>
                            <tr>
                                <td>Sexo: </td>
                                <td class="texto"><?php echo $sexo_pet ?></td>
                            </tr>
                            <tr>
                                <td>Saude: </td>
                                <td class="texto"><?php echo $saude ?></td>
                            </tr>
                            <tr>
                                <td class="d-flex ">Historia: </td>
                                <td class="texto"><?php echo $historia ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="col justify">
                <div class="imagens">
                    <div class="row">
                        <div class="col justify">
                            <a target="_blank" href="imagens/<?php echo $id_pet ?>/profile1">
                                <img class="foto" src="imagens/<?php echo $id_pet ?>/profile1" alt="Cinque Terre" width="500" height="300">
                            </a>
                            <a target="_blank" href="imagens/<?php echo $id_pet ?>/profile2">
                                <img class="foto" src="imagens/<?php echo $id_pet ?>/profile2" alt="Cinque Terre" width="600" height="400">
                            </a>

                        </div>
                        <div class="col justify">
                            <a target="_blank" href="imagens/<?php echo $id_pet ?>/profile3">
                                <img class="foto" src="imagens/<?php echo $id_pet ?>/profile3" alt="Cinque Terre" width="600" height="400">
                            </a>
                            <a target="_blank" href="imagens/<?php echo $id_pet ?>/profile4">
                                <img class="foto" src="imagens/<?php echo $id_pet ?>/profile4" alt="Cinque Terre" width="600" height="400">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $query_usuario = "SELECT email,endereco FROM usuario WHERE id_usuario = $id_usuario";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->execute();
    $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);

    extract($row_usuario);

    ?>

    <section class="contact-us-page">
        <div class="container">
            <div class="col-lg-12">
                <div class="contact-page-form">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <form id="contact" method="POST" action="mail/sendmail.php?id=<?php echo $id_pet ?> ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="section-heading">
                                            <h2>Têm interesse em adotar este PET?<br><em>Mande uma mensagem agora</em>!</h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea name="mensagem" type="text" class="form-control" id="message" placeholder="Escreva uma mensagem para o responsável por este pet" required=""></textarea>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" id="form-submit" class="main-button ">Candidatar-se</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-info">
                                <ul>
                                    <li>
                                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 0 24 24" width="48">
                                                <path d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 2c-4.97 0-9 4.03-9 9 0 4.17 2.84 7.67 6.69 8.69L12 22l2.31-2.31C18.16 18.67 21 15.17 21 11c0-4.97-4.03-9-9-9zm0 2c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.3c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
                                            </svg></div>
                                        <h6>Endereço do abrigo</h6>
                                        <span><?php echo $endereco ?></span>
                                    </li>
                                    <li>
                                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="44" viewBox="0 0 24 24" width="44">
                                                <g>
                                                    <rect fill="none" height="24" width="24" />
                                                    <path d="M20,4H4C2.9,4,2,4.9,2,6v12c0,1.1,0.9,2,2,2h9v-2H4V8l8,5l8-5v5h2V6C22,4.9,21.1,4,20,4z M12,11L4,6h16L12,11z M19,15l4,4 l-4,4v-3h-4v-2h4V15z" />
                                                </g>
                                            </svg></div>
                                        <h6>Email da instituição</h6>
                                        <span><?php echo $email ?></span>
                                    </li>
                                    <!-- <li>
                                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="48" viewBox="0 0 24 24" width="48">
                                                <g>
                                                    <rect fill="none" height="24" width="24"></rect>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path class="icon" d="M21,12.22C21,6.73,16.74,3,12,3c-4.69,0-9,3.65-9,9.28C2.4,12.62,2,13.26,2,14v2c0,1.1,0.9,2,2,2h1v-6.1 c0-3.87,3.13-7,7-7s7,3.13,7,7V19h-8v2h8c1.1,0,2-0.9,2-2v-1.22c0.59-0.31,1-0.92,1-1.64v-2.3C22,13.14,21.59,12.53,21,12.22z"></path>
                                                        <circle class="icon" cx="9" cy="13" r="1"></circle>
                                                        <circle class="icon" cx="15" cy="13" r="1"></circle>
                                                        <path class="icon" d="M18,11.03C17.52,8.18,15.04,6,12.05,6c-3.03,0-6.29,2.51-6.03,6.45c2.47-1.01,4.33-3.21,4.86-5.89 C12.19,9.19,14.88,11,18,11.03z"></path>
                                                    </g>
                                                </g>
                                            </svg></div>
                                        <h6>Chat With Us</h6>
                                        <span>chat@company.com</span>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
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
        $("#btn-mensagem").click(function() {
            $("#modal-mensagem").modal();
        });
    </script>
    <script>
        $('#abrirModal').on('click', function() {
            $('#modalTeste').show;
        })
        $(document).ready(function() {
            $("#active_login").addClass('active');
            $("#active_index").removeClass("active");
            $("#active_explore").removeClass("active");
            $("active_contact").removeClass("active");
        });
    </script>

    <script>
        $(document.title).ready(function() {
            document.title = 'AdotaPet | Adote'
        })
    </script>


    </html>