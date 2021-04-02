<div class="container">
  <h3><b>Fornecedores</b></h3>
  <a class="btn btn-info" href="fornecedor.php?acao=novo">Novo</a>
  <a class="btn btn-info" href="pdf_fornecedor.php">Gerar Pdf</a>
  <input type="text" id="filtro" onkeyup="filtroNome()" placeholder="Pesquisar por Nome">

  <?php if (count($registros)==0): ?>
    <p>Nenhum registro encontrado.</p>
  <?php else: ?>
    <table class="table table-hover table-stripped" id="tabela">
      <thead>
          <th>#</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Telefone</th>

      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
            <td><?php echo $linha['codFornecedor']; ?></td>
            <td><?php echo $linha['nome']; ?></td>
            <td><?php echo $linha['email']; ?></td>
            <td><?php echo $linha['telefone']; ?></td>
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
