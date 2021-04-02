<?php
    session_start();
    define('BASE_URL', 'http://gabrieldias.tplinkdns.com:8080/facaPassos');

    if(isset($_GET['acao']) && $_GET['acao']=="sair"){
        unset($_SESSION['logado']);
    }

    if(isset($_POST)){
        require_once './config/conexao.php';
        $sql   = "SELECT * FROM usuario WHERE login = :login AND senha = :senha";
        $query = $con->prepare($sql);
        $query->bindParam('login', $_POST['login']);

        if(isset($_POST['login']) && isset($_POST['senha'])){
          $senha = md5($_POST['senha']);
          $query->bindParam('senha', $senha);
          $query->execute();

          if($query->rowCount()==1){
              $usuario = $query->fetch();
              $_SESSION['logado'] = array("login"=>$usuario['login'], 'codUsuario'=>$usuario['codUsuario']);
              header('Location: produto/produto.php');
          }else{
              $msg = "Usuário ou senha não conferem";
          }
        }
    }
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Login da Aplicação</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/template/mdb.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="./template/signin.css" rel="stylesheet">
  </head>

  <body class="text-center" style="background-color:#343434">

    <img style="margin-bottom: 20px" src="<?php echo BASE_URL; ?>/template/imagens/logo.png" href="<?php echo BASE_URL ?>">

    <div class="card" style="padding-left: 5%;padding-right: 5%;width: max-content;margin-left: auto;margin-right: auto">
        <form action="login.php" method="post" >
          <?php if (isset($msg)) { ?>
            <div class="alert alert-danger" role="alert">
              <?= $msg; ?>
            </div>
          <?php } ?>
          <p class="h4 text-center py-4">Login</p>
          <input name="login" type="text" id="inputLogin" class="form-control" placeholder="Usuario" required>
          <br>
          <input name="senha" type="password" id="inputPassword" class="form-control"  placeholder="Senha" required>
          <div class="text-center py-4 mt-3">
            <button class="btn " style="background-color:#591F0D;color:#ffffff" type="submit">Entrar<iclass="fa fa-paper-plane-o ml-2"></i></button>
          </div>
        </form>
    </div>

  <footer class="font-small darken-3 " style="color:#ffffff">
    <div class="footer-copyright text-center py-3">© 2021 Copyright: Facas Passos
    </div>
  </footer>
</body>

</html>
