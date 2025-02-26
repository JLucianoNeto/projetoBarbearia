<?php


$upTwo = dirname(__DIR__, 2);
$caminoIndex = $upTwo . '\index.php';

require_once $upTwo . '\model\Servico.php';


session_start();
echo '<pre>';
$resultado = $_SESSION['servicos'];
$_SESSION = [];
echo '</pre>';


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

        /* Título principal */
        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 32px;
            color: #333;
        }

        /* Estilo da tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #0099cc;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        /* Estilo dos botões */
        a {
            text-decoration: none;
        }

        .botao {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 14px;
            text-align: center;
            margin-right: 5px;
        }

        .botao-ed {
            background-color: #28a745;
            color: white;
        }

        .botao-ed:hover {
            background-color: #218838;
        }

        .botao-ex {
            background-color: #dc3545;
            color: white;
        }

        .botao-ex:hover {
            background-color: #c82333;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }

            th,
            td {
                padding: 8px;
            }

            .botao {
                font-size: 12px;
                padding: 4px 8px;
            }
        }
    </style>
</head>


<body>
    <table>
        <tr>
            <th>Nome</th>
            <th>Valor</th>
            <th>Descrição</th>

            <th>Editar / Excluir</th>

        </tr>
        <?php
        for ($i = 0; $i < sizeof($resultado); $i++) {
            $caminhoIndex = $upTwo . '\index.php';

            $obj_servico = $resultado[$i];

            $id_servico = $obj_servico->getId();

            $nome = $obj_servico->getNome();
            $valor = $obj_servico->getValor();
            $descricao = $obj_servico->getDescricao();


            $caminhoIndexEditar = "\..\..\index.php" . "?id=$id_servico" .
                "&classe=Servico&metodo=edit";

            $caminhoIndexExcluir = "\..\..\index.php" . "?id=$id_servico" .
                "&classe=Servico&metodo=delete";

            $campo_excluir_editar =
                "<a href='$caminhoIndexEditar'>" .
                "<span class='botao botao-ed'>" . "Editar" . "</span>" .
                "</a >" .

                "<a href='$caminhoIndexExcluir'>" .
                "<span class='botao botao-ex'>" . "Excluir" . "</span>" .
                "</a >";

            echo '<tr>';
            echo  '<td>'  . "$nome" . '</td>';
            echo  '<td>'  . "$valor" . '</td>';
            echo  '<td>'  . "$descricao" . '</td>';
            echo  '<td>' . "$campo_excluir_editar" . '</td>';

            echo '</tr>';
        }

        ?>
    </table>

</body>

</html>