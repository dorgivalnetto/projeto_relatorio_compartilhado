<?
// INCLUI O ARQUIVO DE SEGURANÇA
include("../../seguranca.php");

// SÍMBOLOS
$simbolos = array(".", "-");

// RECEBE O QUE VEM DO POST 
$nome_servidor = trim($_POST['nome_servidor']);
$matricula_servidor = trim($_POST['matricula_servidor']);
$cpf_servidor = str_replace($simbolos, "", trim($_POST['cpf_servidor']));
$status_servidor = 1;

// PEGA O ID DO USER LOGADO
$get_id_register = $_SESSION['usuarioID'];

// PEGA A DATA/HORA DO REGISTRO
$data_register_servidor = date('Y-m-d H:i:s');

// FORMATANDO A MATRICULA
$zeros = "";
if (strlen($matricula_servidor) < 7) {
    for ($k = 0; $k < 7 - strlen($matricula_servidor); $k++) {
        $zeros = $zeros . "0";
    }

    $matricula_servidor = $zeros . $matricula_servidor;
}

//VERIFICA SE JÁ TEM UM REGISTRO COM ESSE NOME
$query = mysqli_query($_SG['link'],"SELECT nome_servidor FROM egp_servidores
            WHERE (nome_servidor = '$nome_servidor')") or die(mysqli_error($_SG['link']));

if (mysqli_num_rows($query) > 0):
	//REDIRECIONAMENTO CASO HAJA REGISTO COM OS DADOS DO POST QUE FORAM TESTADOS
	echo "<script>alert(\"OPS! Já Existe um REGISTRO com esses Dados!\")</script>";
	echo "<script>window.history.go(-1);</script>";
else:	
    $cadastrar = mysqli_query($_SG['link'],"INSERT INTO egp_servidores (
                        nome_servidor,
                        matricula_servidor,
                        cpf_servidor,
                        get_id_register,
                        data_register_servidor,
                        status_servidor
                    ) VALUES (
                        '$nome_servidor',
                        '$matricula_servidor',
                        '$cpf_servidor',
                        '$get_id_register',
                        '$data_register_servidor',
                        '$status_servidor'
                    )
                ") or die(mysqli_error($_SG['link']));

    //SUCESSO NO CADASTRO-LEVA PARA O DASHBOARD
    echo "<script>window.location = \"../../indexLogado.php?page=configuracoes_servidores\"</script>";

endif; // #EOF TESTA SE JA EXISTE UM REGISTRO COM ESSE NOME
