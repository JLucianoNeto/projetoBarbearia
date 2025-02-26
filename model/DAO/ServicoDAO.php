<?php
$upTwo = dirname(__DIR__, 2);


require_once $upTwo . '\core\Database.php';
require_once $upTwo . '\model\Servico.php';

class ServicoDAO
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::conexao();
    }

    public function buscar($id)
    {
        $sql = "SELECT * 
        FROM servicos 
        WHERE id=$id";
        $dados = $this->pdo->query($sql);
        $result = $dados->fetchAll(PDO::FETCH_CLASS, "Servico");

        return $result;
    }

    public function listar_tudo() // invocar dentro do controler
    {
        $servicos = [];
        //retornar um objeto que é um array de objetos clientes
        $sql = "SELECT * 
        FROM servicos";
        $dados = $this->pdo->query($sql);
        $result = $dados->fetchAll(PDO::FETCH_ASSOC);

        for ($i = 0; $i < $dados->rowCount(); $i++) {

            $servicos[$i] = new Servico();
            $servicos[$i]->setId($result[$i]['id']);
            $servicos[$i]->setNome($result[$i]['nome']);
            $servicos[$i]->setValor($result[$i]['valor']);
            $servicos[$i]->setDescricao($result[$i]['descricao']);
        }
        return $servicos;
    }


    public function alterar(Servico $servico)
    {
        $id = $servico->getId();
        $nome = $servico->getNome(); // ID do cliente que está fazendo a servico$servico
        $valor = $servico->getValor(); // ID do servico$servico que está sendo servico$servicodo
        $descricao = $servico->getDescricao(); // Horário da produto (formato HH:MM:SS)

        $sql = "UPDATE servicos
        SET nome = :nome, valor = :valor, 
        descricao = :descricao
        WHERE id = :id;";

        $stmt = $this->pdo->prepare($sql);

        // Bind dos valores nos placeholders
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':descricao', $descricao);


        // Executar a query
        $ok = $stmt->execute();
        return $ok;
    }

    public function inserir(Servico $servico)
    {
        $nome = $servico->getNome(); // ID do cliente que está fazendo a servico$servico
        $valor = $servico->getValor(); // ID do servico$servico que está sendo servico$servicodo

        $descricao = $servico->getDescricao(); // Horário da produto (formato HH:MM:SS)

        // SQL para inserir uma nova compra
        $sql = "INSERT INTO servicos (nome, valor, descricao)
                VALUES (:nome, :valor, :descricao)";

        // Preparar a query
        $stmt = $this->pdo->prepare($sql);

        // Bind dos valores nos placeholders

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':descricao', $descricao);

        // Executar a query e retornar o resultado
        $ok = $stmt->execute();
        return $ok;
    }

    public function excluir(Servico $servico)
    {

        $id = $servico->getId(); // Usando inserir como é um user novo o id não entrar ?

        $sql = "DELETE FROM servicos WHERE id = $id;";
        $stmt = $this->pdo->prepare($sql);
        $ok = $stmt->execute();
        return $ok;
    }
}
