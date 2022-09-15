<?php 
  if (isset($_COOKIE["cliente"])){
    setcookie("cliente", "", time() - (86400 * 30), "/");
    echo '<meta http-equiv = "refresh" content = "0; url = ./?page=inicio" />';
  }
  else if (isset($_COOKIE["cabeleireiro"])){
    setcookie("cabeleireiro", "", time() - (86400 * 30), "/");
    echo '<meta http-equiv = "refresh" content = "0; url = ./?page=inicio" />';
  }
  ?>