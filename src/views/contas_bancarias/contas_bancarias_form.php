<?php

include('partials/header.php'); // Passa os dados para a view

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row mx-0">
                <div class="col-12 col-md-4">
                    <h5 class="card-title fw-semibold mb-4">Nova Conta Bancária</h5>
                </div>
                <div class="col-12 offset-md-4 col-md-4">
                    <a href="/sistema_gestao_financeiro/contasBancarias/listar" class="btn btn-success" title="Lista de Contas Bancárias">
                        <img src="assets/icons/list-search.svg" alt="Lista de Contas Bancárias">
                    </a>
                </div>
            </div>
            <br><br>
            <div class="card">
                <div class="card-body">
                    <form action="/sistema_gestao_financeiro/contasBancarias/criar" method="POST">

                        <div class="row">
                            <div class="mb-3 col-12 col-md-6">
                                <label for="nome" class="form-label">Nome </label>
                                <input type="nome" class="form-control" id="nome" name="nome" >
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="cnpj_cpf" class="form-label">Banco</label>
                                <input type="text" class="form-control" id="banco" name="banco" >
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="agencia" class="form-label">Agência</label>
                                <input type="text" class="form-control" id="agencia" name="agencia">
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="telefone" class="form-label">N° Conta</label>
                                <input type="text" class="form-control" id="numero_conta" name="numero_conta">
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="saldo" class="form-label">Saldo</label>
                                <input type="text" class="form-control" id="saldo" name="saldo">
                            </div>
                            
                        </div>

                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('partials/footer.php'); 

?>