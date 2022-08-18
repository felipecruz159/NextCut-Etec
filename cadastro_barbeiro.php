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
    $sexo = $_POST['sexo'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];

    $outroSexo = $_POST['outroSexo'];

    $cnpj = $_POST['cnpj'];
    $razaoSocial = $_POST['razao'];
    $nomeFantasia = $_POST['fantasia'];
    $emailBarbearia = $_POST['email2'];
    $telefoneBarbearia = $_POST['celular'];

    $cep = $_POST['cep'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['endereco'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];

    $plano = $_POST['plano'];

    $senha = $_POST['senha'];

    $nome = strtoupper($nome);

    if ($sexo == 1) {
        $sexo = strtoupper("Masculino");
    } else if ($sexo == 2) {
        $sexo = strtoupper("Feminino");
    } else if ($sexo == 3) {
        $sexo = strtoupper($outroSexo);
    } else if ($sexo == 4) {
        $sexo = "N/A";
    }

    if ($plano == 2){
        $plano = strtoupper("Premium");
    }
    else{
        $plano = strtoupper("Básico");
    }

    if ($nome != '' && $senha != '') {
        $conn = Conectar();

        $sql = "SELECT * FROM pessoa WHERE email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $senha = md5($senha);
            $sql = "INSERT INTO pessoa ( nome, sexo, dataNascimento, email, senha, telefone, plano ) 
                VALUES ( '$nome', '$sexo', '$nascimento', '$email', '$senha', '$telefone', '$plano' );";
            $result = $conn->query($sql);

            $sql = "INSERT INTO estabelecimento ( cnpj, razaoSocial, nomeFantasia, email, cep, estado, cidade, bairro, rua, numero, complemento ) 
                VALUES ( '$cnpj', '$razaoSocial', '$nomeFantasia', '$emailBarbearia', '$cep', '$estado', '$cidade', '$bairro', '$rua', '$numero', '$complemento' );";
            $result = $conn->query($sql);

            $sql = "SELECT MAX(idPessoa) idPessoa FROM pessoa;";
            $result = $conn->query($sql);

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $idPessoa = $row['idPessoa'];
                }
            } else {
                die($conn->error);
            }

            $sql = "SELECT MAX(idEstabelecimento) idEstabelecimento FROM estabelecimento;";
            $result = $conn->query($sql);

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $idEstabelecimento = $row['idEstabelecimento'];
                }
            } else {
                die($conn->error);
            }

            $sql = "INSERT INTO cabeleireiro ( Pessoa_idPessoa, Estabelecimento_idBarbearia, cpf ) 
                VALUES ( '$idPessoa', '$idEstabelecimento', '$cpf' ); ";
            $result = $conn->query($sql);

            setcookie("login", $email, time() + (86400 * 30), "/");
            header('location: ./?page=form_redirect');
        } else {
                die($conn->error);
            }

            $sql = "SELECT MAX(idEstabelecimento) idEstabelecimento FROM estabelecimento;";
            $result = $conn->query($sql);

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $idEstabelecimento = $row['idEstabelecimento'];
                }
            } else {
                die($conn->error);
    }
}

