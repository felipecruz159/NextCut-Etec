<link rel="stylesheet" href="css/main.css">
<a class="btn-back" href="./?page=inicio">voltar para o início</a>

<?php
include 'config.php';

if (@$_POST['botao']) {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nomeCompleto = $nome . ' ' . $sobrenome;
    $nascimento = $_POST['nascimento'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmaSenha = $_POST['confirma'];

    if ($nome != '' && $sobrenome != '' && $senha != '') {
        $conn = Conectar();

        $sql = "SELECT * FROM cliente WHERE email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $senha = md5($senha);
            $sql = "INSERT INTO cliente ( nome, telefone, email, senha, nascimento ) 
                VALUES ( '$nomeCompleto' , '$telefone' , '$email' , '$senha' , '$nascimento' )";
            //echo $sql;
            $result = $conn->query($sql);
        } else {
            echo "<font color='#ff6600'> 'O email já foi cadastrado!";
        } 
    }
    header('location: ./?page=form_redirect');
}

?>

<div class="cadastro-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 order-1 col-md-12 align-sel-center">
                <form method="post" class="text-white">

                    <h1>Falta pouco para marcar seu corte!</h1>
                    <div class="cadastro mt-4">
                        <div class="row">
                            <h3 class="text-left">Dados pessoais</h3>
                            <hr>
                            <div class="col-md-6 col-sm-6 mb-2">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome"  required>
                            </div>
                            <div class="col-md-6 col-sm-6 mb-2">
                                <label  for="sobrenome">Sobrenome</label>
                                <input type="text" name="sobrenome"  required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label class="" for="nascimento">Data de nascimento</label>
                                <input type="date" name="nascimento" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label class="" for="telefone">Telefone</label>
                                <input type="tel" autocomplete="off" id="telefone" class="telefone" name="telefone" minlength="11" maxlength="11" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label class="" for="email">E-mail</label>
                                <input type="email" name="email" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-2">
                                <label for="">Senha</label>
                                <div class="submit-line">
                                    <input type="password" id="senha" name="senha" onchange="confereSenha()" onkeyup="validarSenhaForca()" required>
                                    <i id="senhaIcon" class="bi bi-eye-slash-fill submit-lente2" onclick="verSenha()"></i>
                                </div>
                            </div>
                            <label id="labelForca" for="" style="display:none;">Força da senha</label>
                            <div id="erroSenhaForca" class="container"></div> 
                        </div>
                        
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label class="" for="senha">Confirme a Senha</label>
                                <div class="submit-line">
                                    <input type="password" id="confirma" name="confirma" onchange="confereSenha()" required>
                                    <i id="senhaIcon2" class="bi bi-eye-slash-fill submit-lente2" onclick="verConfirma()"></i>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12 mt-2 ">
                            <input type="checkbox" id="termos" name="termos"> Ao continuar, eu concordo que a NextCut ou seus representantes podem entrar em contato comigo por e-mail, telefone, SMS (inclusive por meios automatizados) ou WhatsApp, no endereço de e-mail ou número que eu fornecer, para fins de marketing e suporte.</input>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center p-1">
                            <input type="submit" class="cadastro-btn" value="cadastre-se" name="botao" onclick="checkbox()">
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 order-lg-1 col-md-12 text-center">
                <img src="./imagens/Form_cliente.png" class="img-fluid" alt="Imagem_form_clientes">
            </div>
        </div>
    </div>
</div>