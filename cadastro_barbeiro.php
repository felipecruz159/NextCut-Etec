<link rel="stylesheet" href="css/main.css">
<style>
    body {
        background-image: url("./imagens/fundo_barbeiro.png");
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<a class="btn-back" href="./?page=inicio">voltar para o início</a>

<?php
include 'config.php';

if (@$_POST['botao']) {
    $nome = $_POST['nome'];
    $nascimento = $_POST['nascimento'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];

    $cnpj = $_POST['cnpj'];
    $razaoSocial = $_POST['razao'];
    $nomeFantasia = $_POST['fantasia'];
    $emailBarbearia = $_POST['email2'];
    $telefoneBarbearia = $_POST['celular'];

    $cep = $_POST['cep'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];

    $plano = '';

    $senha = $_POST['senha'];
    $confirmaSenha = $_POST['confirma'];

    if ($nome != '' && $email != '' && $senha != '') {
        $conn = Conectar();

        //E CLIENTE (com join)!!!!!
        $sql = "SELECT * FROM cabeleireiro WHERE email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $senha = md5($senha);
            $sql = "INSERT INTO cabeleireiro ( nome, nascimento, telefone, cpf, email ) 
                VALUES ( '$nome' , '$nascimento' , '$telefone' , '$cpf' , '$email' )";
            //echo $sql;
            $result = $conn->query($sql);
        } else {
            echo "<font color='#ff6600'> 'O email já foi cadastrado!";
        }
    }

    header('location: ./?page=form_redirect');
}

?>

