<link rel="stylesheet" href="css/main.css">

<a  class="btn-back"href="./?page=inicio">voltar</a>

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

                $invalido_senha = "<font color='#ff6600'>Senha inválida !";
            }
        } else {

            $invalido_email = "<font color='#ff6600'>Email inválido!";
        }
    } else {
        $invalido = "<font color='#ff6600'>Digite obrigatoriamente E-mail e senha para validar!";
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

                        <?php echo @$invalido; ?>
                        <?php echo @$invalido_email; ?>
                        <form method="POST">
                            <div class="log">
                                <div class="row mb-4 mt-4 text-center">
                                    <div class="col-12">
                                        <input type="email" name="email" placeholder="E-mail">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <?php echo @$invalido_senha; ?>
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
                                    <div class="col-12">
                                        <input class="btn-login" type="submit" value="login" name="botao">
                                    </div>
                                </div>
                        </form>

                        <div class="row m-4">
                            <div class="col-12 text-center">
                                <a class="nav-link p-4" href="./?page=cadastro_cliente">Criar conta</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>