?>
<div class="container">
    <form method="post" id="formulario">

        <div id="barbeiro1" class="barbeiros">
            <!-- BARBEIRO -->
            <h2>Dados do Responsável</h2>
            <div class="row">
                <div class="col-12 mb-4">
                    <label for="nome">Nome Completo</label>
                    <input type="text" class="letra-maiuscula" name="nome" value="" onkeydown="return /[a-z ]/i.test(event.key)">
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-4">
                    <label class="" for="nascimento">Data de nascimento</label>
                    <input type="date" name="nascimento" value="">
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-2">
                    <label class="sexoLabel text-center" for="sexo">Qual o seu gênero?</label><i title="precisamos saber disso para melhor experiência durante o uso do aplicativo" class="bi bi-question-circle label-icons"></i> <!-- trocar o title por uma div ou popup-->
                    <select class="form-select" id="sexo" name="sexo" onchange="getSexo()">
                        <option selected value="1">Masculino</option>
                        <option value="2">Feminino</option>
                        <option value="3">Outro...</option>
                        <option value="4">Prefiro não dizer</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-2">
                    <input type="hidden" id="outroSexo" name="outroSexo" placeholder="Qual?" maxlength="12" autocomplete="off" onkeydown="return /[a-z ]/i.test(event.key)">
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label class="" for="telefone">Telefone <small class="text-muted">— apenas números</small></label>
                    <input type="tel" autocomplete="off" class="telefone" id="telefone" name="telefone" minlength="10" maxlength="11" onkeypress="return onlynumber();" value="">
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label class="text-start" class="" for="cpf">CPF <small class="text-muted">— apenas números</small></label>
                    <input type="text" name="cpf" autocomplete="off" id="cpf" minlength="11" maxlength="11" onkeypress="return onlynumber();" value="">
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label class="" for="email">E-mail</label>
                    <input type="email" name="email" value="">
                </div>
            </div>
            <div class="btn-barbeiro">
                <button type="button" id="next1" onclick="goto1()">Próximo</button>
            </div>

        </div>



        <div id="barbeiro2" class="barbeiros" style="display: none;">
            <!-- ESTABELECIMENTO -->
            <h2>Sobre a Barbearia</h2>
            <div class="row">
                <div class="col-12 mb-4">
                    <label class="" class="" for="cnpf">CNPJ <small class="text-muted">— apenas números (opcional)</small></label>
                    <input type="text" name="cnpj" id="cnpj" autocomplete="off" minlength="14" maxlength="14" onkeypress="return onlynumber();" value="">
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label for="razao">Razão Social <small class="text-muted">— (opcional)</small></label>
                    <input type="text" name="razao" value="">
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label for="nome_fantasia">Nome Fantasia</label>
                    <input type="text" name="fantasia" value="" onkeydown="return /[a-z]/i.test(event.key)">
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <!-- ATENÇÃO, TALVEZ NECESSITE DE LÓGICA PARA EMAIL IGUAL BARBEIRO ETC -->
                    <label class="" for="email2">E-mail</label>
                    <input type="email" name="email2" value="">
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <!-- ATENÇÃO, TALVEZ NECESSITE DE LÓGICA PARA TELEFONE IGUAL BARBEIRO ETC -->
                    <label class="" for="telefone">Telefone-celular <small class="text-muted">— apenas números</small></label>
                    <input type="tel" autocomplete="off" class="telefone" id="celular" name="celular" maxlength="11" maxlength="11" onkeypress="return onlynumber();" value="">
                </div>
            </div>

            <!-- ENDEREÇO -->
            <h3 class="mt-3">Endereço</h3>
            <hr style="width: 70%; margin:0 auto;">
            <div id="appCep">
                <div class="row">
                    <div class="col-12 mb-4 mt-2">
                        <label class="" for="cep">CEP <small class="text-muted">— apenas números</small></label>
                        <input type="text" name="cep" id="cep" minlength="8" maxlength="8" onkeypress="return onlynumber();" v-model="endereco.cep" @change="cepAlterado" autocomplete="off" value="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-4">
                        <label class="" for="estado">Estado</label>
                        <input type="text" name="estado" v-model="endereco.estado" value="" readonly >
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-4">
                        <label class="" for="cidade">Cidade</label>
                        <input type="text" name="cidade" v-model="endereco.cidade" value="" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-4">
                        <label class="" for="bairro">Bairro</label>
                        <input type="text" name="bairro" v-model="endereco.bairro" value="" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-4">
                        <label class="" for="endereco">Rua</label>
                        <input type="text" name="endereco" v-model="endereco.rua" value="" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-4">
                        <label class="" for="numero">Número</label>
                        <input type="text" name="numero" onkeypress="return onlynumber();" value="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-4">
                        <label class="" for="complemento">Complemento <small class="text-muted">— opcional</small></label>
                        <input type="text" name="complemento" value="" >
                    </div>
                </div>
            </div>

            <!-- PERGUNTAS IMPORTANTES Colocar no perfil do barbeiro logado 
            <h3 class="mt-3">Título para perguntas importantes</h3>
            <hr style="width: 70%; margin:0 auto;">

            <div class="row">
                <div class="col-12 mb-4 mt-2">
                    <label class="" for="cep">Horário de funcionamento</label>
                    <input type="???">
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-2">
                    <label for="sexo">Quem você atende?</label><i title="isso nos ajuda a recomendar você para seu público-alvo, porém seu estabelecimento continuará sendo mostrado para todos" class="bi bi-question-circle label-icons"></i>
                    <select class="form-select" id="atendimento" name="atendimento">
                        <option selected value="1">Unissex</option>
                        <option value="2">Feminino</option>
                        <option value="3">Masculino</option>
                    </select>
                </div>
            </div>
