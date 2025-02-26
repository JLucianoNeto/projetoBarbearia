<?php
$upOne = dirname(__DIR__, 1);


require_once $upOne . '/model/Produto.php';
require_once $upOne . '/model/DAO/ProdutoDAO.php';


class ProdutoController
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
    private $produto;
    private $produto_dao;


    public function __construct($id = null, $nome = null, $valor = null, $marca = null, $categoria = null)
    {
        $this->produto = new Produto();
        $this->produto->setId($id);
        $this->produto->setNome($nome);
        $this->produto->setValor($valor);
        $this->produto->setMarca($marca);
        $this->produto->setCategoria($categoria);

        $this->produto_dao = new ProdutoDAO();
    }
    public function index()
    {
        session_start();
        $result = $this->produto_dao->listar_tudo();
        $_SESSION['produtos'] = $result;
        header("location:view/produto/mostrar_tudo.php");
    }
    public function create()
    {
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $marca = $_POST['marca'];
        $categoria = $_POST['categoria'];

        $this->produto->setNome($nome);
        $this->produto->setValor($valor);
        $this->produto->setMarca($marca);
        $this->produto->setCategoria($categoria);

        $this->produto_dao->inserir($this->produto);
        header('location:view/home/homepage.php');
    }
    public function store() {}
    public function show($id)
    {
        session_start();
        $result = $this->produto_dao->buscar($id);
        $_SESSION['resultado_consulta'] = $result;
        header('location:view/produto/mostrar_registro.php');
    }

    public function edit($id)
    {
        session_start();
        $result = $this->produto_dao->buscar($id);
        $_SESSION['resultado_consulta'] = $result;

        header('location:view/produto/editar.php');
    }
    public function update($id)
    {
        $produto_editado = $_SESSION['fluxo_editar'];
        $this->produto->setId($id);
        $this->produto->setNome($produto_editado['nome']);
        $this->produto->setValor($produto_editado['valor']);
        $this->produto->setMarca($produto_editado['marca']);
        $this->produto->setCategoria($produto_editado['categoria']);

        $this->produto_dao->alterar($this->produto);

        header('location:index.php?classe=Produto&metodo=index');
    }
    public function delete($id)
    {

        $this->produto->setId($id);
        $this->produto_dao->excluir($this->produto);

        header('location:index.php?classe=Produto&metodo=index');
    }
}
