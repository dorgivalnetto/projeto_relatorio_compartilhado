<?
// INCLUI O ARQUIVO DE SEGURANÇA
include("../../seguranca.php");

// RECEBE O QUE VEM DO POST 
$codigo_vinculo = trim($_POST['codigo_vinculo']);
$nome_vinculo = trim($_POST['nome_vinculo']);

// PEGA O ID DO USER LOGADO
$get_id_register = $_SESSION['usuarioID'];

// PEGA A DATA/HORA DO REGISTRO
$data_register_vinculo = date('Y-m-d H:i:s');

//VERIFICA SE JÁ TEM UM REGISTRO COM ESSE NOME
$query = mysqli_query($_SG['link'], "SELECT nome_vinculo FROM egp_vinculos
            WHERE (codigo_vinculo = '$codigo_vinculo') AND (nome_vinculo = '$nome_vinculo')
        ") or die(mysqli_error($_SG['link']));

if (mysqli_num_rows($query) > 0):
	//REDIRECIONAMENTO CASO HAJA REGISTO COM OS DADOS DO POST QUE FORAM TESTADOS
	echo "<script>alert(\"OPS! Já Existe um REGISTRO com esses Dados!\")</script>";
	echo "<script>window.history.go(-1);</script>";
else:	
    $cadastrar = mysqli_query($_SG['link'], "INSERT INTO egp_vinculos (
                        codigo_vinculo,
                        nome_vinculo,
                        get_id_register,
                        data_register_vinculo
                    ) VALUES (
                        '$codigo_vinculo',
                        '$nome_vinculo',
                        '$get_id_register',
                        '$data_register_vinculo'
                    )
                ") or die(mysqli_error($_SG['link']));

    //SUCESSO NO CADASTRO-LEVA PARA O DASHBOARD
    echo "<script>window.location = \"../../indexLogado.php?page=configuracoes_vinculos\"</script>";

endif; // #EOF TESTA SE JA EXISTE UM REGISTRO COM ESSE NOME
