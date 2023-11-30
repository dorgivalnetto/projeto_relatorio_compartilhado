<?
// INCLUI O ARQUIVO DE SEGURANÇA
include("../seguranca.php");

	// RECEBE O QUE VEM DO POST
	$nome_diretoria = trim($_POST['nome_diretoria']);

	// PEGA A DATA/HORA DO REGISTRO
	$dateRegister = date('Y-m-d H:i:s');

	// PEGA O ID DO USER LOGADO
	$idUserRegister = $_SESSION['usuarioID'];

	//VERIFICA SE JÁ TEM UM REGISTRO COM ESSE NOME
	$query = mysqli_query($_SG['link'],"SELECT nome_diretoria FROM egp_diretorias
		WHERE (nome_diretoria = '$nome_diretoria') ") or die(mysqli_error( $_SG['link'] ));
	if(mysqli_num_rows($query) > 0):
		//REDIRECIONAMENTO CASO HAJA REGISTO COM OS DADOS DO POST QUE FORAM TESTADOS
		echo "<script>alert(\"OPS! Já Existe um REGISTRO com esses Dados!\")</script>";
		echo "<script>window.history.go(-1);</script>";
	else:	

	$cadastrar = mysqli_query($_SG['link'],"INSERT INTO egp_diretorias (
			nome_diretoria,
			get_id_register,
			data_register_diretoria
		) VALUES (
			'$nome_diretoria',
			'$idUserRegister',
			'$dateRegister'
			)
		")
		or die(mysqli_error($_SG['link']));

		//SUCESSO NO CADASTRO-LEVA PARA O DASHBOARD
		echo "<script>window.location = \"../indexLogado.php?page=configuracoes_diretorias\"</script>";

	endif; // #EOF TESTA SE JA EXISTE UM REGISTRO COM ESSE NOME