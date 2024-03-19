<?
include_once("dataConfig.php");

////// UNIDADES ACADÊMICAS
// TRAZ O TOTAL DE UNIDADES ACADÊMICAS
function totalUnidadeAcademica() {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM unidadeAcademica") or die(mysqli_error($link));
    $row = mysqli_num_rows($query);
    return $row;
}

//PROCURA POR UMA UNIDADE ACADEMICA TENDO SEU ID
function whichUnidadeAcademica($idUA){
    global $link;
    $query = mysqli_query($link, "SELECT nome_UA FROM unidadeAcademica 
                WHERE unidadeAcademicaID=$idUA
            ") or die(mysqli_error($link));
    $query = mysqli_fetch_object($query);
    return $query->nome_UA;
}

// LISTA AS UNIDADES ACADÊMICAS
function selectUnidadeAcademica() {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM unidadeAcademica ORDER BY nome_UA") or die(mysqli_error($link));
    return $query;
}

function selectAcaoTipo() {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM `tipoAcao` ORDER BY `nome_Tipo`") or die(mysqli_error($link));
    return $query;
}

function selectAreaTematica() {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM `tipoArea` ORDER BY `nome_Area`") or die(mysqli_error($link));
    return $query;
}

// LISTA AS UNIDADES ACADÊMICAS TODAS SÓ O ID E NOME
function selectUnidadesAcademicaIdNome() {
    global $link;
    $query = mysqli_query($link, "SELECT unidadeAcademicaID, nome_UA
                FROM unidadeAcademica 
                ORDER BY nome_UA
            ") or die(mysqli_error($link));
    return $query;
}

// LISTA AS PREFEITURAS PELO ID DA PREFEITURAS
function selectUnidadeAcademicaPeloId($id_unid_aca) {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM unidadeAcademica 
                WHERE unidadeAcademicaID = '$id_unid_aca'
                ORDER BY nome_UA
            ") or die(mysqli_error($link));
    return $query;
}