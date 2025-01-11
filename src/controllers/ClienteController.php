<?php

require_once 'src/models/Cliente.php';

class ClienteController
{
    private $clienteModel;

    public function __construct($db)
    {
        $this->clienteModel = new Cliente($db);
    }

    public function listar()
    {
        $clientes = $this->clienteModel->listarClientes();
        include(__DIR__ . '/../views/clientes/cliente_list.php'); 
    }

    public function showCliente ($id)
    {
        $cliente = $this->clienteModel->buscarClientePorId($id);
        
        include(__DIR__ . '/../views/clientes/cliente_show.php'); 
    }

    public function mostrarFormulario()
    {
        include(__DIR__ . '/../views/clientes/cliente_form.php'); 
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

        include(__DIR__ . '/../views/clientes/cliente_edit.php'); 
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

        include(__DIR__ . '/../views/clientes/cliente_form.php'); 

    }
}
