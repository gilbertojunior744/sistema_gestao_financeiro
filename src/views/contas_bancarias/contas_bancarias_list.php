<?php

include('partials/header.php'); 

?>

<div class="container-fluid">
  <div class="card col-12">
    <div class="card-body">
        <div class="row mx-0">
            <div class="col-12 col-md-4">
                <h5 class="card-title">Lista de Contas Bancárias</h5>
            </div>
            <div class="col-12 col-md-4 offset-md-4">
                <a href="/sistema_gestao_financeiro/contasBancarias/cadastrar" class="btn btn-success s" title="Nova Conta Bancária"> +</a>
            </div>
        </div>
      <div class=" col-12">
        <table class="table text-nowrap align-middle mb-0" id="contasBancariasTable">
          <thead>
            <tr class="border-2 border-bottom border-primary border-0">
              <th scope="col" class="ps-0">Nome</th>
              <th scope="col" class="text-center">Banco</th>
              <th scope="col" class="text-center">Agência</th>
              <th scope="col" class="text-center">Saldo</th>
              <th scope="col" class="text-center">N° Conta</th>
              <th scope="col" class="text-center">Ações</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php foreach ($contas_bancarias as $contas_bancarias) { ?>
              <tr>
                <td><?php echo htmlspecialchars($contas_bancarias['nome_conta']); ?></td>
                <td class="text-center"><?php echo htmlspecialchars($contas_bancarias['banco']); ?></td>
                <td class="text-center"><?php echo htmlspecialchars($contas_bancarias['agencia']); ?></td>
                <td class="text-center"><?php echo htmlspecialchars($contas_bancarias['numero_conta']); ?></td>
                <td class="text-center">R$ <?php echo htmlspecialchars($contas_bancarias['saldo']); ?></td>

                <td class="text-center">
                     <!-- Botão de Ver -->
                     <a href="/sistema_gestao_financeiro/contasBancarias/dados/<?php echo $contas_bancarias['id_conta']; ?>" class="btn btn-secondary btn-sm">Ver</a>

                    <!-- Botão de Editar -->
                    <a href="/sistema_gestao_financeiro/contasBancarias/editar/<?php echo $contas_bancarias['id_conta']; ?>" class="btn btn-primary btn-sm">Editar</a>
                    
                    <!-- Botão de Deletar -->
                    <a href="deletar_contasBancarias.php?id=<?php echo $contas_bancarias['id_conta']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?');">Deletar</a>
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
            $('#contasBancariasTable').DataTable(); 
        });
    </script>