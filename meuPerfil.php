<?php
include 'config.php';
if (isset($_COOKIE["cliente"])){
  $cookieEmail = $_COOKIE["cliente"];
}
else if (isset($_COOKIE["cabeleireiro"])){
  $cookieEmail = $_COOKIE["cabeleireiro"];
}
else {
  echo '<span style="color:#ff6600;">Login inválido</span>';
}

$conn = Conectar();
$sql = "SELECT nome, idPessoa, Endereco_idEndereco FROM pessoa WHERE email='$cookieEmail'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['idPessoa'];
    }
}
$dateAtual = date('Y-m-d');
if (true){
  echo '<meta http-equiv = "refresh" content = "0; url = ./?page=perfil&id=' . $id . '&data=' . $dateAtual .'" />';
}
