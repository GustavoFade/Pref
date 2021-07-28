<?php require "cabecalho.php"; ?>




<div class="jumbotron" style="text-align: center">
  <h3>Bem-vindo ao Sistema - <?php echo $_SESSION['usuario']['nomeusuario']; ?></h3>
</div>


<div class="row align-items-md-stretch">
  <div class="col-md-6">
    <div class="h-100 p-5 bg-light border rounded-3">
      <h4>Entrada</h4>
      <p>Serviços à fazer</p>
      <button class="btn btn-outline-secondary" type="button">Acessar Serviços</button>
    </div>
  </div>
  <div class="col-md-6">
    <div class="h-100 p-5 bg-light border rounded-3">
      <h4>Saida</h4>
      <p>Serviços feitos</p>
      <button class="btn btn-outline-secondary" type="button">Acessar Serviços</button>
    </div>
  </div>
</div>