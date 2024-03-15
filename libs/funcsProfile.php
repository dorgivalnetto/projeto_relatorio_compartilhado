<?
include_once("dataConfig.php");

// TRAZ O TOTAL REGISTRADO
function totalProfiles(){
    global $link;
    $query = mysqli_query($link ,"SELECT * FROM usuarios") or die(mysql_error());
    $row = mysqli_num_rows($query);
    return $row;
}
// TRAZ O TOTAL REGISTRADO - ATIVOS
function totalProfilesAtivos(){
    global $link;
    $query = mysqli_query($link ,"SELECT * FROM usuarios WHERE statusUsuario = 1") or die(mysql_error());
    $row = mysqli_num_rows($query);
    return $row;
}
// TRAZ O TOTAL REGISTRADO - ATIVOS
function totalProfilesAdmin(){
    global $link;
    $query = mysqli_query($link ,"SELECT * FROM usuarios WHERE tipoUsuario = 1 and statusUsuario = 1") or die(mysql_error());
    $row = mysqli_num_rows($query);
    return $row;
}


function selectProfiles(){
    $query = mysqli_query($_SESSION['link'],"SELECT * FROM usuarios
        INNER JOIN unidadeAcademica ON (unidadeAcademica.unidadeAcademicaID = usuarios.unidadeAcademicaUsuario)
        -- INNER JOIN usuario ON (usuario.id_usu = persons.getIdPersonsUser) 
        ") or die(mysql_error());
    return $query;
}

function selectMyProfile($id_usu){
    $query = mysqli_query($_SESSION['link'],"SELECT * FROM `usuarios`
        INNER JOIN `permissoes` ON (`permissoes`.`getIdUsu` = `usuarios`.`usuarioID`)
        WHERE (`usuarios`.`usuarioID` = $id_usu)") or die(mysql_error());
    return $query;
}

function totalProfilesByType($type){
    global $link;
    $query = mysqli_query($_SESSION['link'],"SELECT * FROM usuarios
        -- INNER JOIN persons ON (usuario.id_usu = persons.getIdPersonsUser)
        -- INNER JOIN personsType ON (personsType.idPersonsType = persons.getIdPersonsType)
        WHERE ( usuarios.tipoUsuario = $type) ") or die(mysql_error());
    $row = mysqli_num_rows($query);
    return $row;
}