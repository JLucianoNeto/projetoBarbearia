<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Resetando margens e padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilo básico do corpo */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        /* Estilo do formulário */
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        label {
            font-size: 16px;
            color: #333;
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #0099cc;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #006699;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <?php
    require_once "./../../model/Cliente.php";

    session_start();
    $resultado = $_SESSION['resultado_consulta'];
    $obj_cliente = $resultado[0];
    $_SESSION = [];

    //conectar ao banco de dados e puxar os 
    $id = $resultado;
    $id_cliente = $obj_cliente->getId();
    $nome = $obj_cliente->getNome();
    $cpf = $obj_cliente->getCpf();
    $dt_nasc = $obj_cliente->getDt_nasc();
    $whatsapp = $obj_cliente->getWhatsapp();
    $logradouro = $obj_cliente->getLogradouro();
    $num = $obj_cliente->getNum();
    $bairro = $obj_cliente->getBairro();


    echo "<form action='../../index.php?" . "id=$id_cliente " . "&classe=Cliente&metodo=update'" . ' method="POST">';

    echo '<label for="Inome">Nome:</label><br>';
    echo '<input name="nome" type="text"' . "value=$nome " . 'id="Icliente"><br><br>';

    echo '<label for="Iserv">Cpf:</label><br>';
    echo '<input name="cpf" type="text"' . "value=$cpf " . 'id="Iserv"><br><br>';

    echo '<label for="Idt">Data de nascimento:</label><br>';
    echo '<input name="dt_nasc" type="date"' . "value=$dt_nasc " . 'id="Idt"><br><br>';

    echo '<label for="Ihorario">Whatsapp:</label><br>';
    echo '<input name="whatsapp" type="texte"' . "value=$whatsapp " . 'id="Ihorario"><br><br>';

    echo '<label for="Iduracao">Logradouro:</label><br>';
    echo '<input name="logradouro" type="text"' . "value=$logradouro " . 'id="Iduracao"><br><br>';

    echo '<label for="Istatus">Numero:</label><br>';
    echo '<input name="num" type="text"' . "value=$num " . 'id="Istatus"><br><br>';

    echo '<label for="Ibairro">Bairro:</label><br>';
    echo '<input name="bairro" type="text"' . "value=$bairro " . 'id="Ibairro"><br><br>';

    ?>
    <input type="hidden" name="metodo" value="update">
    <input type="submit" class="submit-button" value=" Submit">
    </form>
</body>

</html>