<?php

require_once '../vendor/autoload.php';
require_once '../config/conexao.php';

$mpdf = new \Mpdf\Mpdf();

$sql   = "SELECT * FROM Fornecedor";
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
<h1 align="center">Relatorio Fornecedor </h1>
<?php if (count($registros)==0): ?>
	<p>Nenhum registro encontrado.</p>
<?php else: ?>
	<table align="center">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Email</th>
				<th>Cnpj</th>
				<th>RazaoSocial</th>
				<th>Telefone</th>
				<th>Rua</th>
				<th>NumeroRua</th>
				<th>Complemento</th>
				<th>Bairro</th>
				<th>Cidade</th>
				<th>Estado</th>
				<th>Pais</th>
			</tr>
		</thead>
		<tfoot>
			<tbody>
				<?php foreach ($registros as $linha): ?>
					<tr>
						<td><?php echo $linha['codFornecedor']; ?></td>
            <td><?php echo $linha['nome']; ?></td>
            <td><?php echo $linha['email']; ?></td>
            <td><?php echo $linha['cnpj']; ?></td>
            <td><?php echo $linha['razaoSocial']; ?></td>
            <td><?php echo $linha['telefone']; ?></td>
            <td><?php echo $linha['rua']; ?></td>
            <td><?php echo $linha['numeroRua']; ?></td>
            <td><?php echo $linha['complemento']; ?></td>
            <td><?php echo $linha['bairro']; ?></td>
            <td><?php echo $linha['cidade']; ?></td>
            <td><?php echo $linha['estado']; ?></td>
            <td><?php echo $linha['pais']; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
			<tr>
				<td colspan="3" align="center"> © 2021 Copyright:
					<p> Faca Passos </p>
				</td>
			</tr>
		</table>
	<?php endif;

	$mpdf->WriteHTML(ob_get_clean());
	$mpdf->Output();

	?>
