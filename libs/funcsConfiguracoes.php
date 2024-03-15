<?
include_once("dataConfig.php");

////// UNIDADES ACADÊMICAS
// TRAZ O TOTAL DE UNIDADES ACADÊMICAS
function totalPrefeituras() {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM unidadeAcademica") or die(mysqli_error($link));
    $row = mysqli_num_rows($query);
    return $row;
}

// LISTA AS UNIDADES ACADÊMICAS
function selectUnidadeAcademica() {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM unidadeAcademica ORDER BY nome_UA") or die(mysqli_error($link));
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

////// SECRETARIAS
// TRAZ O TOTAL DE SECRETARIAS
function totalSecretarias() {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM egp_secretarias") or die(mysqli_error($link));
    $row = mysqli_num_rows($query);
    return $row;
}

// LISTA AS SECRETARIAS TODAS
function selectSecretarias() {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM egp_secretarias ORDER BY nome_secretaria") or die(mysqli_error($link));
    return $query;
}

// LISTA AS SECRETARIAS TODAS SÓ O ID E NOME
function selectSecretariasIdNome() {
    global $link;
    $query = mysqli_query($link, "SELECT id_secretaria, nome_secretaria FROM egp_secretarias
                ORDER BY nome_secretaria
            ") or die(mysqli_error($link));
    return $query;
}

// LISTA AS SECRETARIAS PELO ID DA SECRETARIAS
function selectSecretariasPeloId($id_secretaria) {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM egp_secretarias
                WHERE id_secretaria = '$id_secretaria'
                ORDER BY nome_secretaria
            ") or die(mysqli_error($link));
    return $query;
}

////// DIRETORIAS
// TRAZ O TOTAL DE DIRETORIAS
function totalDiretorias() {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM egp_diretorias") or die(mysqli_error($link));
    $row = mysqli_num_rows($query);
    return $row;
}

// LISTA AS DIRETORIAS TODAS
function selectDiretorias() {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM egp_diretorias ORDER BY nome_diretoria") or die(mysqli_error($link));
    return $query;
}

// LISTA AS DIRETORIAS PELO ID DA DIRETORIAS
function selectDiretoriasPeloId($id_diretoria) {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM egp_diretorias
                WHERE (egp_diretorias.id_diretoria = '$id_diretoria')
                ORDER BY egp_diretorias.nome_diretoria
            ") or die(mysqli_error($link));
    return $query;
}

////// ESTRUTURAS ORGANIZACIONAIS
// TRAZ O TOTAL DE VINCULOS
function totalVinculos() {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM egp_organizaoprefeituras") or die(mysqli_error($link));
    $row = mysqli_num_rows($query);
    return $row;
}

//LISTA OS VINCULOS TODOS
function selectVinculos() {
    global $link;
    $query = mysqli_query($link,"SELECT * FROM egp_organizaoprefeituras
            INNER JOIN egp_prefeituras ON (egp_prefeituras.id_prefeitura = egp_organizaoprefeituras.get_id_prefeitura)
            INNER JOIN egp_secretarias ON (egp_secretarias.id_secretaria = egp_organizaoprefeituras.get_id_secretaria)
            INNER JOIN egp_diretorias ON (egp_diretorias.id_diretoria = egp_organizaoprefeituras.get_id_diretoria)
            ORDER BY egp_organizaoprefeituras.id_organizacao
        ") or die(mysqli_error($link));
    return $query;
}

//LISTA OS VINCULOS PELO ID DO VINCULO
function selectselectVinculosPeloId($id_organizacao) {
    global $link;
    $query = mysqli_query($link,"SELECT * FROM egp_organizaoprefeituras
            INNER JOIN egp_prefeituras ON (egp_prefeituras.id_prefeitura = egp_organizaoprefeituras.get_id_prefeitura)
            INNER JOIN egp_secretarias ON (egp_secretarias.id_secretaria = egp_organizaoprefeituras.get_id_secretaria)
            INNER JOIN egp_diretorias ON (egp_diretorias.id_diretoria = egp_organizaoprefeituras.get_id_diretoria)
            WHERE (egp_organizaoprefeituras.id_organizacao = '$id_organizacao')
            ORDER BY egp_organizaoprefeituras.id_organizacao
        ") or die(mysqli_error($link));
    return $query;
}

////// SERVIDORES
// TRAZ O TOTAL DE SERVIDORES
function totalServidores() {
    global $link;
    $query = mysqli_query($link, "SELECT id_servidor FROM egp_servidores") or die(mysqli_error($link));
    $row = mysqli_num_rows($query);
    return $row;
}

// LISTA OS SERVIDORES TODOS
function selectServidores() {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM egp_servidores ORDER BY nome_servidor") or die(mysqli_error($link));
    return $query;
}

// LISTA OS SERVIDORES TODOS SÓ OS DADOS PARA LISTAR
function selectListaServidores() {
    global $link;
    $query = mysqli_query($link, "SELECT id_servidor, nome_servidor, matricula_servidor, data_register_servidor, 
                get_id_register, status_servidor FROM egp_servidores ORDER BY nome_servidor
            ") or die(mysqli_error($link));
    while($row = mysqli_fetch_object($query)) $listaServidores[] = $row; 
    return json_encode($listaServidores);
}

// LISTA OS SERVIDORES TODOS SÓ OS DADOS PARA LISTAR PELA LETRA INICIAL
function selectListaServidoresPorLetra($letraInicial) {
    global $link;
    $query = mysqli_query($link, "SELECT id_servidor, nome_servidor, matricula_servidor, data_register_servidor,
                get_id_register, status_servidor FROM egp_servidores WHERE nome_servidor LIKE '$letraInicial%' ORDER BY nome_servidor 
            ") or die(mysqli_error($link));
    while ($row = mysqli_fetch_array($query)) $listaServidores[] = $row;
    return json_encode($listaServidores);
}

// LISTA 0S SERVIDORES PELO ID D0 SERVIDOR
function selectServidoresPeloId($id_servidor) {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM egp_servidores 
                WHERE (egp_servidores.id_servidor = '$id_servidor')
                ORDER BY egp_servidores.nome_servidor
            ") or die(mysqli_error($link));
    return $query;
}

////// CARGOS
// TRAZ O TOTAL DE CARGOS
function totalCargos() {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM egp_cargos") or die(mysqli_error($link));
    $row = mysqli_num_rows($query);
    return $row;
}

// LISTA OS CARGOS TODOS
function selectCargos() {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM egp_cargos ORDER BY nome_cargo") or die(mysqli_error($link));
    return $query;
}

// LISTA OS CARGOS TODOS SÓ O ID E O NOME
function selectCargosIdNome() {
    global $link;
    $query = mysqli_query($link, "SELECT id_cargo, nome_cargo FROM egp_cargos ORDER BY nome_cargo") or die(mysqli_error($link));
    return $query;
}

// LISTA OS CARGOS PELO ID DO CARGO
function selectCargosPeloId($id_cargo) {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM egp_cargos 
                WHERE (egp_cargos.id_cargo = '$id_cargo')
                ORDER BY egp_cargos.nome_cargo
            ") or die(mysqli_error($link));
    return $query;
}

////// LOTAÇÕES
// TRAZ O TOTAL DE LOTAÇÕES
function totalLotacoes() {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM egp_lotacoes") or die(mysqli_error($link));
    $row = mysqli_num_rows($query);
    return $row;
}

// LISTA AS LOTAÇÕES TODAS
function selectLotacoes() {
    global $link;
    $query = mysqli_query($link,"SELECT * FROM egp_lotacoes
                ORDER BY egp_lotacoes.nome_lotacao
            ") or die(mysqli_error($link));
    return $query;
}

// LISTA AS LOTAÇÕES TODAS SÓ O ID E O NOME
function selectLotacoesIdNome() {
    global $link;
    $query = mysqli_query($link, "SELECT id_lotacao, nome_lotacao 
                FROM egp_lotacoes 
                ORDER BY nome_lotacao
            ") or die(mysqli_error($link));
    return $query;
}

// LISTA AS LOTAÇÕES PELO ID DA LOTAÇÃO
function selectLotacoesPeloId($id_lotacao) {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM egp_lotacoes 
                WHERE id_lotacao = '$id_lotacao' 
                ORDER BY nome_lotacao
            ") or die(mysqli_error($link));
    return $query;
}

////// VINCULOS
// TRAZ O TOTAL DE VINCULOS
function totalVinculosServidores() {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM egp_vinculos") or die(mysqli_error($link));
    $row = mysqli_num_rows($query);
    return $row;
}

// LISTA OS VINCULOS TODOS
function selectVinculosServidores() {
    global $link;
    $query = mysqli_query($link,"SELECT * FROM egp_vinculos
                ORDER BY egp_vinculos.nome_vinculo
            ") or die(mysqli_error($link));
    return $query;
}

// LISTA OS VINCULOS TODOS SO O ID E O NOME
function selectVinculosServidoresIdNome() {
    global $link;
    $query = mysqli_query($link, "SELECT id_vinculo, nome_vinculo 
                FROM egp_vinculos 
                ORDER BY nome_vinculo
            ") or die(mysqli_error($link));
    return $query;
}

// LISTA OS VINCULOS PELO ID DO VINCULO
function selectVinculosServidoresPeloId($id_vinculo) {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM egp_vinculos 
                WHERE (egp_vinculos.id_vinculo = '$id_vinculo')
                ORDER BY egp_vinculos.nome_vinculo
            ") or die(mysqli_error($link));
    return $query;
}

////// ESTRUTURA DOS SERVIDORES
// SELECIONAR A ESTRUTURA DO SERVIDOR PELO ID DO SERVIDOR
function selectEstruturaServidorPeloIdServidor($get_id_servidor) {
    global $link;
    $query = mysqli_query($link, "SELECT * FROM egp_estruturas_servidores 
                WHERE (get_id_servidor = '$get_id_servidor')
                ORDER BY data_register_estrutura_servidor DESC
            ") or die(mysqli_error($link));
    return $query;
}