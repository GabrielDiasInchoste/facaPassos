
<?php
    if(isset($registro)) $acao = "produto.php?acao=atualizar&id=".$registro['codProduto'];
    else $acao = "produto.php?acao=gravar";
 ?>
<div class="container">
  <h3><b>Materiais Com Sku</b></h3>
  <a class="btn btn-info" href="produto.php?acao=novo">Novo</a>
  <a class="btn btn-info" href="pdf_produto.php">Gerar Pdf</a>
  <input type="text"  id="filtro" onkeyup="filtroNome()" placeholder="Pesquisar por Nome">

  <?php if (count($registros)==0): ?>
    <p>Nenhum registro encontrado.</p>
  <?php else: ?>
    <table class="table table-hover table-stripped" id="tabela">
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

  <h3><b>Materiais Sem Sku</b></h3>
  <?php if (count($produtosSemSku)==0): ?>
    <p>Nenhum registro encontrado.</p>
  <?php else: ?>
    <table class="table table-hover table-stripped" id="tabela">
      <thead>
        <th>#</th>
        <th>Nome</th>
      </thead>
      <tbody>
        <?php foreach ($produtosSemSku as $linha): ?>
          <tr>
            <td><?php echo $linha['codProduto']; ?></td>
            <td><?php echo $linha['nome']; ?></td>
            <td style="text-align: end">
              <a class="btn btn-warning btn-sm" href="produto.php?acao=buscar&id=<?php echo $linha['codProduto']; ?>">Editar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
