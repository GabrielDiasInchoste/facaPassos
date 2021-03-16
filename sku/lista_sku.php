<div class="container">
  <h2>Sku</h2>
  <a class="btn btn-info" href="sku.php?acao=novo">Novo</a>
  <a class="btn btn-info" href="pdf_sku.php?codProduto=<?php echo $codProduto;  ?>">Gerar Pdf</a>

  <?php if (count($registros)==0): ?>
    <p>Nenhum registro encontrado.</p>
  <?php else: ?>
    <table class="table table-hover table-stripped">
      <thead>
          <th>#</th>
          <th>Sku</th>
          <th>Quantidade</th>
          <th>ValorUnitario</th>
          <th>Produto</th>
          <th>Fornecedor</th>
      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
            <td><?php echo $linha['codSku']; ?></td>
            <td><?php echo $linha['sku']; ?></td>
            <td><?php echo $linha['quantidade']; ?></td>
            <td><?php echo $linha['valorUnitario']; ?></td>
            <td><?php echo $linha['produto']; ?></td>
            <td><?php echo $linha['fornecedor']; ?></td>

            <td>
                <a class="btn btn-warning btn-sm" href="sku.php?acao=buscar&id=<?php echo $linha['codSku']; ?>">Editar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
