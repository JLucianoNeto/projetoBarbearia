<?php
class Cliente
{

    private $id;
    private $nome;
    private $cpf;
    private $dt_nasc;
    private $whatsapp;
    private $logradouro;
    private $num;
    private $bairro;




    public function __construct()
    {
        //$this->id = $id;
        //$this->nome = $nome;
        //$this->dt_nasc = $dt_nasc;
    }

    /// SETTERS
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setDt_nasc($dt_nasc)
    {
        $this->dt_nasc = $dt_nasc;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    public function setWhatsapp($whatsapp)
    {
        $this->whatsapp = $whatsapp;
    }
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }

    public function setNum($num)
    {
        $this->num = $num;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }


    /// GETTERS

    public function getId()
    {
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getDt_nasc()
    {
        return $this->dt_nasc;
    }

    /**
     * Get the value of bairro
     */ 
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Get the value of cpf
     */ 
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Get the value of num
     */ 
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Get the value of logradouro
     */ 
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * Get the value of whatsapp
     */ 
    public function getWhatsapp()
    {
        return $this->whatsapp;
    }
}