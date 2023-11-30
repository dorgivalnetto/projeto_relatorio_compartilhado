<?
// INCLUI O ARQUIVO DE SEGURANÇA
include("../../seguranca.php");

// RECEBE O QUE VEM DO POST 
$nome_lotacao = trim($_POST['nome_lotacao']);

// PEGA O ID DO USER LOGADO
$get_id_register = $_SESSION['usuarioID'];

// PEGA A DATA/HORA DO REGISTRO
$data_register_lotacao = date('Y-m-d H:i:s');

//VERIFICA SE JÁ TEM UM REGISTRO COM ESSE NOME
$query = mysqli_query($_SG['link'],"SELECT nome_lotacao FROM egp_lotacoes
            WHERE (nome_lotacao = '$nome_lotacao')") or die(mysqli_error($_SG['link']));

if (mysqli_num_rows($query) > 0):
	//REDIRECIONAMENTO CASO HAJA REGISTO COM OS DADOS DO POST QUE FORAM TESTADOS
	echo "<script>alert(\"OPS! Já Existe um REGISTRO com esses Dados!\")</script>";
	echo "<script>window.history.go(-1);</script>";
else:	
    $cadastrar = mysqli_query($_SG['link'],"INSERT INTO egp_lotacoes (
                        nome_lotacao,
                        get_id_register,
                        data_register_lotacao
                    ) VALUES (
                        '$nome_lotacao',
                        '$get_id_register',
                        '$data_register_lotacao'
                    )
                ") or die(mysqli_error($_SG['link']));

    //SUCESSO NO CADASTRO-LEVA PARA O DASHBOARD
    echo "<script>window.location = \"../../indexLogado.php?page=configuracoes_lotacoes\"</script>";

endif; // #EOF TESTA SE JA EXISTE UM REGISTRO COM ESSE NOME
