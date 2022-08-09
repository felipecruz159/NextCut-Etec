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

    $plano = $_POST['plano'];
    echo $plano;

    $senha = $_POST['senha'];

    $nome = strtoupper($nome);

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

<div id="formulario">
<?php include 'primeiro_passo.php' ?>
</div>


