function listarUsuario() {  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("divListaUsuarios").innerHTML = this.responseText;
        document.getElementById("divFormularioUsuarios").innerHTML = "";
      }
    };
    xmlhttp.open("GET","usuario_controle.php?acao=listar",true);
    xmlhttp.send();  
}


function cadastrarUsuario(idUsuario) {  
    
  console.log(typeof(idUsuario));
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {      
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("divFormularioUsuarios").innerHTML = this.responseText;
        document.getElementById("divListaUsuarios").innerHTML = "";
      }
    };
    xmlhttp.open("GET","usuario_controle.php?acao=cadastrar&idusuario=" + idUsuario,true);
    xmlhttp.send();
  
}

function salvarFormulario(){
  var idUsuario = document.getElementById("idusuario").value;
  var nomeUsuario = document.getElementById("nomeusuario").value;
  var emailUsuario = document.getElementById("emailusuario").value;
  var senhaUsuario = document.getElementById("senhausuario").value;

  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    console.log(this.responseText);
    document.getElementById("divFormularioUsuarios").innerHTML = this.responseText;
    setTimeout(function(){ 
      listarUsuario()
    }, 1000);
  }
  xhttp.open("POST", "usuario_controle.php");
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  var params = "acao=gravar&idusuario=" + idUsuario + "&nomeusuario=" + nomeUsuario + "&emailusuario=" + emailUsuario + "&senhausuario=" + senhaUsuario
  console.log();
  xhttp.send(params);
}


function excluirUsuario(idUsuario){
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {      
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("divListaUsuarios").innerHTML = "";
        document.getElementById("divFormularioUsuarios").innerHTML = this.responseText;        
        setTimeout(function(){ 
          listarUsuario()
        }, 1000);
      }
    };
    xmlhttp.open("GET","usuario_controle.php?acao=excluir&idusuario=" + idUsuario, true);
    xmlhttp.send();
}