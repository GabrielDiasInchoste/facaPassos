<?php
    if(isset($registro)) $acao = "produto.php?acao=atualizar&id=".$registro['codProduto'];
    else $acao = "produto.php?acao=gravar";
 ?>
<div class="container">
  <form class="" action="<?php echo $acao; ?>" method="post">
    <div class="from-group">
      <label for="nome">Nome</label>
      <input id="nome" class="form-control" type="text" name="nome"
        value="<?php if(isset($registro)) echo $registro['nome']; ?>" required>
    </div>
    <br>
    <button class="btn btn-info" type="submit">Enviar</button>
    <a class="btn btn-danger" onclick="delProduto(<?php echo $registro['codProduto']?>)"> Excluir</a>

  </form>
</div>
