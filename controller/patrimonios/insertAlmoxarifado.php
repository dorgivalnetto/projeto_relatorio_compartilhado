<?
// INCLUI O ARQUIVO DE SEGURANÇA
include("../../seguranca.php");

// RECEBE O QUE VEM DO POST
$get_id_patrimonio = $_POST['get_id_patrimonio'];
$get_id_solicitante = $_POST['get_id_solicitante'];
$get_id_local = trim($_POST['get_id_local']);
$get_id_org_prefeitura = trim($_POST['get_id_org_prefeitura']);
$data_entrega = trim($_POST['data_entrega']);
$num_termo = trim($_POST['num_termo']);
$num_oficio = trim($_POST['num_oficio']);
$sql_termo = "(num_termo = '$num_termo')";
$sql_oficio = "(num_oficio = '$num_oficio')";
if ($num_termo == ""){
	$num_termo = "NULL";
	$sql_termo = "0";
} else {
	$num_termo = "'$num_termo'";
}
if ($num_oficio == ""){
	$num_oficio = "NULL";
	$sql_oficio = "0";
} else {
	$num_oficio = "'$num_oficio'";
}

// PEGA A DATA/HORA DO REGISTRO
$dateRegister = date('Y-m-d H:i:s');

// PEGA O ID DO USER LOGADO
$idUserRegister = $_SESSION['usuarioID'];

//VERIFICA SE JÁ TEM UM REGISTRO COM ESSE NOME
$query = mysqli_query($_SG['link'],"SELECT num_termo, num_oficio FROM almoxarifado
	WHERE $sql_termo OR $sql_oficio ") or die(mysqli_error( $_SG['link'] ));

if (mysqli_num_rows($query) > 0):
	//REDIRECIONAMENTO CASO HAJA REGISTO COM OS DADOS DO POST QUE FORAM TESTADOS
	echo "<script>alert(\"OPS! Já Existe um REGISTRO com esses Dados!\")</script>";
	echo "<script>window.history.go(-1);</script>";
else:	
	try{
		// INICIA TRANSACAO
		$query = mysqli_query($_SG['link'], "START TRANSACTION;") or die(mysqli_error($_SG['link']));

		// INSERT ALMOXARIFADO
		$cadastrar = mysqli_query($_SG['link'],"INSERT INTO almoxarifado (
						num_termo,
						num_oficio,
						get_id_local,
						get_id_org_prefeitura,
						data_entrega,
						get_id_register,
						data_register					
					) VALUES (
						$num_termo,
						$num_oficio,
						'$get_id_local',
						'$get_id_org_prefeitura',
						'$data_entrega',
						'$idUserRegister',
						'$dateRegister'						)
					") or die(mysqli_error($_SG['link']));

		//PEGO O ULTIMO ID INSERIDO
		$get_id_almoxarifado = mysqli_insert_id( $_SG['link'] );

		// TOTAL DE SOLICITANTES
		$qtd_solicitante = count($get_id_solicitante);

		// LOOP DE DA ITERAÇÃO
		for ($i = 0; $i < $qtd_solicitante; $i++) {		
			$cadastrar = mysqli_query($_SG['link'],"INSERT INTO almoxarifado_solicitantes_termo (
							get_id_almoxarifado,
							get_id_solicitante
						) VALUES (
							'$get_id_almoxarifado',
							'$get_id_solicitante[$i]'
							)
						") or die(mysqli_error($_SG['link']));
		}//EOF DO FOR

		// TOTAL DE PATRIMONIIOS
		$quantidade = count($get_id_patrimonio);
		$cont = 0;

		// LOOP DE TODA A INTERAÇÃO
		for ($i = 0; $i < $quantidade; $i++) {		

			$cadastrar = mysqli_query($_SG['link'],"INSERT INTO almoxarifado_patrimonio_termo (
							get_id_almoxarifado,
							get_id_patrimonio
						) VALUES (
							'$get_id_almoxarifado',
							'$get_id_patrimonio[$i]'
							)
						") or die(mysqli_error($_SG['link']));

			$cont++;
		}//EOF DO FOR

		// COMMITA OS INSERTS
		$query = mysqli_query($_SG['link'], "COMMIT;") or die(mysqli_error($_SG['link']));

	} catch (\Throwable $e) {
		// ROLLBACK
		$query = mysqli_query($_SG['link'], "ROLLBACK;") or die(mysqli_error($_SG['link']));
		echo "<script>window.alert(\"Houve um erro ao inserir no banco de dados\")\"</script>";
	}

	//SUCESSO NO CADASTRO-LEVA PARA O DASHBOARD
	echo "<script>window.location = \"../../indexLogado.php?page=formularios_almoxarifado\"</script>";

endif; // #EOF TESTA SE JA EXISTE UM REGISTRO COM ESSE NOME