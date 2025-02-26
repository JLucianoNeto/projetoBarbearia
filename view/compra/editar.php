<?php

//Puxar o id pelo GET

//conectar ao banco de dados e puxar os 


?>
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
    require_once "./../../model/Compra.php";

    session_start();
    $resultado = $_SESSION['resultado_consulta'];
    $obj_compra = $resultado[0];
    $_SESSION = [];


    $id_compra = $obj_compra->getId();
    $cliente_id = $obj_compra->getCliente_id();
    $produto_id = $obj_compra->getProduto_id();
    $data = $obj_compra->getData();
    $horario = $obj_compra->getHorario();
    $qtd = $obj_compra->getQtd();



    echo "<form action='../../index.php?" . "id=$id_compra " . "&classe=Cliente&metodo=update'" . ' method="POST">';

    echo '<label for="cliente">Id do cliente:</label><br>';
    echo '<input name="cliente_id" type="number"' . "value=$cliente_id " . 'id="Icliente"><br><br>';

    echo '<label for="Iprod">Id do produto:</label><br>';
    echo '<input name="produto_id" type="number"' . "value=$produto_id " . 'id="Iprod"><br><br>';

    echo '<label for="Idt">Data:</label><br>';
    echo '<input name="data" type="date"' . "value=$data " . 'id="Idt"><br><br>';

    echo '<label for="Ihorario">Horario:</label><br>';
    echo '<input name="horario" type="time"' . "value=$horario " . 'id="Ihorario"><br><br>';

    echo '<label for="Iqtd">Quantidade:</label><br>';
    echo '<input name="qtd" type="number"' . "value=$qtd " . 'id="Iqtd"><br><br>';

    ?>
    <input type="hidden" name="metodo" value="update">
    <!-- Não sei se precisa de status -->
    <input type="submit" class="submit-button" value=" Submit">
    </form>
</body>

</html>