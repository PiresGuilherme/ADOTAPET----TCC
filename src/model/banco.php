<?php

use LDAP\Result;

require_once("../init.php");


class Banco
{

    protected $mysqli;

    public function __construct()
    {
        try {
            $this->conexao();
        } catch (Exception $e) {
            echo "Erro:" . $e->getMessage();
        }
    }

    private function conexao()
    {
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);
    }

    public function logar($login, $senha)
    {
        $stmt = $this->mysqli->prepare("SELECT login FROM usuario WHERE login=? and senha=?");
        $stmt->bind_param("ss", $login, $senha);
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->num_rows;
        if ($rows > 0) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }


    public function setUsuario($nome_usuario, $email, $telefone, $nascimento, $nivel_acesso, $CPF, $CNPJ, $endereco, $banco, $login, $senha, $sexo)
    {

        $stmt = $this->mysqli->prepare("INSERT INTO usuario (`nome_usuario`, `email`, `telefone`, `nascimento`, `nivel_acesso`, `CPF`,`CNPJ`,`endereco`,`banco`,`login`,`senha`,`sexo`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        // Em amarelo nome das variáveis do Banco, em branco talvez os metodos? 
        $stmt->bind_param("ssssssssssss", $nome_usuario, $email, $telefone, $nascimento, $nivel_acesso, $CPF, $CNPJ, $endereco, $banco, $login, $senha, $sexo);
        var_dump($stmt);
        if ($stmt->execute() == TRUE) {
            echo $stmt->error;
            var_dump($stmt);
            return true;
        } else {

            var_dump($stmt);
            return false;
        }
    }


    public function filtroEspecie($especie){
        $array=array();
        $especie=$_SESSION['especie'];

        $result_Fespecie="SELECT id_pet, nome_pet, cor, especie, tamanho, historia, saude, raca, peso, foto FROM pet where especie like=?";
        var_dump($result_Fespecie);
    }

    public function getPet()
    {
        $array = array();
        $id_pet =$_SESSION['id_pet'];
        $result = $this->mysqli->query("SELECT * FROM pet where id_pet='" .$id_pet. "'");
        
            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                $array[] = $row;

            }
            return $array;
    }



    public function buscar($nome_pet, $especie, $raca, $cor, $tamanho, $peso, $saude, $historia, $foto)
    {
        $stmt = $this->mysqli->prepare("SELECT nome_pet FROM pet WHERE id_pet=1");
        $stmt->bind_param("sssssdsss", $nome_pet, $especie, $raca, $cor, $tamanho, $peso, $saude, $historia, $foto);
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->num_rows;
        if ($rows > 0) {
            
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
    public function setPet($nome_pet, $especie, $raca, $cor, $tamanho, $peso, $saude, $historia, $foto)
    {

        $stmt = $this->mysqli->prepare("INSERT INTO pet (`nome_pet`, `especie`, `raca`, `cor`, `tamanho`, `peso`,`saude`,`historia`,`foto`) VALUES (?,?,?,?,?,?,?,?,?)");
        // Em amarelo nome das variáveis do Banco, em branco talvez os metodos? 
        $stmt->bind_param("sssssdsss", $nome_pet, $especie, $raca, $cor, $tamanho, $peso, $saude, $historia, $foto);
        var_dump($stmt);

        if ($stmt->execute() == TRUE) {
            echo $stmt->error;
            var_dump($stmt);
            return true;
        } else {
            var_dump($stmt);
            return false;
        }
    }
}
