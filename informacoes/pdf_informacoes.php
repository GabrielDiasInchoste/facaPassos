<?php

require_once '../vendor/autoload.php';
require_once '../config/conexao.php';

$mpdf = new \Mpdf\Mpdf();

if(!isset($_GET['codFornecedor'])){
	$codFornecedor = 0;
	$sql = "SELECT s.codSku, s.sku, s.quantidade,s.valorUnitario,p.nome as produto, f.nome as fornecedor
					 FROM Sku s INNER JOIN produto p
					 ON p.codProduto = s.codProduto
					 INNER JOIN fornecedor f
					 ON f.codFornecedor = s.codFornecedor";
} else{
	$codFornecedor = $_GET['codFornecedor'];
	$sql   = "SELECT s.codSku, s.sku, s.quantidade,s.valorUnitario,p.nome as produto, f.nome as fornecedor
					 FROM Sku s INNER JOIN produto p
					 ON p.codProduto = s.codProduto
					 INNER JOIN fornecedor f
					 ON f.codFornecedor = s.codFornecedor
					 WHERE p.codProduto = ".$codFornecedor;
}
$query = $con->query($sql);
$registros = $query->fetchAll();

$sql2   = "SELECT * FROM Fornecedor WHERE codFornecedor =".$codFornecedor;
$query2 = $con->query($sql2);
$fornecedor = $query2->fetchAll();

ob_start();?>
<style>
table, th, td {
	border: 1px solid black;
	border-collapse: collapse;
	padding: 5px;
}
table tr:nth-child(even) {
	background-color: #ccc;
}
table thead th {
	background-color: #ccc;
}
table tfoot td {
	background-color: #fff;
}
</style>
    <p><b><br>Informacoes do Fornecedor</b></p>
    <?php foreach ($fornecedor as $linha): ?>
    <table >
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
    <table >
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
    <table >
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
    <table >
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

  <p><b><br>Informacoes das Skus</b></p>
    <table >
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
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</div>

<?php
$mpdf->WriteHTML(ob_get_clean());
$mpdf->Output();

?>
