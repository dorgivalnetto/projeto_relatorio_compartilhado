<?
include_once("dataConfig.php");


//LISTA OS SOLICITANTE TODOS
function selectTodosCoordenadores() {
    global $link;
    $query = mysqli_query($link,"SELECT * FROM coordenadores ORDER BY coordenadores.nome_servidor") or die(mysqli_error($link));
    return $query;
}

function selectCursos() {
    global $link;
    $query = mysqli_query($link,"SELECT * FROM curso ORDER BY curso.nome_curso") or die(mysqli_error($link));
    return $query;
}

function selectSiapeCoordenador($idServidor) {
    global $link;
    $query = mysqli_query($link,"SELECT matricula_servidor FROM coordenadores WHERE id_servidor = $idServidor ORDER BY nome_servidor") or die(mysqli_error($link));
    return $query;
}

// Exemplo de uso
//$idServidor = 2; // Substitua pelo ID do servidor desejado
//$resultado = selectSiapeCoordenador($idServidor);

//while ($lsselectSiape = mysqli_fetch_object($resultado)) {
//    echo $lsselectSiape->matricula_servidor;
//}

function selectTodosPerfis() {
    global $link;
    $query = mysqli_query($link,"SELECT * FROM coordenadores_perfil ORDER BY coordenadores_perfil.id_perfil") or die(mysqli_error($link));
    return $query;
}

// TRAZ O TOTAL DE MODALIDADES
function totalLocaisAlmoxarifado() {
    global $link;
    $query = mysqli_query($link, "SELECT id_modalidade FROM modalidade_acao") or die(mysqli_error($link));
    $row = mysqli_num_rows($query);
    return $row;
}

// LISTA TODAS AS MODALIDADES
function selectModalidadeAcao() {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM modalidade_acao ORDER BY modalidade_acao.nome_modalidade") or die(mysqli_error($link));
    return $query;
}

// SELECIONA A MODALIDADE PELO ID
function selectModalidadeById($id_modalidade) {
    global $link;
    $query = mysqli_query($link, "SELECT nome_modalidade FROM modalidade_acao WHERE id_modalidade = '$id_modalidade'") or die(mysqli_error($link));
    $ls = mysqli_fetch_object($query);
    return $ls->nome_modalidade;
}


// LISTA TODOS OS TIPOS = PROJETO E PROGRAMA
function selectTipoAcao() {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM tipo_acao ORDER BY tipo_acao.nome_tipo") or die(mysqli_error($link));
    return $query;
}

// SELECIONA O TIPO DA AÇÃO PELO ID
function selectTipoAcaoById($id_tipoAcao) {
    global $link;
    $query = mysqli_query($link, "SELECT nome_tipo FROM tipo_acao WHERE id_tipo = '$id_tipoAcao'") or die(mysqli_error($link));
    $ls = mysqli_fetch_object($query);
    return $ls->nome_tipo;
}
