<?php

require_once 'src/models/CategoriaTransacoes.php';

class CategoriaTransacoesController
{
    private $cat_transacoesModel;

    public function __construct($db)
    {
        $this->cat_transacoesModel = new CategoriaTransacoes($db);
    }

    public function listar()
    {
        $categoria_transacoes = $this->cat_transacoesModel->listarCategoriaTransacoes();
        include(__DIR__ . '/../views/categoria_transacoes/categoria_transacoes_list.php'); 
    }

    public function showCategoriaTransacoes ($id)
    {
        $categoria_transacoes = $this->cat_transacoesModel->buscarCategoriaTransacoesPorId($id);
        
        include(__DIR__ . '/../views/categoria_transacoes/categoria_transacoes_show.php'); 
    }

    public function mostrarFormulario()
    {
        include(__DIR__ . '/../views/categoria_transacoes/categoria_transacoes_form.php'); 
    }

    public function viewEditarCategoriaTransacoes($id)
    {

        $categoria_transacoes = $this->cat_transacoesModel->buscarCategoriaTransacoesPorId($id);
        include(__DIR__ . '/../views/categoria_transacoes/categoria_transacoes_edit.php'); 
    }

    public function formEditarCategoriaTransacoes()
    {
        $id = $_GET['id']; 
        $categoria_transacoes = $this->cat_transacoesModel->buscarCategoriaTransacoesPorId($id);
        include 'views/categoria_transacoes/categoria_transacoes_edit.php'; 
    }

    public function editarCategoriaTransacoes($id, $post)
    {
        $nome = $post['nome'];
        $descricao= $post['descricao'];
       

        $categoria_transacoes = $this->cat_transacoesModel->editarCategoriaTransacoes($id, $nome, $descricao);

        if ($categoria_transacoes) {
            $mensagem = 'CategoriaTransacoes editado com sucesso!';
        } else {
            $mensagem = 'Erro ao editar CategoriaTransacoes. Tente novamente.';
        }
        $categoria_transacoes = $this->cat_transacoesModel->buscarCategoriaTransacoesPorId($id);

        include(__DIR__ . '/../views/categoria_transacoes/categoria_transacoes_edit.php'); 
    }

    public function cadastrarPost($post)
    {
        $nome = $post['nome'];
        $descricao = $post['descricao'];
      
        // Verifica se o CategoriaTransacoes já existe
        // if ($this->cat_transacoesModel->CategoriaTransacoesExiste($cnpj_cpf)) {
        //     $erro = "CNPJ ou CPF já cadastrado.";
        //     include 'app/views/cadastrar.php';
        //     return;
        // }

        if ($this->cat_transacoesModel->cadastrar($nome, $descricao)) {
            echo "<p>Categoria Transacoes cadastrado com sucesso!</p>";
        } else {
            echo "<p>Erro ao cadastrar Categoria Transacoes.</p>";
        }

        include(__DIR__ . '/../views/categoria_transacoes/categoria_transacoes_form.php'); 

    }
}
