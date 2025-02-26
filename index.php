<?php
include './controller/ClienteController.php';
include './controller/CompraController.php';
include './controller/AgendamentoController.php';
include './controller/ProdutoController.php';
include './controller/ServicoController.php';
include './controller/HomeController.php';


if (!isset($_GET) || !isset($_GET['classe']) || !isset($_GET['metodo'])) {
    $homeController = new HomeController();
    $homeController->index();
} else {
    $classe = $_GET['classe'] . 'Controller';
    $metodo = $_GET['metodo'];

    switch ($classe) {
        case 'ServicoController':
            $controller = new $classe();
            break;
        case 'ProdutoController':
            $controller = new $classe();
            break;
        case 'CompraController':
            $controller = new $classe();

            break;
        case 'ClienteController':
            $controller = new $classe();

            break;
        case 'AgendamentoController':
            $controller = new $classe();
            break;

        default:
            $homeController = new HomeController();
            $homeController->index();
            break;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST) && $_POST['metodo'] === 'update') {
            session_start();
            $_SESSION['fluxo_editar'] = $_POST;
        }
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller->$metodo($id);
    } else {
        
        $controller->$metodo();
    }
}
