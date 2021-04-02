<?php
    require_once '../config/conexao.php';

    if(!isset($_GET['acao'])) $acao="listar";
    else $acao = $_GET['acao'];

    if($acao=="listar"){
       $sql   = "SELECT * FROM Fornecedor";
       $query = $con->query($sql);
       $registros = $query->fetchAll();

       require_once '../template/cabecario.php';
       require_once 'lista_fornecedor.php';
       require_once '../template/rodape.php';
    }

    else if($acao == "novo"){
      require_once '../template/cabecario.php';
      require_once 'form_fornecedor.php';
      require_once '../template/rodape.php';
    }

    else if($acao == "gravar"){
        $registro = $_POST;

        $sql = "INSERT INTO Fornecedor(nome,email,cnpj,razaoSocial,telefone,rua,numeroRua,complemento,bairro,cidade,estado,pais)
          	VALUES(:nome,:email,:cnpj,:razaoSocial,:telefone,:rua,:numeroRua,:complemento,:bairro,:cidade,:estado,:pais)";
        $query = $con->prepare($sql);
        $result = $query->execute($registro);
        if($result){
            header('Location: ./fornecedor.php');
        }else{
            echo "Erro ao tentar inserir o registro ";
        }
    }

    else if($acao == "excluir"){
        $id    = $_GET['id'];
        $sql   = "DELETE FROM Fornecedor WHERE codFornecedor = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $id);

        $result = $query->execute();
        if($result){
            header('Location: ./fornecedor.php');
        }else{
            echo "Erro ao tentar remover o resgitro de id: " . $id;
        }
    }

    else if($acao == "buscar"){
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM Fornecedor WHERE codFornecedor = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);

        $query->execute();
        $registro = $query->fetch();

        require_once '../template/cabecario.php';
        require_once 'form_fornecedor.php';
        require_once '../template/rodape.php';

    }

    else if($acao == "atualizar"){
        $sql   = "UPDATE Fornecedor SET nome = :nome,email = :email,cnpj = :cnpj,razaoSocial = :razaoSocial,telefone = :telefone,rua = :rua,numeroRua = :numeroRua,complemento = :complemento,
        bairro = :bairro,cidade = :cidade,estado = :estado,pais = :pais WHERE codFornecedor = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $_GET['id']);
        $query->bindParam(':nome', $_POST['nome']);
        $query->bindParam(':email', $_POST['email']);
        $query->bindParam(':cnpj', $_POST['cnpj']);
        $query->bindParam(':razaoSocial', $_POST['razaoSocial']);
        $query->bindParam(':telefone', $_POST['telefone']);
        $query->bindParam(':rua', $_POST['rua']);
        $query->bindParam(':numeroRua', $_POST['numeroRua']);
        $query->bindParam(':complemento', $_POST['complemento']);
        $query->bindParam(':bairro', $_POST['bairro']);
        $query->bindParam(':cidade', $_POST['cidade']);
        $query->bindParam(':estado', $_POST['estado']);
        $query->bindParam(':pais', $_POST['pais']);

        $result = $query->execute();
        if($result){
            header('Location: ./fornecedor.php');
        }else{
            echo "Erro ao tentar atualizar os dados";
        }
    }
?>
