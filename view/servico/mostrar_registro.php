<?php
require_once "./../../model/Servico.php";

session_start();
$resultado = $_SESSION['resultado_consulta'];
$resultado = $resultado[0];
$_SESSION = [];


$labels = [
    'Id',
    'Nome',
    'Valor',
    'Descricao'
];
$metodos = [
    'getId',
    'getNome',
    'getValor',
    'getDescricao'
];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Compra</title>
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

        /* Estilo do contêiner de detalhes */
        .detalhes-compra {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .detalhes-compra div {
            margin-bottom: 15px;
            font-size: 16px;
            color: #333;
        }

        .detalhes-compra div span {
            font-weight: bold;
        }

        /* Estilo de borda para os detalhes */
        .detalhes-compra div:last-child {
            margin-bottom: 0;
        }
    </style>
</head>

<body>

    <div class="detalhes-compra">
        <h1>Detalhes da Compra</h1>

        <?php
        $i = 0;
        foreach ($metodos as $getters) {
            echo '<div>';
            echo "<span>$labels[$i]:</span>";
            $valor = $resultado->$getters();
            echo " $valor";
            echo '</div>';
            $i++;
        }
        ?>
    </div>

</body>

</html>

</html>