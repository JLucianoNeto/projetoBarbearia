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

        input[type="text"] {
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
    <form action="../../index.php?classe=Agendamento&metodo=create" method="POST">

        <label for="Inome">Id do cliente:</label><br>
        <input name='id_cliente' type="number" id="Inome"><br><br>


        <label for="Icpf">Id do servico:</label><br>
        <input name='id_servico' type="number" id="cpf"><br><br>


        <label for="Idt">Data:</label><br>
        <input name='data' type="date" id="dt"><br><br>

        <label for="Ihor">Horario:</label><br>
        <input name='horario' type="time" id="Ihor"><br><br>


        <label for="Idur">Duração:</label><br>
        <input name='duracao' type="number" id="Idur"><br><br>

        <label for="Istatus">Status:</label><br>
        <input name='status' type="text" id="Istatus"><br><br>

        <input type="submit" class="submit-button" value=" Submit">
    </form>
</body>

</html>