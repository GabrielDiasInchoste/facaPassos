<?php

require_once '../vendor/autoload.php';
require_once '../config/conexao.php';

$mpdf = new \Mpdf\Mpdf();

if(isset($_GET['codProduto'])){
	$codProduto = $_GET['codProduto'];
	$sql   = "SELECT s.codSku, s.sku, s.quantidade,s.valorUnitario,p.nome as produto, f.nome as fornecedor
						 FROM Sku s INNER JOIN produto p
						 ON p.codProduto = s.codProduto
						 INNER JOIN fornecedor f
						 ON f.codFornecedor = s.codFornecedor
						 WHERE p.codProduto = ".$codProduto;
}else if(isset($_GET['codFornecedor'])){
$codFornecedor = $_GET['codFornecedor'];
$sql   = "SELECT s.codSku, s.sku, s.quantidade,s.valorUnitario,p.nome as produto, f.nome as fornecedor
					 FROM Sku s INNER JOIN produto p
					 ON p.codProduto = s.codProduto
					 INNER JOIN fornecedor f
					 ON f.codFornecedor = s.codFornecedor
					 WHERE p.codProduto = ".$codFornecedor;
} else{
 $codProduto = 0;
 $sql = "SELECT s.codSku, s.sku, s.quantidade,s.valorUnitario,p.nome as produto, f.nome as fornecedor
					 FROM Sku s INNER JOIN produto p
					 ON p.codProduto = s.codProduto
					 INNER JOIN fornecedor f
					 ON f.codFornecedor = s.codFornecedor";
};

$query = $con->query($sql);
$registros = $query->fetchAll();

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
<h1 align="center">Relatorio Sku</h1>
<?php if (count($registros)==0): ?>
	<p>Nenhum registro encontrado.</p>
<?php else: ?>
	<table align="center">
		<thead>
			<tr>
				<th>#</th>
				<th>Sku</th>
				<th>Quantidade</th>
				<th>ValorUnitario</th>
				<th>Produto</th>
				<th>Fornecedor</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($registros as $linha): ?>
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
		<tr>
			<td colspan="6" align="center"> © 2020 Copyright:
				<p> Gabriel Dias - 175787@upf.br </p>
			</td>
		</tr>
	</table>
<?php endif;

$mpdf->WriteHTML(ob_get_clean());
$mpdf->Output();

?>
