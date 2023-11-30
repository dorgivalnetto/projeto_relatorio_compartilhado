<?
include_once("dataConfig.php");

// TRAZ O TOTAL REGISTRADO
function totalProfiles(){
    global $link;
    $query = mysqli_query($link ,"SELECT * FROM usuario") or die(mysql_error());
    $row = mysqli_num_rows($query);
    return $row;
}
// TRAZ O TOTAL REGISTRADO - ATIVOS
function totalProfilesAtivos(){
    global $link;
    $query = mysqli_query($link ,"SELECT * FROM usuario WHERE status = 1") or die(mysql_error());
    $row = mysqli_num_rows($query);
    return $row;
}
// TRAZ O TOTAL REGISTRADO - ATIVOS
function totalProfilesAdmin(){
    global $link;
    $query = mysqli_query($link ,"SELECT * FROM usuario WHERE tipo = 0 and status = 1") or die(mysql_error());
    $row = mysqli_num_rows($query);
    return $row;
}


function selectProfiles(){
    $query = mysqli_query($_SESSION['link'],"SELECT * FROM usuario
        INNER JOIN unidade_academica ON (unidade_academica.id_unid_aca = usuario.get_id_unid_aca)
        -- INNER JOIN usuario ON (usuario.id_usu = persons.getIdPersonsUser) 
        ") or die(mysql_error());
    return $query;
}

function selectMyProfile($id_usu){
    $query = mysqli_query($_SESSION['link'],"SELECT * FROM `usuario`
        INNER JOIN `permissoes` ON (`permissoes`.`getIdUsu` = `usuario`.`id_usu`)
        WHERE (`usuario`.`id_usu` = $id_usu)") or die(mysql_error());
    return $query;
}

function totalProfilesByType($type){
    global $link;
    $query = mysqli_query($_SESSION['link'],"SELECT * FROM usuario
        -- INNER JOIN persons ON (usuario.id_usu = persons.getIdPersonsUser)
        -- INNER JOIN personsType ON (personsType.idPersonsType = persons.getIdPersonsType)
        WHERE ( usuario.tipo = $type) ") or die(mysql_error());
    $row = mysqli_num_rows($query);
    return $row;
}