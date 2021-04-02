<?php

    require_once '../config/conexao.php';

    if(!isset($_GET['acao'])) $acao="listar";
    else $acao = $_GET['acao'];

    if($acao=="listar"){
       $sql   = "SELECT p.codProduto, p.nome, sum(s.quantidade) as quantidade, (s.quantidade * s.valorUnitario) as valor
                FROM Produto p
                INNER JOIN Sku s
                ON p.codProduto = s.codProduto
                INNER JOIN Fornecedor f
                ON f.codFornecedor = s.codFornecedor GROUP by p.codProduto";
       $query = $con->query($sql);
       $registros = $query->fetchAll();

       $sql2   = "select tabela.codProduto, tabela.codSku, sum(tabela.valor) as valor from
                       (SELECT s.codProduto,
                        s.codSku,s.quantidade * s.valorUnitario as valor
                                   from Sku s inner join Produto p ON p.codProduto = s.codProduto
                                   INNER JOIN Fornecedor f ON f.codFornecedor = s.codFornecedor
                                   GROUP by s.codSku)tabela
                                   group BY tabela.codProduto";
       $query2 = $con->query($sql2);
       $skus = $query2->fetchAll();

       $sql3   = "SELECT p.codProduto, p.nome
                       FROM Produto p
                       where p.codProduto not IN (SELECT s.codProduto from Sku s)";
       $query3 = $con->query($sql3);
       $produtosSemSku = $query3->fetchAll();

       require_once '../template/cabecario.php';
       require_once 'lista_produto.php';
       require_once '../template/rodape.php';
    }

    else if($acao == "novo"){
      require_once '../template/cabecario.php';
      require_once 'form_produto.php';
      require_once '../template/rodape.php';
    }

    else if($acao == "gravar"){
        $registro = $_POST;

        $sql = "INSERT INTO Produto(nome) VALUES(:nome)";
        $query = $con->prepare($sql);
        $result = $query->execute($registro);
        if($result){
            header('Location: ./produto.php');
        }else{
            echo "Erro ao tentar inserir o registro";
        }
    }

    else if($acao == "excluir"){
        $id    = $_GET['id'];
        $sql   = "DELETE FROM Produto WHERE codProduto = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $id);

        $result = $query->execute();
        if($result){
            header('Location: ./produto.php');
        }else{
            echo "Erro ao tentar remover, verificar se nao existe Skus relacionadas resgitro de id: " .$id;
        }
    }

    else if($acao == "buscar"){
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM Produto WHERE codProduto = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);

        $query->execute();
        $registro = $query->fetch();

        require_once '../template/cabecario.php';
        require_once 'form_produto.php';
        require_once '../template/rodape.php';

    }

    else if($acao == "atualizar"){
        $sql   = "UPDATE Produto SET nome = :nome WHERE codProduto = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $_GET['id']);
        $query->bindParam(':nome', $_POST['nome']);
        $result = $query->execute();

        if($result){
            header('Location: ./produto.php');
        }else{
            echo "Erro ao tentar atualizar os dados";
        }
    }
 ?>
