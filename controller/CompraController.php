<?php
$upOne = dirname(__DIR__, 1);
require_once $upOne . '\model\Compra.php';
require_once $upOne . '\model\DAO\CompraDAO.php';


class CompraController
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
    private $compra;
    private $compra_dao;


    public function __construct(
        $id = null,
        $cliente_id = null,
        $produto_id = null,
        $data = null,
        $horario = null,
        $qtd = null
    ) {
        $this->compra = new Compra();
        $this->compra->setId($id);
        $this->compra->setCliente_id($cliente_id);
        $this->compra->setProduto_id($produto_id);
        $this->compra->setData($data);
        $this->compra->setHorario($horario);
        $this->compra->setQtd($qtd);

        $this->compra_dao = new CompraDAO();
    }
    public function index()
    {
        session_start();
        $result = $this->compra_dao->listar_tudo();
        $_SESSION['compras'] = $result;
        header("location:view\compra\mostrar_tudo.php");
    }
    public function create()
    {
        $cliente_id = $_POST['cliente_id'];
        $produto_id = $_POST['produto_id'];
        $data = $_POST['data'];
        $horario = $_POST['horario'];
        $qtd = $_POST['qtd'];

        $this->compra->setCliente_id($cliente_id);
        $this->compra->setProduto_id($produto_id);
        $this->compra->setData($data);
        $this->compra->setHorario($horario);
        $this->compra->setQtd($qtd);

        $this->compra_dao->inserir($this->compra);
        header('location:view\home\homepage.php');
    }
    public function store() {}
    public function show($id)
    {
        session_start();
        $result = $this->compra_dao->buscar($id);
        $_SESSION['resultado_consulta'] = $result;
        header('location:view\compra\mostrar_registro.php');
    }

    public function edit($id)
    {
        session_start();
        $result = $this->compra_dao->buscar($id);
        $_SESSION['resultado_consulta'] = $result;

        header('location:view\compra\editar.php');
    }
    public function update($id)
    {

        $compra_editado = $_SESSION['fluxo_editar'];
        $this->compra->setId($id);
        $this->compra->setCliente_id($compra_editado['cliente_id']);
        $this->compra->setProduto_id($compra_editado['produto_id']);
        $this->compra->setData($compra_editado['data']);
        $this->compra->setHorario($compra_editado['horario']);
        $this->compra->setQtd($compra_editado['qtd']);

        $this->compra_dao->alterar($this->compra);

        header('location:index.php?classe=Compra&metodo=index');
    }
    public function delete($id)
    {

        $this->compra->setId($id);
        $this->compra_dao->excluir($this->compra);





        header('location:index.php?classe=Compra&metodo=index');
    }
}
