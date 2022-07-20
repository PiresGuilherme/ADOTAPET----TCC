<?php
require_once("banco.php");

class Pet extends Banco
{
    private $nome_pet;
    private $especie;
    private $raca;
    private $cor;
    private $tamanho;
    private $peso;
    private $saude;
    private $historia;
    private $foto;

    //Setters
    public function setNome_pet($string)
    {
        $this->nome_pet = $string;
    }

    public function setEspecie($string)
    {
        $this->especie = $string;
    }

    public function setRaca($string)
    {
        $this->raca = $string;
    }

    public function setCor($string)
    {
        $this->cor = $string;
    }

    public function setTamanho($string)
    {
        $this->tamanho = $string;
    }

    public function setPeso($double)
    {
        $this->peso = $double;
    }

    public function setSaude($string)
    {
        $this->saude = $string;
    }

    public function setHistoria($string)
    {
        $this->historia = $string;
    }

    public function setFoto($string)
    {
        $this->foto = $string;
    }

    //Getters
    public function getNome_pet()
    {
        return $this->nome_pet;
    }

    public function getEspecie()
    {
        return $this->especie;
    }
    public function getRaca()
    {
        return $this->raca;
    }

    public function getCor()
    {
        return $this->cor;
    }

    public function getTamanho()
    {
        return $this->tamanho;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function getSaude()
    {
        return $this->saude;
    }

    public function getHistoria()
    {
        return $this->saude;
    }

    public function getFoto()
    {
        return $this->foto;
    }

     

    //função
    public function cadastrar()
    {
        return $this->setPet(
            $this->getNome_pet(),
            $this->getEspecie(),
            $this->getRaca(),
            $this->getCor(),
            $this->getTamanho(),
            $this->getPeso(),
            $this->getSaude(),
            $this->getHistoria(),
            $this->getFoto(),
        );
    }

    public function getPet()
    {
        return $this->buscar(
            $this->getNome_pet(),
            $this->getEspecie(),
            $this->getRaca(),
            $this->getCor(),
            $this->getTamanho(),
            $this->getpeso(),
            $this->getsaude(),
            $this->gethistoria(),
            $this->getfoto()
        );
    }
}
// var_dump($_POST);
// echo 'cheguei'

?>
