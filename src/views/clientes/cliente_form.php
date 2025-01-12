<?php

include('partials/header.php'); // Passa os dados para a view

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row mx-0">
                <div class="col-12 col-md-4">
                    <h5 class="card-title fw-semibold mb-4">Novo Cliente</h5>
                </div>
                <div class="col-12 offset-md-4 col-md-4">
                    <a href="/sistema_gestao_financeiro/cliente/listar" class="btn btn-success" title="Listade Clientes">
                        <img src="assets/icons/list-search.svg" alt="Lista de Clientes">
                    </a>
                </div>
            </div>
            <br><br>
            <div class="card">
                <div class="card-body">
                    <form action="/sistema_gestao_financeiro/cliente/criar" method="POST">

                        <div class="row">
                            <div class="mb-3 col-12 col-md-6">
                                <label for="nome" class="form-label">Nome </label>
                                <input type="nome" class="form-control" id="nome" name="nome" >
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="cnpj_cpf" class="form-label">CNPJ ou CPF</label>
                                <input type="text" class="form-control" id="cnpj_cpf" name="cnpj_cpf" >
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone">
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="endereco" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco">
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control" name="status">
                                    <option value="">Selecione uma opção</option>
                                    <option value="A">Ativo</option>
                                    <option value="I">Inativo</option>
                                </select>
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