<?php
    if(isset($registro)) $acao = "sku.php?acao=atualizar&id=".$registro['codSku'];
    else $acao = "sku.php?acao=gravar";
 ?>
<div class="container">
  <form class="" action="<?php echo $acao; ?>" method="post">
    <div class="from-group margin">
      <label for="sku">Sku</label>
      <input id="sku" class="form-control" type="text" name="sku"
        value="<?php if(isset($registro)) echo $registro['sku']; ?>" required>
    </div>
    <div class="from-group margin">
      <label for="quantidade">Quantidade</label>
      <input id="quantidade" class="form-control" type="number" name="quantidade"
        value="<?php if(isset($registro)) echo $registro['quantidade']; ?>" required>
    </div>
    <div class="from-group margin">
      <label for="valorUnitario">Valor Unitário</label>
      <input id="valorUnitario" class="form-control" type="number" name="valorUnitario"
        value="<?php if(isset($registro)) echo $registro['valorUnitario']; ?>" required>
    </div>
    <div class="from-group margin">
      <label for="codProduto">Produto</label>
      <select class="form-control margin" name="codProduto" required>
        <option value="">Escolha um item na lista</option>
        <?php foreach ($lista_produto as $item): ?>
          <option value="<?php echo $item['codProduto']; ?>"
            <?php if(isset($registro) && $registro['codProduto']==$item['codProduto']) echo "selected";?>>
            <?php echo $item['nome']; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="from-group margin">
      <label for="codFornecedor">Fornecedor</label>
      <select class="form-control" name="codFornecedor" required>
        <option value="">Escolha um item na lista</option>
        <?php foreach ($lista_fornecedor as $item): ?>
          <option value="<?php echo $item['codFornecedor']; ?>"
            <?php if(isset($registro) && $registro['codFornecedor']==$item['codFornecedor']) echo "selected";?>>
            <?php echo $item['nome']; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <br>
    <button class="btn btn-info" type="submit">Enviar</button>
    <a class="btn btn-danger" href="sku.php?acao=excluir&id=<?php echo $registro['codSku']; ?>">Excluir</a>

  </form>
</div>
