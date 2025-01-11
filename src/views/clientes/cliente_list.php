<?php

include('partials/header.php'); 

?>

<div class="container-fluid">
  <div class="card col-12">
    <div class="card-body">
        <div class="row mx-0">
            <div class="col-12 col-md-4">
                <h5 class="card-title">Lista de Clientes</h5>
            </div>
            <div class="col-12 col-md-4 offset-md-4">
                <a href="/sistema_gestao_financeiro/cliente/cadastrar" class="btn btn-success s" title="Novo Cliente"> +</a>
            </div>
        </div>
      <div class=" col-12">
        <table class="table text-nowrap align-middle mb-0" id="clientesTable">
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
            <?php foreach ($clientes as $cliente) { ?>
              <tr>
                <td><?php echo htmlspecialchars($cliente['nome_cliente']); ?></td>
                <td class="text-center"><?php echo htmlspecialchars($cliente['email']); ?></td>
                <td class="text-center"><?php echo htmlspecialchars($cliente['telefone']); ?></td>
                <td class="text-center"><?php echo htmlspecialchars($cliente['status']); ?></td>
                <td class="text-center">
                     <!-- Botão de Ver -->
                     <a href="/sistema_gestao_financeiro/cliente/dados/<?php echo $cliente['id_cliente']; ?>" class="btn btn-secondary btn-sm">Ver</a>

                    <!-- Botão de Editar -->
                    <a href="/sistema_gestao_financeiro/cliente/editar/<?php echo $cliente['id_cliente']; ?>" class="btn btn-primary btn-sm">Editar</a>
                    
                    <!-- Botão de Deletar -->
                    <a href="deletar_cliente.php?id=<?php echo $cliente['id_cliente']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?');">Deletar</a>
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
            $('#clientesTable').DataTable(); 
        });
    </script>