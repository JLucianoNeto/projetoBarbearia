<?php
$upTwo = dirname(__DIR__, 2);


require_once $upTwo . '/core/Database.php';
require_once $upTwo . '/model/Produto.php';


class ProdutoDAO
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::conexao();
    }


    public function buscar($id)
    {
        $sql = "SELECT * 
        FROM produtos 
        WHERE id=$id";
        $dados = $this->pdo->query($sql);
        $result = $dados->fetchAll(PDO::FETCH_CLASS, "Produto");

        return $result;
    }
    public function listar_tudo() // invocar dentro do controler
    {
        $produtos = [];
        //retornar um objeto que é um array de objetos clientes
        $sql = "SELECT * 
        FROM produtos";
        $dados = $this->pdo->query($sql);
        $result = $dados->fetchAll(PDO::FETCH_ASSOC);

        for ($i = 0; $i < $dados->rowCount(); $i++) {

            $produtos[$i] = new Produto();
            $produtos[$i]->setId($result[$i]['id']);
            $produtos[$i]->setNome($result[$i]['nome']);
            $produtos[$i]->setValor($result[$i]['valor']);

            $produtos[$i]->setMarca($result[$i]['marca']);
            $produtos[$i]->setCategoria($result[$i]['categoria']);
        }
        return $produtos;
    }
    public function alterar(Produto $produto)
    {
        $id = $produto->getId();
        $nome = $produto->getNome(); // ID do cliente que está fazendo a produto
        $valor = $produto->getValor(); // ID do produto que está sendo produtodo
        $marca = $produto->getMarca(); // Data da produto (formato YYYY-MM-DD)
        $categoria = $produto->getCategoria(); // Horário da produto (formato HH:MM:SS)

        $sql = "UPDATE produtos
        SET nome = :nome, valor = :valor, marca = :marca, 
        categoria = :categoria
        WHERE id = :id;";

        $stmt = $this->pdo->prepare($sql);

        // Bind dos valores nos placeholders
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':categoria', $categoria);


        // Executar a query
        $ok = $stmt->execute();
        return $ok;
    }
    public function inserir(Produto $produto)
    {
        $id = $produto->getId();
        $nome = $produto->getNome(); // ID do cliente que está fazendo a produto
        $valor = $produto->getValor(); // ID do produto que está sendo produtodo
        $marca = $produto->getMarca(); // Data da produto (formato YYYY-MM-DD)
        $categoria = $produto->getCategoria(); // Horário da produto (formato HH:MM:SS)

        // SQL para inserir uma nova compra
        $sql = "INSERT INTO produtos (nome, valor, marca, categoria)
                VALUES (:nome, :valor, :marca, :categoria)";

        // Preparar a query
        $stmt = $this->pdo->prepare($sql);

        // Bind dos valores nos placeholders

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':categoria', $categoria);

        // Executar a query e retornar o resultado
        $ok = $stmt->execute();
        return $ok;
    }
    public function excluir(Produto $produto)
    {

        $id = $produto->getId(); // Usando inserir como é um user novo o id não entrar ?

        $sql = "DELETE FROM produtos WHERE id = $id;";
        $stmt = $this->pdo->prepare($sql);
        $ok = $stmt->execute();
        return $ok;
    }
}
