<?php

include('partials/header.php'); // Passa os dados para a view

?>

<div class="container-fluid">
  <div class="card col-12">
    <div class="card-body">
        <div class="row mx-0">
            <div class="col-12 col-md-4">
                <h5 class="card-title">Lista de fornecedores</h5>
            </div>
            <div class="col-12 col-md-4 offset-md-4">
                <a href="/sistema_gestao_financeiro/fornecedor/cadastrar" class="btn btn-success s" title="Novo fornecedor"> +</a>
            </div>
        </div>
      <div class=" col-12">
        <table class="table text-nowrap align-middle mb-0" id="fornecedoresTable">
          <thead>
            <tr class="border-2 border-bottom border-primary border-0">
              <th scope="col" class="ps-0">Nome</th>
              <th scope="col" class="text-center">Email</th>
              <th scope="col" class="text-center">Telefone</th>
              <!-- <th scope="col" class="text-center">Endereço</th> -->
              <th scope="col" class="text-center">Status</th>
              <th scope="col" class="text-center">Ações</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php foreach ($fornecedores as $fornecedor) { ?>
              <tr>
                <td><?php echo htmlspecialchars($fornecedor['nome_fornecedor']); ?></td>
                <td class="text-center"><?php echo htmlspecialchars($fornecedor['email']); ?></td>
                <td class="text-center"><?php echo htmlspecialchars($fornecedor['telefone']); ?></td>
                <td class="text-center"><?php echo htmlspecialchars($fornecedor['status']); ?></td>
                <td class="text-center">
                     <!-- Botão de Ver -->
                     <a href="/sistema_gestao_financeiro/fornecedor/dados/<?php echo $fornecedor['id_fornecedor']; ?>" class="btn btn-secondary btn-sm">Ver</a>

                    <!-- Botão de Editar -->
                    <a href="/sistema_gestao_financeiro/fornecedor/editar/<?php echo $fornecedor['id_fornecedor']; ?>" class="btn btn-primary btn-sm">Editar</a>
                    
                    <!-- Botão de Deletar -->
                    <a href="deletar_fornecedor.php?id=<?php echo $fornecedor['id_fornecedor']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?');">Deletar</a>
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
            $('#fornecedoresTable').DataTable(); 
        });
    </script>