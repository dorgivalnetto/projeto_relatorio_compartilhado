<?php
    /// LOCAL CONFIGURATIONS
     $host   = "localhost"; // IP do Banco
     $user   = "root"; // Usuário
     $pswd   = ""; // Senha
     $dbname = "bd_egp"; // Banco
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