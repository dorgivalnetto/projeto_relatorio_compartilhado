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

function totalAcoes(){
    global $link;
    $query = mysqli_query($link ,"SELECT * FROM `acoes`") or die(mysql_error());
    $row = mysqli_num_rows($query);
    return $row;
}

function selectAcoes(){
    $query = mysqli_query($_SESSION['link'],"SELECT * FROM acoes
                INNER JOIN membroEquipe ON (membroEquipe.acao_ME_ID = acoes.acaoID)
                INNER JOIN usuarios ON (usuarios.usuarioID = membroEquipe.usuario_ME_ID)
                INNER JOIN alunoContribuinte ON (alunoContribuinte.acoes_AC_ID = acoes.acaoID)
                INNER JOIN alunos ON (alunos.alunoID = alunoContribuinte.usuario_AC_ID)
        ") or die(mysql_error());
    return $query;
}

function selectAcaoPeloCoordenador($coordenadorID){
    global $link;
    $query = mysqli_query($link, "SELECT * FROM acoes
                INNER JOIN membroEquipe ON (membroEquipe.acao_ME_ID = acoes.acaoID)
                INNER JOIN usuarios ON (usuarios.usuarioID = membroEquipe.usuario_ME_ID)
                INNER JOIN tipoAcao ON (tipoAcao.tipoAcaoID = acoes.tipoAcao)
                INNER JOIN tipoMembro ON (tipoMembro.tipoMembroID = membroEquipe.tipoMembro)
    WHERE usuarioID = $coordenadorID") or die(mysql_error());
    $query = mysqli_fetch_object($query);
    return $query;
}

function totalAlunosDaAcao($idAcao) {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM alunoContribuinte 
                WHERE acoes_AC_ID = $idAcao") or die(mysqli_error($link));
    $row = mysqli_num_rows($query);
    return $row;
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

function selectUsuarioPeloNome() {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM `usuarios` ORDER BY `nomeUsuario`") or die(mysqli_error($link));
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