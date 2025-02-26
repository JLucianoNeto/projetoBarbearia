<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        ul {
            list-style-type: none;
        }

        li {
            margin: 10px 0;
            padding: 8px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        li>a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
            display: block;
            padding: 5px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        li>a:hover {
            background-color: #0099cc;
            color: #fff;
        }

        /* Estilo para sublistas */
        li ul {
            margin-left: 20px;
        }

        /* Estilo para os links dentro das sublistas */
        li ul li {
            background-color: #f9f9f9;
            margin: 5px 0;
            border-left: 3px solid #0099cc;
        }

        li ul li a {
            padding-left: 15px;
        }

        /* Efeito de hover para os links nas sublistas */
        li ul li a:hover {
            background-color: #006699;
            color: #fff;
        }
    </style>
</head>

<body>
    <ul>
        <li> Agendamento
            <ul>
                <li><a href="../../index.php?id=1&classe=Agendamento&metodo=edit">Editar</a></li>
                <li><a href="../../index.php?id=1&classe=Agendamento&metodo=show">Mostrar
                        registro</a>
                </li>
                <li><a href="../../index.php?classe=Agendamento&metodo=index">Mostrar
                        tudo</a></li>
                <li><a href="../agendamento/novo.php">Novo</a></li>

            </ul>
        </li>
        <li> Cliente
            <ul>
                <li><a href="../../index.php?id=1&classe=Cliente&metodo=edit">Editar</a></li>
                <li><a href="../../index.php?id=1&classe=Cliente&metodo=show">Mostrar
                        registro</a>
                </li>
                <li><a href="../../index.php?classe=Cliente&metodo=index">Mostrar tudo</a></li>
                <li><a href="../cliente/novo.php">Novo</a></li>

            </ul>
        </li>
        <li> Compra
            <ul>
                <li><a href="../../index.php?id=1&classe=Compra&metodo=edit">Editar</a></li>
                <li><a href="../../index.php?id=1&classe=Compra&metodo=show">Mostrar
                        registro</a></li>
                <li><a href="../../index.php?classe=Compra&metodo=index">Mostrar tudo</a></li>
                <li><a href="../compra/novo.php">Novo</a></li>

            </ul>
        </li>

        <li> Produto
            <ul>
                <li><a href="../../index.php?id=2&classe=Produto&metodo=edit">Editar</a></li>
                <li><a href="../../index.php?id=2&classe=Produto&metodo=show">Mostrar
                        registro</a>
                </li>
                <li><a href="../../index.php?classe=Produto&metodo=index">Mostrar tudo</a></li>
                <li><a href="../produto/novo.php">Novo</a></li>

            </ul>
        </li>

        <li> Serviços
            <ul>
                <li><a href="../../index.php?id=1&classe=Servico&metodo=edit">Editar</a></li>
                <li><a href="../../index.php?id=1&classe=Servico&metodo=show">Mostrar
                        registro</a>
                </li>
                <li><a href="../../index.php?classe=Servico&metodo=index">Mostrar tudo</a></li>
                <li><a href="../servico/novo.php">Novo</a></li>

            </ul>
        </li>


    </ul>
</body>

</html>