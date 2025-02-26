<?php
$upTwo = dirname(__DIR__, 2);


require_once $upTwo . '/core/Database.php';
require_once $upTwo . '/model/Compra.php';

class CompraDAO
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::conexao();
    }


    public function buscar($id)
    {
        $sql = "SELECT * FROM compras WHERE id=$id";
        $dados = $this->pdo->query($sql);
        $result = $dados->fetchAll(PDO::FETCH_CLASS, "Compra");
        return $result;
    }

    public function listar_tudo() // invocar dentro do controler
    {
        $compras = [];
        //retornar um objeto que é um array de objetos clientes
        $sql = "SELECT * 
        FROM compras";
        $dados = $this->pdo->query($sql);
        $result = $dados->fetchAll(PDO::FETCH_ASSOC);

        for ($i = 0; $i < $dados->rowCount(); $i++) {

            $compras[$i] = new Compra();
            $compras[$i]->setId($result[$i]['id']);
            $compras[$i]->setCliente_id($result[$i]['cliente_id']);
            $compras[$i]->setProduto_id($result[$i]['produto_id']);

            $compras[$i]->setData($result[$i]['data']);
            $compras[$i]->setHorario($result[$i]['horario']);
            $compras[$i]->setQtd($result[$i]['qtd']);
        }
        return $compras;
    }
    public function alterar(Compra $compra)
    {
        $id = $compra->getId(); // Usando inserir como é um user novo o id não entrar ?
        $cliente_id = $compra->getCliente_id(); // ID do cliente que está fazendo a compra
        $produto_id = $compra->getProduto_id(); // ID do produto que está sendo comprado
        $data = $compra->getData(); // Data da compra (formato YYYY-MM-DD)
        $horario = $compra->getHorario(); // Horário da compra (formato HH:MM:SS)
        $qtd = $compra->getQtd();

        $sql = "UPDATE compras
        SET cliente_id = :cliente_id, produto_id = :produto_id, data = :data, 
        horario = :horario, qtd = :qtd
        WHERE id = :id;";

        $stmt = $this->pdo->prepare($sql);

        // Bind dos valores nos placeholders
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':cliente_id', $cliente_id);
        $stmt->bindParam(':produto_id', $produto_id);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':horario', $horario);
        $stmt->bindParam(':qtd', $qtd);

        // Executar a query
        $ok = $stmt->execute();
        return $ok;
    }
    public function inserir(Compra $compra)
    {
        $id = $compra->getId();
        $cliente_id = $compra->getCliente_id(); // ID do cliente que está fazendo a compra
        $produto_id = $compra->getProduto_id(); // ID do produto que está sendo comprado
        $data = $compra->getData(); // Data da compra (formato YYYY-MM-DD)
        $horario = $compra->getHorario(); // Horário da compra (formato HH:MM:SS)
        $qtd = $compra->getQtd(); // Quantidade do produto comprada

        // SQL para inserir uma nova compra
        $sql = "INSERT INTO compras (cliente_id, produto_id, data, horario, qtd)
                VALUES (:cliente_id, :produto_id, :data, :horario, :qtd)";

        // Preparar a query
        $stmt = $this->pdo->prepare($sql);

        // Bind dos valores nos placeholders
        $stmt->bindParam(':cliente_id', $cliente_id);
        $stmt->bindParam(':produto_id', $produto_id);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':horario', $horario);
        $stmt->bindParam(':qtd', $qtd);

        // Executar a query e retornar o resultado
        $ok = $stmt->execute();
        return $ok;
    }

    public function excluir(Compra $compra)
    {

        $id = $compra->getId(); // Usando inserir como é um user novo o id não entrar ?

        $sql = "DELETE FROM compras WHERE id = $id;";
        $stmt = $this->pdo->prepare($sql);
        $ok = $stmt->execute();
        return $ok;
    }
}
