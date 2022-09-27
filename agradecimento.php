<link rel="stylesheet" href="css/main.css">
<?php 
include "config.php";
$conn = Conectar();
$dateAtual = date('Y-m-d');
if (isset($_COOKIE["cliente"])){
	$cookieEmail = $_COOKIE["cliente"];
  }
  else if (isset($_COOKIE["cabeleireiro"])){
	$cookieEmail = $_COOKIE["cabeleireiro"];
  }

$sql = "SELECT * FROM cabeleireiro c
INNER JOIN estabelecimento e on c.Estabelecimento_idEstabelecimento = e.idEstabelecimento
INNER JOIN pessoa p on c.Pessoa_idPessoa = p.idPessoa
WHERE p.email='$cookieEmail'";
$result = $conn->query($sql);

if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
		$id = $row["idPessoa"];
	}
}
?>
<div class="container error mt-5">
	<div class="row mt-5">
		<div class="col-lg-6 col-md-12 mb-4 align-self-center">
			<section class="page-404 section text-center">
				<div class="row">
					<div class="col-12">
						<h1>Seja bem-vindo(a) à NextCut!</h1>
						<p>Agradecemos pela sua confiança em nossa equipe!</p><br>
						<a href="<?php echo './?page=perfil&id='.$id.'&data='.$dateAtual ?>" class="btn-erro">Explorar</a>
					</div>
				</div>
			</section>
		</div>
		<div class="col-lg-6 col-md-12">
			
			<img src="./imagens/agradecimento.png" class="img-fluid" alt="">
		</div>
	</div>
</div>