<link rel="stylesheet" href="css/main.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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

    if ($plano == 2) {
        $plano = strtoupper("Premium");
    } else {
        $plano = strtoupper("Básico");
    }

    if ($nome != '' && $senha != '') {
        $conn = Conectar();

        $sql = "SELECT email FROM pessoa WHERE email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {

            $senha = md5($senha); //criptografia da senha

            $sql = "INSERT INTO endereco ( cep, estado, cidade, bairro, rua, numero, complemento )
            VALUES ( '$cep', '$estado', '$cidade', '$bairro', '$rua', '$numero', '$complemento' );"; // inserção do endereço do estabelecimento
            $result = $conn->query($sql);

            $sql = "SELECT MAX(idEndereco) idEndereco FROM endereco;"; // get id endereco 
            $result = $conn->query($sql);

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $idEndereco = $row['idEndereco'];
                }
            } else {
                die($conn->error);
            }

            $sql = "INSERT INTO pessoa ( nome, sexo, dataNascimento, email, senha, telefone, plano, Endereco_idEndereco, cargo ) 
                VALUES ( '$nome', '$sexo', '$nascimento', '$email', '$senha', '$telefone', '$plano', '$idEndereco', 'CABELEIREIRO' );"; //inserção dos dados pessoais 
            $result = $conn->query($sql);

            $sql = "INSERT INTO estabelecimento ( cnpj, razaoSocial, nomeFantasia, email, telefone, Endereco_idEndereco ) 
                VALUES ( '$cnpj', '$razaoSocial', '$nomeFantasia', '$emailBarbearia', '$telefoneBarbearia', '$idEndereco' );"; // insercao dados do estabelecimento + FK endereco
            $result = $conn->query($sql);

            $sql = "SELECT MAX(idPessoa) idPessoa FROM pessoa;"; // get id pessoa
            $result = $conn->query($sql);

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $idPessoa = $row['idPessoa'];
                }
            } else {
                die($conn->error);
            }

            $sql = "SELECT MAX(idEstabelecimento) idEstabelecimento FROM estabelecimento;"; //get id estabelecimento
            $result = $conn->query($sql);

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $idEstabelecimento = $row['idEstabelecimento'];
                }
            } else {
                die($conn->error);
            }

            $sql = "INSERT INTO cabeleireiro ( Pessoa_idPessoa, Estabelecimento_idEstabelecimento, cpf ) 
                VALUES ( '$idPessoa', '$idEstabelecimento', '$cpf' ); ";
            $result = $conn->query($sql);

            setcookie("cabeleireiro", $email, time() + (86400 * 30), "/");
            header('location: ./?page=agradecimento');
        } else {
            $emailError = "<font color='#ff6600'> O email já foi cadastrado!"; //possível fazer estilização do input
        }
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
                    <input type="text" class="letra-maiuscula" name="nome" value="<?php if (isset($nome)) {
                                                                                        echo $nome;
                                                                                    } else {
                                                                                        echo '';
                                                                                    } ?>" onkeydown="return /[a-z ]/i.test(event.key)">
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-4">
                    <label class="" for="nascimento">Data de nascimento</label>
                    <input type="date" name="nascimento" value="<?php if (isset($nascimento)) {
                                                                    echo $nascimento;
                                                                } else {
                                                                    echo '';
                                                                } ?>">
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
                    <input type="tel" autocomplete="off" class="telefone" id="telefone" name="telefone" minlength="10" maxlength="11" onkeypress="return onlynumber();" value="<?php if (isset($telefone)) {
                                                                                                                                                                                    echo $telefone;
                                                                                                                                                                                } else {
                                                                                                                                                                                    echo '';
                                                                                                                                                                                } ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label class="text-start" class="" for="cpf">CPF <small class="text-muted">— apenas números</small></label>
                    <input type="text" name="cpf" autocomplete="off" id="cpf" minlength="11" maxlength="11" onkeypress="return onlynumber();" value="<?php if (isset($cpf)) {
                                                                                                                                                            echo $cpf;
                                                                                                                                                        } else {
                                                                                                                                                            echo '';
                                                                                                                                                        } ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">

                    <label class="" for="email">E-mail <?php if (isset($emailError)) {
                                                            echo $emailError;
                                                        } else {
                                                            echo '';
                                                        } ?></label> <!-- possível fazer estilização do input -->
                    <input type="email" name="email" value="<?php if (isset($email)) {
                                                                echo $email;
                                                            } else {
                                                                echo '';
                                                            } ?>">
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
                    <input type="text" name="cnpj" id="cnpj" autocomplete="off" minlength="14" maxlength="14" onkeypress="return onlynumber();" value="<?php if (isset($cnpj)) {
                                                                                                                                                            echo $cnpj;
                                                                                                                                                        } else {
                                                                                                                                                            echo '';
                                                                                                                                                        } ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label for="razao">Razão Social <small class="text-muted">— (opcional)</small></label>
                    <input type="text" name="razao" value="<?php if (isset($razaoSocial)) {
                                                                echo $razaoSocial;
                                                            } else {
                                                                echo '';
                                                            } ?>" autocomplete="off" onkeydown="return /[a-z ]/i.test(event.key)">
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label for="nome_fantasia">Nome Fantasia</label>
                    <input type="text" name="fantasia" value="<?php if (isset($nomeFantasia)) {
                                                                    echo $nomeFantasia;
                                                                } else {
                                                                    echo '';
                                                                } ?>" autocomplete="off" onkeydown="return /[a-z ]/i.test(event.key)">
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label class="" for="email2">E-mail</label>
                    <input type="email" name="email2" value="<?php if (isset($email)) {
                                                                    echo $email;
                                                                } else {
                                                                    echo '';
                                                                } ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label class="" for="telefone">Telefone-celular <small class="text-muted">— apenas números</small></label>
                    <input type="tel" autocomplete="off" class="telefone" id="celular" name="celular" minlength="10" maxlength="11" onkeypress="return onlynumber();" value="<?php if (isset($telefoneBarbearia)) {
                                                                                                                                                                                    echo $telefoneBarbearia;
                                                                                                                                                                                } else {
                                                                                                                                                                                    echo '';
                                                                                                                                                                                } ?>">
                </div>
            </div>

            <!-- ENDEREÇO -->
            <h3 class="mt-3">Endereço</h3>
            <hr style="width: 70%; margin:0 auto;">
            <div id="appCep">
                <div class="row">
                    <div class="col-12 mb-4 mt-2">
                        <label class="" for="cep">CEP <small class="text-muted">— apenas números</small></label>
                        <input type="text" name="cep" id="cep" minlength="8" maxlength="8" onkeypress="return onlynumber();" v-model="endereco.cep" @change="cepAlteradoEvento" autocomplete="off">
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
                        <input type="text" name="numero" onkeypress="return onlynumber();">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-4">
                        <label class="" for="complemento">Complemento <small class="text-muted">— opcional</small></label>
                        <input type="text" name="complemento" value="<?php if (isset($complemento)) {
                                                                            echo $complemento;
                                                                        } else {
                                                                            echo '';
                                                                        } ?>">
                    </div>
                </div>
            </div>

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


<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script> <!--framework - vue.js-->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script> <!--consumo de api / node-->