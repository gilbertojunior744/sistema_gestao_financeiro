<?php

require_once 'src/models/ContasBancarias.php';

class ContasBancariasController
{
    private $contasBancariasModel;

    public function __construct($db)
    {
        $this->contasBancariasModel = new ContasBancarias($db);
    }

    public function listar()
    {
        $contas_bancarias = $this->contasBancariasModel->listarContaBancaria();
        include(__DIR__ . '/../views/contas_bancarias/contas_bancarias_list.php'); 
    }

    public function showContasBancarias ($id)
    {
        $contas_bancarias = $this->contasBancariasModel->buscarContaBancariaPorId($id);
        
        include(__DIR__ . '/../views/contas_bancarias/contas_bancarias_show.php'); 
    }
    public function mostrarFormulario()
    {
        include(__DIR__ . '/../views/contas_bancarias/contas_bancarias_form.php'); 
    }

    public function viewEditarContasBancarias($id)
    {

        $contas_bancarias = $this->contasBancariasModel->buscarContaBancariaPorId($id);
        include(__DIR__ . '/../views/contas_bancarias/contas_bancarias_edit.php'); 
    }

    public function formEditarContasBancarias()
    {
        $id = $_GET['id']; 
        $contas_bancarias = $this->contasBancariasModel->buscarContaBancariaPorId($id);
        include 'views/contas_bancarias/contas_bancarias_edit.php'; 
    }

    public function editarContasBancarias($id, $post)
    {
        $nome = $post['nome'];
        $banco = $post['banco'];
        $agencia = $post['agencia'];
        $numero_conta = $post['numero_conta'];
        $saldo = floatval($post['saldo']);

        $contas_bancarias = $this->contasBancariasModel->editarContaBancaria($id, $nome, $banco,$agencia,$numero_conta,$saldo);

        if ($contas_bancarias) {
            $mensagem = 'Conta bancária editado com sucesso!';
        } else {
            $mensagem = 'Erro ao editar conta bancária. Tente novamente.';
        }
        $contas_bancarias = $this->contasBancariasModel->buscarContaBancariaPorId($id);

        include(__DIR__ . '/../views/contas_bancarias/contas_bancarias_edit.php'); 
    }

    public function cadastrarPost($post)
    {
        $nome = $post['nome'];
        $banco = $post['banco'];
        $agencia = $post['agencia'];
        $numero_conta = $post['numero_conta'];
        $saldo = $post['saldo'];


        if ($this->contasBancariasModel->cadastrar($nome, $banco, $agencia, $numero_conta, $saldo)) {
            echo "<p>Conta bancária cadastrada com sucesso!</p>";
        } else {
            echo "<p>Erro ao cadastrar Conta Bancária.</p>";
        }

        include(__DIR__ . '/../views/contas_bancarias/contas_bancarias_form.php'); 

    }
}
