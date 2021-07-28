<?php 
  session_start();
  if(empty($_SESSION['usuario']['idusuario'])){
    header("Location: index.php");
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Projeto CPD</title>

  
    <!-- Bootstrap core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="navbar-top.css" rel="stylesheet">
  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <div class="container-fluid">     
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        
        <li class="nav-item">
          <a class="nav-link" href="principal.php">Página Inícial</a>
        </li>  
        <li class="nav-item">
          <a class="nav-link" href="usuario.php">Usuários</a>
        </li>       

        <li class="nav-item">
          <a class="nav-link" href="historico.php">Históricos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="relatorios.php">Relatórios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sair.php">Sair do Sistema</a>
        </li>
      </ul>      
    </div>
  </div>
</nav>
<main class="container">