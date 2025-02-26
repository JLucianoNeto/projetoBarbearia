<?php

$upOne = dirname(__DIR__, 1);

require_once $upOne . '/model/Servico.php';
require_once $upOne . '/model/DAO/ServicoDAO.php';

class ServicoController
{
    /* 
     metodos principais
        + index()
        + create()
        + store()
        + show($id)
        + edit($id)
        + update($id)
        + delete($id)

    */
    private $servico;
    private $servico_dao;


    public function __construct($id = null, $nome = null, $valor = null, $descricao = null)
    {
        $this->servico = new Servico();

        $this->servico->setId($id);
        $this->servico->setNome($nome);
        $this->servico->setValor($valor);
        $this->servico->setDescricao($descricao);

        $this->servico_dao = new ServicoDAO();
    }
    public function index()
    {
        session_start();
        $result = $this->servico_dao->listar_tudo();
        $_SESSION['servicos'] = $result;
        header("location:view/servico/mostrar_tudo.php");
    }
    public function create()
    {
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $descricao = $_POST['descricao'];

        $this->servico->setNome($nome);
        $this->servico->setValor($valor);
        $this->servico->setDescricao($descricao);

        $this->servico_dao->inserir($this->servico);
        header('location:view/home/homepage.php');
    }
    public function store() {}
    public function show($id)
    {
        session_start();
        $result = $this->servico_dao->buscar($id);
        $_SESSION['resultado_consulta'] = $result;
        header('location:view/servico/mostrar_registro.php');
    }

    public function edit($id)
    {
        session_start();
        $result = $this->servico_dao->buscar($id);
        $_SESSION['resultado_consulta'] = $result;

        header('location:view/servico/editar.php');
    }
    public function update($id)
    {

        $servico_editado = $_SESSION['fluxo_editar'];
        $this->servico->setId($id);
        $this->servico->setNome($servico_editado['nome']);
        $this->servico->setValor($servico_editado['valor']);
        $this->servico->setDescricao($servico_editado['descricao']);

        $this->servico_dao->alterar($this->servico);

        header('location:index.php?classe=Servico&metodo=index');
    }
    public function delete($id)
    {

        $this->servico->setId($id);
        $this->servico_dao->excluir($this->servico);

        header('location:index.php?classe=Servico&metodo=index');
    }
}
