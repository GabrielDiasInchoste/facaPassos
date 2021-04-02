<?php
    require_once '../config/conexao.php';

    if(!isset($_GET['acao'])) $acao="listar";
    else $acao = $_GET['acao'];
    if($acao=="listar"){

    if(!isset($_GET['codFornecedor'])){
      $codFornecedor = 0;
      $sql = "SELECT s.codSku, s.sku, s.quantidade,s.valorUnitario,p.nome as produto, f.nome as fornecedor
               FROM Sku s INNER JOIN Produto p
               ON p.codProduto = s.codProduto
               INNER JOIN Fornecedor f
               ON f.codFornecedor = s.codFornecedor";
    } else{
      $codFornecedor = $_GET['codFornecedor'];
      $sql   = "SELECT s.codSku, s.sku, s.quantidade,s.valorUnitario,p.nome as produto, f.nome as fornecedor
               FROM Sku s INNER JOIN Produto p
               ON p.codProduto = s.codProduto
               INNER JOIN Fornecedor f
               ON f.codFornecedor = s.codFornecedor
               WHERE s.codFornecedor = ".$codFornecedor;
  }
    $query = $con->query($sql);
    $registros = $query->fetchAll();

    $sql2   = "SELECT * FROM Fornecedor WHERE codFornecedor =".$codFornecedor;
    $query2 = $con->query($sql2);
    $fornecedor = $query2->fetchAll();

    require_once '../template/cabecario.php';
    require_once 'lista_informacoes.php';
    require_once '../template/rodape.php';
  }
 ?>
