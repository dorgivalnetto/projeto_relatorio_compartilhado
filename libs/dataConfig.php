<?php
    /// LOCAL CONFIGURATIONS
     $host   = $_SG['servidor']; // IP do Banco
     $user   = $_SG['usuario']; // Usuário
     $pswd   = $_SG['senha']; // Senha
     $dbname = $_SG['banco']; // Banco
     $con    = null; // Conexão

    /////// MYSQL WEB CONFIGURATION !!!!!!!!!!!!
    //$host    = ""; // IP do Banco
    //$user    = ""; // Usuário
    //$pswd    = ""; // Senha
    //$dbname  = ""; // Banco
    //$con     = null; // Conexão    

    error_reporting(0);
    
    date_default_timezone_set('America/Fortaleza');
    
    $link = mysqli_connect($host, $user, $pswd, $dbname) or die("MySQL: Não foi possível conectar-se ao servidor");
    mysqli_set_charset($link, "utf8");