<link rel="stylesheet" href="css/main.css">
<a class="btn-back" href="./?page=inicio">voltar para o início</a>

<?php
include 'config.php';

if (@$_POST['botao']) {
    $nome = $_POST['nome'];
    $sexo = $_POST['sexo'];
    $nascimento = $_POST['nascimento'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $outroSexo = $_POST['outroSexo'];

    if ($sexo == 1){
        $sexo = strtoupper("Masculino");
    }
    else if ($sexo == 2){
        $sexo = strtoupper("Feminino");
    }
    else if ($sexo == 3){
        $sexo = strtoupper($outroSexo);
    }
    else if ($sexo == 4){
        $sexo = "N/A";
    }

    $nome = strtoupper($nome);

    if ($nome != '' && $senha != '') {
        $conn = Conectar();

        $sql = "SELECT * FROM pessoa WHERE email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $senha = md5($senha);
            $sql = "INSERT INTO pessoa ( nome, sexo, dataNascimento, email, senha, telefone, cargo, plano ) 
                VALUES ( '$nome' , '$sexo' , '$nascimento' , '$email' , '$senha', '$telefone', 'CLIENTE', 'BÁSICO' );";
            // echo $sql;
            $result = $conn->query($sql);
            setcookie("login", $email, time() + (86400 * 30), "/");
            header('location: ./?page=form_redirect');
        } else {
            echo "<font color='#ff6600'> O email já foi cadastrado!"; //possível fazer estilização do input
        }
    }
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
                            <div class="col-12 mb-2">
                                <label for="nome">Nome completo</label>
                                <input class="letra-maiuscula" type="text" name="nome" value="" onkeydown="return /[a-z ]/i.test(event.key)" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-lg-6 col-md-6 col-sm-12 mb-2">
                                <label class="" for="nascimento">Data de nascimento</label>
                                <input type="date" name="nascimento" value="" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                <label for="sexo">Qual o seu gênero?</label><i title="precisamos saber disso para melhor experiência durante o uso do aplicativo" class="bi bi-question-circle label-icons"></i> <!-- trocar o title por uma div ou popup-->
                                <select class="form-select" id="sexo" name="sexo" onchange="getSexo()" required>
                                    <option selected value="1">Masculino</option>
                                    <option value="2">Feminino</option>
                                    <option value="3">Outro...</option>
                                    <option value="4">Prefiro não dizer</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <input type="hidden" id="outroSexo" name="outroSexo" placeholder="Qual?" maxlength="12" autocomplete="off">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label class="" for="telefone">Telefone</label>
                                <input type="tel" autocomplete="off" id="telefone" class="telefone" name="telefone" minlength="10" maxlength="11" value="" onkeypress="return onlynumber();" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label class="" for="email">E-mail</label>
                                <input type="email" name="email" value="" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-2">
                                <label for="">Senha</label>
                                <div class="submit-line">
                                    <input type="password" id="senha" name="senha" onchange="confereSenha()" onkeyup="validarSenhaForca()" required>
                                    <i id="senhaIcon" class="bi bi-eye-slash-fill submit-lente3" onclick="verSenha()"></i>
                                </div>
                            </div>
                            <label id="labelForca" for="" style="display:none;">Força da senha</label>
                            <div id="erroSenhaForca" class="container"></div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-2">
                                <label class="" for="senha">Confirme a senha</label>
                                <div class="submit-line">
                                    <input type="password" id="confirma" name="confirma" onchange="confereSenha()" onkeyup="validarSenhaForca()" required>
                                    <i id="senhaIcon2" class="bi bi-eye-slash-fill submit-lente3" onclick="verConfirma()"></i>
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