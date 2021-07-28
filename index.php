<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <script>
        function login() {
            var emailUsuario = document.getElementById("emailusuario").value;
            var senhaUsuario = document.getElementById("senhausuario").value;
            var params = "acao=login&emailusuario=" + emailUsuario + "&senhausuario=" + senhaUsuario;

            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                console.log(this.responseText);

                this.responseText;

                if (this.responseText == '1') {
                    setTimeout(function() {
                        location.href = "principal.php";
                    }, 1000);
                    document.getElementById("divresultado").innerHTML = "Acesso autorizado!";
                } else {
                    document.getElementById("divresultado").innerHTML = "Acesso Não autorizado!";
                    
                    setTimeout(function() {
                        document.location.reload(true);
                    }, 1000);
                }
            }
            xhttp.open("POST", "loginControle.php");
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(params);
        }
    </script>
</head>

<body>
    <div class="container">
        <form id='form-login'action="principal.php">
            <div class="card" style="width: 40%; margin: 15% auto 0%">
                <div class="card-header" style="text-align: center;">
                    <h5 class="card-title">Acesso ao Sistema</h5>
                </div>
                <div class="card-body">
                    <input class="form-usuario" type="hidden" id="idusuario" name="idusuario">
                    <input class="form-usuario" type="hidden" name="acao" value="gravar">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">E-mail</label>
                        <input type="text" class="form-control" id="emailusuario" name="emailusuario" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Senha</label>
                        <input type="text" class="form-control" id="senhausuario" name="senhausuario" placeholder="">
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <div style="text-align: right;">
                        <button type="button" class="btn btn-success" onclick="login()">Login</button>
                    </div>
                </div>
            </div>
            <div style="width: 40%; margin: 0% auto; text-align: center;" id="divresultado"></div>
        </form>
    </div>
</body>

</html>