<?php

require_once 'src/models/Fornecedor.php';

class FornecedorController
{
    private $fornecedorModel;

    public function __construct($db)
    {
        $this->fornecedorModel = new Fornecedor($db);
    }

    public function listar()
    {
        $fornecedores = $this->fornecedorModel->listarFornecedores();
        include(__DIR__ . '/../views/fornecedores/fornecedor_list.php'); 
    }

    public function showFornecedor ($id)
    {
        $fornecedor = $this->fornecedorModel->buscarFornecedorPorId($id);
        
        include(__DIR__ . '/../views/fornecedores/fornecedor_show.php'); 
    }
    public function mostrarFormulario()
    {
        include(__DIR__ . '/../views/fornecedores/fornecedor_form.php'); 
    }

    public function viewEditarFornecedor($id)
    {

        $fornecedor = $this->fornecedorModel->buscarFornecedorPorId($id);
        include(__DIR__ . '/../views/fornecedores/fornecedor_edit.php'); 
    }

    public function formEditarfornecedor()
    {
        $id = $_GET['id']; 
        $fornecedor = $this->fornecedorModel->buscarFornecedorPorId($id);
        include 'views/fornecedores/fornecedor_edit.php'; 
    }

    public function editarFornecedor($id, $post)
    {
        $nome = $post['nome'];
        $cnpj_cpf = $post['cnpj_cpf'];
        $email = $post['email'];
        $telefone = $post['telefone'];
        $endereco = $post['endereco'];
        $status = $post['status'];

        $fornecedor = $this->fornecedorModel->editarFornecedor($id, $nome, $cnpj_cpf, $email, $telefone, $endereco, $status);

        if ($fornecedor) {
            $mensagem = 'Fornecedor editado com sucesso!';
        } else {
            $mensagem = 'Erro ao editar fornecedor. Tente novamente.';
        }
        $fornecedor = $this->fornecedorModel->buscarFornecedorPorId($id);

        include(__DIR__ . '/../views/fornecedores/fornecedor_edit.php'); // Passa os dados para a view
    }

    public function cadastrarPost($post)
    {
        $nome = $post['nome'];
        $cnpj_cpf = $post['cnpj_cpf'];
        $email = $post['email'];
        $telefone = $post['telefone'];
        $endereco = $post['endereco'];
        $status = $post['status'];

        // Verifica se o fornecedor já existe
        // if ($this->fornecedorModel->fornecedorExiste($cnpj_cpf)) {
        //     $erro = "CNPJ ou CPF já cadastrado.";
        //     include 'app/views/cadastrar.php';
        //     return;
        // }

        if ($this->fornecedorModel->cadastrar($nome, $cnpj_cpf, $email, $telefone, $endereco, $status)) {
            echo "<p>Fornecedor cadastrado com sucesso!</p>";
        } else {
            echo "<p>Erro ao cadastrar fornecedor.</p>";
        }

        include(__DIR__ . '/../views/fornecedores/fornecedor_form.php'); // Passa os dados para a view

    }
}
