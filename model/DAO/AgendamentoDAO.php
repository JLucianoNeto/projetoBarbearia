<?php

$upTwo = dirname(__DIR__, 2);


require_once $upTwo . '/core/Database.php';
require_once $upTwo . '/model/Agendamento.php';



class AgendamentoDAO
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::conexao();
    }

    function listarTudo()
    {
        //retornar um objeto que é um array de objetos clientes
        $sql = "SELECT id, cliente_id, servico_id, data, horario, duracao, status FROM agendamentos";
        $dados = $this->pdo->query($sql);
        $result = $dados->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < $dados->rowCount(); $i++) {

            $agendamentos[$i] = new Agendamento();
            $agendamentos[$i]->setId($result[$i]['id']);
            $agendamentos[$i]->setServico_id($result[$i]['servico_id']);
            $agendamentos[$i]->setCliente_id($result[$i]['cliente_id']);
            $agendamentos[$i]->setData($result[$i]['data']);

            $agendamentos[$i]->setHorario($result[$i]['horario']);
            $agendamentos[$i]->setStatus($result[$i]['status']);
        }
        return $agendamentos;
    }
    function inserir(Agendamento $obj_agendamento)
    {
        $cliente_id = $obj_agendamento->getCliente_id(); // ID do cliente que está agendando
        $servico_id = $obj_agendamento->getServico_id(); // ID do serviço
        $data = $obj_agendamento->getData(); // Data do agendamento
        $horario = $obj_agendamento->getHorario(); // Horário do agendamento
        $duracao = $obj_agendamento->getDuracao(); // Duração do agendamento
        $status = $obj_agendamento->getStatus(); // Status do agendamento (ex: "pendente", "confirmado")

        // SQL para inserir um novo agendamento
        $sql = "INSERT INTO agendamentos (cliente_id, servico_id, data, horario, duracao, status)
                VALUES (:cliente_id, :servico_id, :data, :horario, :duracao, :status)";

        // Preparar a query
        $stmt = $this->pdo->prepare($sql);


        $stmt->bindParam(':cliente_id', $cliente_id);
        $stmt->bindParam(':servico_id', $servico_id);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':horario', $horario);
        $stmt->bindParam(':duracao', $duracao);
        $stmt->bindParam(':status', $status);

        $ok = $stmt->execute();
        return $ok;
    }

    function buscar($id)
    {
        $id = (int) $id;
        $sql = "SELECT * FROM agendamentos WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, "Agendamento");
    }
    function alterar(Agendamento $obj_agendamento)
    {
        $id = $obj_agendamento->getId(); // Usando inserir como é um user novo o id não entrar ?
        $cliente_id = $obj_agendamento->getCliente_id();
        $servico_id = $obj_agendamento->getServico_id();
        $data = $obj_agendamento->getData();
        $horario = $obj_agendamento->getHorario();
        $duracao = $obj_agendamento->getDuracao();
        $status = $obj_agendamento->getStatus();

        $sql = "UPDATE agendamentos
        SET cliente_id = :cliente_id,
        servico_id = :servico_id,
        data = :data,
        horario = :horario,
        duracao = :duracao,
        status = :status
        WHERE id = :id;";
        $stmt = $this->pdo->prepare($sql);

        // Bind dos valores nos placeholders
        // Bind dos valores nos placeholders
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':cliente_id', $cliente_id);
        $stmt->bindParam(':servico_id', $servico_id);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':horario', $horario);
        $stmt->bindParam(':duracao', $duracao);
        $stmt->bindParam(':status', $status);

        // Executar a query preparada:
        $ok = $stmt->execute();
        return $ok;
    }
    function excluir(Agendamento $obj_agendamento)
    {
        $id = $obj_agendamento->getId(); // Usando inserir como é um user novo o id não entrar ?

        $sql = "DELETE FROM agendamentos WHERE id = $id;";
        $stmt = $this->pdo->prepare($sql);
        $ok = $stmt->execute();
        return $ok;
    }
}
