<?php

class Agendamento
{

    private $id;
    private $cliente_id;
    private $servico_id;
    private $data;
    private $horario;
    private $duracao;
    private $status;



    public function __construct() {}




    /**
     * Set the value of servico_id
     *
     * @return  self
     */
    public function setServico_id($servico_id)
    {
        $this->servico_id = $servico_id;

        return $this;
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
     * Set the value of duracao
     *
     * @return  self
     */
    public function setDuracao($duracao)
    {
        $this->duracao = $duracao;

        return $this;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

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
     * Get the value of servico_id
     */
    public function getServico_id()
    {
        return $this->servico_id;
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
     * Get the value of duracao
     */
    public function getDuracao()
    {
        return $this->duracao;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
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
}
