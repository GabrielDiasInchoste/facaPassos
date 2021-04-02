<div class="container">
  <h5><b>Skus</b></h5>
  <a class="btn btn-info" href="sku.php?acao=novo">Novo</a>
  <a class="btn btn-info" href="pdf_sku.php?codProduto=<?php echo $codProduto;  ?>">Relatório</a>
  <input type="text" class="filtro" id="filtro" onkeyup="filtroNome()" placeholder="Pesquisar por Nome">

  <?php if (count($registros)==0): ?>
    <p>Nenhum registro encontrado.</p>
  <?php else: ?>
    <table class="table table-hover table-stripped" id="tabela">
      <thead>
          <th>#</th>
          <th>Sku</th>
          <th>Quantidade</th>
          <th>Valor Unitário</th>
          <th>Produto</th>
          <th>Fornecedor</th>
      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
            <td><?php echo $linha['codSku']; ?></td>
            <td><?php echo $linha['sku']; ?></td>
            <td><?php echo number_format(floatval($linha["quantidade"]),2,",","."); ?></td>
            <td><?php echo number_format(floatval($linha["valorUnitario"]),2,",","."); ?></td>
            <td><?php echo $linha['produto']; ?></td>
            <td><?php echo $linha['fornecedor']; ?></td>

            <td style="text-align: end">
                <a class="btn btn-warning btn-sm" href="sku.php?acao=buscar&id=<?php echo $linha['codSku']; ?>">Editar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
