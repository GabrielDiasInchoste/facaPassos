<?php
if(isset($registro)) $acao = "fornecedor.php?acao=atualizar&id=".$registro['codFornecedor'];
else $acao = "fornecedor.php?acao=gravar";
?>
<div class="container">
  <form class="" action="<?php echo $acao; ?>" method="post">
    <div class="from-group">
      <label for="nome">Nome</label>
      <input id="nome" class="form-control" type="text" name="nome"
      value="<?php if(isset($registro)) echo $registro['nome']; ?>" required>
    </div>
    <div class="from-group">
      <label for="email">Email</label>
      <input id="email" class="form-control" type="email" name="email"
      value="<?php if(isset($registro)) echo $registro['email']; ?>" required>
    </div>
    <div class="from-group">
      <label for="cnpj">Cnpj</label>
      <input id="cnpj" class="form-control" type="text" name="cnpj"
      value="<?php if(isset($registro)) echo $registro['cnpj']; ?>" required>
    </div>
    <div class="from-group">
      <label for="razaoSocial">RazaoSocial</label>
      <input id="razaoSocial" class="form-control" type="text" name="razaoSocial"
      value="<?php if(isset($registro)) echo $registro['razaoSocial']; ?>" required>
    </div>
    <div class="from-group">
      <label for="telefone">Telefone</label>
      <input id="telefone" class="form-control" type="number" name="telefone"
      value="<?php if(isset($registro)) echo $registro['telefone']; ?>" required>
    </div>
    <div class="from-group">
      <label for="rua">Rua</label>
      <input id="rua" class="form-control" type="text" name="rua"
      value="<?php if(isset($registro)) echo $registro['rua']; ?>" required>
    </div>
    <div class="from-group">
      <label for="numeroRua">NumeroRua</label>
      <input id="numeroRua" class="form-control" type="number" name="numeroRua"
      value="<?php if(isset($registro)) echo $registro['numeroRua']; ?>" required>
    </div>
    <div class="from-group">
      <label for="complemento">Complemento</label>
      <input id="complemento" class="form-control" type="text" name="complemento"
      value="<?php if(isset($registro)) echo $registro['complemento']; ?>" required>
    </div>
    <div class="from-group">
      <label for="bairro">Bairro</label>
      <input id="bairro" class="form-control" type="text" name="bairro"
      value="<?php if(isset($registro)) echo $registro['bairro']; ?>" required>
    </div>
    <div class="from-group">
      <label for="cidade">Cidade</label>
      <input id="cidade" class="form-control" type="text" name="cidade"
      value="<?php if(isset($registro)) echo $registro['cidade']; ?>" required>
    </div>
    <div class="from-group">
      <label for="estado">Estado</label>
      <input id="estado" class="form-control" type="text" name="estado" maxlength="2"
      value="<?php if(isset($registro)) echo $registro['estado']; ?>" required>
    </div>
    <div class="from-group">
      <label for="pais">Pais</label>
      <input id="pais" class="form-control" type="text" name="pais"
      value="<?php if(isset($registro)) echo $registro['pais']; ?>" required>
    </div>
    <br>
    <button class="btn btn-info" type="submit">Salvar</button>
    <a class="btn btn-danger" onclick="delFornecedor(<?php echo $registro['codFornecedor']?>)"> Excluir</a>

  </form>
</div>