-->
            <div class="btn-barbeiro">
                <button type="button" class="mb-3" id="prev1" onclick="previ1()">Anterior</button>
                <button type="button" id="next2" onclick="goto2()">Próximo</button>
            </div>

        </div>



        <div id="barbeiro3" class="barbeiros" style="display: none;">
            <!-- INSTRUÇÕES -->
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

            <div class="btn-barbeiro">
                <button type="button" class="mb-3" id="prev2" onclick="previ2()">Anterior</button>
                <button type="button" class="next3" onclick="goto3()">Próximo</button>
            </div>
        </div>



        <div id="barbeiro4" class="barbeiros" style="display: none;">
            <!-- PLANOS -->
            <h2>Planos Diponíveis</h2>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 plano " id="plano1">
                        <h3>Básico</h3>
                        <img src="http://i.mlcdn.com.br/portaldalu/fotosconteudo/742.jpg" class="img-fluid" alt="">
                        <p><i class="bi bi-check2-circle"></i>1 mês gratis para testar nosso app!</p>
                        <p><i class="bi bi-check2-circle"></i>10% do valor dos pedidos.</p>
                        <p><i class="bi bi-check2-circle"></i>Depois de assinar o contrato, é só configurar sua barbearia do seu jeito!</p>
                        <p><i class="bi bi-check2-circle"></i>Mensalidade de R$ 100,00 por mês, apenas se voçê faturar mais do que R$ 1.500,00.</p>
                        <p><i class="bi bi-check2-circle"></i>Cancele seu plano quando quiser.</p>
                    </div>
                    <div class="col-lg-6 col-md-12 plano " id="plano2">
                        <h3>Premium</h3>
                        <img src="http://i.mlcdn.com.br/portaldalu/fotosconteudo/742.jpg" class="img-fluid" alt="">
                        <p><i class="bi bi-check2-circle"></i>1 mês gratis para testar nosso app!</p>
                        <p><i class="bi bi-check2-circle"></i>5% do valor dos pedidos.</p>
                        <p><i class="bi bi-check2-circle"></i>Depois de assinar o contrato, é só configurar sua barbearia do seu jeito!</p>
                        <p><i class="bi bi-check2-circle"></i>Mensalidade de R$ 100,00 por mês, apenas se voçê faturar mais do que R$ 1.500,00.</p>
                        <p><i class="bi bi-check2-circle"></i>Cancele seu plano quando quiser.</p>
                    </div>
                </div>
            </div>

            <input type="hidden" id="escolhido" value="" name="plano"> <!-- input criado para pegar o plano escolhido -->

            <div class="btn-barbeiro">
                <button type="button" class="mb-3" id="prev3" onclick="previ3()">Anterior</button>
                <button type="button" id="next4" onclick="goto4()">Próximo</button>
            </div>
        </div>



        <div id="barbeiro5" class="barbeiros" style="display: none;">
            <!-- SENHA -->
            <h2>Crie sua senha</h2>
            <h4>Falta pouco para concluir seu cadastro</h4>
            <div class="row">
                <div class="col-12 mb-4">
                    <label for="">Senha</label>
                    <div class="submit-line">
                        <input type="password" id="senha" name="senha" onchange="confereSenha()" onkeyup="validarSenhaForca()">
                        <i id="senhaIcon" class="bi bi-eye-slash-fill submit-lente2" onclick="verSenha()"></i>
                    </div>
                </div>
            </div>
            <label id="labelForca" style="display:none;" for="">Força da senha</label>
            <div id="erroSenhaForca" class="container-forca"></div> <!-- pode estar na div errada -->
            <div class="row">
                <div class="col-12 mb-4">
                    <label class="" for="senha">Confirme a Senha</label>
                    <div class="submit-line">
                        <input type="password" id="confirma" name="confirma" onchange="confereSenha()" onkeyup="validarSenhaForca()">
                        <i id="senhaIcon2" class="bi bi-eye-slash-fill submit-lente2" onclick="verConfirma()"></i>
                    </div>
                </div>
            </div>

            <div class="btn-barbeiro">
                <button type="button" class="mb-3" id="prev4" onclick="previ4()">Anterior</button>
                <input type="submit" name="botao" class="cadastro-btn" value="Concluir"></input>
            </div>
        </div>
    </form>
</div>