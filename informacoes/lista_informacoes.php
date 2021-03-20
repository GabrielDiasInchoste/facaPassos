<div class="container">
  <?php foreach ($fornecedor as $linha): ?>
      <h2><b><?php echo $linha['nome']; ?></b></h2>
  <?php endforeach; ?>

  <a class="btn btn-info" href="pdf_informacoes.php?codFornecedor=<?php echo $linha['codFornecedor']; ?>">Gerar Pdf</a>
  <?php if (count($fornecedor)==0): ?>
    <p>Nenhum registro encontrado.</p>
  <?php else: ?>
    <p><b><br>Informacoes do Fornecedor</b></p>
    <?php foreach ($fornecedor as $linha): ?>
    <table class="table table-hover table-stripped">
      <thead>
          <th>#</th>
          <th>Nome</th>
          <th>Email</th>
      </thead>
      <tbody>
          <tr>
            <td><?php echo $linha['codFornecedor']; ?></td>
            <td><?php echo $linha['nome']; ?></td>
            <td><?php echo $linha['email']; ?></td>
          </tr>
      </tbody>
    </table>
    <table class="table table-hover table-stripped">
      <thead>
          <th>Cnpj</th>
          <th>RazaoSocial</th>
          <th>Telefone</th>
      </thead>
      <tbody>
          <tr>
            <td><?php echo $linha['cnpj']; ?></td>
            <td><?php echo $linha['razaoSocial']; ?></td>
            <td><?php echo $linha['telefone']; ?></td>
          </tr>
      </tbody>
    </table>
    <table class="table table-hover table-stripped">
      <thead>
          <th>Rua</th>
          <th>NumeroRua</th>
          <th>Complemento</th>
      </thead>
      <tbody>
          <tr>
            <td><?php echo $linha['rua']; ?></td>
            <td><?php echo $linha['numeroRua']; ?></td>
            <td><?php echo $linha['complemento']; ?></td>
          </tr>
      </tbody>
    </table>
    <table class="table table-hover table-stripped">
      <thead>
          <th>Bairro</th>
          <th>Cidade</th>
          <th>Estado</th>
          <th>Pais</th>
      </thead>
      <tbody>
          <tr>
            <td><?php echo $linha['bairro']; ?></td>
            <td><?php echo $linha['cidade']; ?></td>
            <td><?php echo $linha['estado']; ?></td>
            <td><?php echo $linha['pais']; ?></td>
          </tr>
      </tbody>
    </table>
  <?php endforeach; ?>
<?php endif; ?>

  <p><b><br>Informacoes das Skus</b></p>
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
      <?php foreach ($registros as $linha): ?>

      <tbody>
          <tr>
            <td><?php echo $linha['codSku']; ?></td>
            <td><?php echo $linha['sku']; ?></td>
            <td><?php echo $linha['quantidade']; ?></td>
            <td><?php echo $linha['valorUnitario']; ?></td>
            <td><?php echo $linha['produto']; ?></td>
            <td><?php echo $linha['fornecedor']; ?></td>

            <td style="text-align: end">
                <a class="btn btn-warning btn-sm" href="../sku/sku.php?acao=buscar&id=<?php echo $linha['codSku']; ?>">Editar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
