<?php

include('partials/header.php'); // Passa os dados para a view

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row mx-0">
                <div class="col-12 col-md-4">
                    <h5 class="card-title fw-semibold mb-4">Nova Categoria de Transação</h5>
                </div>
                <div class="col-12 offset-md-4 col-md-4">
                    <a href="/sistema_gestao_financeiro/categoriaTransacoes/listar" class="btn btn-success" title="Listade Clientes">
                        <img src="assets/icons/list-search.svg" alt="Lista de Clientes">
                    </a>
                </div>
            </div>
            <br><br>
            <div class="card">
                <div class="card-body">
                    <form action="/sistema_gestao_financeiro/categoriaTransacoes/criar" method="POST">

                        <div class="row">
                            <div class="mb-3 col-12 col-md-12">
                                <label for="nome" class="form-label">Nome </label>
                                <input type="nome" class="form-control" id="nome" name="nome" >
                            </div>
                            <div class="mb-3 col-12 col-md-12">
                                <label for="nome" class="form-label">Descrição </label>
                                <textarea class="col-12 form-control" name="descricao" id="descricao" rows="10"></textarea>
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
include('partials/footer.php'); // Passa os dados para a view

?>