<form id="formulario">
    <ul id="progress">
        <li class="ativo"></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>

    <fieldset>
        <h2>Dados do Responsável</h2>
        <div class="row">
            <div class="col-12 mb-4">
                <label for="nome">Nome Completo</label>
                <input type="text" class="letra-maiuscula" name="nome" required>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <label class="" for="nascimento">Data de nascimento</label>
                <input type="date" name="nascimento" required>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <label class="" for="telefone">Telefone <small class="text-muted">— apenas números</small></label>
                <input type="tel" autocomplete="off" class="telefone" id="telefone" name="telefone" maxlength="11" onkeypress="return onlynumber();" required>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <label class="text-start" class="" for="cpf">CPF <small class="text-muted">— apenas números</small></label>
                <input type="text" name="cpf" autocomplete="off" id="cpf" minlength="11" maxlength="11" onkeypress="return onlynumber();" required>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 mb-4">
                <label class="" for="email">E-mail</label>
                <input type="email" name="email" required>
            </div>
        </div>

        <input type="submit" name="next" value="Próximo" class="next btn-barbeiro">

    </fieldset>

    <fieldset>
        <h2>Sobre a Barbearia</h2>
        <div class="row">
            <div class="col-12 mb-4">
                <label class="" class="" for="cnpf">CNPJ <small class="text-muted">— apenas números (opcional)</small></label>
                <input type="text" name="cnpj" id="cnpj" minlength="14" maxlength="14" onkeypress="return onlynumber();">
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <label for="razao">Razão Social <small class="text-muted">— (opcional)</small></label>
                <input type="text" name="razao">
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <label for="nome_fantasia">Nome Fantasia</label>
                <input type="text" name="fantasia" required>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <!-- ATENÇÃO, TALVEZ NECESSITE DE LÓGICA PARA EMAIL IGUAL BARBEIRO ETC -->
                <label class="" for="email2">E-mail</label>
                <input type="email" name="email2">
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <!-- ATENÇÃO, TALVEZ NECESSITE DE LÓGICA PARA TELEFONE IGUAL BARBEIRO ETC -->
                <label class="" for="telefone">Telefone-celular <small class="text-muted">— apenas números</small></label>
                <input type="tel" autocomplete="off" class="telefone" id="celular" name="telefone" maxlength="11" maxlength="11" onkeypress="return onlynumber();">
            </div>
        </div>

        <h3 class="mt-3">Endereço</h3>
        <hr style="width: 70%; margin:0 auto;">
        <div id="appCep">
            <div class="row">
                <div class="col-12 mb-4 mt-2">
                    <label class="" for="cep">CEP <small class="text-muted">— apenas números</small></label>
                    <input type="text" name="cep" id="cep" minlength="8" maxlength="8" onkeypress="return onlynumber();" v-model="endereco.cep" @change="cepAlterado" autocomplete="off" required>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label class="" for="estado">Estado</label>
                    <input type="text" name="estado" v-model="endereco.estado" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label class="" for="cidade">Cidade</label>
                    <input type="text" name="cidade" v-model="endereco.cidade" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label class="" for="bairro">Bairro</label>
                    <input type="text" name="bairro" v-model="endereco.bairro" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label class="" for="endereco">Rua</label>
                    <input type="text" name="endereco" v-model="endereco.rua" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label class="" for="numero">Número</label>
                    <input type="text" name="numero" onkeypress="return onlynumber();" required>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label class="" for="complemento">Complemento <small class="text-muted">— opcional</small></label>
                    <input type="text" name="complemento">
                </div>
            </div>
        </div>

        <input type="submit" name="prev" value="Anterior" class="prev btn-barbeiro">
        <input type="submit" name="next" value="Próximo" class="next btn-barbeiro">
    </fieldset>

    <fieldset>
        <h2>Como Funciona!</h2>
        <div class="row">
            <div class="container">
                <div class="col-12">
                    <p><i class="bi bi-check2-circle"></i>Escolha seu melhor plano.</p>
                    <p><i class="bi bi-check2-circle"></i>Receba um contrato no seu E-mail depois do cadastro.</p>
                    <p><i class="bi bi-check2-circle"></i>Depois de assinar o contrato, é só configurar sua barbearia do seu jeito!</p>
                    <p><i class="bi bi-check2-circle"></i>Cancele seu plano quando quiser.</p>
                    <p><i class="bi bi-check2-circle"></i>1 mês gratis para testar nosso app!</p>
                </div>
            </div>
        </div>

        <input type="submit" name="prev" value="Anterior" class="prev btn-barbeiro">
        <input type="submit" name="next" value="Próximo" class="next btn-barbeiro">
    </fieldset>

    <fieldset>
        <h2>Planos Diponíveis</h2>
        <div class="container">]
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <h3>Basico</h3>
                    <img src="http://i.mlcdn.com.br/portaldalu/fotosconteudo/742.jpg" class="img-fluid" alt="">
                    <p><i class="bi bi-check2-circle"></i>1 mês gratis para testar nosso app!</p>
                    <p><i class="bi bi-check2-circle"></i>10% do valor dos pedidos.</p>
                    <p><i class="bi bi-check2-circle"></i>Depois de assinar o contrato, é só configurar sua barbearia do seu jeito!</p>
                    <p><i class="bi bi-check2-circle"></i>Mensalidade de R$ 100,00 por mês, apenas se voçê faturar mais do que R$ 1.500,00.</p>
                    <p><i class="bi bi-check2-circle"></i>Cancele seu plano quando quiser.</p>
                </div>
                <div class="col-lg-6 col-md-12">
                    <h3>Vip</h3>
                    <img src="http://i.mlcdn.com.br/portaldalu/fotosconteudo/742.jpg" class="img-fluid" alt="">
                    <p><i class="bi bi-check2-circle"></i>1 mês gratis para testar nosso app!</p>
                    <p><i class="bi bi-check2-circle"></i>5% do valor dos pedidos.</p>
                    <p><i class="bi bi-check2-circle"></i>Depois de assinar o contrato, é só configurar sua barbearia do seu jeito!</p>
                    <p><i class="bi bi-check2-circle"></i>Mensalidade de R$ 100,00 por mês, apenas se voçê faturar mais do que R$ 1.500,00.</p>
                    <p><i class="bi bi-check2-circle"></i>Cancele seu plano quando quiser.</p>
                </div>
            </div>
        </div>

        <input type="submit" name="prev" value="Anterior" class="prev btn-barbeiro">
        <input type="submit" name="next" value="Próximo" class="next btn-barbeiro">
    </fieldset>
    <fieldset>
        <h2>Crie sua senha</h2>
        <h4>Falta pouco para concluir seu cadastro</h4>
        <div class="row">
            <div class="col-12 mb-4">
                <label for="">Senha</label>
                <div class="submit-line">
                    <input type="password" id="senha" name="senha" onchange="confereSenha()" required>
                    <i id="senhaIcon" class="bi bi-eye-slash-fill submit-lente2" onclick="verSenha()"></i>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <label class="" for="senha">Confirme a Senha</label>
                <div class="submit-line">
                    <input type="password" id="confirma" name="confirma" onchange="confereSenha()" required>
                    <i id="senhaIcon2" class="bi bi-eye-slash-fill submit-lente2" onclick="verConfirma()"></i>
                </div>
            </div>
        </div>
        <input type="submit" name="prev" value="Anterior" class="prev btn-barbeiro">
        <input type="submit" name="botao" value="Concluir" class="btn-barbeiro">

    </fieldset>

    </div>
</form>