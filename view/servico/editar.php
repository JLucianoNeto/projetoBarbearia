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
    require_once ".\..\..\model\Servico.php";

    session_start();
    $resultado = $_SESSION['resultado_consulta'];
    $obj_servico = $resultado[0];
    $_SESSION = [];

    $id_servico = $obj_servico->getId();

    $nome = $obj_servico->getNome();
    $valor = $obj_servico->getValor();
    $descricao = $obj_servico->getDescricao();




    echo "<form action='../../index.php?" . "id=$id_servico " . "&classe=Servico&metodo=update'" . ' method="POST">';

    echo '<label for="Inome">Nome:</label><br>';
    echo '<input name="nome" type="text"' . "value=$nome " . 'id="Inome"><br><br>';

    echo '<label for="Ivalor">Valor:</label><br>';
    echo '<input name="valor" type="number" step="0.01"' . "value=$valor " . 'id="Ivalor"><br><br>';


    echo '<label for="Icat">Descricao:</label><br>';
    echo '<input name="descricao" type="text"' . "value=$descricao " . 'id="Icat"><br><br>';

    ?>
    <input type="hidden" name="metodo" value="update">
    <!-- Não sei se precisa de status -->
    <input type="submit" class="submit-button" value=" Submit">
    </form>
</body>

</html>