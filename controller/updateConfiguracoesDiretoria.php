<?
//INCLUI O ARQUIVO DE SEGURANÇA
include("../seguranca.php");

	//RECEBE OS ACTIONS PELO GET
	$id_diretoria = $_POST['id_diretoria'];
	$nome_diretoria = $_POST['nome_diretoria'];

	// TESTA SE JA EXISTE UM REGISTRO COM ESSES DADOS
	$query = mysqli_query($_SG['link'],"SELECT * FROM egp_diretorias
		WHERE (nome_diretoria = '$nome_diretoria') ")
		or die(mysqli_error($_SG['link']));

	if(mysqli_num_rows($query) > 0):
		//REDIRECIONAMENTO CASO HAJA REGISTO COM OS DADOS DO POST QUE FORAM TESTADOS
		echo "<script>alert(\"OPS! Já Existe um REGISTRO com esses Dados!\")</script>";
		echo "<script>window.history.go(-1);</script>";
	else:

	//REALIZAR O UPDATE
	$query = mysqli_query($_SG['link'],"UPDATE egp_diretorias
			SET
				nome_diretoria = '$nome_diretoria'
			WHERE ( id_diretoria = $id_diretoria )
			")
			or die(mysqli_error($_SG['link']));

 	  	//SUCESSO NO UP
		echo "<script>alert(\"Atualzação feita com Sucesso!\")</script>";
		echo "<script>window.location = \"../indexLogado.php?page=configuracoes_diretorias\"</script>";
	endif; // #EOF TESTA SE JA EXISTE UM REGISTRO COM ESSES DADOS
		