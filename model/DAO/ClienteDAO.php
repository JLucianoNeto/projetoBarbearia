<?php
$upTwo = dirname(__DIR__, 2);


require_once $upTwo . '\core\Database.php';
require_once $upTwo . '\model\Cliente.php';


class ClienteDAO
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::conexao();
    }

    // Ajustar depois
    public function inserir(Cliente $cliente)
    {
        $id = $cliente->getId(); // Usando inserir como é um user novo o id não entrar ?
        $nome = $cliente->getNome();
        $cpf = $cliente->getCpf();
        $dt_nasc = $cliente->getDt_nasc();
        $whatsapp = $cliente->getWhatsapp();
        $logradouro = $cliente->getLogradouro();
        $num = $cliente->getNum();
        $bairro = $cliente->getBairro();



        $sql = "INSERT INTO clientes (nome,cpf, dt_nasc,whatsapp,logradouro,num,bairro)
            VALUES (:nome,:cpf, :dt_nasc,:whatsapp,:logradouro,:num,:bairro)";
        $stmt = $this->pdo->prepare($sql);

        // Bind dos valores nos placeholders
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':dt_nasc', $dt_nasc);
        $stmt->bindParam(':whatsapp', $whatsapp);
        $stmt->bindParam(':logradouro', $logradouro);
        $stmt->bindParam(':num', $num);
        $stmt->bindParam(':bairro', $bairro);

        // Executar a query preparada:
        $ok = $stmt->execute();
        return $ok;
    }

    public function listar_tudo() // invocar dentro do controler
    {
        $clientes = [];
        //retornar um objeto que é um array de objetos clientes
        $sql = "SELECT * FROM clientes";
        $dados = $this->pdo->query($sql);
        $result = $dados->fetchAll(PDO::FETCH_ASSOC);

        for ($i = 0; $i < $dados->rowCount(); $i++) {

            $clientes[$i] = new Cliente();
            $clientes[$i]->setId($result[$i]['id']);
            $clientes[$i]->setNome($result[$i]['nome']);
            $clientes[$i]->setCpf($result[$i]['cpf']);

            $clientes[$i]->setDt_nasc($result[$i]['dt_nasc']);
            $clientes[$i]->setWhatsapp($result[$i]['whatsapp']);
            $clientes[$i]->setLogradouro($result[$i]['logradouro']);
            $clientes[$i]->setNum($result[$i]['num']);
            $clientes[$i]->setBairro($result[$i]['bairro']);
        }
        return $clientes;
    }

    public function buscar($id)
    {
        $id = (int) $id;
        $sql = "SELECT * FROM clientes WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, "Cliente");
    }

    public function alterar(Cliente $cliente)
    {
        $id = $cliente->getId(); // Usando inserir como é um user novo o id não entrar ?
        $nome = $cliente->getNome();
        $cpf = $cliente->getCpf();
        $dt_nasc = $cliente->getDt_nasc();
        $whatsapp = $cliente->getWhatsapp();
        $logradouro = $cliente->getLogradouro();
        $num = $cliente->getNum();
        $bairro = $cliente->getBairro();



        $sql = "UPDATE clientes
        SET nome = :nome,cpf = :cpf,dt_nasc = :dt_nasc, 
        whatsapp = :whatsapp, logradouro = :logradouro, 
        num = :num, bairro = :bairro 
        WHERE id = :id;";
        $stmt = $this->pdo->prepare($sql);

        // Bind dos valores nos placeholders
        $stmt->bindParam(':id', $id);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':dt_nasc', $dt_nasc);
        $stmt->bindParam(':whatsapp', $whatsapp);
        $stmt->bindParam(':logradouro', $logradouro);
        $stmt->bindParam(':num', $num);
        $stmt->bindParam(':bairro', $bairro);

        // Executar a query preparada:
        $ok = $stmt->execute();
        return $ok;
    }
    public function excluir(Cliente $cliente)
    {

        $id = $cliente->getId(); // Usando inserir como é um user novo o id não entrar ?

        $sql = "DELETE FROM clientes WHERE id = $id;";
        $stmt = $this->pdo->prepare($sql);
        $ok = $stmt->execute();
        return $ok;
    }
}
