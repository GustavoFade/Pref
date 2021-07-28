<?php require "cabecalho.php"; ?>

<h3 style="text-align: center;">Gerenciamento de Usuários</h3>
<div style="text-align: center;">
<hr>
<button class="btn btn-primary" onclick="cadastrarUsuario('')">Cadastrar Usuário</button>
<button  class="btn btn-primary" onclick="listarUsuario()">Listar Usuários</button>

</div>
<hr>
<div id="divFormularioUsuarios"></div>
<div id="divListaUsuarios"></div>

<script src="usuario.js"></script>
</body>
</html>