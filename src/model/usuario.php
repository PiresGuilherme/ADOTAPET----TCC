<?php
require_once("banco.php");

class Usuario extends Banco{
    private $nome_usuario;
    private $email;
    private $telefone;
    private $nascimento;
    private $nivel_acesso;
    private $CPF;
    private $CNPJ;
    private $endereco;
    private $banco;
    private $login;
    private $senha;
    private $sexo;

    //Metodos Set
    public function setNome($string){
        $this->nome_usuario = $string;
    }
    public function setEmail($string){
        $this->email = $string;
    }
    public function setTelefone($string){
        $this->telefone = $string;
    }
    public function setNascimento($date){
        $this->nascimento = $date;
    }
    public function setNivel_Acesso($string){
        $this->nivel_acesso = $string;
    }
    public function setCPF($string){
        $this->CPF = $string;
    }
    public function setCNPJ($string){
        $this->CNPJ = $string;
    }
    public function setEndereco($string){
        $this->endereco = $string;
    }
    public function setBanco($string){
        $this->banco = $string;
    }
    public function setLogin($string){
        $this->login = $string;
    }     
    public function setSenha($string){
        // $encrypted_password = password_hash($string, PASSWORD_DEFAULT);

        $this->senha = $string;
    }
    public function setSexo($string){
        $this->sexo = $string;
    }
    

    //Metodos Get
    public function getNome(){
        return $this->nome_usuario;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function getNascimento(){
        return $this->nascimento;
    }
    public function getNivel_Acesso(){
        return $this->nivel_acesso;
    }
    public function getCPF(){
        return $this->CPF;
    }
    public function getCNPJ(){
        return $this->CNPJ;
    }
    public function getEndereco(){
        return $this->endereco;
    }
    public function getBanco(){
        return $this->banco;
    }
    public function getLogin(){
        return $this->login;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getSexo(){
        return $this->sexo;
    }

    public function incluir(){
        return $this->setUsuario($this->getNome(),$this->getEmail(),$this->getTelefone(),$this->getNascimento(),$this->getNivel_Acesso(),$this->getCPF(),$this->getCNPJ(),$this->getEndereco(),$this->getBanco(),$this->getLogin(),$this->getSenha(),$this->getSexo());
    }

    public function login(){
        return $this->logar($this->getLogin(),$this->getSenha());
    }
}



?>