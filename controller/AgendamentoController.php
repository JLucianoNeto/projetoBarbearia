<?php
$upOne = dirname(__DIR__, 1);
require_once $upOne . '/model/Agendamento.php';
require_once $upOne . '/model/DAO/AgendamentoDAO.php';



class AgendamentoController
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
    private $agendamento;
    private $agendamento_dao;


    public function __construct($id = null, $cliente_id = null, $servico_id = null, $data = null, $horario = null, $duracao = null, $status = null)
    {
        $this->agendamento = new Agendamento();
        $this->agendamento->setId($id);
        $this->agendamento->setCliente_id($cliente_id);
        $this->agendamento->setServico_id($servico_id);
        $this->agendamento->setData($data);
        $this->agendamento->setHorario($horario);
        $this->agendamento->setDuracao($duracao);
        $this->agendamento->setStatus($status);
        $this->agendamento_dao = new AgendamentoDAO();
    }
    public function index()
    {
        session_start();
        $result = $this->agendamento_dao->listarTudo();
        $_SESSION['agendamentos'] = $result;
        header("location:view/agendamento/mostrar_tudo.php");
    }
    public function create()
    {
        $id_cliente = $_POST['id_cliente'];
        $id_servico = $_POST['id_servico'];
        $data = $_POST['data'];
        $horario = $_POST['horario'];
        $duracao = $_POST['duracao'];
        $status = $_POST['status'];


        $this->agendamento->setCliente_id($id_cliente);
        $this->agendamento->setServico_id($id_servico);
        $this->agendamento->setData($data);
        $this->agendamento->setHorario($horario);
        $this->agendamento->setDuracao($duracao);
        $this->agendamento->setStatus($status);


        $this->agendamento_dao->inserir($this->agendamento);
        header('location:view/home/homepage.php');
    }
    public function store() {}
    public function show($id)
    {

        session_start();
        $result = $this->agendamento_dao->buscar($id);
        $_SESSION['resultado_consulta'] = $result;
        header('location:view/agendamento/mostrar_registro.php');
    }

    public function edit($id)
    {
        session_start();
        $result = $this->agendamento_dao->buscar($id);
        $_SESSION['resultado_consulta'] = $result;

        header('location:view/agendamento/editar.php');
    }
    public function update($id)
    {
        //session_start();
        $agendamento_editado = $_SESSION['fluxo_editar'];
        $this->agendamento->setId($id);
        $this->agendamento->setCliente_id($agendamento_editado['id_cliente']);
        $this->agendamento->setServico_id($agendamento_editado['id_servico']);
        $this->agendamento->setData($agendamento_editado['data']);
        $this->agendamento->setHorario($agendamento_editado['horario']);
        $this->agendamento->setduracao($agendamento_editado['duracao']);
        $this->agendamento->setStatus($agendamento_editado['status']);

        $this->agendamento_dao->alterar($this->agendamento);

        header('location:index.php?classe=Agendamento&metodo=index');
    }
    public function delete($id)
    {
        $this->agendamento->setId($id);
        $this->agendamento_dao->excluir($this->agendamento);





        header('location:index.php?classe=Agendamento&metodo=index');
    }
}
