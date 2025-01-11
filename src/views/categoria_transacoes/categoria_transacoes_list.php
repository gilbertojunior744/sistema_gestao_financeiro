<?php

include('partials/header.php'); 

?>

<div class="container-fluid">
  <div class="card col-12">
    <div class="card-body">
        <div class="row mx-0">
            <div class="col-12 col-md-4">
                <h5 class="card-title">Lista de Categorias de transações</h5>
            </div>
            <div class="col-12 col-md-4 offset-md-4">
                <a href="/sistema_gestao_financeiro/categoriaTransacoes/cadastrar" class="btn btn-success s" title="Novo fornecedor"> +</a>
            </div>
        </div>
      <div class=" col-12">
        <table class="table text-nowrap align-middle mb-0" id="cat_transacoesTable">
          <thead>
            <tr class="border-2 border-bottom border-primary border-0">
              <th scope="col" class="ps-0">Nome</th>
              <th scope="col" class="text-center">Descrição</th>
              <th scope="col" class="text-center">Status</th>
              <th scope="col" class="text-center">Ações</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php foreach ( $categoria_transacoes as  $categoria_transacoes) { ?>
              <tr>
                <td><?php echo htmlspecialchars( $categoria_transacoes['nome_categoria']); ?></td>
                <td class="text-center"><?php echo htmlspecialchars( $categoria_transacoes['descricao']); ?></td>
                <td class="text-center">
                
                    <!-- Botão de Editar -->
                    <a href="/sistema_gestao_financeiro/categoriaTransacoes/editar/<?php echo  $categoria_transacoes['id_categoria']; ?>" class="btn btn-primary btn-sm">Editar</a>
                    
                    <!-- Botão de Deletar -->
                    <a href="deletar_categoriaTransacoes.php?id=<?php echo  $categoria_transacoes['id_categoria']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?');">Deletar</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



<?php

include('partials/footer.php'); 


?>
 <script>
        $(document).ready(function() {
            $('#cat_transacoesTable').DataTable(); 
        });
    </script>