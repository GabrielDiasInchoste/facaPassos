<div class="container">
  <h2><b>Fornecedores</b></h2>
  <a class="btn btn-info" href="fornecedor.php?acao=novo">Novo</a>
  <a class="btn btn-info" href="pdf_fornecedor.php">Gerar Pdf</a>
  <?php if (count($registros)==0): ?>
    <p>Nenhum registro encontrado.</p>
  <?php else: ?>
    <table class="table table-hover table-stripped">
      <thead>
          <th>#</th>
          <th>Nome</th>
          <th>Email</th>
          <!-- <th>Cnpj</th> -->
          <!-- <th>RazaoSocial</th> -->
          <th>Telefone</th>
          <!-- <th>Rua</th> -->
          <!-- <th>NumeroRua</th> -->
          <!-- <th>Complemento</th> -->
          <!-- <th>Bairro</th> -->
          <!-- <th>Cidade</th> -->
          <!-- <th>Estado</th> -->
          <!-- <th>Pais</th> -->
      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
            <td><?php echo $linha['codFornecedor']; ?></td>
            <td><?php echo $linha['nome']; ?></td>
            <td><?php echo $linha['email']; ?></td>
            <!-- <td><?php echo $linha['cnpj']; ?></td> -->
            <!-- <td><?php echo $linha['razaoSocial']; ?></td> -->
            <td><?php echo $linha['telefone']; ?></td>
            <!-- <td><?php echo $linha['rua']; ?></td> -->
            <!-- <td><?php echo $linha['numeroRua']; ?></td> -->
            <!-- <td><?php echo $linha['complemento']; ?></td> -->
            <!-- <td><?php echo $linha['bairro']; ?></td> -->
            <!-- <td><?php echo $linha['cidade']; ?></td> -->
            <!-- <td><?php echo $linha['estado']; ?></td> -->
            <!-- <td><?php echo $linha['pais']; ?></td> -->
            <td style="text-align: end">
                <a class="btn btn-info btn-sm" href="../informacoes/informacoes.php?acao=listar&codFornecedor=<?php echo $linha['codFornecedor']; ?>">Informacoes</a>
                <a class="btn btn-warning btn-sm" href="fornecedor.php?acao=buscar&id=<?php echo $linha['codFornecedor']; ?>">Editar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
