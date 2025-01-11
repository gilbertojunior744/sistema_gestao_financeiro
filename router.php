<?php
require_once 'config/Database.php';
$db = new Database();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); 
$method = $_SERVER['REQUEST_METHOD']; 

switch ($uri) {
    case '/sistema_gestao_financeiro/':
    case '/sistema_gestao_financeiro/index.php':
        if ($method === 'GET') {
            require_once __DIR__ . '/src/controllers/HomeController.php';
            $controller = new HomeController($db->connect());
            $controller->index();
        }
        break;

    case '/sistema_gestao_financeiro/cliente/listar':
        if ($method === 'GET') {
            require_once __DIR__ . '/src/controllers/ClienteController.php';
            $controller = new ClienteController($db->connect());
            $controller->listar();
        }
        break;

    case '/sistema_gestao_financeiro/cliente/cadastrar':
        if ($method === 'GET') {
            require_once __DIR__ . '/src/controllers/ClienteController.php';
            $controller = new ClienteController($db->connect());
            $controller->mostrarFormulario();
        }
        break;

    case '/sistema_gestao_financeiro/cliente/criar':
        if ($method === 'POST') {
            require_once __DIR__ . '/src/controllers/ClienteController.php';
            $controller = new ClienteController($db->connect());
            $controller->cadastrarPost($_POST);
        }
    case '/sistema_gestao_financeiro/cliente/editar/1':

        if (preg_match('#^/sistema_gestao_financeiro/cliente/editar/(\d+)$#', $uri, $matches)) {
            if ($method === 'GET') {
                require_once __DIR__ . '/src/controllers/ClienteController.php';
                $controller = new ClienteController($db->connect());
                $id_cliente = $matches[1];

                $controller->viewEditarCliente($id_cliente);
            }
        }
        break;
    case '/sistema_gestao_financeiro/cliente/atualizar/1':

        if (preg_match('#^/sistema_gestao_financeiro/cliente/atualizar/(\d+)$#', $uri, $matches)) {
            $id_cliente = $matches[1];

            if ($method === 'POST') {
                require_once __DIR__ . '/src/controllers/ClienteController.php';
                $controller = new ClienteController($db->connect());

                $controller->editarCliente($id_cliente, $_POST);
            }
        }
        break;

    case '/sistema_gestao_financeiro/cliente/dados/1':


        if (preg_match('#^/sistema_gestao_financeiro/cliente/dados/(\d+)$#', $uri, $matches)) {
            $id_cliente = $matches[1];

            if ($method === 'GET') {
                require_once __DIR__ . '/src/controllers/ClienteController.php';
                $controller = new ClienteController($db->connect());

                $controller->showCliente($id_cliente);
            }
        }
        break;


    case '/sistema_gestao_financeiro/fornecedor/listar':
        if ($method === 'GET') {
            require_once __DIR__ . '/src/controllers/FornecedorController.php';
            $controller = new FornecedorController($db->connect());
            $controller->listar();
        }
        break;

    case '/sistema_gestao_financeiro/fornecedor/cadastrar':
        if ($method === 'GET') {
            require_once __DIR__ . '/src/controllers/FornecedorController.php';
            $controller = new FornecedorController($db->connect());
            $controller->mostrarFormulario();
        }
        break;

    case '/sistema_gestao_financeiro/fornecedor/criar':
        if ($method === 'POST') {
            require_once __DIR__ . '/src/controllers/FornecedorController.php';
            $controller = new FornecedorController($db->connect());
            $controller->cadastrarPost($_POST);
        }
    case '/sistema_gestao_financeiro/fornecedor/editar/1':

        if (preg_match('#^/sistema_gestao_financeiro/fornecedor/editar/(\d+)$#', $uri, $matches)) {
            if ($method === 'GET') {
                require_once __DIR__ . '/src/controllers/FornecedorController.php';
                $controller = new FornecedorController($db->connect());
                $id_cliente = $matches[1];

                $controller->viewEditarFornecedor($id_cliente);
            }
        }
        break;
    case '/sistema_gestao_financeiro/fornecedor/atualizar/1':

        if (preg_match('#^/sistema_gestao_financeiro/fornecedor/atualizar/(\d+)$#', $uri, $matches)) {
            $id_cliente = $matches[1];

            if ($method === 'POST') {
                require_once __DIR__ . '/src/controllers/FornecedorController.php';
                $controller = new FornecedorController($db->connect());

                $controller->editarFornecedor($id_cliente, $_POST);
            }
        }
        break;

    case '/sistema_gestao_financeiro/fornecedor/dados/1':


        if (preg_match('#^/sistema_gestao_financeiro/fornecedor/dados/(\d+)$#', $uri, $matches)) {
            $id_cliente = $matches[1];

            if ($method === 'GET') {
                require_once __DIR__ . '/src/controllers/FornecedorController.php';
                $controller = new FornecedorController($db->connect());

                $controller->showFornecedor($id_cliente);
            }
        }
        break;

    case '/sistema_gestao_financeiro/categoriaTransacoes/listar':
        if ($method === 'GET') {
            require_once __DIR__ . '/src/controllers/CategoriaTransacoesController.php';
            $controller = new  CategoriaTransacoesController($db->connect());
            $controller->listar();
        }
        break;

    case '/sistema_gestao_financeiro/categoriaTransacoes/cadastrar':
        if ($method === 'GET') {
            require_once __DIR__ . '/src/controllers/CategoriaTransacoesController.php';
            $controller = new  CategoriaTransacoesController($db->connect());
            $controller->mostrarFormulario();
        }
        break;

    case '/sistema_gestao_financeiro/categoriaTransacoes/criar':
        if ($method === 'POST') {
            require_once __DIR__ . '/src/controllers/CategoriaTransacoesController.php';
            $controller = new CategoriaTransacoesController($db->connect());
            $controller->cadastrarPost($_POST);
        }

    case '/sistema_gestao_financeiro/categoriaTransacoes/editar/1':

        if (preg_match('#^/sistema_gestao_financeiro/categoriaTransacoes/editar/(\d+)$#', $uri, $matches)) {
            if ($method === 'GET') {
                require_once __DIR__ . '/src/controllers/CategoriaTransacoesController.php';
                $controller = new CategoriaTransacoesController($db->connect());
                $id_categoria = $matches[1];

                $controller->viewEditarCategoriaTransacoes($id_categoria);
            }
        }
        break;
    case '/sistema_gestao_financeiro/categoriaTransacoes/atualizar/1':

        if (preg_match('#^/sistema_gestao_financeiro/categoriaTransacoes/atualizar/(\d+)$#', $uri, $matches)) {
            $id_categoria = $matches[1];

            if ($method === 'POST') {
                require_once __DIR__ . '/src/controllers/CategoriaTransacoesController.php';
                $controller = new CategoriaTransacoesController($db->connect());
                $controller->editarCategoriaTransacoes($id_categoria, $_POST);
            }
        }
        break;

    default:
        echo 'Página não encontrada';
        break;
}
