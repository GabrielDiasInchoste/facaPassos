<?php
    require_once '../config/conexao.php';

    if(!isset($_GET['acao'])) $acao="listar";
    else $acao = $_GET['acao'];

    if($acao=="listar"){
      if(isset($_GET['codProduto'])){
        $codProduto = $_GET['codProduto'];
        $sql   = "SELECT s.codSku, s.sku, s.quantidade,s.valorUnitario,p.nome as produto, f.nome as fornecedor
                   FROM Sku s INNER JOIN Produto p
                   ON p.codProduto = s.codProduto
                   INNER JOIN Fornecedor f
                   ON f.codFornecedor = s.codFornecedor
                   WHERE p.codProduto = ".$codProduto;
    }else if(isset($_GET['codFornecedor'])){
      $codFornecedor = $_GET['codFornecedor'];
      $sql   = "SELECT s.codSku, s.sku, s.quantidade,s.valorUnitario,p.nome as produto, f.nome as fornecedor
                 FROM Sku s INNER JOIN Produto p
                 ON p.codProduto = s.codProduto
                 INNER JOIN Fornecedor f
                 ON f.codFornecedor = s.codFornecedor
                 WHERE p.codProduto = ".$codFornecedor;
    } else{
       $codProduto = 0;
       $sql = "SELECT s.codSku, s.sku, s.quantidade,s.valorUnitario,p.nome as produto, f.nome as fornecedor
                 FROM Sku s INNER JOIN Produto p
                 ON p.codProduto = s.codProduto
                 INNER JOIN fornecedor f
                 ON f.codFornecedor = s.codFornecedor";
    };
    $query = $con->query($sql);
    $registros = $query->fetchAll();

    require_once '../template/cabecario.php';
    require_once 'lista_sku.php';
    require_once '../template/rodape.php';
  }

    else if($acao == "novo"){
      $lista_produto = getProdutos();
      $lista_fornecedor = getFornecedor();

      require_once '../template/cabecario.php';
      require_once 'form_sku.php';
      require_once '../template/rodape.php';
    }

    else if($acao == "gravar"){
        $registro = $_POST;
        print_r($registro);
        $sql = "INSERT INTO Sku(sku,quantidade,valorUnitario,codProduto,codFornecedor) VALUES(:sku,:quantidade,:valorUnitario,:codProduto,:codFornecedor)";
        $query = $con->prepare($sql);
        $result = $query->execute($registro);
        if($result){
            header('Location: ./sku.php');
        }else{
            echo "Erro ao tentar inserir o registro, msg: " . print_r($query->errorInfo());
        }
    }

    else if($acao == "excluir"){
        $id    = $_GET['id'];
        $sql   = "DELETE FROM Sku WHERE codSku = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $id);

        $result = $query->execute();
        if($result){
            header('Location: ./sku.php');
        }else{
            echo "Erro ao tentar remover o resgitro de id: " . $id;
        }
    }

    else if($acao == "buscar"){
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM Sku WHERE codSku = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);

        $query->execute();
        $registro = $query->fetch();

        $lista_produto = getProdutos();
        $lista_fornecedor = getFornecedor();

        require_once '../template/cabecario.php';
        require_once 'form_sku.php';
        require_once '../template/rodape.php';

    }

    else if($acao == "atualizar"){
        $sql   = "UPDATE Sku SET sku = :sku,quantidade = :quantidade,valorUnitario = :valorUnitario, codProduto = :codProduto, codFornecedor = :codFornecedor WHERE codSku = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $_GET['id']);
        $query->bindParam(':sku', $_POST['sku']);
        $query->bindParam(':quantidade', $_POST['quantidade']);
        $query->bindParam(':valorUnitario', $_POST['valorUnitario']);
        $query->bindParam(':codProduto', $_POST['codProduto']);
        $query->bindParam(':codFornecedor', $_POST['codFornecedor']);
        $result = $query->execute();

        if($result){
            header('Location: ./sku.php');
        }else{
            echo "Erro ao tentar inserir o registro, msg: " . print_r($query->errorInfo());
        }
    }

    function getProdutos(){
        $sql   = "SELECT * FROM Produto";
        $query = $GLOBALS['con']->query($sql);
        $lista_produto = $query->fetchAll();
        return $lista_produto;
    }
    function getFornecedor(){
        $sql   = "SELECT * FROM Fornecedor";
        $query = $GLOBALS['con']->query($sql);
        $lista_fornecedor = $query->fetchAll();
        return $lista_fornecedor;
    }
 ?>
