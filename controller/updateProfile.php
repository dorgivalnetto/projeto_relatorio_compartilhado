<?
//INCLUI O ARQUIVO DE SEGURANÇA
include("../seguranca.php");

	//RECEBE O QUE VEM DO POST
	$idUsu = trim($_POST['idUsu']);
	$login = trim($_POST['login']);
	$senha = trim($_POST['senha']);
	$senhaEmDB = trim($_POST['senhaEmDB']);

	$senhaEmDB = base64_decode($senhaEmDB);

	// data do regitro
	$dateRegister = date('Y-m-d H:i:s');

	// PEGA O ID DO USER LOGADO
	$idUserRegister = $_SESSION['usuarioID'];

	//TESTAR SE A SENHA FOI ALTERADA
	if ($senhaEmDB == $senha):
		//REALIZAR O UP SEM NOVA SENHA
		$update = mysqli_query($_SG['link'],"UPDATE usuarios SET
			loginUsuario = '$login'
			WHERE (usuarioID = $idUsu)") or die(mysqli_error($_SG['link']));

		//SUCESSO NO UPDATE
		echo "<script>alert(\"Update sucessufly!\")</script>";
		echo "<script>window.history.go(-1);</script>";
	else:
		//REALIZAR O UP COM NOVA SENHA
		$senhaCRYPT = base64_encode($senha);
		$update = mysqli_query($_SG['link'],"UPDATE usuarios SET
			loginUsuario = '$login',
			senhaUsuario = '$senhaCRYPT'
			WHERE (usuarioID = $idUsu)") or die(mysqli_error($_SG['link']));

		//SUCESSO NO UPDATE
		echo "<script>alert(\"Update sucessufly!\")</script>";
		echo "<script>window.history.go(-1);</script>";
	endif;