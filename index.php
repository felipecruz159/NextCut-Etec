<!doctype html>
<html lang="pt-br">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Agendamento de corte de cabelo ">

  <link rel="stylesheet" href="/css/main.css">

  <title>NextCut</title>
</head>
<body>

<?php
$page = @$_GET['page'];
include 'header.php';
include 'carousel.php';


if ($page != '') {
  if (file_exists($page . ".php")) {
    include $page . ".php";
  } 
  else {  
    echo "<font color='#FFF'> Página não encontrada! </font>>";
  }
} 
else {
  include 'inicio.php';
}

include 'footer.php';
?>

  <script src="js/popper.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
</body>
</html>