<?
// INCLUI O ARQUIVO DE SEGURANÇA
include("../seguranca.php");

	// RECEBE O QUE VEM DO POST
	$nome = trim($_POST['nome']);
	$login = trim($_POST['login']);
	$senha = trim($_POST['senha']);
	$get_id_unidade_academica = trim($_POST['get_id_unidade_academica']);
	$matricula = trim($_POST['matricula']);
	$cpf = trim($_POST['cpf']);
	$get_id_tipo = trim($_POST['get_id_tipo']);

	$senha = base64_encode($senha);

	// PEGA A DATA/HORA DO REGISTRO
	$dateRegister = date('Y-m-d H:i:s');

	// PEGA O ID DO USER LOGADO
	$idUserRegister = $_SESSION['usuarioID'];

	//VERIFICA SE JÁ TEM UM REGISTRO COM ESSE NOME
	$query = mysqli_query($_SG['link'],"SELECT loginUsuario FROM usuarios
		WHERE (loginUsuario = '$login') ") or die(mysqli_error( $_SG['link'] ));
	if(mysqli_num_rows($query) > 0):
		//REDIRECIONAMENTO CASO HAJA REGISTO COM OS DADOS DO POST QUE FORAM TESTADOS
		echo "<script>alert(\"OPS! Já Existe um REGISTRO com esses Dados!\")</script>";
		echo "<script>window.history.go(-1);</script>";
	else:	

	$cadastrar = mysqli_query($_SG['link'],"INSERT INTO usuarios (
			nomeUsuario,
			siapeUsuario,
			cpfUsuario,
			loginUsuario,
			senhaUsuario,
			tipoUsuario,
			statusUsuario,
			unidadeAcademicaUsuario,
			registroUsuario_ID,
			dataRegistroUsuario
		) VALUES (
			'$nome',
			'$matricula',
			'$cpf',
			'$login',
			'$senha',
			'$get_id_tipo',
			'1',
			'$get_id_unidade_academica',
			'$idUserRegister',
			'$dateRegister'
			)
		")
		or die(mysqli_error($_SG['link']));

		// PEGA O ULTIMO ID
		$idUsu = mysqli_insert_id( $_SG['link'] );

		// INSERE NAS PERMISSÕES
		$cadastrar = mysqli_query($_SG['link'],"INSERT INTO permissoes (
				getIdUsu
			) VALUES (
				'$idUsu'
				)
			")
			or die(mysqli_error($_SG['link']));		

		//SUCESSO NO CADASTRO-LEVA PARA O DASHBOARD
		echo "<script>window.location = \"../indexLogado.php?page=usuarios\"</script>";

	endif; // #EOF TESTA SE JA EXISTE UM REGISTRO COM ESSE NOME