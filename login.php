<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="css/main.css">
<a href="./?page=inicio">voltar</a>

<?php
include "config.php";

if (@$_POST['botao']) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($email != '' && $senha != '') {
        $conn = Conectar();

        $sql = "SELECT * FROM cliente WHERE email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nome = $row['nome'];
                $senhaSistema = $row['senha'];  
            }
            // echo "digitada:" . md5($senha) . " ==>" . $senhaSistema;
            if (md5($senha) == $senhaSistema) {
                setcookie("login", $nome, time() + (86400 * 30), "/");
                echo '<font color="#ff6600">Senha OK ! <meta http-equiv = "refresh" content = "1; url = ./index.php" />';
            } else {
                echo "<font color='#ff6600'>Senha inválida !";
            }
        } else {
            echo "<font color='#ff6600'>Email inválido!";
        }
    } else {
        echo "<font color='#ff6600'>Digite obrigatoriamente usuário e senha para validar!";
    }
}
?>

<div class="container login-box">
    <div class="row container-fluid fundo">
        <div class="col-lg-8 col-md-12 text-center img-login">
            <img src="./imagens/imagem_login.png" class="img-fluid" alt="Imagem_login">
        </div>
        <div class="col-lg-4 col-md-12 escrita align-self-center">
            <div class="row">
                <div class="col-12 mb-4 mt-3">
                    <h2><span class="login-text">Nextcut</span></h2>

                    <div class="inputs text-center mt-4 mb-4">
                        <h2><span class="login-text">Entre com a sua conta!</span></h2>
                        <div class="log">

                            <form method="POST">
                                <div class="row mb-4 mt-4">
                                    <div class="col-12">
                                        <input type="email" name="email" placeholder="E-mail">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="submit-line">
                                            <input type="password" id="senha" name="senha" placeholder="Senha" />
                                            <i id="senhaIcon" class="bi bi-eye-slash-fill submit-lente" onclick="verSenha()"></i>
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <div class="row m-4">
                            <div class="col-12 ">
                                <a class="nav-link text-end" href="#">Esqueceu a senha?</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 ">
                                <input class="main-btn btn-login" type="submit" value="login" name="botao">
                            </div>
                        </div>
                        </form>

                        <div class="row m-4">
                            <div class="col-12 ">
                                <a class="nav-link p-4" href="./?page=cadastro_cliente">Criar conta</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>