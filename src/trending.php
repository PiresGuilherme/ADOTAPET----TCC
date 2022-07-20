<?php
include "header.php";
require_once("init.php");
// session_start();
// $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
//     if (!empty($id)) {
// $query_pet = "SELECT * FROM pet WHERE id_pet = $id LIMIT 1";

 $email = $_COOKIE['email']; 
 $query_user = "SELECT * FROM usuario WHERE email = '$email'";
 $result_user = $conn->prepare($query_user);
 $result_user->execute();
 $column_user = $result_user -> fetch(PDO::FETCH_ASSOC);
 extract($column_user);
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
                        <h2><em><br></em> PÁGINA EM DESENVOLVIMENTO </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

  <
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
            $("#active_login").removeClass('active');
            $("#active_index").removeClass("active");
            $("#active_trending").addClass("active");
            $("#active_explore").removeClass("active");
            $("active_contact").removeClass("active");
        });

        $(document.title).ready(function() {
            document.title = 'AdotaPet | Lembranças'
        })
    </script>
</body>

</html>