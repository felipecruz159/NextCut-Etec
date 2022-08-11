<?php 
  setcookie("login", "", time() - (86400 * 30), "/");
  echo '<meta http-equiv = "refresh" content = "0; url = ./?page=inicio" />';
  ?>