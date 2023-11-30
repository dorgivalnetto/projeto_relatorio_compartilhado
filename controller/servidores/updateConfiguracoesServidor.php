<?php
//INCLUI O ARQUIVO DE SEGURANÇA
include("../../seguranca.php");

// SÍMBOLOS
$simbolos = array(".", "-");

//RECEBE OS ACTIONS PELO GET
$id_servidor = $_POST['id_servidor'];
$nome_servidor = trim($_POST['nome_servidor']);
$matricula_servidor = trim($_POST['matricula_servidor']);
$cpf_servidor = str_replace($simbolos, "", trim($_POST['cpf_servidor']));

$id_estrutura_servidor = $_POST['id_estrutura_servidor'];
$get_id_prefeitura = $_POST['get_id_prefeitura'];
$get_id_secretaria = $_POST['get_id_secretaria'];
$get_id_cargo = $_POST['get_id_cargo'];
$get_id_lotacao = $_POST['get_id_lotacao'];
$get_id_vinculo = $_POST['get_id_vinculo'];

// PEGA O ID DO USER LOGADO
$get_id_register = $_SESSION['usuarioID'];

// PEGA A DATA/HORA DO REGISTRO
$data_register_estrutura_servidor = date('Y-m-d H:i:s');

// FORMATANDO A MATRICULA
$zeros = "";
if (strlen($matricula_servidor) < 7) {
    for ($k = 0; $k < 7 - strlen($matricula_servidor); $k++) {
        $zeros = $zeros . "0";
    }

    $matricula_servidor = $zeros . $matricula_servidor;
}

// TESTA SE JA EXISTE UM REGISTRO COM ESSES DADOS
$query = mysqli_query($_SG['link'], "SELECT * FROM egp_estruturas_servidores
            WHERE 
                get_id_servidor = '$id_servidor' AND 
                get_id_prefeitura = '$get_id_prefeitura' AND 
                get_id_secretaria = '$get_id_secretaria' AND 
                get_id_cargo = '$get_id_cargo' AND
                get_id_lotacao = '$get_id_lotacao' AND 
                get_id_vinculo = '$get_id_vinculo'
            ") or die(mysqli_error($_SG['link']));

if (mysqli_num_rows($query) <= 0):
    // CADASTRAR OS DADOS ESTRUTURAIS DO SERVIDOR
    $cadastrar = mysqli_query($_SG['link'], "INSERT INTO egp_estruturas_servidores (
                    get_id_servidor,
                    get_id_prefeitura,
                    get_id_secretaria,
                    get_id_cargo,
                    get_id_lotacao,
                    get_id_vinculo,
                    get_id_register,
                    data_register_estrutura_servidor
                ) VALUES (
                    '$id_servidor',
                    '$get_id_prefeitura',
                    '$get_id_secretaria',
                    '$get_id_cargo',
                    '$get_id_lotacao',
                    '$get_id_vinculo',
                    '$get_id_register',
                    '$data_register_estrutura_servidor'
                )
            ") or die(mysqli_error($_SG['link']));
endif; // #EOF TESTA SE JA EXISTE UM REGISTRO COM ESSES DADOS

//REALIZAR O UPDATE DA ESTRUTURA DO SERVIDOR
$query = mysqli_query($_SG['link'], "UPDATE egp_servidores SET
            nome_servidor = '$nome_servidor', matricula_servidor = '$matricula_servidor', 
            cpf_servidor = '$cpf_servidor', status_servidor = '$status_servidor'
        WHERE id_servidor = '$id_servidor'") or die(mysqli_error($_SG['link']));

// SUCESSO NO UP
echo "<script>alert(\"Atualização feita com Sucesso!\")</script>";
echo "<script>window.location = \"../../indexLogado.php?page=configuracoes_servidores_editar&q=" . base64_encode($id_servidor) . "\"</script>";