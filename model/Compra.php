<?php 
class Compra{
    private $id;
    private $cliente_id;
    private $produto_id;
    private $data;
    private $horario;
    private $qtd;

    public function __construct() {
        
    }



    /**
     * Set the value of cliente_id
     *
     * @return  self
     */ 
    public function setCliente_id($cliente_id)
    {
        $this->cliente_id = $cliente_id;

        return $this;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the value of produto_id
     *
     * @return  self
     */ 
    public function setProduto_id($produto_id)
    {
        $this->produto_id = $produto_id;

        return $this;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */ 
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Set the value of horario
     *
     * @return  self
     */ 
    public function setHorario($horario)
    {
        $this->horario = $horario;

        return $this;
    }

    /**
     * Set the value of qtd
     *
     * @return  self
     */ 
    public function setQtd($qtd)
    {
        $this->qtd = $qtd;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of cliente_id
     */ 
    public function getCliente_id()
    {
        return $this->cliente_id;
    }

    /**
     * Get the value of produto_id
     */ 
    public function getProduto_id()
    {
        return $this->produto_id;
    }

    /**
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get the value of horario
     */ 
    public function getHorario()
    {
        return $this->horario;
    }

    /**
     * Get the value of qtd
     */ 
    public function getQtd()
    {
        return $this->qtd;
    }
}


?>