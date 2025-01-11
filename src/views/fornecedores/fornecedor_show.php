<?php

include('partials/header.php'); // Passa os dados para a view



?>

<?php if (isset($mensagem)): ?>
    <div class="alert <?php echo (strpos($mensagem, 'sucesso') !== false) ? 'success' : 'error'; ?>">
        <?php echo $mensagem; ?>
    </div>
<?php endif; ?>

<div class="fornecedor-details card">
    <h1 class="text-center">Detalhes do fornecedor</h1>
    <table class="fornecedor-info">
        <tr>
            <th>Nome</th>
            <td><?= $fornecedor['nome_fornecedor'] ?></td>
        </tr>
        <tr>
            <th>CNPJ/CPF</th>
            <td><?=$fornecedor['cnpj_cpf'] ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?=$fornecedor['email'] ?></td>
        </tr>
        <tr>
            <th>Telefone</th>
            <td><?php echo $fornecedor['telefone'] ?></td>
        </tr>
        <tr>
            <th>Endereço</th>
            <td><?=$fornecedor['endereco'] ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?=$fornecedor['status'] == 1 ? 'Ativo' : 'Inativo'; ?></td>
        </tr>
    </table>

    <div class="actions">
        <a href="/sistema_gestao_financeiro/fornecedor/editar/<?php echo $fornecedor['id_fornecedor']; ?>" class="btn btn-edit">Editar</a>
        <a href="/sistema_gestao_financeiro/fornecedor/listar" class="btn btn-back">Voltar</a>
    </div>
</div>

<!-- Estilos básicos -->
<style>
    .fornecedor-details {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    .fornecedor-info {
        width: 100%;
        border-collapse: collapse;
    }

    .fornecedor-info th,
    .fornecedor-info td {
        padding: 10px;
        text-align: left;
    }

    .fornecedor-info th {
        background-color: #f2f2f2;
    }

    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
        color: white;
        font-weight: bold;
    }

    .alert.success {
        background-color: green;
    }

    .alert.error {
        background-color: red;
    }

    .actions {
        margin-top: 20px;
    }

    .btn {
        padding: 10px 20px;
        margin: 5px;
        text-decoration: none;
        border-radius: 5px;
        color: white;
        font-weight: bold;
    }

    .btn.btn-edit {
        background-color: #007bff;
    }

    .btn.btn-back {
        background-color: #6c757d;
    }
</style>



<?php
include('partials/footer.php'); // Passa os dados para a view

?>
