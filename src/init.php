<?php

//timezone

date_default_timezone_set('America/Sao_Paulo');

// conexão com o banco de dados
 
//define('BD_SERVIDOR','192.168.0.41');
define('BD_SERVIDOR','localhost');
define('BD_USUARIO','root');
define('BD_SENHA','');
define('BD_BANCO','adotapet');
$url_site;

$conn = new PDO('mysql:host=' .BD_SERVIDOR. 
';dbname=' .BD_BANCO. ';', BD_USUARIO, BD_SENHA
);
?>
