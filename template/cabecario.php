<?php
    session_start();
    define('BASE_URL', 'http://gabrieldias.tplinkdns.com:8080/facaPassos');
    //Finaliza a sessão logado da Aplicação
    if(isset($_GET['acao']) && $_GET['acao']=="sair"){
        unset($_SESSION['logado']);
    }
    if(!isset($_SESSION['logado'])){
      header('Location: http://gabrieldias.tplinkdns.com:8080/facaPassos/login.php');
      exit();
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

    <title>Facas Passos</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="<?= BASE_URL; ?>/template/album.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/template/mdb.min.css">
  </head>

  <body>

    <header style="background-color:#343434">
      <div class="collapse darken-3" id="navbarHeader" >
        <div class="container" style="text-align: end">
            <div class="py-4">
              <h4 class="text-white">Menu</h4>
              <ul class="list-unstyled">
                <li><a href="<?= BASE_URL; ?>/produto/produto.php" class="text-white">Materiais</a></li>
                <li><a href="<?= BASE_URL; ?>/fornecedor/fornecedor.php" class="text-white">Fornecedores</a></li>
                <li><a href="<?= BASE_URL; ?>/sku/sku.php" class="text-white">Skus</a></li>
                <li><a href="<?= BASE_URL; ?>/index.php?acao=sair" class="text-white">Sair</a></li>
              </ul>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark darken-3 box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="<?php echo BASE_URL; ?>/produto/produto.php" class="navbar-brand d-flex align-items-center">
              <img src="<?php echo BASE_URL; ?>/template/imagens/logo.png" href="<?php echo BASE_URL ?>">
            </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <main role="main">
