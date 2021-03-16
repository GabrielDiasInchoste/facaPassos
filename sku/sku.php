<?php
    require_once '../config/conexao.php';

    if(!isset($_GET['acao'])) $acao="listar";
    else $acao = $_GET['acao'];
    /**
    * Ação de listar
    */
    if($acao=="listar"){
      if(!isset($_GET['codProduto'])){
        $codProduto = 0;
        $sql = "SELECT s.codSku, s.sku, s.quantidade,s.valorUnitario,p.nome as produto, f.nome as fornecedor
                 FROM Sku s INNER JOIN produto p
                 ON p.codProduto = s.codProduto
                 INNER JOIN fornecedor f
                 ON f.codFornecedor = s.codFornecedor";
      }else{
        $codProduto = $_GET['codProduto'];

/** AKI PODE DAR PROBLEMA*/

        $sql   = "SELECT s.codSku, s.sku, s.quantidade,s.valorUnitario,p.nome as produto, f.nome as fornecedor
                 FROM Sku s INNER JOIN produto p
                 ON p.codProduto = s.codProduto
                 INNER JOIN fornecedor f
                 ON f.codFornecedor = s.codFornecedor
                 WHERE p.codProduto = ".$codProduto;
    }
    $query = $con->query($sql);

    $registros = $query->fetchAll();

    require_once '../template/cabecario.php';
    require_once 'lista_sku.php';
    require_once '../template/rodape.php';
  }
    /**
    * Ação Novo
    **/
    else if($acao == "novo"){
      $lista_produto = getProdutos();
      $lista_fornecedor = getFornecedor();

      require_once '../template/cabecario.php';
      require_once 'form_sku.php';
      require_once '../template/rodape.php';
    }
    /**
    * Ação Gravar
    **/
    else if($acao == "gravar"){
        $registro = $_POST;
        print_r($registro);
        // var_dump($registro);
        $sql = "INSERT INTO Sku(sku,quantidade,valorUnitario,codProduto,codFornecedor) VALUES(:sku,:quantidade,:valorUnitario,:codProduto,:codFornecedor)";
        $query = $con->prepare($sql);
        $result = $query->execute($registro);
        if($result){
            header('Location: ./sku.php');
        }else{
            echo "Erro ao tentar inserir o registro, msg: " . print_r($query->errorInfo());
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "excluir"){
        $id    = $_GET['id'];
        $sql   = "DELETE FROM sku WHERE codSku = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $id);

        $result = $query->execute();
        if($result){
            header('Location: ./sku.php');
        }else{
            echo "Erro ao tentar remover o resgitro de id: " . $id;
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "buscar"){
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM Sku WHERE codSku = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);

        $query->execute();
        $registro = $query->fetch();

        // var_dump($registro); exit;
        $lista_produto = getProdutos();
        $lista_fornecedor = getFornecedor();

        require_once '../template/cabecario.php';
        require_once 'form_sku.php';
        require_once '../template/rodape.php';

    }
    /**
    * Ação Atualizar
    **/
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
