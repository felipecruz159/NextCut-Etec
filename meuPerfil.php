<?php
if (isset($_COOKIE["cabeleireiro"])){
    // header('location: ./?page=barbeiro_logado');
    echo '<meta http-equiv = "refresh" content = "0; url = ./?page=barbeiro_logado" />';
}
else {
    // header('location: ./?page=perfil');
}
?>