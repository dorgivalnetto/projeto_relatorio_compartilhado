<?php
include_once("dataConfig.php");

// TRAZ O TOTAL REGISTRADO
function totalPermissoes() {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM permissoes") or die(mysqli_error($link));
    $row = mysqli_num_rows($query);
    return $row;
}

//LISTA AS PERMISSOES PELO ID DO USER
function selectPermissoesPorIdUser($getIdUsu) {
    global $link;
    $test = "SELECT * FROM permissoes WHERE (permissoes.getIdUsu = '$getIdUsu') ORDER BY `permissoes`.`getIdUsu`";
    //$test = "SELECT * FROM permissoes WHERE (permissoes.getIdUsu = '$getIdUsu') GROUP BY permissoes.getIdUsu ORDER BY `permissoes`.`getIdUsu`";
    $query = mysqli_query($link,$test) or die(mysqli_error($link));
    return $query;
}

// VERIFICA SE O USER LOGADO TEM PERMISSÃO PARA ACESSAR A PAGINA
function permissao($page) {
    //PUXA AS PERMISSOES
    $selectPermissoesPorIdUser = selectPermissoesPorIdUser($_SESSION['usuarioID']);
    $lsSelectPermissoesPorIdUser = mysqli_fetch_object($selectPermissoesPorIdUser);

    // $page = str_replace("_editar","", $page);
    // $page = str_replace("_edit","", $page);

    // VALIDA A PERMISSAO
    if ($lsSelectPermissoesPorIdUser->$page == 0): expulsaVisitante(); endif;
}


