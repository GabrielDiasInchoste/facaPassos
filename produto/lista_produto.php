<div class="container">
  <h2>Produto</h2>
  <a class="btn btn-info" href="produto.php?acao=novo">Novo</a>
  <a class="btn btn-info" href="pdf_produto.php">Gerar Pdf</a>
  <?php if (count($registros)==0): ?>
    <p>Nenhum registro encontrado.</p>
  <?php else: ?>
    <table class="table table-hover table-stripped">
      <thead>
          <th>#</th>
          <th>Nome</th>
      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
            <td><?php echo $linha['codProduto']; ?></td>
            <td><?php echo $linha['nome']; ?></td>
            <td>
                <a class="btn btn-info btn-sm" href="../sku/sku.php?acao=listar&codProduto=<?php echo $linha['codProduto']; ?>">Skus</a>
                <a class="btn btn-warning btn-sm" href="produto.php?acao=buscar&id=<?php echo $linha['codProduto']; ?>">Editar</a>
                <a class="btn btn-danger btn-sm" href="produto.php?acao=excluir&id=<?php echo $linha['codProduto']; ?>">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
