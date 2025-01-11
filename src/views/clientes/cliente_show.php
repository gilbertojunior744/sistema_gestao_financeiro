<?php

include('partials/header.php'); // Passa os dados para a view



?>

<?php if (isset($mensagem)): ?>
    <div class="alert <?php echo (strpos($mensagem, 'sucesso') !== false) ? 'success' : 'error'; ?>">
        <?php echo $mensagem; ?>
    </div>
<?php endif; ?>

<div class="cliente-details card">
    <h1 class="text-center">Detalhes do Cliente</h1>
    <table class="cliente-info">
        <tr>
            <th>Nome</th>
            <td><?= $cliente['nome_cliente'] ?></td>
        </tr>
        <tr>
            <th>CNPJ/CPF</th>
            <td><?=$cliente['cnpj_cpf'] ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?=$cliente['email'] ?></td>
        </tr>
        <tr>
            <th>Telefone</th>
            <td><?php echo $cliente['telefone'] ?></td>
        </tr>
        <tr>
            <th>Endereço</th>
            <td><?=$cliente['endereco'] ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?=$cliente['status'] == 1 ? 'Ativo' : 'Inativo'; ?></td>
        </tr>
    </table>

    <div class="actions">
        <a href="/sistema_gestao_financeiro/cliente/editar/<?php echo $cliente['id_cliente']; ?>" class="btn btn-edit">Editar</a>
        <a href="/sistema_gestao_financeiro/cliente/listar" class="btn btn-back">Voltar</a>
    </div>
</div>

<!-- Estilos básicos -->
<style>
    .cliente-details {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    .cliente-info {
        width: 100%;
        border-collapse: collapse;
    }

    .cliente-info th,
    .cliente-info td {
        padding: 10px;
        text-align: left;
    }

    .cliente-info th {
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
