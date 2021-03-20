<div class="container">
  <h2><b>Materiais</b></h2>
  <a class="btn btn-info" href="produto.php?acao=novo">Novo</a>
  <a class="btn btn-info" href="pdf_produto.php">Gerar Pdf</a>
  <?php if (count($registros)==0): ?>
    <p>Nenhum registro encontrado.</p>
  <?php else: ?>
    <table class="table table-hover table-stripped">
      <thead>
        <th>#</th>
        <th>Nome</th>
        <th>Quantidade</th>
        <th>Valor Total</th>
      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
            <td><?php echo $linha['codProduto']; ?></td>
            <td><?php echo $linha['nome']; ?></td>
            <td><?php echo $linha["quantidade"]; ?></td>
            <?php foreach ($skus as $sku):
              if($sku["codProduto"]==$linha["codProduto"]){?>
                <td><?php echo $sku["valor"]; ?></td>
            <?php }endforeach; ?>
            <td style="text-align: end">
              <a class="btn btn-info btn-sm" href="../sku/sku.php?acao=listar&codProduto=<?php echo $linha['codProduto']; ?>">Skus</a>
              <a class="btn btn-warning btn-sm" href="produto.php?acao=buscar&id=<?php echo $linha['codProduto']; ?>">Editar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
