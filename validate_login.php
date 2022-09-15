<?php
  if(!isset($_COOKIE["cliente"]) && !isset($_COOKIE["cabeleireiro"])) {
    echo '<meta http-equiv = "refresh" content = "0; url = ./?page=login" />';
  } 
?>