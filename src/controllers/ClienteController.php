<?php

require_once 'src/models/Cliente.php';

class ClienteController
{
    private $clienteModel;

    public function __construct($db)
    {
        // Conectar ao banco de dados e criar instância do modelo
        $this->clienteModel = new Cliente($db);
    }

    // Método para listar clientes
    public function listar()
    {
        $clientes = $this->clienteModel->listarClientes();
        include(__DIR__ . '/../views/clientes/cliente_list.php'); // Passa os dados para a view
    }

    public function showCliente ($id)
    {
        $cliente = $this->clienteModel->buscarClientePorId($id);
        
        include(__DIR__ . '/../views/clientes/cliente_show.php'); // Passa os dados para a view
    }

    // Método para exibir o formulário de adição
    public function mostrarFormulario()
    {
        include(__DIR__ . '/../views/clientes/cliente_form.php'); // Passa os dados para a view
    }

    public function viewEditarCliente($id)
    {

        $cliente = $this->clienteModel->buscarClientePorId($id);
        include(__DIR__ . '/../views/clientes/cliente_edit.php'); 
    }

    public function formEditarCliente()
    {
        $id = $_GET['id']; 
        $cliente = $this->clienteModel->buscarClientePorId($id);
        include 'views/clientes/cliente_edit.php'; 
    }

    public function editarCliente($id, $post)
    {
        $nome = $post['nome'];
        $cnpj_cpf = $post['cnpj_cpf'];
        $email = $post['email'];
        $telefone = $post['telefone'];
        $endereco = $post['endereco'];
        $status = $post['status'];

        $cliente = $this->clienteModel->editarCliente($id, $nome, $cnpj_cpf, $email, $telefone, $endereco, $status);

        if ($cliente) {
            $mensagem = 'Cliente editado com sucesso!';
        } else {
            $mensagem = 'Erro ao editar cliente. Tente novamente.';
        }
        $cliente = $this->clienteModel->buscarClientePorId($id);

        include(__DIR__ . '/../views/clientes/cliente_edit.php'); // Passa os dados para a view
    }

    public function cadastrarPost($post)
    {
        $nome = $post['nome'];
        $cnpj_cpf = $post['cnpj_cpf'];
        $email = $post['email'];
        $telefone = $post['telefone'];
        $endereco = $post['endereco'];
        $status = $post['status'];

        // Verifica se o cliente já existe
        // if ($this->clienteModel->clienteExiste($cnpj_cpf)) {
        //     $erro = "CNPJ ou CPF já cadastrado.";
        //     include 'app/views/cadastrar.php';
        //     return;
        // }

        if ($this->clienteModel->cadastrar($nome, $cnpj_cpf, $email, $telefone, $endereco, $status)) {
            echo "<p>Cliente cadastrado com sucesso!</p>";
        } else {
            echo "<p>Erro ao cadastrar cliente.</p>";
        }

        include(__DIR__ . '/../views/clientes/cliente_form.php'); // Passa os dados para a view

    }
}
