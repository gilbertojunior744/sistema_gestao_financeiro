<?php


include('partials/header.php'); // Passa os dados para a view
// Crie uma instância da classe Cliente
$db = new Database;




// $cliente = new Cliente($db->connect());

// Verifique se o ID foi passado
// if (isset($_GET['id'])) {
//  

//     // Crie uma instância da classe Cliente
//     $cliente = new Cliente($db->connect());

//     // Busque os dados do cliente
//     $dadosCliente = $cliente->buscarClientePorId($id);
// }

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row mx-0">
                <div class="col-12 col-md-4">
                    <h5 class="card-title fw-semibold mb-4">Editar Conta Bancária</h5>
                </div>
                <div class="col-12 offset-md-4 col-md-4">
                    <a href="/sistema_gestao_financeiro/contasBancarias/listar" class="btn btn-success" title="Lista de Contas">
                        <img src="../../assets/icons/list-search.svg" alt="Lista de Clientes">
                    </a>
                </div>
            </div>
            <br><br>
            <div class="card">
                <div class="card-body">
                    <form action="/sistema_gestao_financeiro/contasBancarias/atualizar/<?php echo $id; ?>" method="POST">

                        <?php if (isset($mensagem)): ?>
                            <div class="alert">
                                <?php  echo  $mensagem; ?>
                            </div>
                        <?php 
                            endif; 
                        ?>
                           <div class="row">
                            <div class="mb-3 col-12 col-md-6">
                                <label for="nome" class="form-label">Nome </label>
                                <input type="nome" class="form-control" id="nome" name="nome" value="<?=$contas_bancarias['nome_conta']?>" >
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="cnpj_cpf" class="form-label">Banco</label>
                                <input type="text" class="form-control" id="banco" name="banco"  value="<?=$contas_bancarias['banco']?>" >
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="agencia" class="form-label">Agência</label>
                                <input type="text" class="form-control" id="agencia" name="agencia"  value="<?=$contas_bancarias['agencia']?>" >
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="telefone" class="form-label">N° Conta</label>
                                <input type="text" class="form-control" id="numero_conta" name="numero_conta"  value="<?=$contas_bancarias['numero_conta']?>">
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="saldo" class="form-label">Saldo</label>
                                <input type="text" class="form-control" id="saldo" name="saldo"  value="<?=$contas_bancarias['saldo']?>">
                            </div>
                            
                        </div>

                        <button type="submit" name="edit" class="btn btn-primary">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('partials/footer.php');

?>