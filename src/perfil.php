<?php
include "header.php";
require_once("init.php");
// session_start();
// $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
//     if (!empty($id)) {
// $query_pet = "SELECT * FROM pet WHERE id_pet = $id LIMIT 1";
if(isset($_COOKIE['email'])){
$email = $_COOKIE['email'];
$query_user = "SELECT * FROM usuario WHERE email = '$email'";
$result_user = $conn->prepare($query_user);
$result_user->execute();
$column_user = $result_user->fetch(PDO::FETCH_ASSOC);
extract($column_user);}

//  var_dump($column_user);
// } else {
//     $_SESSION['msg'] = "<p> é necessário selecionar um usuário.</p>";
// header(("Location: index.php"));
// }

// include_once('../ADOTAPET/controller/ControllerBuscaPet.php');
?>

<link rel="stylesheet" href="assets/css/feed.css">

<body>

    <div class="loader">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="34px" height="40px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">
            <rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">
                <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.8s" repeatCount="indefinite" />
                <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.8s" repeatCount="indefinite" />
                <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.8s" repeatCount="indefinite" />
            </rect>
            <rect x="8" y="10" width="4" height="10" fill="#333" opacity="0.2">
                <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.8s" repeatCount="indefinite" />
                <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.8s" repeatCount="indefinite" />
                <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.8s" repeatCount="indefinite" />
            </rect>
            <rect x="16" y="10" width="4" height="10" fill="#333" opacity="0.2">
                <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.8s" repeatCount="indefinite" />
                <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.8s" repeatCount="indefinite" />
                <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.8s" repeatCount="indefinite" />
            </rect>
        </svg>
    </div>



    <div class="page-banner change-name">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="header-text">
                        <h2><em><?php echo $nome_usuario ?><br></em> Pets cadastrados </h2>
                        <a class="btn btn-success" id="active_contact" href="registraPet.php">Cadastrar Pet</a>
                        <a class="btn btn-danger" id="active_contact" href="login.php">Sair</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 
                            // if (isset($_COOKIE['email'])) {
                            //     include 'init.php';
                            //     $query_user = 'SELECT nivel_acesso FROM usuario WHERE email = "' . $_COOKIE["email"] . '"';
                            //     $result_user = $conn->prepare($query_user);
                            //     $result_user->execute();
                            //     $column_user = $result_user->fetch(PDO::FETCH_ASSOC);
                            //     // extract($column_user);
                            //     // var_dump($column_user);
                            //     if ($column_user > 1) {
                            //         echo '<a class="nav-link" id="active_contact" href="registraPet.php">Cadastrar Pet</a>';
                            //     } else {
                            //         echo '<a class="nav-link" id="active_contact" href="perfil.php">Contate-nos</a>';
                            //     }
                            // } -->

    <div class="container ">
        <div class="col d-flex">
            <div class="imagens">
                <div class="row">
                    <div class="col justify flex-wrap">
                        <?php

                        $query_pet = "SELECT * FROM pet WHERE id_usuario=$id_usuario ORDER BY id_pet DESC";
                        $result_pet = $conn->prepare($query_pet);
                        $result_pet->execute();

                        while ($row_pet = $result_pet->fetch(PDO::FETCH_ASSOC)) {
                            // var_dump($row_pet);
                            extract(($row_pet));

                            if ((!empty($foto_perfil)) and (file_exists("imagens/$id_pet/"))) {
                                echo '<a target="_blank" href="contact.php?id=' . $id_pet . '">';
                                echo '<img class="foto" src="imagens/' . $id_pet . '/profile1" alt="Cinque Terre" width="600" height="400">';
                                echo "</a>";
                            }
                        }

                        ?>

                        <!-- <a target="_blank" href="assets\images\explore-item-02.jpg">
                            <img class="fotos" src="assets\images\explore-item-02.jpg" alt="Cinque Terre" width="600" height="400">
                        </a>

                    </div>
                     <div class="col justify">
                        <a target="_blank" href="assets\images\explore-item-02.jpg">
                            <img class="fotos" src="assets\images\explore-item-02.jpg" alt="Cinque Terre" width="600" height="400">
                        </a>
                        <a target="_blank" href="assets\images\explore-item-02.jpg">
                            <img class="fotos" src="assets\images\explore-item-02.jpg" alt="Cinque Terre" width="600" height="400">
                        </a>
                        
                        <a target="_blank" href="assets\images\explore-item-02.jpg">
                            <img class="fotos" src="assets\images\explore-item-02.jpg" alt="Cinque Terre" width="600" height="400">
                        </a>
                        <a target="_blank" href="assets\images\explore-item-02.jpg">
                            <img class="fotos" src="assets\images\explore-item-02.jpg" alt="Cinque Terre" width="600" height="400">
                        </a>
                    </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- <section class="explore-item">
        <div class="container expanded">
            <div class="row">
                <div class="col-lg-12">



                    <div class="col-lg-12">
                        <div class="projects-pagination">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="left-pagination">
                                        <img class="float-start" src="assets/images/pagination-left-image.jpg" alt="">
                                        <div class="right-content">
                                            <a href="explore.php">
                                                <h6>Minimalistic Living Room</h6>
                                            </a>
                                            <span>Interior Design</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="right-pagination">
                                        <img class="float-end" src="assets/images/pagination-right-image.jpg" alt="">
                                        <div class="float-end left-content">
                                            <a href="explore.php">
                                                <h6>Futuristic Interior Concept</h6>
                                            </a>
                                            <span>Interior Design</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section> -->

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
    <script>
        $(document).ready(function() {
            $("#active_login").addClass('active');
            $("#active_index").removeClass("active");
            $("#active_explore").removeClass("active");
            $("active_contact").removeClass("active");
        });

        $(document.title).ready(function() {
            document.title = 'AdotaPet | Lembranças'
        })
    </script>
</body>

</html>