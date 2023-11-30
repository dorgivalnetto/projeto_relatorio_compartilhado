<?php
protegePagina();

unset( $_SESSION );
// Apaga todas as variáveis da sessão
$_SESSION = array();

session_destroy();

header("Location: index.php?page=logout");