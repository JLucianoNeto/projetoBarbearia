<?php
$upOne = dirname(__DIR__, 1);

require_once $upOne . '/model/Cliente.php';
require_once $upOne . '/model/DAO/ClienteDAO.php';

class ClienteController
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
    private $cliente;
    private $cliente_dao;


    public function __construct(
        $id = null,
        $nome = null,
        $cpf = null,
        $dt_nasc = null,
        $whatsapp = null,
        $logradouro = null,
        $num = null,
        $bairro = null
    ) {
        $this->cliente = new Cliente();

        $this->cliente->setId($id);
        $this->cliente->setNome($nome);
        $this->cliente->setCpf($cpf);
        $this->cliente->setDt_nasc($dt_nasc);
        $this->cliente->setWhatsapp($whatsapp);
        $this->cliente->setLogradouro($logradouro);
        $this->cliente->setNum($num);
        $this->cliente->setBairro($bairro);

        $this->cliente_dao = new ClienteDAO();
    }
    public function index()
    {
        session_start();
        $result = $this->cliente_dao->listar_tudo();
        $_SESSION['clientes'] = $result;
        header("location:view/cliente/mostrar_tudo.php");
    }
    public function create()
    {

        $this->cliente->setId($_POST['id']);
        $this->cliente->setNome($_POST['nome']);
        $this->cliente->setCpf($_POST['cpf']);
        $this->cliente->setDt_nasc($_POST['dt_nasc']);
        $this->cliente->setWhatsapp($_POST['whatsapp']);
        $this->cliente->setLogradouro($_POST['logradouro']);
        $this->cliente->setNum($_POST['num']);
        $this->cliente->setBairro($_POST['bairro']);

        $this->cliente_dao->inserir($this->cliente);

        header('location:view/home/homepage.php');

        //header('location:view/cliente/novo.php');
    }
    public function store() {}
    public function show($id)
    {
        session_start();
        $result = $this->cliente_dao->buscar($id);
        $_SESSION['resultado_consulta'] = $result;
        header('location:view/cliente/mostrar_registro.php');
    }

    public function edit($id)
    {
        session_start();
        $result = $this->cliente_dao->buscar($id);
        $_SESSION['resultado_consulta'] = $result;

        header('location:view/cliente/editar.php');
    }
    public function update($id)
    {
        $cliente_editado = $_SESSION['fluxo_editar'];
        $this->cliente->setId($id);
        $this->cliente->setNome($cliente_editado['nome']);
        $this->cliente->setCpf($cliente_editado['cpf']);
        $this->cliente->setDt_nasc($cliente_editado['dt_nasc']);
        $this->cliente->setWhatsapp($cliente_editado['whatsapp']);
        $this->cliente->setLogradouro($cliente_editado['logradouro']);
        $this->cliente->setNum($cliente_editado['num']);
        $this->cliente->setBairro($cliente_editado['bairro']);

        $this->cliente_dao->alterar($this->cliente);

        header('location:index.php?classe=Cliente&metodo=index');
    }
    public function delete($id)
    {

        $this->cliente->setId($id);
        $this->cliente_dao->excluir($this->cliente);

        header('location:index.php?classe=Cliente&metodo=index');
    }
}
