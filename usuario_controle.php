<?php

$idUsuario = empty($_REQUEST['idusuario']) ? '' : $_REQUEST['idusuario'];
$nomeUsuario = empty($_REQUEST['nomeusuario']) ? '' : $_REQUEST['nomeusuario'];
$emailUsuario = empty($_REQUEST['emailusuario']) ? '' : $_REQUEST['emailusuario'];
$senhaUsuario = empty($_REQUEST['senhausuario']) ? '' : $_REQUEST['senhausuario'];

$acao = $_REQUEST['acao'];
require "Conexao.php";

switch ($acao) {
    case "listar":
        $sql = "SELECT * FROM usuario where ativo =1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            echo "<table class='table table-striped table-hover table-bordered table-sm'>
                    <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Senha</th>
                    
                    <th colspan=2>Opções</th>        
                    </tr>";
            while ($row = $result->fetch_assoc()) {                
                echo "<tr>";
                echo "<td>" . $row['idusuario'] . "</td>";
                echo "<td>" . $row['nomeusuario'] . "</td>";
                echo "<td>" . $row['emailusuario'] . "</td>";
                echo "<td>" . $row['senhausuario'] . "</td>";               
                
                $idUsuario = $row['idusuario']; ?>
                <td style="text-align: center;">
                    <button class="btn btn-primary" onclick="cadastrarUsuario('<?php echo $idUsuario ?>')">A</button>
                </td>
                <td style="text-align: center;">
                    <button class="btn btn-danger" onclick="excluirUsuario('<?php echo $idUsuario ?>')">X</button>
                </td>
        <?php
                echo "</tr>";
            }
        } else {
            echo "<h1 style='text-align: center'>Não há registros no banco de dados!</h1>";
        }

        echo "</table>";

        break;
    case "cadastrar":
        ?>




        <?php
        if ($idUsuario > 0) {
            $sql = "select * from usuario where idusuario=" . $idUsuario;
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $idUsuario = $row["idusuario"];
                $nomeUsuario = $row['nomeusuario'];
                $emailUsuario = $row["emailusuario"];
                $senhaUsuario = $row["senhausuario"];
            }
        }
        ?>

        <div class="card" style="width: 40%;margin: 0 auto">
            <div class="card-header" style="text-align: center;">
                <h5 class="card-title">Cadastro de Usuários</h5>
            </div>
            <div class="card-body">
                <form>
                    <input class="form-usuario" type="hidden" id="idusuario" name="idusuario" value="<?php echo $idUsuario ?>">
                    <input class="form-usuario" type="hidden" name="acao" value="gravar">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" id="nomeusuario" name="nomeusuario" placeholder="" value="<?php echo $nomeUsuario ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">E-mail</label>
                        <input type="text" class="form-control" id="emailusuario" name="emailusuario" placeholder="" value="<?php echo $emailUsuario ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Senha</label>
                        <input type="text" class="form-control" id="senhausuario" name="senhausuario" placeholder="" value="<?php echo $senhaUsuario ?>">
                    </div>
                </form>
            </div>
            <div class="card-footer text-muted">
                <div style="text-align: right;">
                    <button type="button" class="btn btn-success" onclick="salvarFormulario()">Salvar</button>
                </div>
            </div>
        </div>




        <?php

        break;
    case "excluir":
        if ($idUsuario > 0) {
            $sql = "UPDATE usuario SET ativo = 0 WHERE idusuario = '$idUsuario'";
            $conn->query($sql);
        ?>
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
            </svg>
            <div class="alert alert-success d-flex align-items-center" role="alert" style="width: 40%;margin: 0 auto">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    Registro Excluido com Sucesso!
                </div>
            </div>
        <?php
        }
        break;
    case "gravar":

        //echo "<pre>"; print_r($_REQUEST);

        if ($idUsuario > 0) {
            $sql = "UPDATE usuario SET nomeusuario = '$nomeUsuario', emailusuario = '$emailUsuario', senhausuario = '$senhaUsuario' WHERE idusuario = '$idUsuario'";
            $conn->query($sql);

        ?>
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
            </svg>
            <div class="alert alert-success d-flex align-items-center" role="alert" style="width: 40%;margin: 0 auto">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    Registro Alterado com Sucesso!
                </div>
            </div>
        <?php

        } else {
            $sql = "INSERT INTO usuario (nomeusuario, emailusuario, senhausuario, nivelacesso) VALUES ('$nomeUsuario', '$emailUsuario', '$senhaUsuario', '3')";
            $conn->query($sql);

            echo "<h1 style='text-align: center'></h1>";
        ?>
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
            </svg>
            <div class="alert alert-success d-flex align-items-center" role="alert" style="width: 40%;margin: 0 auto">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    Registro Inserido com Sucesso!
                </div>
            </div>
<?php
        }
        break;
    default:
        echo "Nenhuma ação executada";
}
