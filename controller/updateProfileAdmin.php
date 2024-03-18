<?
//INCLUI O ARQUIVO DE SEGURANÇA
include("../seguranca.php");

	//RECEBE O QUE VEM DO POST
	$nome = trim($_POST['nome']);
	$login = trim($_POST['login']);
	$senha = trim($_POST['senha']);
	$get_id_unidade_academica = trim($_POST['get_id_unidade_academica']);
	$matricula = trim($_POST['matricula']);
	$get_id_tipo = trim($_POST['get_id_tipo']);

	$idUsu = trim($_POST['idUsu']);
	$senhaEmDB = trim($_POST['senhaEmDB']);

	$senhaEmD = base64_decode($senhaEmD);

	// data do regitro
	$dateRegister = date('Y-m-d H:i:s');

	// PEGA O ID DO USER LOGADO
	$idUserRegister = $_SESSION['usuarioID'];

	//TESTAR SE A SENHA FOI ALTERADA
	if ($senhaEmDB == $senha):
		//REALIZAR O UP SEM NOVA SENHA
		$update = mysqli_query($_SG['link'],"UPDATE usuarios SET
			nomeUsuario = '$nome',
			loginUsuario = '$login',
			unidadeAcademicaUsuario = '$get_id_unidade_academica',
			siapeUsuario = '$matricula',
			tipoUsuario = '$get_id_tipo'
			WHERE (usuarioID = $idUsu)") or die(mysqli_error($_SG['link']));
	else:
		//REALIZAR O UP COM NOVA SENHA
		$senhaCRYPT = base64_encode($senha);
		$update = mysqli_query($_SG['link'],"UPDATE usuario SET
			nomeUsuario = '$nome',
			senhaUsuario = '$senhaCRYPT',
			loginUsuario = '$login',
			unidadeAcademicaUsuario = '$get_id_unidade_academica',
			siapeUsuario = '$matricula',
			tipoUsuario = '$get_id_tipo'
		WHERE (usuarioID = $idUsu)") or die(mysqli_error($_SG['link']));
	endif;

	//PERMISSOES	
	$usuarios = trim($_POST['usuarios']);
	$relatorios = trim($_POST['configuracoes_relatorios']);
	$relatoriofinal = trim($_POST['configuracoes_relatoriofinal']);

	// TRATA O VALOR DO CHECKBOX
	if(empty($usuarios)): $usuarios=0; else: $usuarios=1; endif;
	if(empty($relatorios)): $relatorios=0; else: $relatorios=1; endif;
	if(empty($relatoriofinal)): $relatoriofinal=0; else: $relatoriofinal=1; endif;

	// TRATA AS PERMISSOES DE PERFIL
	$queryDash = ",";
	foreach($_POST as $key => $value){
		if (substr($key, 0, strlen('dash_')) === 'dash_'){
			$valorForm = \strip_tags(trim($value));
			if(empty($valorForm)): $valorForm=0; else: $valorForm=1; endif;
			$queryDash .= \strip_tags(trim($key)) . " = '" . $valorForm . "', ";
		}
	}
	$queryDash = rtrim($queryDash, ', ');

	// UP NAS PERMISSOES
	$update = mysqli_query($_SG['link'],"UPDATE permissoes SET
		usuarios = '$usuarios',
		relatorios = '$relatorios',
		relatoriofinal = '$relatoriofinal'
		" . $queryDash . "
		WHERE (getIdUsu = $idUsu)") or die(mysqli_error($_SG['link']));

	//SUCESSO NO UPDATE
	echo "<script>alert(\"Atualização feita com Sucesso!\")</script>";
	// echo "<script>window.history.go(-1);</script>";
	echo "<script>window.location = \"../indexLogado.php?page=usuarios\"</script>";